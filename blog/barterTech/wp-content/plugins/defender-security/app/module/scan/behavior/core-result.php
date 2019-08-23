<?php
/**
 * Author: Hoang Ngo
 */

namespace WP_Defender\Module\Scan\Behavior;

use Hammer\Base\Behavior;
use Hammer\Helper\File_Helper;
use Hammer\Helper\Log_Helper;
use WP_Defender\Component\Error_Code;
use WP_Defender\Module\Scan\Component\Scan_Api;
use WP_Defender\Module\Scan\Model\Result_Item;

class Core_Result extends Behavior {
	/**
	 * @return string
	 */
	public function getTitle() {
		$raw = $this->getRaw();

		return pathinfo( $raw['file'], PATHINFO_BASENAME );
	}

	/**
	 * @return mixed
	 */
	public function getSubtitle() {
		$raw = $this->getRaw();

		return $raw['file'];
	}

	/**
	 * Get this slug, will require for checking ignore status while scan
	 * @return string
	 */
	public function getSlug() {
		$raw = $this->getRaw();

		return $raw['file'];
	}

	/**
	 * @return bool
	 */
	public function check() {

	}

	/**
	 * @return string
	 */
	public function getIssueDetail() {
		return $this->getIssueSummary();
	}

	/**
	 * @return string
	 */
	public function getIssueSummary() {
		$raw = $this->getRaw();
		if ( $raw['type'] == 'unknown' ) {
			return esc_html__( "Unknown file in WordPress core", "defender-security" );
		} elseif ( $raw['type'] == 'dir' ) {
			return esc_html__( "This directory doesn't belong to WordPress core", "defender-security" );
		} elseif ( $raw['type'] == 'modified' ) {
			return esc_html__( "This WordPress core file appears modified", "defender-security" );
		}
	}

	/**
	 * Delete file referenced by this item and delete item itself
	 * @return \WP_Error|bool
	 */
	public function purge() {
		//remove the file first
		$raw = $this->getRaw();
		if ( $raw['type'] == 'unknown' ) {
			$res = unlink( $raw['file'] );
			if ( $res == false ) {
				return new \WP_Error( Error_Code::NOT_WRITEABLE, __( "Defender doesn't have enough permission to remove this file", "defender-security" ) );
			}
			$this->getOwner()->delete();

			return true;
		} elseif ( $raw['type'] == 'modified' ) {
			return new \WP_Error( Error_Code::INVALID, __( "This file can't be removed", "defender-security" ) );
		} elseif ( $raw['type'] == 'dir' ) {
			$res = $this->deleteFolder( $raw['file'] );
			if ( is_wp_error( $res ) ) {
				return $res;
			}
			$this->getOwner()->delete();

			return true;
		}
	}

	/**
	 * Only if the file is modified, we will download the original source and replace it
	 * @return bool|\WP_Error
	 */
	public function resolve() {
		$originSrc = $this->getOriginalSource();
		$raw       = $this->getRaw();
		if ( $raw['type'] != 'modified' ) {
			return new \WP_Error( Error_Code::INVALID, __( "This file is not resolvable", "defender-security" ) );
		}

		if ( ! is_writeable( $raw['file'] ) ) {
			return new \WP_Error( Error_Code::NOT_WRITEABLE, sprintf( esc_html__( "It seems the %s file is currently using by another process or isn't writeable.", "defender-security" ), $raw['file'] ) );
		}

		file_put_contents( $raw['file'], $originSrc, LOCK_EX );
		$this->getOwner()->markAsResolved();

		return true;
	}

	/**
	 * Render current issue content
	 * @return false|string
	 */
	public function renderIssueContent() {
		$raw    = $this->getRaw();
		$string = $raw['type'] == 'unknown' ? __( "Defender found this stray file in your WordPress site directory. The current version of WordPress doesn't require it and as far as we can tell it's harmless (maybe even from an older WordPress install), so you can delete it or ignore it. Before deleting any files, be sure to back up your website." ) :
			( $raw['type'] == 'modified' ? __( "Compare your file with the original file in the WordPress repository. Pieces highlighted in red will be removed when you patch the file, and pieces highlighted in green will be added.", "defender-security" ) :
				__( "We found this folder in your WordPress file list. Your current version of WordPress doesn’t use this folder so it might belong to another application. If you don’t recognize it, you can delete this folder (don’t forget to back up your website first!) or get in touch with the WPMU DEV support team for more information", "defender-security" ) );
		ob_start();
		?>
        <div class="sui-box issue-content">
            <div class="sui-box-body">
                <strong><?php _e( "Issue Details", "defender-security" ) ?></strong>
                <div>
					<?php echo $string ?>
                </div>
				<?php echo $this->getSrcCode() ?>
                <table class="sui-table">
                    <tbody>
                    <tr>
                        <td>
                            <i class="sui-icon-folder-open"
                               aria-hidden="true"></i><strong><?php _e( "Location", "defender-security" ) ?></strong>
                        </td>
                        <td>
							<?php echo $this->getSubtitle() ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="sui-icon-download-cloud" aria-hidden="true"></i>
                            <strong>
								<?php _e( "Size", "defender-security" ) ?>
                            </strong>
                        </td>
                        <td>
							<?php
							$bytes = filesize( $this->getSubtitle() );
							if ( $bytes ) {
								echo $this->getOwner()->makeReadable( $bytes );
							} else {
								echo 'N/A';
							}
							?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="sui-icon-calendar" aria-hidden="true"></i>
                            <strong>
								<?php _e( "Date added", "defender-security" ) ?>
                            </strong>
                        </td>
                        <td>
							<?php
							$filemtime = filemtime( $this->getSubtitle() );
							if ( $filemtime ) {
								echo $this->getOwner()->formatDateTime( $filemtime );
							} else {
								echo 'N/A';
							}
							?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="sui-box-footer">
                <div class="sui-actions-left">
                    <form method="post" class="float-l ignore-item scan-frm">
                        <input type="hidden" name="action" value="ignoreItem">
						<?php wp_nonce_field( 'ignoreItem' ) ?>
                        <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
                        <button type="submit" class="sui-button sui-button-ghost">
                            <i class="sui-icon-eye-hide" aria-hidden="true"></i>
							<?php _e( "Ignore", "defender-security" ) ?></button>
                    </form>
                </div>
                <div class="sui-actions-right">
					<?php if ( $raw['type'] == 'unknown' || $raw['type'] == 'dir' ): ?>
                        <form method="post" class="scan-frm delete-item float-r">
                            <input type="hidden" name="action" value="deleteItem"/>
                            <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
							<?php wp_nonce_field( 'deleteItem' ) ?>
                            <button type="button" class="sui-button sui-button-red delete-mitem">
                                <i class="sui-icon-trash" aria-hidden="true"></i>
								<?php _e( "Delete", "defender-security" ) ?></button>
                            <div class="confirm-box wd-hide">
                                <span><?php _e( "This will permanently remove the selected file/folder. Are you sure you want to continue?", "defender-security" ) ?></span>
                                <div>
                                    <button type="submit" class="sui-button sui-button-red">
										<?php _e( "Yes", "defender-security" ) ?>
                                    </button>
                                    <button type="button" class="sui-button sui-button-ghost">
										<?php _e( "No", "defender-security" ) ?>
                                    </button>
                                </div>
                            </div>
                        </form>
					<?php elseif ( $raw['type'] == 'modified' ): ?>
                        <form method="post" class="scan-frm float-r resolve-item">
                            <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
                            <input type="hidden" name="action" value="resolveItem"/>
							<?php wp_nonce_field( 'resolveItem' ) ?>
                            <button type="submit" class="sui-button sui-button-blue">
								<?php _e( "Restore to Original", "defender-security" ) ?>
                            </button>
                        </form>
					<?php endif; ?>
                </div>
            </div>
        </div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Each item should have an dialog to show about itself description
	 * return string
	 * @deprecated 2.1
	 */
	public function renderDialog() {
		ob_start();
		$raw = $this->getRaw();
		?>
        <dialog title="<?php esc_attr_e( "Issue Details", "defender-security" ) ?>"
                id="dia_<?php echo $this->getOwner()->id ?>">
            <div class="wpmud">
                <div class="wp-defender">
                    <div class="scan-dialog">
                        <div class="well mline">
                            <ul class="dev-list item-detail">
                                <li>
                                    <div>
                                    <span class="list-label">
                                        <strong><?php _e( "Location", "defender-security" ) ?></strong>
                                    </span>
                                        <span class="list-detail">
                                        <?php echo $this->getSubtitle(); ?>
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                    <span class="list-label">
                                        <strong><?php _e( "Size", "defender-security" ) ?></strong>
                                    </span>
                                        <span class="list-detail">
                                        <?php
                                        $bytes = filesize( $this->getSubtitle() );
                                        if ( $bytes ) {
	                                        echo $this->getOwner()->makeReadable( $bytes );
                                        } else {
	                                        echo 'N/A';
                                        }
                                        ?>
                                    </span>
                                    </div>
                                </li>
                                <li>
                                    <div>
                                    <span class="list-label">
                                        <strong><?php _e( "Date Added", "defender-security" ) ?></strong>
                                    </span>
                                        <span class="list-detail">
                                        <?php
                                        $filemtime = filemtime( $this->getSubtitle() );
                                        if ( $filemtime ) {
	                                        echo $this->getOwner()->formatDateTime( $filemtime );
                                        } else {
	                                        echo 'N/A';
                                        }
                                        ?>
                                    </span>
                                    </div>
                                </li>
                            </ul>
                        </div>
						<?php if ( $raw['type'] == 'unknown' ) {
							$this->_dialogContentForAdded();
						} elseif ( $raw['type'] == 'modified' ) {
							$this->_dialogContentForModified();
						} elseif ( $raw['type'] == 'dir' ) {
							$this->_dialogContentForDir();
						} ?>

                        <div class="well well-small">
                            <form method="post" class="float-l ignore-item scan-frm">
                                <input type="hidden" name="action" value="ignoreItem">
								<?php wp_nonce_field( 'ignoreItem' ) ?>
                                <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
                                <button type="submit" class="button button-secondary button-small">
									<?php _e( "Ignore", "defender-security" ) ?></button>
                            </form>
							<?php if ( $raw['type'] == 'unknown' || $raw['type'] == 'dir' ): ?>
                                <form method="post" class="scan-frm delete-item float-r">
                                    <input type="hidden" name="action" value="deleteItem"/>
                                    <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
									<?php wp_nonce_field( 'deleteItem' ) ?>
                                    <button type="button" class="button button-small delete-mitem button-grey">
										<?php _e( "Delete", "defender-security" ) ?></button>
                                    <div class="confirm-box wd-hide">
                                        <span><?php _e( "This will permanently remove the selected file/folder. Are you sure you want to continue?", "defender-security" ) ?></span>
                                        <div>
                                            <button type="submit" class="button button-small button-grey">
												<?php _e( "Yes", "defender-security" ) ?>
                                            </button>
                                            <button type="button" class="button button-small button-secondary">
												<?php _e( "No", "defender-security" ) ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
							<?php elseif ( $raw['type'] == 'modified' ): ?>
                                <form method="post" class="scan-frm float-r resolve-item">
                                    <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
                                    <input type="hidden" name="action" value="resolveItem"/>
									<?php wp_nonce_field( 'resolveItem' ) ?>
                                    <button type="submit" class="button button-small">
										<?php _e( "Restore to Original", "defender-security" ) ?>
                                    </button>
                                </form>
							<?php endif; ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </dialog>
		<?php
		return ob_get_clean();
	}

	/**
	 * @return string
	 */
	public function getSrcCode() {
		if ( is_file( $this->getSubtitle() ) || is_dir( $this->getSubtitle() ) ) {
			$raw = $this->getRaw();
			if ( $raw['type'] == 'unknown' ) {
				$ext     = pathinfo( $this->getSubtitle(), PATHINFO_EXTENSION );
				$ext     = strtolower( $ext );
				$allowed = wp_get_ext_types();
				$allowed = array_merge( $allowed['code'], array(
					'sql',
					'text',
					'log'
				) );
				if ( in_array( $ext, $allowed ) ) {
					$content = file_get_contents( $this->getSubtitle() );
					if ( function_exists( 'mb_convert_encoding' ) ) {
						$content = mb_convert_encoding( $content, 'UTF-8', 'ASCII' );
					}

					$entities = htmlentities( $content, null, 'UTF-8', false );

					return '<div><strong>' . __( "Current code", "defender-security" ) . '</strong><pre><code class="html">' . $entities . '</code></pre></div>';
				}
			} elseif ( $raw['type'] == 'modified' ) {
				$original = $this->getOriginalSource();
				$current  = file_get_contents( $this->getSubtitle() );
				$diff     = $this->textDiff( $original, $current );

				return '<div><strong>' . __( "Current code", "defender-security" ) . '</strong><pre><code class="html">' . $diff . '</code></pre></div>';
			} elseif ( $raw['type'] == 'dir' ) {
				$files = File_Helper::findFiles( $raw['file'], true, false );

				return '<div><strong>' . __( "Current code", "defender-security" ) . '</strong><pre><code class="html">' . implode( PHP_EOL, $files ) . '</code></pre></div>';
			}
		}
	}

	/**
	 * Show more detail about unknown file
	 */
	private function _dialogContentForAdded() {
		?>
        <p class="line">
			<?php _e( "A stray file has been found in your site directory, which your version of WordPress doesn't need. As far as we can tell, the file is harmless (and maybe even from an older WordPress install) so it's safe to ignore it. If you choose to delete the file, we recommend backing up your website beforehand", "defender-security" ) ?>
        </p>
		<?php
		$ext     = pathinfo( $this->getSubtitle(), PATHINFO_EXTENSION );
		$ext     = strtolower( $ext );
		$allowed = wp_get_ext_types();
		$allowed = array_merge( $allowed['code'], array(
			'sql',
			'text',
			'log'
		) );
		if ( in_array( $ext, $allowed ) ) {
			?>
            <div class="mline source-code">
                <img src="<?php echo wp_defender()->getPluginUrl() ?>assets/img/loading.gif" width="18"
                     height="18"/>
				<?php _e( "Pulling source file...", "defender-security" ) ?>
                <form method="post" class="float-l pull-src scan-frm">
                    <input type="hidden" name="action" value="pullSrcFile">
					<?php wp_nonce_field( 'pullSrcFile' ) ?>
                    <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
                </form>
            </div>
			<?php
		}
	}

	/**
	 *
	 */
	private function _dialogContentForModified() {
		?>
        <p class="line">
			<?php _e( "Compare your file with the original file in the WordPress repository. Pieces highlighted in red will be removed when you patch the file, and pieces highlighted in green will be added.", "defender-security" ) ?>
        </p>
        <div class="mline source-code">
            <img src="<?php echo wp_defender()->getPluginUrl() ?>assets/img/loading.gif" width="18"
                 height="18"/>
			<?php _e( "Pulling source file...", "defender-security" ) ?>
            <form method="post" class="float-l pull-src scan-frm">
                <input type="hidden" name="action" value="pullSrcFile">
				<?php wp_nonce_field( 'pullSrcFile' ) ?>
                <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
            </form>
        </div>
		<?php

	}

	/**
	 * Show more detail about modified file
	 */
	private function _dialogContentForDir() {
		?>
        <p>
			<?php _e( "We found this folder in your WordPress file list. Your current version of WordPress doesn’t use this folder so it might belong to another application. If you don’t recognize it, you can delete this folder (don’t forget to back up your website first!) or get in touch with the WPMU DEV support team for more information.", "defender-security" ) ?>
        </p>
        <div class="mline source-code">
            <img src="<?php echo wp_defender()->getPluginUrl() ?>assets/img/loading.gif" width="18"
                 height="18"/>
			<?php _e( "Pulling source file...", "defender-security" ) ?>
            <form method="post" class="float-l pull-src scan-frm">
                <input type="hidden" name="action" value="pullSrcFile">
				<?php wp_nonce_field( 'pullSrcFile' ) ?>
                <input type="hidden" name="id" value="<?php echo $this->getOwner()->id ?>"/>
            </form>
        </div>
		<?php
	}

	/**
	 * @param $left_string
	 * @param $right_string
	 *
	 * @return string
	 */
	protected function textDiff( $left_string, $right_string ) {
		if ( ! class_exists( 'Text_Diff', false ) || ! class_exists( 'Text_Diff_Renderer_inline', false ) ) {
			require( ABSPATH . WPINC . DIRECTORY_SEPARATOR . 'wp-diff.php' );
		}

		$left_lines  = explode( "\n", $left_string );
		$right_lines = explode( "\n", $right_string );
		$text_diff   = new \Text_Diff( 'auto', array(
			$right_lines,
			$left_lines
		) );
		$renderer    = new \Text_Diff_Renderer_inline();

		return $renderer->render( $text_diff );
	}

	/**
	 * @return Result_Item;
	 */
	protected function getOwner() {
		return $this->owner;
	}

	/**
	 * @return array
	 */
	protected function getRaw() {
		return $this->getOwner()->raw;
	}


	/**
	 * Getting the latest original source from svn.wordpress.org
	 * @return mixed|string
	 */
	protected function getOriginalSource() {
		$raw  = $this->getRaw();
		$file = $raw['file'];
		global $wp_version;
		$relPath         = Scan_Api::convertToUnixPath( $file );
		$source_file_url = "http://core.svn.wordpress.org/tags/$wp_version/" . $relPath;
		$ds              = DIRECTORY_SEPARATOR;
		if ( ! function_exists( 'download_url' ) ) {
			require_once ABSPATH . 'wp-admin' . $ds . 'includes' . $ds . 'file.php';
		}
		$tmp = download_url( $source_file_url );
		if ( is_wp_error( $tmp ) ) {
			return $tmp;
		}
		$content = file_get_contents( $tmp );
		@unlink( $tmp );

		return $content;
	}

	private function deleteFolder( $dir ) {
		if ( ! is_dir( $dir ) ) {
			return;
		}
		$it    = new \RecursiveDirectoryIterator( $dir, \RecursiveDirectoryIterator::SKIP_DOTS );
		$files = new \RecursiveIteratorIterator( $it,
			\RecursiveIteratorIterator::CHILD_FIRST );
		foreach ( $files as $file ) {
			if ( $file->isDir() ) {
				$res = @rmdir( $file->getRealPath() );
			} else {
				$res = @unlink( $file->getRealPath() );
			}
			if ( $res == false ) {
				return new \WP_Error( Error_Code::NOT_WRITEABLE, __( "Defender doesn't have enough permission to remove this file", "defender-security" ) );
			}
		}
		$res = @rmdir( $dir );
		if ( $res == false ) {
			return new \WP_Error( Error_Code::NOT_WRITEABLE, __( "Defender doesn't have enough permission to remove this file", "defender-security" ) );
		}

		return true;
	}
}
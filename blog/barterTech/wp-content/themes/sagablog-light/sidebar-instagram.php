<?php
/**
 * The sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

if ( ! is_active_sidebar( 'footer-instagram-widgets' ) ) {
	return;
}
?>

<div id="footer-instagram-widgets" class="footer-instagram-widgets clearfix" role="complementary">
    <?php dynamic_sidebar( 'footer-instagram-widgets' ); ?>
</div><!-- #footer-rooms-widgets -->



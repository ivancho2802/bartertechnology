<?php
/**
 * The sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

if ( ! is_active_sidebar( 'footer-widgets' ) ) {
	return;
}
?>

<div id="footer-widgets" class="footer-widgets widget-area clearfix" role="complementary">
    <?php dynamic_sidebar( 'footer-widgets' ); ?>
</div><!-- #footer-widgets -->
<?php
/**
 * The sidebar.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

if ( ! is_active_sidebar( 'footer-top-widgets' ) ) {
	return;
}
?>

<div id="footer-top-widgets" class="footer-top-widgets clearfix" role="complementary">
    <?php dynamic_sidebar( 'footer-top-widgets' ); ?>
</div><!-- #footer-top-widgets -->



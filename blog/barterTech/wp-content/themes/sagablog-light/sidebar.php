<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

if ( ! is_active_sidebar( 'sidebar-widgets' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
</aside><!-- #secondary -->

<div style=" width:100%; height:1px; clear:both;"></div>


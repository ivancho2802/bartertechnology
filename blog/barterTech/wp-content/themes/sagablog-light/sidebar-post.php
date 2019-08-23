<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

if ( ! is_active_sidebar( 'post-widgets' ) ) {
	return;
}
?>


<div id="post-widgets" class="post-widgets clear" role="complementary">
    <?php dynamic_sidebar( 'post-widgets' ); ?>
</div> 
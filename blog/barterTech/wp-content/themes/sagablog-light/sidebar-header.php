<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

if ( ! is_active_sidebar( 'header-widgets' ) ) {
	return;
}
?>
        <?php if (is_home() || is_front_page()) {    ?>                          
		<div id="header-widgets-home" class="header-widgets-home widget-area clear" role="complementary">
        <?php } else { ?>
            <div id="header-widgets" class="header-widgets widget-area clear" role="complementary">
        <?php } ?>

		<?php dynamic_sidebar( 'header-widgets' ); ?>
	</div>

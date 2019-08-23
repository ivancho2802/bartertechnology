<?php
/**
 * The sidebar containing widget with contact info.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

if ( ! is_active_sidebar( 'contact-widgets' ) ) {
	return;
}
?>

<div id="secondary" class="contact-widgets widget-area clear" role="complementary">
    <?php dynamic_sidebar( 'contact-widgets' ); ?>
</div> 
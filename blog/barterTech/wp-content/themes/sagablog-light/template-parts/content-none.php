<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sagablog
 */

?>

<section class="<?php if ( is_404() ) { echo 'error-404'; } else { echo 'search-no-results'; } ?> not-found">

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

                        <p><?php printf( wp_kses( (__( 'Ready to publish your first post?', 'sagablog-light' ).'<a href="%1$s">'.(__('Get started here', 'sagablog-light' )).'</a>'), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'sagablog-light' ); ?></p>
			<?php get_search_form(); ?>
                <?php elseif ( is_404() ) : ?>

			<p><?php esc_html_e( 'It looks like nothing was found at this location. To find what you are looking for check out the most recent articles below or try a search:', 'sagablog-light' ); ?></p>
			<?php get_search_form(); ?>        

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'sagablog-light' ); ?></p>
			<?php
			get_search_form();

		endif; ?>
	</div><!-- .page-content -->
        
	<?php
    if ( is_404() || is_search() ) {
    ?>
		<h1 class="page-title secondary-title"><?php esc_html_e( 'Most recent posts:', 'sagablog-light' ); ?></h1>
		<div class="masonry-container">
                <?php if (esc_html(get_theme_mod('sagablog_front_page_type' ))==='front-page-type6') {?>
                <div class="masonry-container1"> 
                    <?php }

		// Get the 4 latest posts
		$args = array(
			'posts_per_page' => 4
		);
		$latest_posts_query = new WP_Query( $args );
		// The Loop
		if ( $latest_posts_query->have_posts() ) {
				while ( $latest_posts_query->have_posts() ) {
					$latest_posts_query->the_post();
					// Get the standard index page content
					get_template_part( 'template-parts/content', get_post_format() );
				}
		}
		/* Restore original Post Data */
		wp_reset_postdata();
           
	} // endif	
	?>
        </div><!--masonry-container--> 
        
</section><!-- .no-results -->

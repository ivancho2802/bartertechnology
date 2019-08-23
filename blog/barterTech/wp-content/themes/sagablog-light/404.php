<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package sagablog
 */

get_header(); ?>
<?php
if ( shortcode_exists( 'breadcrumb' ) ) {
echo do_shortcode( '[breadcrumb]' ); 
}
?> 
	<header class="page-header">            
            
            <div class="mid">
		<h1 class="page-title">
			<?php 
			if ( is_404() ) { esc_html_e( 'Oops! That page can&rsquo;t be found.', 'sagablog-light' );
			} else if ( is_search() ) {
				/* translators: %s = search query */
				printf( esc_html__( 'Nothing found for &ldquo;%s&rdquo;', 'sagablog-light'), '<em>' . get_search_query() . '</em>' );
			} else {
				esc_html_e( 'Nothing Found', 'sagablog-light' );
			}
			?>
		</h1>
            </div>
	</header><!-- .page-header -->
        
        
        
    <div id="content" class="site-content">  
        
        
        
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

                    <?php get_template_part('template-parts/content', 'none'); ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

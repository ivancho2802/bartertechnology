<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package sagablog
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

                        the_post_navigation( array(
                            'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'sagablog-light' ) . '</span> ' . 
                                        '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'sagablog-light' ) . '</span> ' . 
                                        '<div class="addbgpic clearfix"><div class="nav-text"><span class="post-title">%title</span></div></div>',
                            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'sagablog-light' ) . 
                                        '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'sagablog-light' ) . 
                                        '</span> ' . '<div class="addbgpic clearfix"><div class="nav-text"><span class="post-title">%title</span></div></div>',

                        ) );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
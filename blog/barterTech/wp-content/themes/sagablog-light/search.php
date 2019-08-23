<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sagablog
 */
get_header();
?>
<?php
if ( shortcode_exists( 'breadcrumb' ) ) {
echo do_shortcode( '[breadcrumb]' ); 
}
?>

<header class="page-header">                         

    <div class="mid">
        <h1 class="page-title"><?php printf(esc_html__('Search Results for: ', 'sagablog-light').'%s', '<span>' . get_search_query() . '</span>'); ?></h1>
    </div>
</header><!-- .page-header -->

<div id="content" class="site-content"> 


    <section id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php if (have_posts()) : ?>
                <div class="masonry-container">
                    <?php if (esc_html(get_theme_mod('sagablog_front_page_type')) === 'front-page-type6') : ?>
                        <div class="masonry-container1"> 
                            <?php
                            endif;

                            /* Start the Loop */
                            while (have_posts()) : the_post();

                                /**
                                 * Run the loop for the search to output the results.
                                 * If you want to overload this in a child theme then include a file
                                 * called content-search.php and that will be used instead.
                                 */
                                get_template_part('template-parts/content', get_post_format());

                            endwhile;
                            ?>
                        <?php if ((esc_html(get_theme_mod('sagablog_front_page_type')) === 'front-page-type6') || (esc_html(get_theme_mod('sagablog_front_page_type')) === 'front-page-type7')) : ?>
                            </div><!--masonry-container-->
                    <?php endif; ?>                          
                    </div><!--masonry-container--> 
                    <?php
                    sagablog_paging_nav();

                else :

                    get_template_part('template-parts/content', 'none');

                endif;
                ?>

        </main><!-- #main -->
    </section><!-- #primary -->

    <?php
    get_sidebar();
    get_footer();
    
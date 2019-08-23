<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sagablog
 */

get_header(); 
?>

<?php if (is_home() || is_front_page()) { ?> 

    <?php
    //Recommended articles
    if (esc_html(get_theme_mod('sagablog_recommended')) === 'recom-header') {
        ?>
        <div class="header-recommended"> 

            <ul class="clearfix">
                <?php
                get_template_part('inc/recommended', 'posts');
                get_template_part('inc/recommended', 'custom');
                ?>
            </ul> 

        </div><!--header-recommended-->
    <?php }
}
?> 
<div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">           
        <?php
        if ((is_home() || is_front_page()) && (esc_html(get_theme_mod('sagablog_activate_main_slider_on_index')) == '1')) {


            if (esc_html(get_theme_mod('sagablog_slider_index_type')) === 'type-index-1') {
                ?>
                <ul class="mainslider mainslider-type11 owl-carousel">
                    <?php } else { ?>
                    <ul class="mainslider mainslider-type22 owl-carousel">
                    <?php } ?>

                    <?php
                    //Main Slider 
                    if (esc_html(get_theme_mod('sagablog_slider_page_show')) === 'showpage-1') {
                        $postnumbers = esc_html(get_theme_mod('sagablog_frontpage_posts_number'));
                        sagablog_popular_posts_main_slider_index($postnumbers);
                    } elseif (esc_html(get_theme_mod('sagablog_slider_page_show')) == 'showpage-2') {
                        $postnumbers = esc_html(get_theme_mod('sagablog_frontpage_posts_number'));
                        sagablog_recent_posts_main_slider_index($postnumbers);
                    } elseif (esc_html(get_theme_mod('sagablog_slider_page_show')) == 'showpage-3') {

                        get_template_part('inc/mainsliderindex', 'posts');
                        get_template_part('inc/mainsliderindex', 'pages');
                    }
                    ?> 

                </ul><!-- mainslider -->                
            <?php } ?>  



            <?php if (is_home() || is_front_page()) { ?>

    <?php
    //Recommended articles
    if (esc_html(get_theme_mod('sagablog_recommended')) === 'recom-page') {
        ?>
                    <div class="index-recommended"> 

                        <ul class="clearfix">
        <?php
        get_template_part('inc/recommended', 'posts');
        ?>
                        </ul> 

                    </div><!--header-recommended-->
    <?php } ?> 
<?php } ?>                 

            <?php
            if (have_posts()) :

                if (is_home() && !is_front_page()) :
                    ?>
                    <header>
                        <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                    </header>

                                <?php endif;
                            ?>
                <div class="masonry-container"> 
                            <?php if (esc_html(get_theme_mod('sagablog_front_page_type')) === 'front-page-type6') : ?>
                        <div class="masonry-container1"> 
                            <?php
                            endif;

                            /* Start the Loop */
                            while (have_posts()) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
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

            </div><!-- #primary -->

<?php get_sidebar(); ?>
<div style=" width:100%; height:1px; clear:both;"></div>
<?php 
get_footer();
<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php esc_attr(bloginfo('charset')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">

        <?php wp_head();  ?>
    </head>

    <body <?php body_class();  ?>>
            <?php $current_layout=get_theme_mod('sagablog_layout');  ?>
        <div id="page" class="site <?php 
             if(is_page_template('page-templates/full-width.php')) {
                set_theme_mod('sagablog_layout', 'no-sidebar');
                echo esc_attr(get_theme_mod('sagablog_layout'));
             } else {
                echo esc_attr(get_theme_mod('sagablog_layout')); 
             }
        ?>">
            <?php set_theme_mod('sagablog_layout', $current_layout); ?>
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'sagablog-light'); ?></a>

            <header id="masthead" class="site-header" role="banner">
          

                <div class="site-title-width">

                    <?php if (is_home() || is_front_page()) { ?>                          
                        <div class="site-branding-home">
                    <?php } else { ?>
                            <div class="site-branding">
                        <?php
                        } ?>                                
                                <div class="logo-container">
                                    <?php if ( function_exists( 'the_custom_logo' ) ) {
                                        the_custom_logo();
                                    }?>  
                                </div> <!--logo-container --> 
                            <div class="title-container">
                            <?php if (is_front_page() && is_home()) : ?>
                                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo esc_html( get_bloginfo('name')); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php echo esc_html( get_bloginfo('name')); ?></a></p>
                                <?php
                                endif;

                                $description = esc_html( get_bloginfo('description', 'display'));
                                if ($description || is_customize_preview()) :
                                    ?>
                                    <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                                    <?php endif;
                                ?>
                            </div>
                        </div><!-- .site-branding -->
<?php get_sidebar('header'); ?>                
                        <div style=" width:100%; height:1px; clear:both;"></div>
                    </div> 


<?php if (esc_html(get_theme_mod('sagablog_slider_placement')) === 'after-menu') { ?>            
                        <div class="header-container">
                            <div class="header-width"> 

                                <nav id="site-navigation" class="main-navigation" role="navigation">
                                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&nbsp;<?php esc_html_e('Menu', 'sagablog-light'); ?></button>     
    <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu')); ?>
                                </nav><!-- #site-navigation -->

                                <div class="menu-container">
                                    <!-- Add social icons block-->   
                                    <div class="social-icons-and-search-menu">
                                    </div>
                                    <a class="popup-with-form" href="#modal-white-popup-block">
                                        <div class="search-modal-menu" ><i class="fa fa-search" aria-hidden="true"></i></div>
                                    </a>  
                                </div> <!--menu-container-->

                                <div style=" width:100%; height:1px; clear:both;"></div>
                            </div><!--header-to-top-->
                        </div><!-- header-container-->
<?php } ?>                

                    <?php
              
                    if ((is_home() || is_front_page()) && (esc_html(get_theme_mod('sagablog_activate_main_slider_on_header')) == '1')) {

                        if (esc_html(get_theme_mod('sagablog_slider_header_type')) === 'type-header-1') {
                            ?>
                            <ul class="mainslider mainslider-type1 owl-carousel">
                        <?php } else { ?>
                                <ul class="mainslider mainslider-type2 owl-carousel">
                            <?php } ?>

                                <?php
                                //Main Slider 
                                if (esc_html(get_theme_mod('sagablog_slider_header_show')) == 'showheader-1') {
                                    $postnumbers = esc_html(get_theme_mod('sagablog_header_posts_number'));
                                    sagablog_popular_posts_main_slider_header($postnumbers);
                                } elseif (esc_html(get_theme_mod('sagablog_slider_header_show')) == 'showheader-2') {
                                    $postnumbers = esc_html(get_theme_mod('sagablog_header_posts_number'));
                                    sagablog_recent_posts_main_slider_header($postnumbers);
                                } elseif (esc_html(get_theme_mod('sagablog_slider_header_show')) == 'showheader-3') {
                                    get_template_part('inc/mainsliderheader', 'posts');
                                    get_template_part('inc/mainsliderheader', 'pages');
                                }
                                ?>
                            </ul><!-- mainslider -->        
                            <?php } ?>            



<?php if (esc_html(get_theme_mod('sagablog_slider_placement')) === 'before-menu') { ?>            
                            <div class="header-container">
                                <div class="header-width"> 

                                    <nav id="site-navigation" class="main-navigation" role="navigation">
                                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&nbsp;<?php esc_html_e('Menu', 'sagablog-light'); ?></button>     
    <?php wp_nav_menu(array('theme_location' => 'menu-1', 'menu_id' => 'primary-menu', 'menu_class' => 'nav-menu')); ?>
                                    </nav><!-- #site-navigation -->

                                    <div class="menu-container">
                                        <!-- Add social icons block-->   
                                        <div class="social-icons-and-search-menu">

                                        </div>
                                        <a class="popup-with-form" href="#modal-white-popup-block">
                                            <div class="search-modal-menu" ><i class="fa fa-search" aria-hidden="true"></i></div>
                                        </a>   
                                    </div><!--menu-container-->

                                    <div style=" width:100%; height:1px; clear:both;"></div>
                                </div><!--header-width-->
                            </div><!-- header-container-->
<?php } ?>           

                        <!--Modal window begin -->
                        <fieldset id="modal-white-popup-block" class="white-popup-block mfp-hide">

                            <div id="search-container" class="search-box-wrapper clear">
                                <div class="search-box clear">
<?php get_search_form(); ?>
                                </div>
                            </div><!--search-box-wrapper-->
                        </fieldset>
                        <!--Modal window end -->

                        </header><!-- #masthead -->


<?php if ((!is_archive()) && (!is_404()) && (!is_search())) { ?>
                        
     <?php
if ( shortcode_exists( 'breadcrumb' ) ) {
echo do_shortcode( '[breadcrumb]' ); 
}
?>
    <div id="content" class="site-content">
    <?php
}


if (class_exists( 'WooCommerce' )&&(is_archive()) && (is_woocommerce())) { ?> 

    <div id="content" class="site-content">
<?php }
         
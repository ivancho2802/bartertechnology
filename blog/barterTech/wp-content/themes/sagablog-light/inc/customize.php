<?php

/*
 * Customize theme
 * 
 * @package sagablog
 */

//Sticky post options
function sagablog_sticky_post_options() {
    $sticky_post = esc_html(get_theme_mod('sagablog-sticky-post'));
    $sticky_post_css = "";
    if (!empty($sticky_post)):
        switch ($sticky_post) {
            case 'ribbon-check':
                $sticky_post_css = ' 
                        .sticky .ribbon-container-check {display: block;}
                        .sticky .ribbon-container-tack {display: none;}
                        .sticky .squaer-container-tack {display: none;}
                        .sticky .squaer-container-check {display: none;}
                        ';
                break;
            case 'ribbon-pin':
                $sticky_post_css = '
                        .sticky .ribbon-container-check {display: none;}
                        .sticky .ribbon-container-tack {display: block;}
                        .sticky .squaer-container-tack {display: none;}
                        .sticky .squaer-container-check {display: none;}
                        ';
                break;
            case 'square-check':
                $sticky_post_css = "
                        .sticky .ribbon-container-check {display: none;}
                        .sticky .ribbon-container-tack {display: none;}
                        .sticky .squaer-container-tack {display: none;}
                        .sticky .squaer-container-check {display: block;}                      
                        ";
                break;
            case 'square-pin':
                $sticky_post_css = "
                        .sticky .ribbon-container-check {display: none;}
                        .sticky .ribbon-container-tack {display: none;}
                        .sticky .squaer-container-tack {display: block;}
                        .sticky .squaer-container-check {display: none;}                      
                        ";
                break;
            case 'none':
                $sticky_post_css = "
                        .sticky .ribbon-container-check {display: none;}
                        .sticky .ribbon-container-tack {display: none;}
                        .sticky .squaer-container-tack {display: none;}
                        .sticky .squaer-container-check {display: none;}
                        ";
                break;
        }
    endif;

    wp_add_inline_style('sagablog-style', $sticky_post_css);
}

add_action('wp_enqueue_scripts', 'sagablog_sticky_post_options');

//Main menu text color
function sagablog_main_menu_text_color() {
    $menu_text_color = esc_html(get_theme_mod('sagablog_mainmenu_text_color'));
    $menu_text_color_css = "";
    if (!empty($menu_text_color)) {
        $menu_text_color_css = ' 
                        .main-navigation a:visited {color:' . $menu_text_color . ';} 
                        .main-navigation a,
                        .main-navigation .sub-menu a:hover,
                        .main-navigation .sub-menu a:focus, 
                        .main-navigation a:hover,.main-navigation a:focus {color:' . $menu_text_color . ';} 
                        .main-navigation a,
                        .main-navigation ul ul li:last-child a {border-bottom-color:#ccc;}
                        .dropdown-toggle {border-color: #ccc;color: ' . $menu_text_color . ';}
                        .dropdown-toggle:hover,
                        .dropdown-toggle:focus {color: ' . $menu_text_color . ';}  
                        .menu-toggle, .menu-toggle:hover,.menu-toggle:focus {color:' . $menu_text_color . ';} 
                        .main-navigation a:hover,.main-navigation a:focus {color:' . $menu_text_color . ';} 
                        .main-navigation li li a:hover,.main-navigation li li a:focus {color:' . $menu_text_color . ';} 
                        #site-navigation{color: ' . $menu_text_color . ';} 
                        .main-navigation .sub-menu a, .search-modal-menu i,.search-modal-menu i:hover {color: ' . $menu_text_color . ';}
                        ';
    }
    wp_add_inline_style('sagablog-style', $menu_text_color_css);
}

add_action('wp_enqueue_scripts', 'sagablog_main_menu_text_color');

//Show author box on posts
function sagablog_show_show_author_box() {
    $author_box = esc_html(get_theme_mod('sagablog_show_author_box'));
    $author_box_css = "";
    if (!empty($author_box) && ($author_box === '1')) {
        $author_box_css = '.entry-author {display: block;}';
    } else {
        $author_box_css = '.entry-author {display: none;}';
    }

    wp_add_inline_style('sagablog-style', $author_box_css);
}

add_action('wp_enqueue_scripts', 'sagablog_show_show_author_box');

//Add bg image for categories 
function sagablog_add_bg_image_category() {
    $main_color = esc_html(get_theme_mod('sagablog_main_color'));
    $add_bg_image_category = esc_url(get_theme_mod('sagablog_img_category'));
    $add_bg_image_css = "";
    if (!empty($add_bg_image_category) && ($add_bg_image_category !== '') && (is_archive())) {
        $add_bg_image_css = '
                    .page-header {background-image: url(' . $add_bg_image_category . ')!important;background-repeat:no-repeat;background-position:center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}
                    .page-header .page-title {color:#fff;}
                    .page-header .archive-description {color:#fff;}
                    .archive-description {color:#fff;}';
    } else {
        $add_bg_image_css = '.page-header { padding-top: 0; padding-bottom: 0;}'
                . '.page-header .page-title: {color:' . $main_color . '; margin-top: 0; margin-bottom: 0;}'
                . '.mid {background: rgba(0,0,0, 0.05);}';
    }

    wp_add_inline_style('sagablog-style', $add_bg_image_css);
}

add_action('wp_enqueue_scripts', 'sagablog_add_bg_image_category');


//Add bg image for 404 
function sagablog_add_bg_image_404() {
    $main_color = esc_html(get_theme_mod('sagablog_main_color'));
    $add_bg_image_404 = esc_url(get_theme_mod('sagablog_img_404'));
    $add_bg_image_css = "";

    if (!empty($add_bg_image_404) && ($add_bg_image_404 !== '') && (is_404())) {
        $add_bg_image_css = '
                    .page-header {background-image: url(' . $add_bg_image_404 . ')!important;background-repeat:no-repeat;background-position:center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}
                    .page-header .page-title {color:#fff;}
                    ';
    } else {
        $add_bg_image_css = '.page-header { padding-top: 0; padding-bottom: 0;}'
                . '.page-header .page-title: {color:' . $main_color . '; margin-top: 0; margin-bottom: 0;}'
                . '.mid {background: rgba(0,0,0, 0.05);}';
    }

    wp_add_inline_style('sagablog-style', $add_bg_image_css);
}

add_action('wp_enqueue_scripts', 'sagablog_add_bg_image_404');


//Add bg image for search
function sagablog_add_bg_image_search() {
    $main_color = esc_html(get_theme_mod('sagablog_main_color'));
    $add_bg_image_search = esc_url(get_theme_mod('sagablog_img_search'));
    $add_bg_image_css = "";

    if (!empty($add_bg_image_search) && ($add_bg_image_search !== '') && (is_search())) {
        $add_bg_image_css = '
                    .page-header {background-image: url(' . $add_bg_image_search . ')!important;background-repeat:no-repeat;background-position:center center;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;}
                    .page-header .page-title {color:#fff;}
                    ';
    } else {
        $add_bg_image_css = '.page-header { padding-top: 0; padding-bottom: 0;}'
                . '.page-header .page-title: {color:' . $main_color . '; margin-top: 0; margin-bottom: 0;}'
                . '.mid {background: rgba(0,0,0, 0.05);}';
    }

    wp_add_inline_style('sagablog-style', $add_bg_image_css);
}

add_action('wp_enqueue_scripts', 'sagablog_add_bg_image_search');

//Social links and search box in the top
function sagablog_social_search_in_top() {
    $social_search_in_top = esc_html(get_theme_mod('sagablog_social_links_top'));
    $social_search_in_top_css = "";
    if (!empty($social_search_in_top)):
        switch ($social_search_in_top) {
            case 'social-search-top':
                $social_search_in_top_css = ' 
                        .social-icons-and-search-top {display: block;text-align: left;} 
                        .social-icons-and-search-top .social-icons {display: block;text-align: left;}
                        ';
                break;
            case 'social-top':
                $social_search_in_top_css = '
                        .social-icons-and-search-top {display: block;text-align: center;} 
                        .social-icons-and-search-top .social-icons {display: block;text-align: center;}
                        ';
                break;
            case 'search-top':
                $social_search_in_top_css = "
                        .social-icons-and-search-top {display: block;}
                        .social-icons-and-search-top .social-icons {display: none;}
                        ";
                break;
            case 'not-show-top':
                $social_search_in_top_css = "
                        .social-icons-and-search-top {display: none;}                      
                        ";
                break;
        }
    endif;
    wp_add_inline_style('sagablog-style', $social_search_in_top_css);
}

add_action('wp_enqueue_scripts', 'sagablog_social_search_in_top');

//Site title and logo position (frontpage-homepage)
function sagablog_title_placement_frontpage() {
    $title_placement_frontpage = esc_html(get_theme_mod('sagablog_site_title_placement_frontpage'));
    $title_placement_frontpage_css = "";
    if (has_custom_logo()):
        if (!empty($title_placement_frontpage) && ((is_home() || is_front_page()))):
            switch ($title_placement_frontpage) {
                case 'center-frontpage':
                    $title_placement_frontpage_css = ' 
                        .site-branding-home {text-align: center;position: relative;float: none;padding: 1em;margin: 0;}  
                        .site-branding-home .title-container {text-align: left;}
                        .header-widgets-home {display:none;}
                        @media screen and (max-width: 1100px){ .site-branding,.site-branding-home{text-align: center;}}
                        @media screen and (max-width: 300px){.site-branding .title-container,.site-branding-home .title-container{text-align: center;}}
                        ';
                    break;
                case 'left-frontpage':
                    $title_placement_frontpage_css = '
                        .site-branding-home {text-align: left;position: relative;float: left;padding: 1em;margin: 0;}
                        .site-branding-home .title-container {text-align: left;}
                        .header-widgets-home {display:block;}
                        @media screen and (max-width: 1100px){ .site-branding,.site-branding-home{text-align: center;}}
                        @media screen and (max-width: 300px){.site-branding .title-container,.site-branding-home .title-container{text-align: center;}}
                        ';
                    break;
            }
        endif;
    endif;
    if (!has_custom_logo()):
        if (!empty($title_placement_frontpage) && ((is_home() || is_front_page()))):
            switch ($title_placement_frontpage) {
                case 'center-frontpage':
                    $title_placement_frontpage_css = ' 
                        .site-branding-home {text-align: center;position: relative;float: none;padding: 1em;margin: 0;}                       	
                        .site-branding-home .title-container {text-align: center;}
                        .header-widgets-home {display:none;}
                        @media screen and (max-width: 1100px){.site-branding-home{text-align: center;}}
                        @media screen and (max-width: 300px){.site-branding .title-container,.site-branding-home .title-container{text-align: center;}}
                        ';
                    break;
                case 'left-frontpage':
                    $title_placement_frontpage_css = '
                        .site-branding-home {text-align: left;position: relative;float: left;padding: 1em;margin: 0;}  
                        .site-branding-home .title-container {text-align: center;}
                        .header-widgets-home {display:block;}
                        @media screen and (max-width: 1100px){.site-branding-home{text-align: center;}}
                        @media screen and (max-width: 300px){.site-branding .title-container,.site-branding-home .title-container{text-align: center;}}
                        ';
                    break;
            }
        endif;
    endif;
    wp_add_inline_style('sagablog-style', $title_placement_frontpage_css);
}

add_action('wp_enqueue_scripts', 'sagablog_title_placement_frontpage');

//Site title and logo position (other pages)
function sagablog_title_placement() {
    $title_placement = esc_html(get_theme_mod('sagablog_site_title_placement'));
    $title_placement_css = "";
    if (has_custom_logo()):
        if (!empty($title_placement)):
            switch ($title_placement) {
                case 'center':
                    $title_placement_css = '
                        .site-branding {text-align: center;position: relative;float: none;padding: 1em;margin: 0;}                                         	
                        .site-branding .title-container {text-align: left;}
                        .header-widgets {display:none;}
                        @media screen and (max-width: 1100px){ .site-branding,.site-branding-home{text-align: center;}}
                        ';
                    break;
                case 'left':
                    $title_placement_css = ' 
                        .site-branding {text-align: left;position: relative;float: left;padding: 1em;margin: 0;}                       	                      	
                        .site-branding .title-container {text-align: left;}
                        .header-widgets {display:block;}
                        @media screen and (max-width: 1100px){ .site-branding,.site-branding-home{text-align: center;}}
                        ';
                    break;
            }
        endif;
    endif;
    if (!has_custom_logo()):
        if (!empty($title_placement)):
            switch ($title_placement) {
                case 'center':
                    $title_placement_css = '
                        .site-branding {text-align: center;position: relative;float: none;padding: 1em;margin: 0;}                                         	
                        .site-branding .title-container {text-align: center;}
                        .header-widgets {display:none;}
                        @media screen and (max-width: 1100px){ .site-branding,.site-branding-home{text-align: center;}}
                        ';
                    break;
                case 'left':
                    $title_placement_css = ' 
                        .site-branding {text-align: left;position: relative;float: left;padding: 1em;margin: 0;}                       	                      	
                        .site-branding .title-container {text-align: center;}
                        .header-widgets {display:block;}
                        @media screen and (max-width: 1100px){ .site-branding,.site-branding-home{text-align: center;}}
                        ';
                    break;
            }
        endif;
    endif;
    wp_add_inline_style('sagablog-style', $title_placement_css);
}

add_action('wp_enqueue_scripts', 'sagablog_title_placement');

//Main menu placement
function sagablog_menu_placement() {
    $menu_placement = esc_html(get_theme_mod('sagablog_menu_placement'));
    $menu_placement_css = "";
    if (!empty($menu_placement) && ($menu_placement === 'left')) {
        $menu_placement_css = '
                    #site-navigation{float: left;text-align: left;}
                    .toggled .sub-menu li a {text-align: left;}
                    .toggled .nav-menu li a {text-align: left;}
                    ';
    } else {
        $menu_placement_css = '
                    #site-navigation{float:none;text-align: center;}
                    .toggled .sub-menu li a {text-align: left;}
                    .toggled .nav-menu li a {text-align: left;}
                    ';
    }

    wp_add_inline_style('sagablog-style', $menu_placement_css);
}

add_action('wp_enqueue_scripts', 'sagablog_menu_placement');

//Social links and search box near menu
function sagablog_social_search_near_menu() {
    $social_search_near_menu = esc_html(get_theme_mod('sagablog_social_links_menu'));
    $social_search_near_menu_css = "";

    switch ($social_search_near_menu) {
        case 'social-search-menu':
            $social_search_near_menu_css = ' 
                        .social-icons-and-search-menu {display: block;} 
                        .menu-container .popup-with-form {display: block;}
                        @media screen and (max-width: 55em) {.social-icons-and-search-menu {display: none;}}
                        ';
            break;
        case 'social-menu':
            $social_search_near_menu_css = '
                        .social-icons-and-search-menu {display: block;} 
                        .menu-container .popup-with-form {display: none;}
                        @media screen and (max-width: 55em) {.social-icons-and-search-menu {display: none;}}
                        ';
            break;
        case 'search-menu':
            $social_search_near_menu_css = '
                        .social-icons-and-search-menu {display: none;} 
                        .menu-container .popup-with-form {display: block;}
                        ';
            break;
        case 'not-show-menu':
            $social_search_near_menu_css = "
                        .social-icons-and-search-menu {display: none;}
                        .menu-container .popup-with-form {display: none;}
                        ";
            break;
    }          
    wp_add_inline_style('sagablog-style', $social_search_near_menu_css);
}

add_action('wp_enqueue_scripts', 'sagablog_social_search_near_menu');

//Background color for footer
function sagablog_footer_bgcolor() {
    $footer_bgcolor = esc_html(get_theme_mod('sagablog_bgcolor_footer'));
    $footer_bgcolor_css = "";
    if (!empty($footer_bgcolor)) {
        $footer_bgcolor_css = ' 
                    .site-footer {background:' . $footer_bgcolor . '} 
                    .footer-instagram-widgets .null-instagram-feed ul,
                    .footer-instagram-widgets .widget .instagram-size-original li, .footer-instagram-widgets .widget .instagram-size-small li, .footer-instagram-widgets .widget .instagram-size-large li, .footer-instagram-widgets .widget .instagram-size-thumbnail li {
                    background: ' . $footer_bgcolor . ';}
                    .footer-top-widgets .widget_mc4wp_form_widget{background: ' . $footer_bgcolor . ';}  
                    .footer-top-widgets .widget_mc4wp_form_widget .mc4wp-form-fields input[type="submit"]:hover {background: ' . $footer_bgcolor . ';}
                    .footer-top-widgets .widget_mc4wp_form_widget .mc4wp-form-fields input[type="submit"] {border-color: ' . $footer_bgcolor . ';color: ' . $footer_bgcolor . ';}  
                        ';
    }
    wp_add_inline_style('sagablog-style', $footer_bgcolor_css);
}

add_action('wp_enqueue_scripts', 'sagablog_footer_bgcolor');

//Main color
function sagablog_main_color_css() {
    $main_color = esc_html(get_theme_mod('sagablog_main_color'));
    $main_color_custom_css = "
        .postedoncontainer .posted-on a:focus, .postedoncontainer .posted-on a:hover, a,a:visited {color: " . $main_color . ";}
        a:hover,a:focus,a:active {color: " . $main_color . ";}
        .footer-widgets .widget_tag_cloud a {background:none; border: 2px #fff solid;} 
        blockquote::before {color:" . $main_color . "; }
        button, input[type='button'], input[type='reset'],input[type='submit'] {
	border-color:" . $main_color . "; }
        button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover {
        background:" . $main_color . "; }
        button:focus, input[type='button']:focus, input[type='reset']:focus, input[type='submit']:focus,
        button:active, input[type='button']:active, input[type='reset']:active, input[type='submit']:active {
        background:" . $main_color . "; }
        .widget a:hover,.widget a:focus {color:" . $main_color . "; }
        .post-password-form input[type='submit'] { color:" . $main_color . ";     border: 1px " . $main_color . " solid;}
        .post-password-form input[type='submit']:active, .post-password-form input[type='submit']:hover {  
        background:" . $main_color . "; }
        .comment-navigation a, .paging-navigation a {border: 2px solid " . $main_color . ";color:" . $main_color . "; }
        .comment-navigation a:hover, comment-navigation a:focus,
        .paging-navigation a:hover, .paging-navigation a:focus {background:" . $main_color . "; }
        .post-navigation a:hover, .post-navigation a:focus { color:" . $main_color . "; }
        .post-navigation a:hover .post-title, .post-navigation a:focus .post-title {color:" . $main_color . "; }
        .widget_rss a:hover, .widget_rss a:focus {color:" . $main_color . "; }
        .widget_calendar thead {background:" . $main_color . "; }
        .widget_tag_cloud a {border: 2px " . $main_color . " solid;color:" . $main_color . "; }
        .widget_tag_cloud a:focus,.widget_tag_cloud a:hover {background:" . $main_color . ";color:#fff; }
        .wdv_about_me_widget .social-icons li a {color:" . $main_color . "; }
        .contact-address .contact-info:before,
        .contact-phone .contact-info:before,
        .contact-email .contact-info:before,
        .contact-skype .contact-info:before {  color:" . $main_color . "; }  
        .footer-widgets .contact-address .contact-info:before,
        .footer-widgets .contact-phone .contact-info:before,
        .footer-widgets .contact-email .contact-info:before,
        .footer-widgets .contact-skype .contact-info:before {  color:#fff; } 
        .widget-post-title:focus,
        .widget-post-title:hover {color:" . $main_color . "; }            
        .page-title {color:" . $main_color . "; }
        .archive-description {color: " . $main_color . "; }
        .search-submit, .widget_search .search-submit{color: " . $main_color . ";border: 2px solid " . $main_color . "; }

        .search-submit i{color: " . $main_color . "; }
        .search-submit:hover, .search-submit:focus {background:" . $main_color . ";color: #fff; }  
        .search-submit:hover i, .search-submit:focus i {color: #fff; } 
        .footer-widgets .widget_search .search-submit{color: " . $main_color . ";border: 0 solid #fff;height:95%; }
        .footer-widgets .search-submit:hover, .footer-widgets .search-submit:focus {background:" . $main_color . ";color: #fff;border: 2px solid #fff; }    
        .entry-content a:hover,entry-content a:focus,
        .entry-summary a:hover,.entry-summary a:focus {color:" . $main_color . "; }
        .entry-meta a:hover,.entry-meta a:focus,
        .entry-footer a:hover, .entry-footer a:focus {color:" . $main_color . "; }
        .entry-meta .posted-on a {color:" . $main_color . "; }
        .cat-links a {color:" . $main_color . "; }
        .cat-links:after {border-bottom: solid 1px " . $main_color . ";}
        .posted-on-container .posted-on a:focus,.posted-on-container .posted-on a:hover{color:" . $main_color . "; }
        .add-share-icon a {color:" . $main_color . "; }
        .add-share-icon a:hover {color: " . $main_color . "; }
        .page-links {color: " . $main_color . "; }
        .reply a {color: " . $main_color . ";border: 2px solid " . $main_color . "; }
        .reply a:hover, .reply a:focus {background:" . $main_color . "; }
        .bypostauthor .comment-author .fn {color:" . $main_color . "; }
        .fn a {color:" . $main_color . "; }
        .bypostauthor .comment-author .fn:before {color: " . $main_color . "; }
        .comment-form .form-submit input {border: 2px solid " . $main_color . ";color: " . $main_color . "; }
        .comment-form .form-submit input:hover,
        .comment-form .form-submit input:focus {background-color:" . $main_color . "; }
            
        .comment-form .form-submit .submit:hover, .comment-form .form-submit .submit:focus {background-color:" . $main_color . "; }
        .profile-links .social-links li i {color:" . $main_color . "; }
        .squaer-recommended, .squaer-showexcerpt {background:" . $main_color . "; }
        .topbtn {border: 2px solid " . $main_color . ";color:" . $main_color . "; }
        .topbtn:hover {background: " . $main_color . "; }
        .paging-navigation li a {color:" . $main_color . "; }
        .comment-form label, .comment-form .required, .wpcf7-form label {color:" . $main_color . "; }            
        .socicon {background-color: " . $main_color . "!important;}
        ";

    wp_add_inline_style('sagablog-style', $main_color_custom_css);
}

add_action('wp_enqueue_scripts', 'sagablog_main_color_css');

//Complementary color
function sagablog_complementary_color_css() {
    $complementary_color = esc_html(get_theme_mod('sagablog_complementary_color'));
    $complementary_color_custom_css = "
        .entry-title a:hover, .entry-title a:focus {color:" . $complementary_color . ";}    
        .add-share-icon a i:hover, .add-share-icon a i:focus {color:" . $complementary_color . ";} 
        .social-icons li a:hover {color:" . $complementary_color . ";}
        .squaer-container-tack,
        .squaer-container-check {background:" . $complementary_color . "; }
        .search-modal-top i:hover,.search-modal-top i:focus {color:" . $complementary_color . ";}
        .profile-links .social-links li i:focus, .profile-links .social-links li i:hover{color:" . $complementary_color . ";}
        .squaer-showexcerpt:focus,squaer-recommended:focus,
        .squaer-showexcerpt:hover,.squaer-recommended:hover{background:" . $complementary_color . "; }"
        . ".back-text .continue-reading a{color:" . $complementary_color . "; }"
        . ".card__back .back-text .continue-reading a:after{color:" . $complementary_color . "; }"
        . "::-moz-selection { background: {$complementary_color}; }"
        . "::selection { background: {$complementary_color}; }            
        .socicon:hover { background-color: " . $complementary_color . "!important;}
            ";

    wp_add_inline_style('sagablog-style', $complementary_color_custom_css);
}

add_action('wp_enqueue_scripts', 'sagablog_complementary_color_css');

//front page type
function sagablog_frontpage_type() {
    $sagablog_frontpage_type = esc_html(get_theme_mod('sagablog_front_page_type'));
    $sagablog_frontpage_type_css = "";
    $sagablog_sticky_css='';
    if ($sagablog_frontpage_type==='front-page-type1' || $sagablog_frontpage_type==='front-page-type2' || $sagablog_frontpage_type==='front-page-type3'){
    $sagablog_sticky_css = "        
                        .sticky:nth-child(odd) .index-box { width:100%;}	
			.sticky:nth-child(even) .index-box { width:100%;}							
						
                        .sticky:nth-child(odd) .no-sidebar .index-box { max-width: 65em;width:100%;}
                        .sticky:nth-child(odd) .no-sidebar .index-box .article-content-container .inlinedata {float: none;text-align: center;}  
			.sticky:nth-child(odd) .no-sidebar .index-box .featured-image {max-width:  65em;width:100%;float:left;position:relative;margin:0;}
                        .sticky:nth-child(odd) .no-sidebar .index-box .article-content-container {max-width:  65em;width:100%;float:right;font-size: 100%;padding: 1em;}
                        .sticky:nth-child(even) .no-sidebar .index-box { max-width: 65em;width:100%;}
                        .sticky:nth-child(even) .no-sidebar .index-box .article-content-container .inlinedata {float: none;text-align: center;}  
			.sticky:nth-child(even) .no-sidebar .index-box .featured-image {max-width:  65em;width:100%;float:left;position:relative;margin:0;}
                        .sticky:nth-child(even) .no-sidebar .index-box .article-content-container {width:100%;float:right;font-size: 100%;padding: 1em;}	
                        
                        .no-sidebar .sticky:nth-child(odd) .index-box, .no-sidebar .sticky:nth-child(odd){ max-width:  65em;width:100%;}
                        .no-sidebar .sticky:nth-child(odd) .index-box .featured-image {max-width:  65em;width:100%;position:relative;margin:0;}
			.no-sidebar .sticky:nth-child(odd) .index-box .article-content-container {max-width:  75em;width:100%;position:relative;}
                        .no-sidebar .sticky:nth-child(even) .index-box, .no-sidebar .sticky:nth-child(even){ max-width:  65em;width:100%;}
                        .no-sidebar .sticky:nth-child(even) .index-box .featured-image {max-width:  65em;width:100%;position:relative;margin:0;}
			.no-sidebar .sticky:nth-child(even) .index-box .article-content-container {max-width:  75em;width:100%;position:relative;}
                        
                        .no-sidebar .sticky:nth-child(odd) .index-box .featured-image {top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;margin:0;}
                        .no-sidebar .sticky:nth-child(even) .index-box .featured-image {top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);right:0;margin:0;}						



			.sticky:nth-child(odd) .index-box .featured-image {position: absolute;top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;margin:0;}
                        .sticky:nth-child(even) .index-box .featured-image {position: absolute;top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);right:0;margin:0;}						
			.sticky:nth-child(odd) .index-box .article-content-container {max-width:  65em;width:100%;float:right;}
                        .sticky:nth-child(even) .index-box .article-content-container {max-width:  65em;width:100%;float:right;}					
			.sticky:nth-child(odd) .index-box .featured-image {max-width:  900px;width:100%;float:left;position:relative;}
                        .sticky:nth-child(even) .index-box .featured-image {max-width:  900px;width:100%;float:left;position:relative;}						
						
                        .sticky:nth-child(odd) .index-box .article-content-container .add-share-icon {float:none;text-align: center;}
                        .sticky:nth-child(odd) .index-box .article-content-container .inlinedata {float:none;text-align: center;}						
                        .sticky:nth-child(even) .index-box .article-content-container .add-share-icon {float:none;text-align: center;}
                        .sticky:nth-child(even) .index-box .article-content-container .inlinedata {float:none;text-align: center;}						
                        
			.sticky:nth-child(odd) .index-box .article-content-container .entry-content {display:block;}
			.sticky:nth-child(even) .index-box .article-content-container .entry-content {display:block;}
";
    }
    if (!empty($sagablog_frontpage_type)):
        switch ($sagablog_frontpage_type) {
            case 'front-page-type1':
                $sagablog_frontpage_type_css = ' 
			.post:nth-child(odd) .index-box { max-width:  900px;width:100%;}	
			.post:nth-child(even) .index-box { max-width:  900px;width:100%;}							
						
                        .post:nth-child(odd) .no-sidebar .index-box { max-width: 65em;width:100%;}
                        .post:nth-child(odd) .no-sidebar .index-box .article-content-container .inlinedata {float: none;text-align: center;}  
			.post:nth-child(odd) .no-sidebar .index-box .featured-image {max-width:  65em;width:100%;float:left;position:relative;}
                        .post:nth-child(odd) .no-sidebar .index-box .article-content-container {max-width:  65em;width:100%;float:right;font-size: 100%;padding: 1em;}
                        .post:nth-child(even) .no-sidebar .index-box { max-width: 65em;width:100%;}
                        .post:nth-child(even) .no-sidebar .index-box .article-content-container .inlinedata {float: none;text-align: center;}  
			.post:nth-child(even) .no-sidebar .index-box .featured-image {max-width:  65em;width:100%;float:left;position:relative;}
                        .post:nth-child(even) .no-sidebar .index-box .article-content-container {max-width:  65em;width:100%;float:right;font-size: 100%;padding: 1em;}	
                        
                        .no-sidebar .post:nth-child(odd) .index-box, .no-sidebar .post:nth-child(odd){ max-width:  65em;width:100%;}
                        .no-sidebar .post:nth-child(odd) .index-box .featured-image {max-width:  65em;width:100%;position:relative;}
			.no-sidebar .post:nth-child(odd) .index-box .article-content-container {max-width:  65em;width:100%;position:relative;}
                        .no-sidebar .post:nth-child(even) .index-box, .no-sidebar .post:nth-child(even){ max-width:  65em;width:100%;}
                        .no-sidebar .post:nth-child(even) .index-box .featured-image {max-width:  65em;width:100%;position:relative;}
			.no-sidebar .post:nth-child(even) .index-box .article-content-container {max-width:  65em;width:100%;position:relative;}

			.post:nth-child(odd) .index-box .featured-image {position: absolute;top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;}
                        .post:nth-child(even) .index-box .featured-image {position: absolute;top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);right:0;}						
			.post:nth-child(odd) .index-box .article-content-container {max-width:  900px;width:100%;float:right;}
                        .post:nth-child(even) .index-box .article-content-container {max-width:  900px;width:100%;float:right;}					
			.post:nth-child(odd) .index-box .featured-image {max-width:  900px;width:100%;float:left;position:relative;}
                        .post:nth-child(even) .index-box .featured-image {max-width:  900px;width:100%;float:left;position:relative;}						
						
                        .post:nth-child(odd) .index-box .article-content-container .add-share-icon {float:none;text-align: center;}
                        .post:nth-child(odd) .index-box .article-content-container .inlinedata {float:none;text-align: center;}						
                        .post:nth-child(even) .index-box .article-content-container .add-share-icon {float:none;text-align: center;}
                        .post:nth-child(even) .index-box .article-content-container .inlinedata {float:none;text-align: center;}						
                        
			.post:nth-child(odd) .index-box .article-content-container .entry-content {display:block;}
			.post:nth-child(even) .index-box .article-content-container .entry-content {display:block;}						
			';
                break;
            case 'front-page-type2':
                $sagablog_frontpage_type_css = '
                        .post:nth-child(odd) .index-box, .post:nth-child(odd) { max-width:  900px;width:100%;min-height:310px;}
                        .post:nth-child(even) .index-box, .post:nth-child(even) { max-width:  900px;width:100%;min-height:310px;}						
						
                        .no-sidebar .post:nth-child(odd) .index-box, .no-sidebar .post:nth-child(odd){ max-width:  65em;width:100%;}
                        .no-sidebar .post:nth-child(odd) .index-box .featured-image {max-width:  32.5em;width:50%;position: absolute;top: 50%; -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);left:0;margin-left:0.5em;}
			.no-sidebar .post:nth-child(odd) .index-box .article-content-container {max-width:  32.5em;width:50%;float:right;font-size: 90%;padding: 1em;}
	
                        .no-sidebar .post:nth-child(even) .index-box, .no-sidebar .post:nth-child(even){ max-width:  65em;width:100%;}
                        .no-sidebar .post:nth-child(even) .index-box .featured-image {max-width:  32.5em;width:50%;position: absolute;top: 50%; -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);left:0;margin-left:0.5em;}
			.no-sidebar .post:nth-child(even) .index-box .article-content-container {max-width:  32.5em;width:50%;float:right;font-size: 90%;padding: 1em;}

                        .post:nth-child(odd) .index-box .article-content-container {max-width:  400px;width:50%;float:right;font-size: 90%;padding: 1em;}	
                        .post:nth-child(even) .index-box .article-content-container {max-width:  400px;width:50%;float:right;font-size: 90%;padding: 1em;}						
			.post:nth-child(odd) .index-box .featured-image {max-width:  450px;width:50%;position: absolute;top: 50%;  -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);left:0;margin-left:0.5em;min-height:180px;background-color: #f3f3f3;}
                        .post:nth-child(even) .index-box .featured-image {max-width:  450px;width:50%;position: absolute;top: 50%;  -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);left:0;margin-left:0.5em;min-height:180px;background-color: #f3f3f3;}

                        .post:nth-child(odd) .index-box .article-content-container .inlinedata {float:none;text-align: center;}
                        .post:nth-child(odd) .index-box .article-content-container .add-share-icon {float:none;text-align: center;margin-top:1em;}
                        .post:nth-child(odd) .index-box .article-content-container .entry-title {margin-bottom: 1em;margin-top: 1em;}
						
                        .post:nth-child(even) .index-box .article-content-container .inlinedata {float:none;text-align: center;}
                        .post:nth-child(even) .index-box .article-content-container .add-share-icon {float:none;text-align: center;margin-top:1em;}
                        .post:nth-child(even) .index-box .article-content-container .entry-title {margin-bottom: 1em;margin-top: 1em;}						

                        .index-box .cat-links {margin: 0;}
						
			.post:nth-child(odd) .index-box .article-content-container .entry-content {display:block;}
			.post:nth-child(even) .index-box .article-content-container .entry-content {display:block;}

                        @media screen and (max-width: 700px) {
                        .format-gallery .index-box .featured-image .gallery-item {margin:0;}
                        .format-gallery .index-box .featured-image {width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        
                        .post:nth-child(odd) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .post:nth-child(odd) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}                        
                        .post:nth-child(even) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .post:nth-child(even) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}
                        
                        .no-sidebar .post:nth-child(odd) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .no-sidebar .post:nth-child(odd) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}                        
                        .no-sidebar .post:nth-child(even) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .no-sidebar .post:nth-child(even) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}					
			}
                        ';
                break;
            case 'front-page-type3':
                $sagablog_frontpage_type_css = '
                        .post:nth-child(odd) .index-box, .post:nth-child(odd) { max-width:  900px;width:100%;min-height:310px;}
			.post:nth-child(even).index-box, .post:nth-child(even) { max-width:  900px;width:100%;min-height:310px;}
						
                        .post:nth-child(odd) .index-box .article-content-container {width:50%;float:right;font-size: 90%;padding: 1em;}
                        .post:nth-child(even) .index-box .article-content-container {width:50%;float:left;font-size: 90%;padding: 1em;}						
			.post:nth-child(odd) .index-box .featured-image {max-width: 450px;width:50%;position: absolute;top: 50%; -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);left:0;margin-left:0.5em;min-height:180px;background-color: #f3f3f3;}
                        .post:nth-child(even) .index-box .featured-image {max-width: 450px;width:50%;position: absolute;top: 50%; -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);right:0;margin-right:0.5em;min-height:180px;background-color: #f3f3f3;}
						
                        .no-sidebar .post:nth-child(odd) .index-box, .no-sidebar .post:nth-child(odd){ max-width:  65em;width:100%;}
			.no-sidebar .post:nth-child(even) .index-box, .no-sidebar .post:nth-child(even){ max-width:  65em;width:100%;}
                        .no-sidebar .post:nth-child(odd) .index-box .article-content-container {width:50%;float:right;font-size: 90%;padding: 1em;}
                        .no-sidebar .post:nth-child(even) .index-box .article-content-container {width:50%;float:left;font-size: 90%;padding: 1em;}						
			.no-sidebar .post:nth-child(odd) .index-box .featured-image {max-width: 450px;width:50%;position: absolute;top: 50%; -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);left:0;margin-left:0.5em;}
                        .no-sidebar .post:nth-child(even) .index-box .featured-image {max-width: 450px;width:50%;position: absolute;top: 50%; -webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);-moz-transform: translateY(-50%);-o-transform: translateY(-50%);transform: translateY(-50%);right:0;margin-right:0.5em;}
												
                        .post:nth-child(odd) .index-box .article-content-container .inlinedata {float:none;text-align: center;}
                        .post:nth-child(odd) .index-box .article-content-container .add-share-icon {float:none;text-align: center;margin-top:1em;}
                        .post:nth-child(odd) .index-box .article-content-container .entry-title {margin-bottom: 1em;margin-top: 1em;}                  
			.post:nth-child(even) .index-box .article-content-container .inlinedata {float:none;text-align: center;}
                        .post:nth-child(even) .index-box .article-content-container .add-share-icon {float:none;text-align: center;margin-top:1em;}
                        .post:nth-child(even) .index-box .article-content-container .entry-title {margin-bottom: 1em;margin-top: 1em;}

			.index-box .cat-links {margin: 0;}

			.post:nth-child(odd) .index-box .article-content-container .entry-content {display:block;}
			.post:nth-child(even) .index-box .article-content-container .entry-content {display:block;}						

                        @media screen and (max-width: 700px) {
                        .format-gallery .index-box .featured-image .gallery-item {margin:0;}
                        .format-gallery .index-box .featured-image {width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        
                        .post:nth-child(odd) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .post:nth-child(odd) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}                        
                        .post:nth-child(even) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .post:nth-child(even) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}
                        
                        .no-sidebar .post:nth-child(odd) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .no-sidebar .post:nth-child(odd) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}                        
                        .no-sidebar .post:nth-child(even) .index-box .featured-image {position: absolute;top: 0;  -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;width:100%;float:none;position:relative;margin:1em auto;max-width:900px;}
                        .no-sidebar .post:nth-child(even) .index-box .article-content-container {width:100%;float:none;margin:0 auto;max-width:900px;}					
			}
                        ';
                break;
            case 'front-page-type6':
                $sagablog_frontpage_type_css = ' 
                        .no-sidebar .post:nth-child(odd) .index-box, .post:nth-child(odd) .index-box{ max-width:  245px;}
                        .no-sidebar .post:nth-child(even) .index-box, .post:nth-child(even) .index-box{ max-width:  245px;}						

			.post:nth-child(odd) .index-box .featured-image {position: absolute;top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);left:0;}
                        .post:nth-child(even) .index-box .featured-image {position: absolute;top: 0; -webkit-transform: translateY(0);-ms-transform: translateY(0);-moz-transform: translateY(0);-o-transform: translateY(0);transform: translateY(0);right:0;}
			.post:nth-child(odd) .index-box .featured-image {width:100%;float:left;position: relative;}
                        .post:nth-child(even) .index-box .featured-image {width:100%;float:left;position: relative;}	

                        .post:nth-child(odd) .index-box .article-content-container {width:100%;float:right;font-size:85%}
			.post:nth-child(even) .index-box .article-content-container {width:100%;float:right;font-size:85%}
						
                        .post:nth-child(odd) .index-box .posted-on a {display:none;}
                        .post:nth-child(odd) .index-box .article-content-container .add-share-icon {float:none;text-align: center;}
                        .post:nth-child(odd) .index-box .article-content-container .inlinedata {float:none;text-align: center;}
                        .post:nth-child(odd) .entry-footer .comments-link {display:none;}
						
			.post:nth-child(even) .index-box .posted-on a {display:none;}
                        .post:nth-child(even) .index-box .article-content-container .add-share-icon {float:none;text-align: center;}
                        .post:nth-child(even) .index-box .article-content-container .inlinedata {float:none;text-align: center;}
                        .post:nth-child(even) .entry-footer .comments-link {display:none;}				
						
                        .admin-bar .entry-footer .edit-link {width:100%;  text-align: center;}
                        .admin-bar .entry-footer .byline {width:100%;text-align: center;}
                        .entry-footer span:after{display:none;}

                        @media screen and (max-width: 599px) {
                        .post:nth-child(odd) .index-box, .no-sidebar .post:nth-child(odd) .index-box {width:100%;position:relative;max-width:100%;}
                        .post:nth-child(odd) .index-box .featured-image, .no-sidebar .post:nth-child(odd) .index-box .featured-image {width:100%;position:relative;}
                        .post:nth-child(odd) .index-box .article-content-container, .no-sidebar .post:nth-child(odd) .index-box .article-content-container {width:100%;}
						
			.post:nth-child(even) .index-box, .no-sidebar .post:nth-child(even) .index-box {width:100%;position:relative;max-width:100%;}
                        .post:nth-child(even) .index-box .featured-image, .no-sidebar .post:nth-child(even) .index-box .featured-image {width:100%;position:relative;}
                        .post:nth-child(even) .index-box .article-content-container, .no-sidebar .post:nth-child(even) .index-box .article-content-container {width:100%;}
                        }
                        
                        ';
                break;
        }
    endif;
    $sagablog_frontpage_type_full_css = $sagablog_frontpage_type_css . $sagablog_sticky_css;
    wp_add_inline_style('sagablog-style', $sagablog_frontpage_type_full_css);
}

add_action('wp_enqueue_scripts', 'sagablog_frontpage_type');

//Background color for main menu
function sagablog_menu_bgcolor() {
    $menu_bgcolor = esc_html(get_theme_mod('sagablog_bgcolor_menu'));
    $menu_bgcolor_css = "";
    if (!empty($menu_bgcolor)) {
        $menu_bgcolor_css = ' 
                    #site-navigation {background:' . $menu_bgcolor . '} 
                    .main-navigation ul {background:' . $menu_bgcolor . '} 
                    .dropdown-toggle {background:' . $menu_bgcolor . '} 
                    .header-container {background:' . $menu_bgcolor . '} 
                    .menu-toggle, .menu-toggle:hover,.menu-toggle:focus {background:' . $menu_bgcolor . '} ';
    }
    wp_add_inline_style('sagablog-style', $menu_bgcolor_css);
}

add_action('wp_enqueue_scripts', 'sagablog_menu_bgcolor');

//Reset all settings
function sagablog_set_default_options() {
    if (esc_html(get_theme_mod('sagablog_reset_settings')) === '1') {
        $default_options = sagablog_default_theme_options();

        foreach ($default_options as $key => $value) {
            set_theme_mod($key, $value);
        }
        set_theme_mod('sagablog_reset_settings', '');
    }
}

add_action('wp_head', 'sagablog_set_default_options');

//recommended
function sagablog_recommended_header_page() {
    $recommended = esc_html(get_theme_mod('sagablog_recommended'));
    $recommended_css = "";

    if (esc_html(get_theme_mod('sagablog_recommended')) === 'recom-header') {
        $recommended_css = '
                        .card__front .back-text_custom,
                        .card__back .back-text_custom{
                                min-width:210px;
                        }
                        .card__front .image-custom {
                            opacity: 1;
                            width: 100%;
                            min-width:210px;
                        }
                        @media screen and (max-width: 1294px) {
                        .header-recommended  .card {max-width: 440px;}
                        .card__front .back-text_custom,
                        .card__back .back-text_custom{
                                min-width:220px;
                        }
                        .card__front .image-custom {
                            opacity: 1;
                            width: 100%;
                            min-width:220px;
                        }
                        }
                        ';
    }
    wp_add_inline_style('sagablog-style', $recommended_css);
}

add_action('wp_enqueue_scripts', 'sagablog_recommended_header_page');

//Header text color
function sagablog_header_text_color() {
    $header_text_color = esc_html(get_theme_mod('sagablog_header_text_color'));
    $header_text_color_css = "";
    if (!empty($header_text_color)) {
        $header_text_color_css = ' 
                .site-title a,
		.site-description {color:' . $header_text_color . ';} 
                        ';
    }
    wp_add_inline_style('sagablog-style', $header_text_color_css);
}

add_action('wp_enqueue_scripts', 'sagablog_header_text_color');
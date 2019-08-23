<?php
/**
 * sagablog Theme Customizer
 *
 * @package sagablog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sagablog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
        
//**************************************************************************************
// Add section 'Reset settings'
//**************************************************************************************
        
    $wp_customize->add_section( 'sagablog_reset_settings_section' , array(  
	    'title'       => __( 'Reset settings', 'sagablog-light' ),
	    'priority'    => 120, 
	    'description' => __( 'Reset all settings.', 'sagablog-light'),
	));  
            
            // Reset all settings
            $wp_customize->add_setting('sagablog_reset_settings', array(
                 'default'    =>  '',
                 'sanitize_callback'  => 'sagablog_sanitize_checkbox',
            ));

            $wp_customize->add_control('sagablog_reset_settings', array(
                    'type' => 'checkbox',
                    'label' => __( 'Check to reset all settings to the default values. Attention! All settings will be reset to the default values!', 'sagablog-light' ),
                    'section' => 'sagablog_reset_settings_section',
                    'priority'	=> 3,
                )
            );   
   
   
//*****************************************************************************       
//Custom Controls
require get_template_directory() . '/inc/customizer/sagablog-customizer-custom-controls.php';  
//Add panel "About sagablog"
require get_template_directory() . '/inc/customizer/sagablog-customizer-about-theme.php'; 
//Add panel 'Theme Options'
require get_template_directory() . '/inc/customizer/sagablog-customizer-theme-options.php';         
//Add Panel Main slider
require get_template_directory() . '/inc/customizer/sagablog-customizer-main-slider.php';
//Add Panel Recommended articles
require get_template_directory() . '/inc/customizer/sagablog-customizer-recommended-articles.php'; 
//Add Panel Header options
require get_template_directory() . '/inc/customizer/sagablog-customizer-header-options.php'; 
//Add Panel Colors
require get_template_directory() . '/inc/customizer/sagablog-customizer-colors.php';
        
}
add_action( 'customize_register', 'sagablog_customize_register' );       
        
/***********************************************************************************
 * Sanitize
***********************************************************************************/
/**
 * Sanitize uri
 */
function sagablog_sanitize_uri($uri){
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}
/*
 * Sanitize integer
 */
function sagablog_sanitize_integer($input) {
    if(is_numeric($input)) {
        return intval($input);
    }
}
/**
 * Sanitizes checkboxes
 */
function sagablog_sanitize_checkbox( $value ) {
    if ( $value == 1 ) {
        return 1;
    } 
    else {
        return '';
    }
}

/*
 * Sanitize text
 */
function sagablog_sanitize_text( $value ) {
	return  sanitize_text_field( $value ) ;
}

/**
 * Sanitize Social share links
 */
function sagablog_sanitize_slider_placement( $value ) {
    if ( ! in_array( $value, array( 'before-menu', 'after-menu' ) ) ) {
        $value = 'after-menu';
 }
    return $value;
}

/**
 * Sanitize layout options
 */
function sagablog_sanitize_layout( $value ) {
	if ( !in_array( $value, array( 'sidebar-left', 'sidebar-right', 'no-sidebar' ) ) ) {
		$value = 'sidebar-right';
	}
	return $value;
}
/**
 * Sanitize front page type
 */
function sagablog_sanitize_front_page_type( $value ) {
	if ( !in_array( $value, array( 'front-page-type1', 'front-page-type2', 'front-page-type3', 'front-page-type6' ) ) ) {
		$value = 'front-page-type1';
	}
	return $value;
}
/**
 * Sanitize header slider options
 */
function sagablog_sanitize_slider_header( $value ) {
	if ( !in_array( $value, array( 'showheader-1', 'showheader-2', 'showheader-3' ) ) ) {
		$value = 'showheader-2';
	}
	return $value;
}
/**
 * Sanitize front/home page slider options
 */
function sagablog_sanitize_slider_page( $value ) {
	if ( !in_array( $value, array( 'showpage-1', 'showpage-2', 'showpage-3' ) ) ) {
		$value = 'showpage-2';
	}
	return $value;
}

/**
 * Sanitize slider type in header
 */
function sagablog_sanitize_slider_type_header( $value ) {
	if ( !in_array( $value, array( 'type-header-1', 'type-header-2' ) ) ) {
		$value = 'type-header-1';
	}
	return $value;
}
/**
 * Sanitize slider type in frontpage/homepage
 */
function sagablog_sanitize_slider_type_index( $value ) {
	if ( !in_array( $value, array( 'type-index-1', 'type-index-2' ) ) ) {
		$value = 'type-index-1';
	}
	return $value;
}

/**
 * Sanitize recommended articles
 */
function sagablog_sanitize_recommended( $value ) {
	if ( !in_array( $value, array( 'not-show', 'recom-header' ) ) ) {
		$value = 'recom-header';
	}
	return $value;
}
/**
 * Sanitize social links placement
 */
function sagablog_sanitize_links_top( $value ) {
	if ( !in_array( $value, array( 'social-search-top', 'social-top', 'search-top', 'not-show-top' ) ) ) {
		$value = 'social-search-top';
	}
	return $value;
}
/**
 * Sanitize site title and logo placement - frontpage
 */
function sagablog_sanitize_title_placement_frontpage( $value ) {
	if ( !in_array( $value, array( 'center-frontpage', 'left-frontpage' ) ) ) {
		$value = 'center-frontpage';
	}
	return $value;
}
/**
 * Sanitize site title and logo placement
 */
function sagablog_sanitize_title_placement( $value ) {
	if ( !in_array( $value, array( 'center', 'left' ) ) ) {
		$value = 'center';
	}
	return $value;
}

/**
 * Sanitize site main menu placement
 */
function sagablog_sanitize_menu_placement( $value ) {
	if ( !in_array( $value, array( 'center', 'left' ) ) ) {
		$value = 'left';
	}
	return $value;
}
/**
 * Sanitize social links and search box near menu
 */
function sagablog_sanitize_links_menu( $value ) {
	if ( !in_array( $value, array( 'search-menu', 'not-show-menu' ) ) ) {
		$value = 'not-show-menu';
	}
	return $value;
}

/*
 * Sanitize number
 */
function sagablog_sanitize_number( $value ) {
    $value = (int) $value; 
    return ( 0 < $value ) ? $value : null;
}

/**
 * Sanitize sticky post options
 */

function sagablog_sanitize_sticky_post( $value ) {
	if ( !in_array( $value, array( 'ribbon-check', 'ribbon-pin', 'square-check', 'square-pin', 'none' ) ) ) {
		$value = 'ribbon-check';
	}
	return $value;
}
/***********************************************************************************/



/***********************************************************************************
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 ***********************************************************************************/
function sagablog_customize_preview_js() {
	wp_enqueue_script( 'sagablog_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sagablog_customize_preview_js' );

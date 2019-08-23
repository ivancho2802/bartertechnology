<?php

/* 
 * sagablog Theme Customizer - Panel "Header Options"
 *
 * @package sagablog
 */

//******************************************************************************       
// Header options
//******************************************************************************

	$wp_customize->add_section( 'sagablog-header_options-section', array(
		'title' => __( 'Header options', 'sagablog-light' ),
		 'priority'    => 30, 
		'description' => __( 'Header options.', 'sagablog-light' ),
	));        
        
/******************************************************************************/
	// Social links and search box near menu - settings
	$wp_customize->add_setting('sagablog_social_links_menu',
		array(
			'default' => 'search-menu',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_links_menu', 
		)
	);

	// Social links and search box near menu - control
	$wp_customize->add_control('sagablog_social_links_menu',
		array(
                        'section' => 'sagablog-header_options-section',
			'type' => 'radio',
			'label' => __( 'Search box near main menu:', 'sagablog-light' ),
			'choices' => array(
                                'search-menu' => __( 'Show search near menu', 'sagablog-light' ),
				'not-show-menu' => __( 'Do not show search near main menu', 'sagablog-light' )
			),	
		)
	);        
  
/******************************************************************************/
	// Site title and logo position (frontpage-homepage) - settings
	$wp_customize->add_setting('sagablog_site_title_placement_frontpage',
		array(
			'default' => 'center-frontpage',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_title_placement_frontpage', 
		)
	);

	// Site title and logo position (frontpage-homepage)- controls
	$wp_customize->add_control('sagablog_site_title_placement_frontpage',
		array(
                        'section' => 'sagablog-header_options-section',
			'type' => 'radio',
			'label' => __( 'Site title and logo position (frontpage/homepage):', 'sagablog-light' ),
			'choices' => array(
				'center-frontpage' => __( 'Center', 'sagablog-light' ),
				'left-frontpage' => __( 'Left', 'sagablog-light' )
			),	
		)
	);        
        
/******************************************************************************/
	// Site title and logo position (other pages) - settings
	$wp_customize->add_setting('sagablog_site_title_placement',
		array(
			'default' => 'center',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_title_placement', 
		)
	);

	// Site title and logo position (other pages)- controls
	$wp_customize->add_control('sagablog_site_title_placement',
		array(
                        'section' => 'sagablog-header_options-section',
			'type' => 'radio',
			'label' => __( 'Site title and logo position (other pages):', 'sagablog-light' ),
			'choices' => array(
				'center' => __( 'Center', 'sagablog-light' ),
				'left' => __( 'Left', 'sagablog-light' )
			),	
		)
	);        
        
        
/******************************************************************************/
	// Menu align - settings
	$wp_customize->add_setting('sagablog_menu_placement',
		array(
			'default' => 'left',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_menu_placement', 

		)
	);

	// Menu align- controls
	$wp_customize->add_control('sagablog_menu_placement',
		array(
                        'section' => 'sagablog-header_options-section',
			'type' => 'radio',
			'label' => __( 'Menu alignment:', 'sagablog-light' ),
			'choices' => array(
				'center' => __( 'Center', 'sagablog-light' ),
                                'left' => __( 'Left', 'sagablog-light' )
			),	
		)
	);     
        
    //Menu placement           
    $wp_customize->add_setting( 'sagablog_slider_placement', array(
            'default' => 'after-menu',
            'sanitize_callback' => 'sagablog_sanitize_slider_placement'
        )
    );
    $wp_customize->add_control( 'sagablog_slider_placement', array(
            'type' => 'radio',
            'label' => __( 'Menu placement (if the main slider is in the header of page):', 'sagablog-light' ),
            'section' => 'sagablog-header_options-section',
            'choices' => array(
                'before-menu' => __( 'Place main menu after slider', 'sagablog-light' ),
                'after-menu' => __( 'Place main menu before slider', 'sagablog-light' )
            )
        )
    );    

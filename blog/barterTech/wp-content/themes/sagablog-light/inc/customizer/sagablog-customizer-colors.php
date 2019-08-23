<?php

/* 
* sagablog Theme Customizer - Panel "Colors"
 *
 * @package sagablog
 *
 */
   
//******************************************************************************          
//Panel Color       
//******************************************************************************          
// Move sections up 
$wp_customize->get_section('colors')->priority = 110; 

/*
 * Create header text color setting
 */
	$wp_customize->add_setting( 'sagablog_header_text_color', array(
		'default' => '#00396d',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	
	//Add header background color control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sagablog_header_text_color', array(
				'label' => __( 'Header text color', 'sagablog-light' ),
				'section' => 'colors',
			)
		)
	);        
//*****************************************************************************  
/*
 * Background color for main menu
 */
	$wp_customize->add_setting( 'sagablog_bgcolor_menu', array(
		'default' => '#fff',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	
	//Add header background color control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sagablog_bgcolor_menu', array(
				'label' => __( 'Background Color for Main Menu', 'sagablog-light' ),
				'section' => 'colors',
			)
		)
	);
        
/*
 * Create main menu text color setting
 */
	$wp_customize->add_setting( 'sagablog_mainmenu_text_color', array(
		'default' => '#00396d',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	
	//Add header background color control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sagablog_mainmenu_text_color', array(
				'label' => __( 'Main Menu text color', 'sagablog-light' ),
				'section' => 'colors',
			)
		)
	);        
//*****************************************************************************  
/*
 * Background color for footer
 */
	$wp_customize->add_setting( 'sagablog_bgcolor_footer', array(
		'default' => '#00396d',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	
	//Add header background color control
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'sagablog_bgcolor_footer', array(
				'label' => __( 'Background Color for Footer', 'sagablog-light' ),
				'section' => 'colors',
			)
		)
	);
        
// Main color
$wp_customize->add_setting( 'sagablog_main_color', array(
        'default'     => '#5089bf',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'sagablog_main_color', array(
            'label'      => __( 'Main Color', 'sagablog-light' ),
            'section'    => 'colors',
            'settings'   => 'sagablog_main_color'
        )
    )
);

// Complementary color
$wp_customize->add_setting( 'sagablog_complementary_color', array(
        'default'     => '#f90052',
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control($wp_customize, 'sagablog_complementary_color', array(
            'label'      => __( 'Complementary color', 'sagablog-light' ),
            'section'    => 'colors',
            'settings'   => 'sagablog_complementary_color'
        )
    )
);

<?php

/* 
 * sagablog Theme Customizer - Panel "About sagablog"
 *
 * @package sagablog
 */

//******************************************************************************       
// Panel "About sagablog"
//******************************************************************************  
//Add section 'About sagabloga'
$wp_customize->add_section( 'sagablog_about_section' , array(
    'title' => __( 'About "SagaBlog Light"', 'sagablog-light' ),
    'description' => __( 'Demo and on-line documents for "SagaBlog Light" theme here:', 'sagablog-light' ),
    'priority' => 10,
) );
//Add links to section
    	$wp_customize->add_setting( 'sagablog_important_links', array(
		'sanitize_callback'	=> 'sagablog_sanitize_uri',
	) );

	$wp_customize->add_control( new sagablog_Important_Links( $wp_customize, 'sagablog_important_links', array(
        'label'   	=> __( 'Important Links', 'sagablog-light' ),
        'section'  	=> 'sagablog_about_section',
        'settings' 	=> 'sagablog_important_links',
    ) ) );  
        
        
//******************************************************************************
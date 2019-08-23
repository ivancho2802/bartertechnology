<?php

/* 
 * sagablog Theme Customizer - Panel "Theme Options"
 *
 * @package sagablog
 */

//***************************************************************************** 
//Add panel 'Theme Options'
//*****************************************************************************
        $wp_customize->add_panel( 'sagablog_theme_options_panel', array(
          'title' => __( 'Theme options', 'sagablog-light' ),
          'description' => __( 'Theme options.', 'sagablog-light' ),
          'priority' => 41, 
        ) ); 
//*****************************************************************************
// Add section 'Layouts options'
//*****************************************************************************
	$wp_customize->add_section( 'sagablog-theme-options-section', array(
		'title' => __( 'Layouts options', 'sagablog-light' ),
		'panel' => 'sagablog_theme_options_panel',
		'description' => __( 'Change layout options.', 'sagablog-light' ),
	));        
	// Create sidebar layout setting
	$wp_customize->add_setting('sagablog_layout', array(
			'default' => 'sidebar-right',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_layout', 
			'transport' => 'postMessage'
		)
	);

	// Add sidebar layout controls
	$wp_customize->add_control('sagablog_layout',
		array(
                        'section' => 'sagablog-theme-options-section',
			'type' => 'radio',
			'label' => __( 'Sidebar position', 'sagablog-light' ),
			'choices' => array(
				'no-sidebar' => __( 'No sidebar', 'sagablog-light' ),
				'sidebar-left' => __( 'Left sidebar', 'sagablog-light' ),
				'sidebar-right' => __( 'Right sidebar', 'sagablog-light' )
			),	
		)
	);        
        
           
//*****************************************************************************
// Add section 'Sticky post options'
//*****************************************************************************/
	$wp_customize->add_section( 'sagablog-sticky-post-section', array(
		'title' => __( 'Sticky posts options', 'sagablog-light' ),
		'panel' => 'sagablog_theme_options_panel',
		'description' => __( 'Change sticky posts options.', 'sagablog-light' ),
	));        
	// Create sticky post setting
	$wp_customize->add_setting('sagablog-sticky-post', array(
			'default' => 'square-check',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_sticky_post', 
		)
	);

	// Add sticky post controls
	$wp_customize->add_control('sagablog-sticky-post',
		array(
                        'section' => 'sagablog-sticky-post-section',
			'type' => 'radio',
			'label' => __( 'Mark sticky posts', 'sagablog-light' ),
			'choices' => array(
				'ribbon-check' => __( 'Show ribbon (check)', 'sagablog-light' ),
                                'ribbon-pin' => __( 'Show ribbon (pin)', 'sagablog-light' ),
				'square-check' => __( 'Show square (check)', 'sagablog-light' ),
                                'square-pin' => __( 'Show square (pin)', 'sagablog-light' ),
                                'none' => __( 'Do not mark sticky posts', 'sagablog-light' )
			),	
		)
	);        
        
//*****************************************************************************
// Add section 'Author box'
//*****************************************************************************
$wp_customize->add_section( 'sagablog-author-box-section' , array(
    'title' => __( 'Author box', 'sagablog-light' ),
    'panel' => 'sagablog_theme_options_panel',
    'priority' => 30,
    'description' => __( 'Show Author box on posts.', 'sagablog-light' )
) );


    // Show author box
    $wp_customize->add_setting('sagablog_show_author_box', array(
                 'default'    =>  '',
                 'sanitize_callback'  => 'sagablog_sanitize_checkbox',
            ));

    $wp_customize->add_control('sagablog_show_author_box', array(
            'type' => 'checkbox',
            'label' => __( 'Show author box on posts', 'sagablog-light' ),
            'section' => 'sagablog-author-box-section',
        )
    );
    
//*****************************************************************************
// Add background images
//*****************************************************************************
$wp_customize->add_section( 'sagablog-bg-image-section' , array(
    'title' => __( 'Add background images', 'sagablog-light' ),
    'panel' => 'sagablog_theme_options_panel',
    'priority' => 30,
    'description' => __( 'Add background images for archive, search result...', 'sagablog-light' )
) );


//Add image for archive    
            $wp_customize->add_setting( 'sagablog_img_category', array(
                    'default-image' => '',
                    'sanitize_callback' => 'sagablog_sanitize_uri',
            ));

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sagablog_img_category', array( 
                    'label'    => __( 'Choose background image for archive page (Category, author, date, tag ...). The recommended image size is 1300x210px.:', 'sagablog-light' ),
                    'type'     => 'image',
                    'section'  => 'sagablog-bg-image-section', 
                    'settings' => 'sagablog_img_category',
            )));   
            
//Add image for page 404    
            $wp_customize->add_setting( 'sagablog_img_404', array(
                    'default-image' => '',
                    'sanitize_callback' => 'sagablog_sanitize_uri',
            ));

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sagablog_img_404', array( 
                    'label'    => __( 'Choose background image for 404 page (the recommended image size is 1300x210px):', 'sagablog-light' ),
                    'type'     => 'image',
                    'section'  => 'sagablog-bg-image-section', 
                    'settings' => 'sagablog_img_404',
            ))); 
            
//Add image for search page   
            $wp_customize->add_setting( 'sagablog_img_search', array(
                    'default-image' => '',
                    'sanitize_callback' => 'sagablog_sanitize_uri',
            ));

            $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sagablog_img_search', array( 
                    'label'    => __( 'Choose background image for search page (the recommended image size is 1300x210px):', 'sagablog-light' ),
                    'type'     => 'image',
                    'section'  => 'sagablog-bg-image-section', 
                    'settings' => 'sagablog_img_search',
            ))); 
            
//*****************************************************************************
// Add section 'Front page type'
//*****************************************************************************
	$wp_customize->add_section( 'sagablog-front-page-type-section', array(
		'title' => __( 'Front page type', 'sagablog-light' ),
		'panel' => 'sagablog_theme_options_panel',
		'description' => __( 'Change front page type.', 'sagablog-light' ),
	));        
	// Create front page type setting
	$wp_customize->add_setting('sagablog_front_page_type',
		array(
			'default' => 'front-page-type1',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_front_page_type'
		)
	);
	// Add front page type controls
	$wp_customize->add_control('sagablog_front_page_type',
		array(
                        'section' => 'sagablog-front-page-type-section',
			'type' => 'radio',
			'label' => __( 'Front page type', 'sagablog-light' ),
			'choices' => array(
				'front-page-type1' => __( 'List (Articles are large)', 'sagablog-light' ),
				'front-page-type2' => __( 'List (Articles have an average size (Pictures are on the left))', 'sagablog-light' ),
                                'front-page-type3' => __( 'List (Articles have an average size (The position of the pictures alternates))', 'sagablog-light' ),
                                'front-page-type6' => __( 'Masonry (Articles are small)', 'sagablog-light' )
			),	
		)
	);        
    
//******************************************************************************       
// Add copyright text in footer
//******************************************************************************

	$wp_customize->add_section('sagablog_copyright_text_section', array(
			'title'     => __( 'Copyright text', 'sagablog-light' ),
			'priority'  => 200,
                        'panel' => 'sagablog_theme_options_panel',
			'description' => __( 'Add Copyright text to footer.', 'sagablog-light'),
		)
	);
        //Copyright
	$wp_customize->add_setting('sagablog_years', array(
			'default'            => '',
			'sanitize_callback'  => 'sagablog_sanitize_text'
		)
	);
	$wp_customize->add_control('sagablog_years', array(
			'section'  => 'sagablog_copyright_text_section',
                        'label' => __( 'Years:', 'sagablog-light' ),
			'type'     => 'text'
		)
	);

        //Show copyright
        $wp_customize->add_setting('sagablog_show_copyright', array(
                        'default'    =>  1,
			'sanitize_callback'  => 'sagablog_sanitize_checkbox'
		));
        $wp_customize->add_control('sagablog_show_copyright', array(
                'type' => 'checkbox',
                'label' =>  __( 'Show copyright.', 'sagablog-light' ),
                'section' => 'sagablog_copyright_text_section',
            )
        );
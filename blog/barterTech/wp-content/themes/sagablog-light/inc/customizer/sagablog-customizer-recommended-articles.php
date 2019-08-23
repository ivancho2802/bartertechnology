<?php

/* 
 * sagablog Theme Customizer - Panel "Recommended articles"
 *
 * @package sagablog
 *
 */
//******************************************************************************       
// Add Panel Recommended articles
//******************************************************************************
//Add panel 'Recommended articles'
$wp_customize->add_panel( 'recommended_articles_panel', array(
  'title' => __( 'Recommended articles', 'sagablog-light' ),
  'description' => __( 'Recommended articles.', 'sagablog-light' ),
  'priority' => 40, 
) );
//-----------------------------------------------------------------
//Add section Recommended posts
$wp_customize->add_section( 'recommended_posts_section' , array(
    'title' => __( 'Add recommended posts', 'sagablog-light' ),
    'panel' => 'recommended_articles_panel',
    'description' => __( 'Choose posts that you recommend to your site visitors.', 'sagablog-light' )
) );

/*********************/            
/* Article 1           */ 
/*********************/  

//Choose post for article 1         
    $wp_customize-> add_setting( 'sagablog_choose_recommended_post_1', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_recommended_post_1', array(
	    		'label'		=> __('Choose post for article 1:','sagablog-light'),
	    		'section' => 'recommended_posts_section',
	    		'settings'	=> 'sagablog_choose_recommended_post_1',
                        'priority' => 4
	    	)
    	)
    );              
                              
/*********************/            
/* Article 2         */ 
/*********************/  
//Choose post for article 2         
    $wp_customize-> add_setting( 'sagablog_choose_recommended_post_2', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_recommended_post_2', array(
	    		'label'		=> __('Choose post for article 2:','sagablog-light'),
	    		'section' => 'recommended_posts_section',
	    		'settings'	=> 'sagablog_choose_recommended_post_2',
                        'priority' => 8
	    	)
    	)
    );                
                              
/*********************/            
/* Article 3         */ 
/*********************/  
//Choose post for article 3         
    $wp_customize-> add_setting( 'sagablog_choose_recommended_post_3', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_recommended_post_3', array(
	    		'label'		=> __('Choose post for article 3:','sagablog-light'),
	    		'section' => 'recommended_posts_section',
	    		'settings'	=> 'sagablog_choose_recommended_post_3',
                        'priority' => 13
	    	)
    	)
    ); 
                              
/*********************/            
/* Article 4         */ 
/*********************/  
//Choose post for article 4         
    $wp_customize-> add_setting( 'sagablog_choose_recommended_post_4', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_recommended_post_4', array(
	    		'label'		=> __('Choose post for article 4:','sagablog-light'),
	    		'section' => 'recommended_posts_section',
	    		'settings'	=> 'sagablog_choose_recommended_post_4',
                        'priority' => 19
	    	)
    	)
    ); 
 
/*********************/            
/* Article 5         */ 
/*********************/  
//Choose post for article 5         
    $wp_customize-> add_setting( 'sagablog_choose_recommended_post_5', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_recommended_post_5', array(
	    		'label'		=> __('Choose post for article 5:','sagablog-light'),
	    		'section' => 'recommended_posts_section',
	    		'settings'	=> 'sagablog_choose_recommended_post_5',
                        'priority' => 19
	    	)
    	)
    ); 
 /*********************/            
/* Article 6         */ 
/*********************/  
//Choose post for article 6         
    $wp_customize-> add_setting( 'sagablog_choose_recommended_post_6', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_recommended_post_6', array(
	    		'label'		=> __('Choose post for article 6:','sagablog-light'),
	    		'section' => 'recommended_posts_section',
	    		'settings'	=> 'sagablog_choose_recommended_post_6',
                        'priority' => 19
	    	)
    	)
    );              
                
/***************************************************************************/
//Add section Settings
/***************************************************************************/
$wp_customize->add_section( 'recommended_settings_section' , array(
    'title' => __( 'Settings', 'sagablog-light' ),
    'panel' => 'recommended_articles_panel',
    'description' => __( 'Settings for recommended articles.', 'sagablog-light' )
) );


	//Choose position for recommended articles block
	$wp_customize->add_setting('sagablog_recommended', array(
			'default' => 'not-show',
			'type' => 'theme_mod',
			'sanitize_callback' => 'sagablog_sanitize_recommended'
		)
	);

	$wp_customize->add_control('sagablog_recommended',
		array(
                        'section' => 'recommended_settings_section',
			'type' => 'radio',
			'label' => __( 'Choose position for recommended articles block:', 'sagablog-light' ),
			'choices' => array(
				'not-show' => __( 'Do not show block with recommended articles', 'sagablog-light' ),
				'recom-header' => __( 'Block with recommended articles have full width', 'sagablog-light' )
			),	
		)
	);             
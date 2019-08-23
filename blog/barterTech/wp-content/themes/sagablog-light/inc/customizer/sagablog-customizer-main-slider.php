<?php

/* 
 * sagablog Theme Customizer - Panel "Main slider"
 *
 * @package sagablog
 *
 */

//******************************************************************************       
// Add Panel Main slider
//******************************************************************************
//Add panel 'Main slider'
$wp_customize->add_panel( 'main_slider', array(
  'title' => __( 'Main slider', 'sagablog-light' ),
  'description' => __( 'Main slider.', 'sagablog-light' ),
  'priority' => 40, 
) );

//-----------------------------------------------------------------
//-----------------------------------------------------------------
//Add section "Show slider on header"
//-----------------------------------------------------------------
//-----------------------------------------------------------------

$wp_customize->add_section( 'main_slider_header' , array(
    'title' => __( 'Main slider on header', 'sagablog-light' ),
    'panel' => 'main_slider',
    'priority' => 28,
    'description' => __( 'Main slider on header.', 'sagablog-light' )
) );     
 
    //Slider's type           
    $wp_customize->add_setting( 'sagablog_slider_header_type', array(
            'default' => 'type-header-1',
            'sanitize_callback' => 'sagablog_sanitize_slider_type_header'
        )
    );
    $wp_customize->add_control( 'sagablog_slider_header_type', array(
            'type' => 'radio',
            'label' => __( 'Main slider type (in header):', 'sagablog-light' ),
            'section' => 'main_slider_header',
            'choices' => array(
                'type-header-1' => __( 'Carousel slider', 'sagablog-light' ),
                'type-header-2' => __( 'Fullwidth slider', 'sagablog-light' )
            )
        )
    );    
    
    //Slider in header show next:           
    $wp_customize->add_setting( 'sagablog_slider_header_show', array(
            'default' => 'showheader-2',
            'sanitize_callback' => 'sagablog_sanitize_slider_header'
        )
    );
    $wp_customize->add_control( 'sagablog_slider_header_show', array(
            'type' => 'radio',
            'label' => __( 'Main slider show on header:', 'sagablog-light' ),
            'section' => 'main_slider_header',
            'choices' => array(
                'showheader-1' => __( 'Show popular posts', 'sagablog-light' ),
                'showheader-2' => __( 'Show recent posts', 'sagablog-light' ),
                'showheader-3' => __( 'Show selected posts or pages', 'sagablog-light' )
            )
        )
    );    

//*******************************************************************************************     
    if (get_theme_mod('sagablog_slider_header_show')==='showheader-1'||get_theme_mod('sagablog_slider_header_show')==='showheader-2'){   
    //If selected "Show popular posts or related posts"
    $wp_customize->add_setting('sagablog-header-info-posts-number', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Info( $wp_customize, 'sagablog-header-info-posts-number', array(
        'label' => __('If selected "Show popular posts or related posts":', 'sagablog-light'),
        'section' => 'main_slider_header',
        'settings' => 'sagablog-header-info-posts-number',
        ) )
    );          


// Number of posts for slider
	$wp_customize->add_setting( 'sagablog_header_posts_number', array(
	    'sanitize_callback' => 'sagablog_sanitize_number',
            'default'	        => 5,
	));

	$wp_customize->add_control ( 'sagablog_header_posts_number', array( 
		'type'        => 'number',
                'label'    => __( 'How many posts will show main slider', 'sagablog-light' ),
		'description'    => __( 'Max value 20, min value 1', 'sagablog-light' ),
		'section'  => 'main_slider_header', 
		'settings' => 'sagablog_header_posts_number',  
                'input_attrs' => array(
                    'min'   => 1,
                    'max'   => 20,
                    'step'  => 1,
        ),
	));   
    
    }  
//*******************************************************************************************        
    //If selected 'Show selected posts or pages'
    $wp_customize->add_setting('sagablog-header-info', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Info( $wp_customize, 'sagablog-header-info', array(
        'label' => __('If selected "Show selected posts or pages":', 'sagablog-light'),
        'section' => 'main_slider_header',
        'settings' => 'sagablog-header-info',
        ) )
    );              
   /*******************************************************************************************/        
    $wp_customize->add_setting('sagablog-header-second-post-info', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Second_Info( $wp_customize, 'sagablog-header-second-post-info', array(
        'label' => __('Select posts:', 'sagablog-light'),
        'section' => 'main_slider_header',
        'settings' => 'sagablog-header-second-post-info',
        ) )
    );            
            
//*******************************************************************************************     
// POSTS
//*******************************************************************************************

/* Slide 1 */ 
//Choose post for slide 1         
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_header_post_1', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_header_post_1', array(
	    		'section' => 'main_slider_header',
	    		'settings'	=> 'sagablog_choose_main_slider_header_post_1'
	    	)
    	)
    );     

//Add Slide 2    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_header_post_2', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_header_post_2', array(
	    		//'label'		=> __('Slide 2','sagablog-light'),
	    		'section' => 'main_slider_header',
	    		'settings'	=> 'sagablog_choose_main_slider_header_post_2'
	    	)
    	)
    );
  
//Add Slide 3    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_header_post_3', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_header_post_3', array(
	    		'section' => 'main_slider_header',
	    		'settings'	=> 'sagablog_choose_main_slider_header_post_3'
	    	)
    	)
    );
     
//Add Slide 4    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_header_post_4', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_header_post_4', array(
	    		'section' => 'main_slider_header',
	    		'settings'	=> 'sagablog_choose_main_slider_header_post_4'
	    	)
    	)
    );  

//Add Slide 5    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_header_post_5', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_header_post_5', array(
	    		'section' => 'main_slider_header',
	    		'settings'	=> 'sagablog_choose_main_slider_header_post_5'
	    	)
    	)
    );
            
//***************************************************************************************            
//PAGES
//***************************************************************************************
//    'description' => __( "Main slider is showing pages. If chosen 'Static Front Page --- A static page'  - 'Posts page' will not be shown in slider.", 'sagablog-light' )        
/*******************************************************************************************/        
    $wp_customize->add_setting('sagablog-header-second-page-info', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Second_Info( $wp_customize, 'sagablog-header-second-page-info', array(
        'label' => __('Select pages:', 'sagablog-light'),
        'section' => 'main_slider_header',
        'settings' => 'sagablog-header-second-page-info',
        ) )
    );            
       
       /****************/                
       //Add slide 1
       /****************/  
		$wp_customize->add_setting( 'sagablog_choose_main_slider_header_pages_1', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_header_pages_1', array(
			'section'  	=> 'main_slider_header',
			'type'	   	=> 'dropdown-pages',
		) );
  
            //Add slide 2
		$wp_customize->add_setting( 'sagablog_choose_main_slider_header_pages_2', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_header_pages_2', array(
			'section'  	=> 'main_slider_header',
			'type'	   	=> 'dropdown-pages',
		) );  
                  
            //Add slide 3
		$wp_customize->add_setting( 'sagablog_choose_main_slider_header_pages_3', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_header_pages_3', array(
			'section'  	=> 'main_slider_header',
			'type'	   	=> 'dropdown-pages',
		) );  
                    
            //Add slide 4
		$wp_customize->add_setting( 'sagablog_choose_main_slider_header_pages_4', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_header_pages_4', array(
			'section'  	=> 'main_slider_header',
			'type'	   	=> 'dropdown-pages',
		) );
                  
            //Add slide 5
		$wp_customize->add_setting( 'sagablog_choose_main_slider_header_pages_5', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_header_pages_5', array(
			'section'  	=> 'main_slider_header',
			'type'	   	=> 'dropdown-pages',
		) );                                 
                
//-----------------------------------------------------------------
//-----------------------------------------------------------------
//Add section Main slider on home page
//-----------------------------------------------------------------
//-----------------------------------------------------------------
$wp_customize->add_section( 'main_slider_frontpage' , array(
    'title' => __( 'Main slider on home page', 'sagablog-light' ),
    'panel' => 'main_slider',
    'priority' => 26,
    'description' => __( "Main slider on home page.", 'sagablog-light' )
) );

    //Slider's type           
    $wp_customize->add_setting( 'sagablog_slider_index_type', array(
            'default' => 'type-index-2',
            'sanitize_callback' => 'sagablog_sanitize_slider_type_index'
        )
    );
    $wp_customize->add_control( 'sagablog_slider_index_type', array(
            'type' => 'radio',
            'label' => __( 'Main slider type (in homepage):', 'sagablog-light' ),
            'section' => 'main_slider_frontpage',
            'choices' => array(
                'type-index-1' => __( 'Carousel slider', 'sagablog-light' ),
                'type-index-2' => __( 'Fullwidth slider', 'sagablog-light' )
            )
        )
    ); 
    
    //Slider in home page show next:           
    $wp_customize->add_setting( 'sagablog_slider_page_show', array(
            'default' => 'showpage-2',
            'sanitize_callback' => 'sagablog_sanitize_slider_page'
        )
    );
    $wp_customize->add_control( 'sagablog_slider_page_show', array(
            'type' => 'radio',
            'label' => __( 'Main slider show on home page:', 'sagablog-light' ),
            'section' => 'main_slider_frontpage',
            'choices' => array(
                'showpage-1' => __( 'Show popular posts', 'sagablog-light' ),
                'showpage-2' => __( 'Show recent posts', 'sagablog-light' ),
                'showpage-3' => __( 'Show selected posts or pages', 'sagablog-light' )
            )
        )
    );    
    
//*******************************************************************************************        
    //If selected "Show popular posts or related posts"
    $wp_customize->add_setting('sagablog-frontpage-info-posts-number', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Info( $wp_customize, 'sagablog-frontpage-info-posts-number', array(
        'label' => __('If selected "Show popular posts or related posts":', 'sagablog-light'),
        'section' => 'main_slider_frontpage',
        'settings' => 'sagablog-frontpage-info-posts-number',
        ) )
    );          
    
// Number of posts for slider
	$wp_customize->add_setting( 'sagablog_frontpage_posts_number', array(
	    'sanitize_callback' => 'sagablog_sanitize_number',
            'default'	        => 5,
	));

	$wp_customize->add_control ( 'sagablog_frontpage_posts_number', array( 
		'type'        => 'number',
                'label'    => __( 'How many posts will show main slider', 'sagablog-light' ),
		'description'    => __( 'Max value 20, min value 1', 'sagablog-light' ),
		'section'  => 'main_slider_frontpage', 
		'settings' => 'sagablog_frontpage_posts_number',  
                'input_attrs' => array(
                    'min'   => 1,
                    'max'   => 20,
                    'step'  => 1,
        ),
	));   

    
    /*******************************************************************************************/        
    //If selected 'Show selected posts or pages'
    $wp_customize->add_setting('sagablog-frontpage-info', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Info( $wp_customize, 'sagablog-frontpage-info', array(
        'label' => __('If selected "Show selected posts or pages"', 'sagablog-light'),
        'section' => 'main_slider_frontpage',
        'settings' => 'sagablog-frontpage-info',
        ) )
    );        

    /*******************************************************************************************/        
    $wp_customize->add_setting('sagablog-frontpage-second-post-info', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Second_Info( $wp_customize, 'sagablog-frontpage-second-post-info', array(
        'label' => __('Select posts:', 'sagablog-light'),
        'section' => 'main_slider_frontpage',
        'settings' => 'sagablog-frontpage-second-post-info',
        ) )
    );                        
//*******************************************************************************************     
// POSTS
//*******************************************************************************************

/* Slide 1 */ 
//Choose post for slide 1         
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_frontpage_post_1', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_frontpage_post_1', array(
	    		'section' => 'main_slider_frontpage',
	    		'settings'	=> 'sagablog_choose_main_slider_frontpage_post_1'
	    	)
    	)
    );        

//Add Slide 2    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_frontpage_post_2', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_frontpage_post_2', array(
	    		'section' => 'main_slider_frontpage',
	    		'settings'	=> 'sagablog_choose_main_slider_frontpage_post_2'
	    	)
    	)
    );
 
//Add Slide 3    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_frontpage_post_3', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_frontpage_post_3', array(
	    		'section' => 'main_slider_frontpage',
	    		'settings'	=> 'sagablog_choose_main_slider_frontpage_post_3'
	    	)
    	)
    );
     
//Add Slide 4    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_frontpage_post_4', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_frontpage_post_4', array(
	    		'section' => 'main_slider_frontpage',
	    		'settings'	=> 'sagablog_choose_main_slider_frontpage_post_4'
	    	)
    	)
    );

//Add Slide 5    
    $wp_customize-> add_setting( 'sagablog_choose_main_slider_frontpage_post_5', array(
    		'default'	=> '',
    		'sanitize_callback'	=> 'sagablog_sanitize_integer',
    		'transport'	=> 'refresh'
    	)
    );
    
    $wp_customize-> add_control(
    	new sagablog_Main_Slider_Post_Control( $wp_customize, 'sagablog_choose_main_slider_frontpage_post_5', array(
	    		'section' => 'main_slider_frontpage',
	    		'settings'	=> 'sagablog_choose_main_slider_frontpage_post_5'
	    	)
    	)
    );
            
    /*******************************************************************************************/        
    $wp_customize->add_setting('sagablog-frontpage-second-page-info', array(
            'type'              => 'info_control',
            'sanitize_callback' => 'esc_attr',            
        )
    );
    $wp_customize->add_control( new Sagablog_Second_Info( $wp_customize, 'sagablog-frontpage-second-page-info', array(
        'label' => __('Select pages:', 'sagablog-light'),
        'section' => 'main_slider_frontpage',
        'settings' => 'sagablog-frontpage-second-page-info',
        ) )
    );            
    
//*******************************************************************************************     
// PAGES
//*******************************************************************************************    
       /****************/                
       //Add slide 1
       /****************/  
		$wp_customize->add_setting( 'sagablog_choose_main_slider_frontpage_pages_1', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_frontpage_pages_1', array(
			'section'  	=> 'main_slider_frontpage',
			'type'	   	=> 'dropdown-pages',
		) );
 
            //Add slide 2
		$wp_customize->add_setting( 'sagablog_choose_main_slider_frontpage_pages_2', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_frontpage_pages_2', array(
			'section'  	=> 'main_slider_frontpage',
			'type'	   	=> 'dropdown-pages',
		) );  
                   
            //Add slide 3
		$wp_customize->add_setting( 'sagablog_choose_main_slider_frontpage_pages_3', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_frontpage_pages_3', array(
			'section'  	=> 'main_slider_frontpage',
			'type'	   	=> 'dropdown-pages',
		) );  
                   
            //Add slide 4
		$wp_customize->add_setting( 'sagablog_choose_main_slider_frontpage_pages_4', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_frontpage_pages_4', array(
			'section'  	=> 'main_slider_frontpage',
			'type'	   	=> 'dropdown-pages',
		) );
                 
            //Add slide 5
		$wp_customize->add_setting( 'sagablog_choose_main_slider_frontpage_pages_5', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'sagablog_sanitize_integer',
		) );

		$wp_customize->add_control( 'sagablog_choose_main_slider_frontpage_pages_5', array(
			'section'  	=> 'main_slider_frontpage',
			'type'	   	=> 'dropdown-pages',
		) );                      
              
//******************************************************************************       
// Main slider settings
//******************************************************************************
    //Add section 'Slider settings'
        $wp_customize->add_section( 'sagablog_slider_settings_section' , array(  
	    'title'       => __( 'Main slider settings', 'sagablog-light' ),
	    'priority'    => 100,  
	    'description' => __( 'Main slider settings:', 'sagablog-light'),
            'panel' => 'main_slider',
	));  
            // Show/hide main slider that showing posts on header
            $wp_customize->add_setting('sagablog_activate_main_slider_on_header', array(
                 'default'    =>  '',
                 'sanitize_callback'  => 'sagablog_sanitize_checkbox',
            ));

            $wp_customize->add_control('sagablog_activate_main_slider_on_header', array(
                    'type' => 'checkbox',
                    'label' => __( 'Check to enable main slider on header.', 'sagablog-light' ),
                    'section' => 'sagablog_slider_settings_section',
                    'priority'	=> 3,
                )
            );   
            // Show/hide main slider that showing posts on home page and front page
            $wp_customize->add_setting('sagablog_activate_main_slider_on_index', array(
                 'default'    =>  '',
                 'sanitize_callback'  => 'sagablog_sanitize_checkbox',
            ));

            $wp_customize->add_control('sagablog_activate_main_slider_on_index', array(
                    'type' => 'checkbox',
                    'label' => __( 'Check to enable main slider on home page and front page.', 'sagablog-light' ),
                    'section' => 'sagablog_slider_settings_section',
                    'priority'	=> 3,
                )
            );          
            
            // Do not show the announcement of posts or pages(only for the main slider)
            $wp_customize->add_setting('sagablog_not_show_words', array(
                 'default'    =>  '',
                 'sanitize_callback'  => 'sagablog_sanitize_checkbox',
            ));
           
            $wp_customize->add_control('sagablog_not_show_words', array(
                    'type' => 'checkbox',
                    'label' => __( 'Do not show the announcement of post or page in main slider (for slider type - Fullwidth slider).', 'sagablog-light' ),
                    'section' => 'sagablog_slider_settings_section',
                )
            );
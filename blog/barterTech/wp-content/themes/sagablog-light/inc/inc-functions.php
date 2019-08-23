<?php

/**
 * Contains all the functions to sagablog.
 *
 * @package sagablog
 */

/****************************************************************************************/
if ( ! class_exists( 'WP_Customize_Control' ) )
{ return NULL; }

/* Main Slider */
class sagablog_Main_Slider_Post_Control extends WP_Customize_Control
{
    private $posts = false;
    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $postargs = wp_parse_args($options, array('post_type' => 'post', 'post_status' => 'publish','numberposts' => '-1', 'ignore_sticky_posts' => 1));
        $this->posts = get_posts($postargs);
        parent::__construct( $manager, $id, $args );
    }
    /**
    * Render the content on the theme customizer
    */
    public function render_content()
    {
        if(!empty($this->posts))
        {
            ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                    <?php
                        echo '<option value="0">';
                        echo esc_html__( '&#45; Select &#45;', 'sagablog-light' );
                        echo '</option>';
                        foreach ( $this->posts as $post )
                        {
                            printf('<option value="%s" %s>%s</option>', absint($post->ID), selected($this->value(), $post->ID, false), wp_kses_post($post->post_title));
                        }
                    ?>
                    </select>
                </label>
            <?php
        }
    }
}  
//*******************************************************************************************
    class Sagablog_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:30px;border:1px solid;padding:5px;color:#1e8cbe;;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }  
   
//*******************************************************************************************
    class Sagablog_Second_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
            <h3 style="margin-top:15px;padding:5px;color:#1e8cbe;;text-transform:uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }    
    
/***************************************************************************************/
/**
 * Default theme options.
 */
function sagablog_default_theme_options() {

	$default_theme_options = array(
            /*****************************************************/
            /*Customizer                                         */
            /*****************************************************/
            //Reset settings
            'sagablog_notsocial_settings'=> '',
            'sagablog_reset_settings'=> '',
            
            /*****************************************************/
            /*Customizer colors                                       */
            /*****************************************************/           
            //'header_color'=> '#fff',
            'sagablog_bgcolor_menu'=>'#fff',
            'sagablog_mainmenu_text_color'=>'#00396d',
            'header_textcolor'=> '#00396d',
            'sagablog_bgcolor_menu_footer'=> '#00396d',
            'sagablog_main_color'=> '#5089bf',
            'sagablog_complementary_color'=> '#f90052',
            
            /*****************************************************/
            /*Customizer fonts                                   */
            /*****************************************************/   
            'sagablog_google_font_setting_header'=> 'Roboto',
            'sagablog_google_font_setting_body'=> 'Muli',
            
            /*****************************************************/
            /*Customizer header                                   */
            /*****************************************************/               
            'sagablog_social_links_top'=> 'not-show-top',
            'sagablog_social_links_menu'=> 'search-menu',
            'sagablog_site_title_placement_frontpage'=> 'center-frontpage',
            'sagablog_site_title_placement' => 'center',
            'sagablog_menu_placement' => 'left',
            'sagablog_slider_placement'=> 'after-menu',
            
            /*****************************************************/
            /*Customizer slider                                   */
            /*****************************************************/                
            'sagablog_slider_header_type'=> 'type-header-1',
            'sagablog_slider_header_show'=> 'showheader-2',
            'sagablog_header_posts_number'=>5,
            
            'sagablog_choose_main_slider_header_post_1'=> '',
            'sagablog_choose_main_slider_header_post_2'=> '',
            'sagablog_choose_main_slider_header_post_3'=> '',
            'sagablog_choose_main_slider_header_post_4'=> '',
            'sagablog_choose_main_slider_header_post_5'=> '',
            
            'sagablog_choose_main_slider_header_pages_1'=> '',
            'sagablog_choose_main_slider_header_pages_2'=> '',            
            'sagablog_choose_main_slider_header_pages_3'=> '',           
            'sagablog_choose_main_slider_header_pages_4'=> '',           
            'sagablog_choose_main_slider_header_pages_5'=> '',
            
            'sagablog_slider_index_type'=> 'type-index-2',
            'sagablog_slider_page_show'=> 'showpage-2',
            'sagablog_frontpage_posts_number' => 5,
            
            'sagablog_choose_main_slider_frontpage_post_1'=> '',
            'sagablog_choose_main_slider_frontpage_post_2'=> '',
            'sagablog_choose_main_slider_frontpage_post_3'=> '',
            'sagablog_choose_main_slider_frontpage_post_4'=> '',
            'sagablog_choose_main_slider_frontpage_post_5'=> '',
            
            'sagablog_choose_main_slider_frontpage_pages_1'=> '',
            'sagablog_choose_main_slider_frontpage_pages_2'=> '',
            'sagablog_choose_main_slider_frontpage_pages_3'=> '',
            'sagablog_choose_main_slider_frontpage_pages_4'=> '',
            'sagablog_choose_main_slider_frontpage_pages_5'=> '',
            
            'sagablog_activate_main_slider_on_header' =>  '',
            'sagablog_activate_main_slider_on_index'=>  '',
            'sagablog_number_of_words_slider'=> 25,
            'sagablog_not_show_words'=>  '',
            
            /*****************************************************/
            /*Customizer recommended                             */
            /*****************************************************/             
            'sagablog_choose_recommended_post_1'=> '',
            'sagablog_choose_recommended_post_2'=> '',
            'sagablog_choose_recommended_post_3'=> '',
            'sagablog_choose_recommended_post_4'=> '',
            'sagablog_choose_recommended_post_5'=> '',
            'sagablog_choose_recommended_post_6'=> '',
            
            'sagablog_choose_recommended_pages_1'=> '',
            'sagablog_choose_recommended_pages_2'=> '',
            'sagablog_choose_recommended_pages_3'=> '',
            'sagablog_choose_recommended_pages_4'=> '',
            'sagablog_choose_recommended_pages_5'=> '',
            'sagablog_choose_recommended_pages_6'=> '',
            
            'sagablog_recommended'=> 'not-show',
            'sagablog_number_of_words'=> 25,
            
            /*****************************************************/
            /*Customizer theme options                           */
            /*****************************************************/ 
            'sagablog_layout'=> 'sidebar-right',
            'sagablog-sticky-post'=> 'square-check',
   
            'sagablog_show_author_box'=>  '',
            'sagablog_img_category'=> '',
            'sagablog_img_404'=> '',
            'sagablog_img_search'=> '',
                            
            'sagablog_front_page_type'=> 'front-page-type1',
            'sagablog_number_of_words_frontpage'=> 25,
            'sagablog_years' => '',
            'sagablog_show_copyright'=>  1,
            
	);

	return apply_filters( 'sagablog_default_theme_options', $default_theme_options );
}

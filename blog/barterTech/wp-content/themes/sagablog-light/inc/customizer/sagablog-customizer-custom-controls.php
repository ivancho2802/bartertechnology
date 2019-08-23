<?php

/* 
* sagablog Theme Customizer. Custom controls.
 *
 * @package sagablog
 */

//Add Theme demo, on-line documents, support forum
class sagablog_Important_Links extends WP_Customize_Control {
        public $type = 'important-links'; 
        
        public function render_content() {

            $important_links = array(
			'demo' => array( 
                            'link'	=> esc_url( 'http://sagablog-light.wdvillage.com/' ),
                            'text' 	=> __( '"SagaBlog Light" demo', 'sagablog-light' ),
                            ),
			'documents' => array( 
                            'link'	=> esc_url( 'http://doc.wdvillage.com/docs/sagablog/' ),
                            'text' 	=> __( '"SagaBlog" on-line documentation', 'sagablog-light' ),
                            ),			
			);
			foreach ( $important_links as $important_link) {
				echo '<p><button style="width:250px;background:#2098d1;padding:1em;border-width:0"><a style=" color:white;" target="_blank" href="' . esc_url($important_link['link']) .'" >' . esc_html( $important_link['text'] ) .' </a></button></p>';
			}
        }
    }
    
if ( ! class_exists( 'WP_Customize_Control' ) )
    { return NULL; }
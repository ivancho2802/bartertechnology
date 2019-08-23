<?php

/* 
 * Main slider that show pages
 */
?>


<?php

$front_page_id = get_option('page_on_front');
$blog_page_id = get_option( 'page_for_posts' );

//If chosen 'Static Front Page --- A static page'   - 'Posts page' will not be shown in slider
?>
        <!-- Owl Carousel v2.2.0 --> 
            
            <?php 
            $blog_page_id = (int)get_option( 'page_for_posts' );

            for ($i=1; $i<=5; $i++) {

                if (esc_html(get_theme_mod('sagablog_choose_main_slider_header_pages_' .$i ))&& esc_html(get_theme_mod('sagablog_choose_main_slider_header_pages_' .$i ))!== 0 && (esc_html(get_theme_mod('sagablog_choose_main_slider_header_pages_' .$i ))!== $blog_page_id)) {
  
                $page_id=(int)esc_html(get_theme_mod('sagablog_choose_main_slider_header_pages_' .$i ));

                    $query = new WP_Query( array( 'post_type' => 'page', 'page_id' => $page_id) ); 
                                                
			if ($query->have_posts()) :

			while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php global $post; ?>
                                    <li>
                                        <div class="main-slide-container">
                                        <a href="<?php the_permalink() ?>">

                                            <div class="main-slide-thumb" aria-hidden="true">
                                               <?php 
                                               
                                            if ( has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-1') ) {
                                                the_post_thumbnail('sagablog-mainslider-thumb'); 
                                            } elseif ( has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-2') ) {
                                                the_post_thumbnail('sagablog-mainslider-full-thumb'); 
                                            }    
                                            ?>                            
  
                                            </div>
                                        </a>    
                                            <div class="main-slide-text">
                                                <div class="main-slide-title"><?php the_title() ?></div>
                                            <div class="txt"> 
                                            <?php if (esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-2') { ?>
                                                
                                                
                                                <?php if (esc_html(get_theme_mod('sagablog_not_show_words'))==='') { ?>
                                                    <?php the_excerpt(); ?>
                                                <?php } ?>  
                                                
                                            <?php } ?>  
                                            </div>
                                                <div class="main-slide-meta"><?php the_time(get_option('date_format')); ?></div>                                        
                                            </div>
                                        
                                        </div>                  
                                    </li>                      
					<?php endwhile; ?>
			<?php endif; ?>       
        <?php
	wp_reset_postdata();  
         }
        } ?>        
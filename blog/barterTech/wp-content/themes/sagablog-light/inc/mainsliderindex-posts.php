<?php

/* 
 * Main slider that show posts
 */
?>
        <!-- Owl Carousel v2.2.0 --> 
               
                <?php 

                for ($i=1; $i<=5; $i++) {
      
                   if (esc_html(get_theme_mod('sagablog_choose_main_slider_frontpage_post_' .$i )) && esc_html(get_theme_mod('sagablog_choose_main_slider_frontpage_post_' .$i ))!== 0) {
                   $postid=(int)esc_html(get_theme_mod('sagablog_choose_main_slider_frontpage_post_' .$i ));

                   $query = new WP_Query( array( 'ignore_sticky_posts' => 1, 'post_type' => 'post', 'p' => $postid ) );
                                        
			if ($query->have_posts()) :

 			while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php global $post; ?>
                                    <li>
                                        <div class="main-slide-container">
                                            <a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>">

                                                <div class="main-slide-thumb" aria-hidden="true">
                                                <?php    
                                                if ( has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_index_type'))==='type-index-1') ) {
                                                    the_post_thumbnail('sagablog-mainslider-thumb'); 
                                                }  elseif ( has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_index_type'))==='type-index-2') ) {
                                                    the_post_thumbnail('sagablog-mainslider-full-thumb'); 
                                                }  
                                                ?>      

                                                </div>

                                            </a>
                                                <div class="main-slide-text">                                            
                                                    <!-- Add categories list -->
                                                    <div class="category-container">
                                                        <?php sagablog_category_5(); ?>
                                                    </div>                           

                                                <a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>">    
                                                    <div class="main-slide-title"><?php the_title() ?></div>
                                                </a>

                                                    <div class="txt">    
                                                <?php if (esc_html(get_theme_mod('sagablog_slider_index_type'))==='type-index-2') { ?>

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

			<?php endif;  ?>    

        <?php 
	wp_reset_postdata();  }
        } ?> 
        <!-- Owl Carousel end -->
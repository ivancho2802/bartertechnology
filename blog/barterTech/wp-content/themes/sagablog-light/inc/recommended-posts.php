<?php
/* 
 * Add Recommended posts
 */
?>  
                
                <?php 

                for ($i=1; $i<=6; $i++) {
                    
                    if (esc_html(get_theme_mod('sagablog_choose_recommended_post_'.$i )) && esc_html(get_theme_mod('sagablog_choose_recommended_post_'.$i ))!== 0) {
                    $postid=esc_html(get_theme_mod('sagablog_choose_recommended_post_'.$i ));

                    $query = new WP_Query( array( 'ignore_sticky_posts' => 1, 'post_type' => 'post', 'p' => $postid ) );
                                        
			if ($query->have_posts()) :

			while ( $query->have_posts() ) : $query->the_post(); ?>

				<?php global $post; ?>
                                    <li class="card effect__click">

                                            <div class="card__front">
                                            
                                            <?php    
                                            if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('sagablog-thumb'); 
                                            }    ?>   
                                                                     
                                                <div class="front-text">    
                                                    <!-- Add categories list -->
                                                    <div class="category-container">
                                                        <?php sagablog_category_5(); ?>
                                                    </div>  
                                                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                                        <div class="recommended-slide-title"><?php the_title() ?></div>
                                                    </a>
                                                    <div class="recommended-slide-meta"><?php the_time(get_option('date_format')); ?></div>
                                                
                                                </div><!-- front-text -->

                                            </div>
                                        
                                            <div class="card__back">   
                                                
                                                <div class="back-text"> 
                                                    <?php the_excerpt(); ?>
                                                    
                                                </div><!-- back-text -->

                                            </div>
                                            <div class="continue-reading squaer-showexcerpt">
                                                    <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                                            <?php
                                                                    printf(
                                                                            /* Translators: %s = Name of the current post. */
                                                                            wp_kses( '', array( 'span' => array( 'class' => array() ) ) ),
                                                                            esc_html(the_title( '<span class="screen-reader-text">"', '"</span>', false ))
                                                                    );
                                                            ?>
                                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                    </a>
                                            </div>
                                        
                                    </li>                      
					<?php endwhile; ?>

			<?php endif;  ?>    

        <?php
	wp_reset_postdata();  }
        } ?> 


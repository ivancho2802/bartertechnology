<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package sagablog
 */
/************************************************************************/
if ( ! function_exists( 'sagablog_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time.
 */
function sagablog_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html( '%s', 'post date', 'sagablog-light' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string .'</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

}
endif;
/************************************************************************/
if ( ! function_exists( 'sagablog_category' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function sagablog_category() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list(' ', 'sagablog-light');
		if ( $categories_list && sagablog_categorized_blog() ) {
                        printf( '<span class="cat-links">' . esc_html( '%1$s') . '</span>', $categories_list ); // WPCS: XSS OK.
		}
	}
}
endif;
/************************************************************************/
if ( ! function_exists( 'sagablog_category_5' ) ) :
/**
 * Prints HTML with meta information for the categories.
 */
function sagablog_category_5() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'sagablog-light' ) );
                //Show not more then 5 category
                $findme   = ',';
                $pos = mb_substr_count($categories_list, $findme)+1; 
                if ($pos>5){$pos=5;} 
                $categories_list_array = explode(",", $categories_list);                            
                $categories_list_array_new = array_chunk($categories_list_array, $pos);
                $categories_list_back = implode(" ", $categories_list_array_new[0]);
		if ( $categories_list && sagablog_categorized_blog() ) {
                        printf( '<div class="category-list">' . esc_html( '%1$s') . '</div>', $categories_list_back ); // WPCS: XSS OK.
		}
	}
}
endif;
/************************************************************************/
if ( ! function_exists( 'sagablog_meta_data' ) ) :
/**
 * Prints HTML with meta information for author, comments and edit link.
 */
function sagablog_meta_data() {
	$byline = sprintf(
		esc_html_x( 'Posted by ', 'post author', 'sagablog-light' ).'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
        echo '<div class="inlinedata">';
	echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'sagablog-light' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
                echo '</span>';               
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'sagablog-light' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);

        echo '</div>';
}
endif;
/************************************************************************/

if ( ! function_exists( 'sagablog_tags' ) ) :
/**
 * Prints HTML with meta information for tags.
 */
function sagablog_tags() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list();
		if ( $tags_list ) {
			printf( '<div class="tags-links">' . esc_html__( 'Tagged: ', 'sagablog-light' ).'%1$s' . '</div>', $tags_list ); // WPCS: XSS OK.
		}
	}
}
endif;
/************************************************************************/

if ( ! function_exists( 'sagablog_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function sagablog_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'sagablog-light' ) );
		if ( $categories_list && sagablog_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in ', 'sagablog-light' ).'%1$s' . '</span>', esc_html($categories_list )); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'sagablog-light' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged ', 'sagablog-light' ).'%1$s' . '</span>', esc_html($tags_list) ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'sagablog-light' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'sagablog-light' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;
/************************************************************************
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function sagablog_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'sagablog_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'sagablog_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so sagablog_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so sagablog_categorized_blog should return false.
		return false;
	}
}
/************************************************************************/
/**
 * Flush out the transients used in sagablog_categorized_blog.
 */
function sagablog_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	
	delete_transient( 'sagablog_categories' );
}
add_action( 'edit_category', 'sagablog_category_transient_flusher' );
add_action( 'save_post',     'sagablog_category_transient_flusher' );
/************************************************************************/
if ( ! function_exists( 'sagablog_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @global WP_Query   $wp_query   WordPress Query object.
 * @global WP_Rewrite $wp_rewrite WordPress Rewrite object.
 */
function sagablog_paging_nav() {
	global $wp_query, $wp_rewrite;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $wp_query->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( 'Previous', 'sagablog-light' ),
		'next_text' => __( 'Next', 'sagablog-light' ),
		'type'		=> 'list',
	) );

	if ( $links ) :

	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php  esc_html_e( 'Posts navigation', 'sagablog-light' ); ?></h1>
		<?php echo $links; ?>
	</nav><!-- .navigation -->
	<?php
	endif;
}
endif;
/************************************************************************/
/**
 * Add featured image as background image to post navigation elements.
 *
 */
function sagablog_post_nav_background() {
    if ( ! is_single() ) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );
    $css      = '';

    if ( is_attachment() && 'attachment' == $previous->post_type ) {
        return;
    }

    if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
        $prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'sagablog-nav-thumb' );
        $css .= '
            @media screen and (min-width: 40em) {
            .post-navigation .nav-previous .addbgpic { background-image: url(' . esc_url( $prevthumb[0] ) . ');
                                             background-repeat: no-repeat; 
                                             background-position: right top;
                                             background-origin: content-box; 
                                             background-size: 130px 100px;
                                             border: 2px #f7f7f7 solid;
                                             min-height:100px;}
            .post-navigation .nav-previous a .nav-text {display:block; width:60%;float:left;padding: 0.5em;}
            .nav-previous .nav-text{border: 0 #f7f7f7 solid;min-height: 100px;}
            .nav-previous{border: 0 #f7f7f7 solid;}
        }';
    } else {
        $css .= '
            @media screen and (min-width: 40em) {
            .post-navigation .nav-previous .addbgpic { 
                                             border: 2px #f7f7f7 solid;
                                             min-height:100px;}
                                             }';
    }

    if ( $next && has_post_thumbnail( $next->ID ) ) {
        $nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'sagablog-nav-thumb' );
        $css .= '
            @media screen and (min-width: 40em) {
            .post-navigation .nav-next .addbgpic { background-image: url(' . esc_url( $nextthumb[0] ) . '); 
                                         background-repeat: no-repeat; 
                                         background-position: left top; 
                                         background-origin: content-box; 
                                         background-size: 130px 100px;
                                         border: 2px #f7f7f7 solid;
                                         min-height:100px;}
            .post-navigation .nav-next a .nav-text {display:block; width:60%;float:right;padding: 0.5em;}
            .nav-next .nav-text{border: 0 #f7f7f7 solid;min-height: 100px;}
            .nav-next{border: 0 #f7f7f7 solid;}
        }';
    }else {
            $css .= '
            @media screen and (min-width: 40em) {
            .post-navigation .nav-previous .addbgpic { 
                                             border: 2px #f7f7f7 solid;
                                             min-height:100px;}
                                             }';
    }

    wp_add_inline_style( 'sagablog-style', $css );
}
add_action( 'wp_enqueue_scripts', 'sagablog_post_nav_background' );

/************************************************************************/
if ( ! function_exists( 'sagablog_popular_posts_main_slider_header' ) ) :
/**
 * Add popular posts in main slider
 */
function sagablog_popular_posts_main_slider_header($numbofposts) {
    $number_of_posts=$numbofposts;
				$popular_posts = new WP_Query( apply_filters('popular_posts_args', array(
					        'posts_per_page'      => $number_of_posts,
					        'post_status'         => 'publish',
					        'ignore_sticky_posts' => true
				) ) );

				if ($popular_posts->have_posts()) :
                                ?>

				<?php   while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>

                                    <li>
                                        <div class="main-slide-container">
                                        <a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>">
                                                
                                            <div class="main-slide-thumb" aria-hidden="true">
                                                
                                            <?php
                                        
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-1')) {
                                                the_post_thumbnail('sagablog-mainslider-thumb'); 
                                            }  
                                   
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-2') ) {
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
                                            <?php 
                                            if (esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-2') { ?> 
                                                
                                            <?php if (esc_html(get_theme_mod('sagablog_not_show_words'))==='') { ?>
                                                <?php the_excerpt(); ?>
                                            <?php } ?>          
                                                
                                            <?php } ?> 
                                            </div>                                                
                                                <div class="main-slide-meta"><?php the_time(get_option('date_format')); ?></div>                                        
                                            </div>
                                        </div>
                                    </li>            

					<?php endwhile; 
		endif;
		wp_reset_postdata();
}
endif;

/************************************************************************/
if ( ! function_exists( 'sagablog_popular_posts_main_slider_index' ) ) :
/**
 * Add popular posts in main slider
 */
function sagablog_popular_posts_main_slider_index($numbofposts) {
    $number_of_posts=$numbofposts;
				$popular_posts = new WP_Query( apply_filters('popular_posts_args', array(
					        'posts_per_page'      => $number_of_posts,
					        'post_status'         => 'publish',
					        'ignore_sticky_posts' => true
				) ) );

				if ($popular_posts->have_posts()) :
                                ?>

				<?php   while ( $popular_posts->have_posts() ) : $popular_posts->the_post(); ?>

                                    <li>
                                        <div class="main-slide-container">
                                        <a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>">
                                                
                                            <div class="main-slide-thumb" aria-hidden="true">
                                                
                                            <?php
                                            
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_index_type'))==='type-index-1') ) {
                                                the_post_thumbnail('sagablog-mainslider-thumb'); 
                                            }  
                                            
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_index_type'))==='type-index-2') ) {
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
                                                <div class="main-slide-meta"><?php the_time(get_option('date_format')); ?></div>                                        
                                            </div>
                                        </div>
                                    </li>            

					<?php endwhile; 
		endif;
		wp_reset_postdata();
}
endif;

/************************************************************************/
// For widget
/************************************************************************/

if ( ! function_exists( 'sagablog_recent_posts_slider' ) ) :
/**
 * Add recent posts
 */
function sagablog_recent_posts_slider($numbofposts) {
    $number_of_posts=$numbofposts;
				$recent_posts = new WP_Query( apply_filters('recent_posts_args', array(
					        'posts_per_page'      => $number_of_posts,
					        'post_status'         => 'publish',
					        'ignore_sticky_posts' => true
				) ) );

				if ($recent_posts->have_posts()) :
                                ?>

                                <ul class="owl-carousel">
				<?php   while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>

					<li>
						<?php global $post; ?>
                                                    
                                                    <div class="recent-post-container clearfix">
                                                        
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<div class="widget-post-thumb" aria-hidden="true">
									<?php
				                                        if ( has_post_thumbnail() ) {
                                                                            the_post_thumbnail('sagablog-thumb'); ?>
                                                                            <div class="imgframe"></div>
                                                                        <?php } ?>
								</div>
                                                     
                                                                <div class="widget-post-text">
                                                                    <div class="widget-post-title"><?php the_title(); ?></div>
                                                                    <div class="widget-post-meta"><?php the_time(get_option('date_format')); ?></div>
                                                                </div>
                                                        </a>
                                                    </div>
                                                    
					</li>

					<?php endwhile; ?>

                    </ul><?php
		endif;
		wp_reset_postdata();
}
endif;

/************************************************************************/
if ( ! function_exists( 'sagablog_recent_posts_main_slider_header' ) ) :
/**
 * Add recent posts
 */
function sagablog_recent_posts_main_slider_header($numbofposts) {
    $number_of_posts=$numbofposts;
				$recent_posts = new WP_Query( apply_filters('recent_posts_args', array(
					        'posts_per_page'      => $number_of_posts,
					        'post_status'         => 'publish',
					        'ignore_sticky_posts' => true
				) ) );

				if ($recent_posts->have_posts()) :
                                ?>

				<?php   while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>

                                    <li>
                                        <div class="main-slide-container">
                                        <a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>">
                                                
                                            <div class="main-slide-thumb" aria-hidden="true">
                                                
                                            <?php
                                        
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-1')) {
                                                the_post_thumbnail('sagablog-mainslider-thumb'); 
                                            }  
                                   
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-2') ) {
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
                                            <?php 
                                            if (esc_html(get_theme_mod('sagablog_slider_header_type'))==='type-header-2') { ?> 
                                                
                                            <?php if (esc_html(get_theme_mod('sagablog_not_show_words'))==='') { ?>  
                                                <?php the_excerpt(); ?>
                                            <?php } ?>          
                                                
                                            <?php } ?> 
                                            </div>                                                
                                                <div class="main-slide-meta"><?php the_time(get_option('date_format')); ?></div>                                        
                                            </div>
                                        </div>
                                    </li>            

					<?php endwhile; 
		endif;
		wp_reset_postdata();
}
endif;
/************************************************************************/
if ( ! function_exists( 'sagablog_recent_posts_main_slider_index' ) ) :
/**
 * Add recent posts
 */
function sagablog_recent_posts_main_slider_index($numbofposts) {
    $number_of_posts=$numbofposts;
				$recent_posts = new WP_Query( apply_filters('recent_posts_args', array(
					        'posts_per_page'      => $number_of_posts,
					        'post_status'         => 'publish',
					        'ignore_sticky_posts' => true
				) ) );

				if ($recent_posts->have_posts()) :
                                ?>

				<?php   while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>

                                    <li>
                                        <div class="main-slide-container">
                                        <a href="<?php the_permalink()?>" title="<?php the_title_attribute(); ?>">
                                                
                                            <div class="main-slide-thumb" aria-hidden="true">
                                                
                                            <?php
                                            
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_index_type'))==='type-index-1') ) {
                                                the_post_thumbnail('sagablog-mainslider-thumb'); 
                                            }  
                                            
                                            if (has_post_thumbnail()&&(esc_html(get_theme_mod('sagablog_slider_index_type'))==='type-index-2') ) {
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
                                                <div class="main-slide-meta"><?php the_time(get_option('date_format')); ?></div>                                        
                                            </div>
                                        </div>
                                    </li>            

					<?php endwhile; 
		endif;
		wp_reset_postdata();
}
endif;
/************************************************************************/
if ( ! function_exists( 'sagablog_sticky' ) ) :
/**
 * Show sign on sticky post.
 */
function sagablog_sticky() {?>
    
                <div class="squaer-container-tack">
                    <span><i class="fa fa-thumb-tack" aria-hidden="true"></i></span>
                </div>
                <div class="squaer-container-check">
                    <span><i class="fa fa-check" aria-hidden="true"></i></span>
                </div>
                <div class="ribbon-container-tack">
                  <div class="ribbon">
                    <span class="ribbon1">
                      <span><i class="fa fa-thumb-tack" aria-hidden="true"></i></span>
                    </span>
                  </div> 
                </div><!--ribbon-container-tack-->
                    <div class="ribbon-container-check">
                  <div class="ribbon">
                    <span class="ribbon1">
                      <span><i class="fa fa-check" aria-hidden="true"></i></span>
                    </span>
                  </div> 
                </div><!--ribbon-container-check-->

<?php }
endif;

/************************************************************************/
if ( ! function_exists( 'sagablog_index_meta_data' ) ) :
/**
 * Prints HTML with meta information for author, comments and edit link.
 */
function sagablog_index_meta_data() {
	$byline = sprintf(
		esc_html_x( 'Posted by ', 'post author', 'sagablog-light' ).'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
        echo '<div class="inlinedata">';
 
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html( '%s', 'post date', 'sagablog-light' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string .'</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.        
        
	echo '<span class="byline"> ' . $byline. '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'sagablog-light' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
                echo '</span>';               
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'sagablog-light' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
        

        echo '</div>';
}
endif;
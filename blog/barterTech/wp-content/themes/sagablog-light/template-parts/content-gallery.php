<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sagablog
 */

?>
       
<article id="post-<?php the_ID(); ?>" <?php post_class();?> >  

    <?php if (is_single()) {?> 
    <div class="postedoncontainer">
        <?php sagablog_posted_on(); ?> 
    </div><!-- posted-on-container -->   
    <?php } else { ?> 
        <div class="index-box clearfix">

                <?php if (is_sticky()) { 
                    sagablog_sticky();
                 }
     } ?>
                    <?php
		if ( has_post_thumbnail() ) { ?>
			
                             <?php   if ( !is_single() ) : ?>
                                 <figure class="featured-image">       
                                        <a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
                                        <?php 
                                            the_post_thumbnail('sagablog-customlarge-thumb');
                                        ?>
                                        </a>
                                  </figure>

                                <?php endif;?>    
			
		<?php }
		?>
            
		<?php
		if ( !is_single() ) {?>
                    <div class="article-content-container">
                <?php }?>            
     
        <header class="entry-header">    
                <?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
                        <?php sagablog_category(); ?>                        
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
                
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;?>
                
	</header><!-- .entry-header -->

        <div class="entry-content">
		<?php
                if ( is_single() ) : 
                        the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sagablog-light' ),
				'after'  => '</div>',
			) ); 
                else : 
                    the_excerpt();  ?>
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
                <?php endif;
		?>
        </div><!-- .entry-content -->
	<footer class="entry-footer">
            <?php if (is_single()) {  
                sagablog_meta_data();
                sagablog_tags();
             } else {
                sagablog_index_meta_data();
             }?>
            
	</footer><!-- .entry-footer -->
        
        <?php
		if ( is_single() ) {
                    if ( is_single() ) {
                        get_template_part( 'template-parts/content', 'author' );
                    }   
                }
		else {?>
                    </div><!-- article-content-container -->
        <?php }?>  
                        
    <?php if (!is_single()) { ?> 
        </div><!-- index-box -->


    <?php } ?>

</article> <!-- #post-## -->
<?php if ( is_single() ) {
    get_sidebar( 'post' );
}
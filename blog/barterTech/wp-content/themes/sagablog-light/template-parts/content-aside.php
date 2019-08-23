<?php
/**
 * Template part for displaying posts-format 'aside'.
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
		if ( !is_single() ) {?>
                    <div class="article-content-container-full">
                <?php }?>            

                   
        <header class="entry-header">    
                <?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
                        <?php sagablog_category(); ?>                        
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
                
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
                         the_content();     

                        ?>

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
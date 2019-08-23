<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sagablog
 */

?>
            
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
          
            <?php get_sidebar( 'top-footer' ); ?>
            <?php get_sidebar( 'instagram' ); ?>
            <div class="footer-sidebar">
                <?php get_sidebar( 'footer' ); ?>
            </div>
                <?php if(esc_html(get_theme_mod('sagablog_show_copyright')) == 1) { ?>            
		<div class="site-info">
                    
                <?php echo esc_html__( 'Copyright', 'sagablog-light' ).' &copy;'; ?>      

                        <div id="years">
                            <?php 
                            echo esc_html(get_theme_mod( 'sagablog_years' ));?> 
                        </div>                        
                            <?php echo esc_html( get_bloginfo( 'title' ) );
                            echo "."; ?>
                        <div id="all-rights-text">
                            <?php echo esc_html(get_theme_mod( 'sagablog_all_rights_text' ));?>
                        </div>

			<a href="<?php echo esc_url('#' ); ?>"><?php printf( esc_html__( ' ', '' ). '%s', '' ); ?></a>
			
			<?php printf( esc_html__( ' ', '' ).''. esc_html__('  ', ''). '', '', '<a href="#"></a>' ); ?>
		</div><!-- .site-info -->               
                
                
                <?php  }  ?> 
	</footer><!-- #colophon -->
</div><!-- #page -->
<!-- Go to top  -->
<a href="#" class="topbtn" id="gototop"><i class="fa fa-chevron-up"></i></a>
<?php wp_footer(); ?>

</body>
</html>

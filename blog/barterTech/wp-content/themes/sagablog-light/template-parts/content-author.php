<?php

/**
 * Template part for displaying  Author Bio
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sagablog
 */

?>

<div class="entry-author clearfix">
    <div class="author-avatar">
        <?php
        /**
         * Filter the author bio avatar size.
         *
         * @param int $size The avatar height and width size in pixels.
         */
        $author_bio_avatar_size = apply_filters( 'sagablog_author_bio_avatar_size', 150 );

        echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
        ?>
    </div><!-- .author-avatar -->

    <div class="author-body">
        <div class="author-heading">
            <h3 class="author-name"><?php echo get_the_author(); ?></h3>
        </div><!-- .author-heading -->

        <p class="author-bio">
            <?php the_author_meta( 'description' ); ?>
            <br>
            <a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                <?php printf( esc_html__( 'View all posts by ', 'sagablog-light' ).'%s', get_the_author() ); ?>
            </a>
        </p><!-- .author-bio -->

        <div class="profile-links"> 
            <ul class="social-links">
                <?php if ( get_the_author_meta( 'twitter' ) != '' )  { ?>
                    <li><a class="twitter-link" href="https://twitter.com/<?php echo wp_kses( get_the_author_meta( 'twitter' ), null ); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <?php } ?>

                <?php if ( get_the_author_meta( 'facebook' ) != '' )  { ?>
                    <li><a class="facebook-link" href="<?php echo esc_url( get_the_author_meta( 'facebook' ) ); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <?php } ?>

                <?php if ( get_the_author_meta( 'linkedin' ) != '' )  { ?>
                    <li><a class="linkedin-link" href="<?php echo esc_url( get_the_author_meta( 'linkedin' ) ); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <?php } ?>

                <?php if ( get_the_author_meta( 'googleplus' ) != '' )  { ?>
                    <li><a class="google-link" href="<?php echo esc_url( get_the_author_meta( 'googleplus' ) ); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <?php } ?>
            </ul> 
        </div>
    </div>
    
</div><!-- .entry-auhtor -->




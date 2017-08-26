<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package VW Corporate Lite
 */

get_header(); ?>

<div class="container">
    <div class="middle-align">
        <div id="content-vw" class="col-md-8">
            <?php 
            while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title();?></h1>
                <?php the_content();

                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vw-corporate-lite' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span class="page-number">',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vw-corporate-lite' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                ?>
                <div class="clearfix"></div>
                <?php

                //If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                
                ?>               
            <?php endwhile; // end of the loop. ?>   
            <div class="clearfix"></div>    
        </div>
    </div>
</div><!-- container -->

<?php get_footer(); ?>
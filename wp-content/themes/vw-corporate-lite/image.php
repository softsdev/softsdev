<?php
/**
 * The template for displaying image attachments.
 *
 * @package VW Corporate Lite
 */

get_header(); ?>

<div id="content-vw" class="container">
    <div class="middle-align">
        <?php
            $left_right = get_theme_mod( 'vw_corporate_lite_theme_options','One Column');
            if($left_right == 'Left Sidebar'){?>
            <div id="sidebar" class="col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
            <div class="col-md-8">
    			<?php while ( have_posts() ) : the_post(); ?>    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php the_title();?></h1>    
                            <div class="entry-attachment">
                                <div class="attachment">
                                    <?php vw_corporate_lite_the_attached_image(); ?>
                                </div>
        
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>    
                            <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'vw-corporate-lite' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>    
                        <?php edit_post_link( __( 'Edit', 'vw-corporate-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                    </article>    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>    
                <?php endwhile; // end of the loop. ?>
            </div>
        <?php }else if($left_right == 'Right Sidebar'){?>
            <div class="col-md-8">
                <?php while ( have_posts() ) : the_post(); ?>    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php the_title();?></h1>    
                            <div class="entry-attachment">
                                <div class="attachment">
                                    <?php vw_corporate_lite_the_attached_image(); ?>
                                </div>
        
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>    
                            <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'vw-corporate-lite' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>    
                        <?php edit_post_link( __( 'Edit', 'vw-corporate-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                    </article>    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>    
                <?php endwhile; // end of the loop. ?>
            </div>
            <div id="sidebar" class="col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
        <?php }else if($left_right == 'One Column'){?>
            <div class="col-md-12">
                <?php while ( have_posts() ) : the_post(); ?>    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php the_title();?></h1>    
                            <div class="entry-attachment">
                                <div class="attachment">
                                    <?php vw_corporate_lite_the_attached_image(); ?>
                                </div>
        
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>    
                            <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'vw-corporate-lite' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>    
                        <?php edit_post_link( __( 'Edit', 'vw-corporate-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                    </article>    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>    
                <?php endwhile; // end of the loop. ?>
            </div>
        <?php }else if($left_right == 'Three Columns'){?>
            <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
            <div class="col-md-6">
                <?php while ( have_posts() ) : the_post(); ?>    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php the_title();?></h1>    
                            <div class="entry-attachment">
                                <div class="attachment">
                                    <?php vw_corporate_lite_the_attached_image(); ?>
                                </div>
        
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>    
                            <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'vw-corporate-lite' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>    
                        <?php edit_post_link( __( 'Edit', 'vw-corporate-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                    </article>    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>    
                <?php endwhile; // end of the loop. ?>
            </div>
            <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
        <?php }else if($left_right == 'Three Columns'){?>
            <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1');?></div>
            <div class="col-md-3">
                <?php while ( have_posts() ) : the_post(); ?>    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php the_title();?></h1>    
                            <div class="entry-attachment">
                                <div class="attachment">
                                    <?php vw_corporate_lite_the_attached_image(); ?>
                                </div>
        
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>    
                            <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'vw-corporate-lite' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>    
                        <?php edit_post_link( __( 'Edit', 'vw-corporate-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                    </article>    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>    
                <?php endwhile; // end of the loop. ?>
            </div>
            <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2');?></div>
            <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-3');?></div>
        <?php }else if($left_right == 'Grid Layout'){?>
            <div class="col-md-8">
                <?php while ( have_posts() ) : the_post(); ?>    
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="entry-content">
                            <h1><?php the_title();?></h1>    
                            <div class="entry-attachment">
                                <div class="attachment">
                                    <?php vw_corporate_lite_the_attached_image(); ?>
                                </div>
        
                                <?php if ( has_excerpt() ) : ?>
                                    <div class="entry-caption">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>    
                            <?php
                                the_content();
                                wp_link_pages( array(
                                    'before' => '<div class="page-links">' . __( 'Pages:', 'vw-corporate-lite' ),
                                    'after'  => '</div>',
                                ) );
                            ?>
                        </div>    
                        <?php edit_post_link( __( 'Edit', 'vw-corporate-lite' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                    </article>    
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || '0' != get_comments_number() )
                            comments_template();
                    ?>    
                <?php endwhile; // end of the loop. ?>
            </div>
            <div id="sidebar" class="col-md-4"><?php dynamic_sidebar('sidebar-2');?></div>
        <?php } ?>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>
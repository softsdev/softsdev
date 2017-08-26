<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Spider_Mag
 */
get_header(); 

	if ( have_posts() ) : ?>

		<div class="container">
		    <div class="clearfix">
		            <?php spidermag_breadcrumbs(); ?><!-- breadcrumbs call function end -->
		    </div>
		    <?php  the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
		</div>
		
	<?php
	
	    $page_layout = esc_attr( get_theme_mod( 'spidermag_archive_page_layout_type','masonry' ) );

	    get_template_part( 'template-parts/archives/archive', $page_layout );

	endif; 

get_footer();
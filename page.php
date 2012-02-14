<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Toolbox
 * @since Toolbox 0.1
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
			<?php 
			$images = get_post_meta($post->ID, 'images', true); 
			if ($images != null) {?>
			
			<img src="<?php echo $images[0]['image']; ?>" alt="<?php echo esc_attr($images[0]['title']); ?>" />
			<!-- Undermeny -->
		
			<?php
			} // avslutter bildeinhentelse
  			if($post->post_parent)
  			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
  			else
  			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
  			if ($children) { ?>
 	 		<div id="undermeny">
 	 			<ul>
  					<?php echo $children; ?>
  				</ul>
  			</div>
  			<?php } ?>
		
		
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php // comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<?php 
					if (is_front_page() || is_home()) {
  						echo do_shortcode("[metaslider id=1155]"); 
					} 
				?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
					<?php $pageTitle = get_the_title(); ?>					
				<?php endwhile; // end of the loop. ?>
			
				<?php if(get_the_title() == "Help"): ?>

					<?php query_posts('category_name=Help'); ?>
					<ul>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<li><?php the_title(); ?></li>
					<?php endwhile; ?>
					</ul>
					<?php endif; ?>
				<?php endif; ?>

			</div><!-- #content -->

		</div><!-- #primary -->

	<?php if($pageTitle != "Help"){
		get_sidebar(); }?>


<?php get_footer(); ?>
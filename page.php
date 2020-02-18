<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lafabriquedeblogs
 */

get_header(); ?>

<section class="archive-template">
	<div class="inner-section">
			<?php while ( have_posts() ) : the_post(); ?>
			<div id="header-page-section">
				<div id="light-page-title">
					<p><?php the_title( '', '' ); ?></p>
				</div>
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
			
			<div class="page-content">
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			</div>
			
			<?php endwhile; // End of the loop. ?>
	</div>
</section>
<?php
//get_sidebar();
get_footer();

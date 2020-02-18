<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package lafabriquedeblogs
 */

get_header(); ?>
	
	<div id="header-page-section">
		<div id="light-page-title">
			<p><?php the_title(); ?></p>
		</div>
		<nav id="chemin-fer">
			<a href="/"><?php _e('Accueil',MYDOMAIN); ?></a> / <a href="/blogue/"><?php _e('Blogue',MYDOMAIN); ?></a> / <span><?php echo get_the_title();?></span>
		</nav>
		
	</div>
	
<section class="single-template">

	<div class="inner-section">

		<?php
		while ( have_posts() ) : the_post();
			
			get_template_part( 'template-parts/content', get_post_type() );

		endwhile; // End of the loop.
		?>

	</div>
	<?php get_sidebar();  ?>
</section>

</div><!-- site-content -->
</div> <!-- site -->

<?php get_template_part( 'template-parts/navigation/nav-articles' );?>

<section id="section-comments">
	<div class="inner-section">
		<?php
			
		while ( have_posts() ) : the_post();
			
		
			//the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; // End of the loop.
		?>	
	</div><!-- inner-section -->
</section>

<div class="site">
	<div class="site-content">
<?php

get_footer();

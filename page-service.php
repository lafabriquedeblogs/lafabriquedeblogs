<?php
/**
 * Template name: Service
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
			
			<div class="services-content-<?php echo get_the_id();?> services-content">
				<div class="services-metas">
					<h4 class="leftbar-title"><?php the_title( '', '' ); ?></h4>
					<?php
						$featured_image = get_the_post_thumbnail_url( get_the_id(), 'services');
						if( empty( $featured_image ) ){
							$featured_image = get_template_directory_uri().'/img/page.png';
						}
					?>
					<div class="service-image">
						<img src="<?php echo $featured_image;?>" />
					</div>
				</div><!-- services-metas -->
				<div class="services-details">
				
					<?php get_template_part( 'template-parts/content', 'page' ); ?>
				</div><!-- services-details -->
			</div><!-- services-content -->

			<?php endwhile; // End of the loop. ?>
	</div>
</section>
<?php
//get_sidebar();
get_footer();

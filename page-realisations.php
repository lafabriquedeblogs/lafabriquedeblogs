<?php get_header(); ?>

<section class="archive-template">
	<div class="inner-section">
			<?php while ( have_posts() ) : the_post(); ?>
			<div id="header-page-section">
				<div id="light-page-title">
					<p><?php the_title( '', '' ); ?></p>
				</div>
				<div id="real-title">
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div id="timer-slider-wrapper">
						<a id="timer-slider"><span>Timer</span>
							<div class="rotator"></div><div class="pause"></div><div class="play"></div>
						</a>
					</div>
				</div>
			</div>
			
			<div id="realisations-page-content" class="page-content">
				<?php //get_template_part( 'template-parts/content', 'page' ); ?>

				<?php get_template_part( 'template-parts/realisations-slider-page' );?>

			</div>
			
			<?php endwhile; // End of the loop. ?>
	</div>
</section>
<?php
//get_sidebar();
get_footer();

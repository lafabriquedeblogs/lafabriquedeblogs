<?php get_header(); ?>
	
<section class="archive-template">

	<div class="inner-section">
		<div id="header-page-section">
			<h1 class="archive-title"><span class="resultat">Résultat de recherche pour :</span> <span class="search-query"><?php echo get_search_query();?></span></h1>
		</div>	
		<?php if ( have_posts() ) : ?>
			

		<div class="page-content page-content--search">
		<div class="posts-list post-list--search"><!--  -->
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

							
							$date = get_the_date( 'j F Y', get_the_id() );
							
							$terms_array = wp_get_post_terms( get_the_id(), 'category' );

							$terms = array();
							
							foreach( $terms_array as $term ){
								$term_url = BLOG.$term->slug;
								$term_name = $term->name;
								$termOutput = '<a href="'.$term_url.'" class="entry-term">'.$term_name.'</a>';
								$terms[] = $termOutput;
							}
							$terms = implode(', ', $terms);
							
							$image = get_the_post_thumbnail( get_the_id(), 'category-thumb' );	
							
					?>		
							<a  href="<?php the_permalink(); ?>" rel="bookmark" id="post-<?php the_ID(); ?>" <?php post_class("post-list--item"); ?>>
									<h2 class="entry-title effect"><?php the_title();?></h2>
							</a><!-- #post-<?php the_ID(); ?> -->

					<?php /* ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class("post-list--item"); ?>>
								<div class="flx">
									<header class="entry-header">
										<h2 class="entry-title effect"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h2>
									</header><!-- .entry-header -->
									
									<footer class="entry-footer">
										<a class="lire-la-suite" href="<?php the_permalink(); ?>"><span><?php _e( 'Lire la suite', 'lfdb' );?></span></a>
									</footer><!-- .entry-footer -->
									
								</div><!-- flex -->
							</article><!-- #post-<?php the_ID(); ?> -->
					
					<?php */ ?>
					
					<?php	

			// End the loop.
			endwhile;
?>
		</div><!-- .posts-list -->
		</div><!-- page-content -->
	</div><!-- inner-section -->

</section>
</div><!-- site-content -->
</div> <!-- site -->

<?php get_template_part( 'template-parts/navigation/nav-articles' );?>

<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );

		endif;

		?>


<div class="site">
	<div class="site-content">

<?php get_footer(); ?>

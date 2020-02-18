<?php get_header(); ?>
	
<section class="archive-template">

	<div class="inner-section">
	
		<?php if ( have_posts() ) : ?>
			
			<div id="header-page-section">
				<?php 
					
					$title = single_term_title('',false);
					
					if( is_home() && !is_front_page() ){
						$title = single_post_title('',false);
					}
					if( is_archive() ){
						$title = get_the_archive_title();
					}
						
				?>
				<div id="light-page-title">
					<p><?php echo $title; ?></p>
				</div>
				<nav id="chemin-fer">
					<a href="/"><?php _e('Accueil',MYDOMAIN); ?></a>
					
					<?php if( is_singular() || is_archive() ){ ?>
					 / <a href="/blogue/"><?php _e('Blogue',MYDOMAIN); ?></a>
					 <?php } ?>
					  / <span><?php echo $title; ?></span>
				
				</nav>
				<h1 class="archive-title"><?php echo $title; ?></h1>
			</div>
						
		<div class="posts-list"><!--  -->
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
							
							$excerpt = give_me_excerpt(get_the_id(),150);
							
					?>		
				
							<article id="post-<?php the_ID(); ?>" <?php post_class("post-list--item"); ?>>
								<div class="flx">
									<div class="feat-image-post-list">
										<?php echo $image; ?>
									</div>
									<header class="entry-header">
										<h2 class="entry-title effect"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title();?></a></h2>
										<div class="entry-meta">
											<div class="entry-author"><img class="crayon" src="<?php echo get_template_directory_uri();?>/img/crayon.png" alt="crayon" with="11" height="11"/> La Fabrique de blogs</div>
											<div class="entry-date"><?php echo $date; ?></div>
											<div class="entry-categories"><?php _e('publié dans',MYDOMAIN); ?> • <?php echo $terms;?></div>
										</div>
									</header><!-- .entry-header -->
									
									<div class="entry-content">
										<p><?php echo $excerpt;?></p>
									</div><!-- .entry-content -->
									
									<footer class="entry-footer">
										 <a class="lire-la-suite" href="<?php the_permalink(); ?>"><?php _e( 'Lire la suite', 'lfdb' );?></a>
									</footer><!-- .entry-footer -->
								</div><!-- flex -->
							</article><!-- #post-<?php the_ID(); ?> -->
					
					<?php	

			// End the loop.
			endwhile;
?>
</div><!-- .posts-list -->
	</div>

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

<?php
	if( is_single() ){
		while ( have_posts() ) : the_post();
			$prev_post = get_adjacent_post( false, '', true );
			$next_post = get_adjacent_post( false, '', false );
?>

<section id="nav-articles">
	<nav>
		<a href="<?php echo get_permalink( $prev_post->ID );?>" class="prev-article">
			<div class="icon-div"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 23.1" style="enable-background:new 0 0 27.8 23.1;" xml:space="preserve"><path id="flech-prev" class="st0" d="M11.5,0h4.9L6.7,9.7h21.1v3.7H6.7l9.8,9.7h-4.9L0,11.5L11.5,0z"/></svg></div>
			<div class="text-div">
				<span class="prev-article-link"><?php _e('Article précédent',MYDOMAIN); ?></span>
				<span  class="prev-article-title"><?php echo get_the_title( $prev_post->ID );?></span>
			</div>
		</a>
		<a href="<?php echo get_permalink( $next_post->ID );?>" class="next-article">
			<div class="icon-div"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 23.1" style="enable-background:new 0 0 27.8 23.1;" xml:space="preserve"><path id="fleche-next" class="st0" d="M16.3,23.1h-4.9l9.8-9.7H0l0-3.7h21.1L11.3,0l4.9,0l11.5,11.5L16.3,23.1z"/></svg></div>
			<div class="text-div">
				<span class="next-article-link"><?php _e('Article Suivant',MYDOMAIN); ?></span>
				<span class="next-article-title"><?php echo get_the_title( $next_post->ID );?></span>
			</div>
		</a>
	</nav>
</section>

<?php
		endwhile; // End of the loop.
	}
?>

<?php
	//&& $GLOBALS['wp_query']->max_num_pages > 1
	if( is_archive() || is_home() ){
		
		$prev = false;
		$next = false;
		
		if( get_previous_posts_link() ) :
			$prev = get_previous_posts_page_link();
		endif;
		
		if( get_next_posts_link() ) :
			$next = get_next_posts_page_link();
		endif;
		
		
?>

<section id="nav-articles">
	<nav>

		<?php if( $prev ) :  ?>
		<a href="<?php echo $prev;?>" class="prev-article">
			<div class="icon-div"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 23.1" style="enable-background:new 0 0 27.8 23.1;" xml:space="preserve"><path id="flech-prev" class="st0" d="M11.5,0h4.9L6.7,9.7h21.1v3.7H6.7l9.8,9.7h-4.9L0,11.5L11.5,0z"/></svg></div>
			<div class="text-div">
				<span class="prev-article-link"><?php _e('Articles précédents',MYDOMAIN); ?></span>
			</div>
		</a>
		<?php else : ?>
			<a class="no-link">&nbsp;</a>
		<?php endif; ?>
		
		<?php if( $next ) : ?>
		<a href="<?php echo $next?>" class="next-article">
			<div class="icon-div"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 23.1" style="enable-background:new 0 0 27.8 23.1;" xml:space="preserve"><path id="fleche-next" class="st0" d="M16.3,23.1h-4.9l9.8-9.7H0l0-3.7h21.1L11.3,0l4.9,0l11.5,11.5L16.3,23.1z"/></svg></div>
			<div class="text-div">
				<span class="next-article-link"><?php _e('Articles Suivants',MYDOMAIN); ?></span>
			</div>
		</a>
		<?php endif; ?>
	</nav>
</section>

<?php
	}
?>
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lafabriquedeblogs
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('article'); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		
		
		if ( 'post' === get_post_type() ) :

			$terms_array = wp_get_post_terms( get_the_id(),'category');
			$terms = array();
			foreach( $terms_array as $term ){
				$term_url = BLOG.$term->slug;
				$term_name = $term->name;
				$termOutput = '<a href="'.$term_url.'" class="entry-term">'.$term_name.'</a>';
				$terms[] = $termOutput;
			}
			$terms = implode(', ', $terms);
			
		?>
		<div class="entry-meta">
			<div class="entry-author"><img class="crayon" src="<?php echo get_template_directory_uri();?>/img/crayon.png" alt="crayon" with="11" height="11"/> La Fabrique de blogs</div>
			<div class="entry-date"><?php echo date_i18n( 'j F Y', strtotime( get_the_date())); ?></div>
			<div class="entry-categories"><?php _e('publié dans',MYDOMAIN); ?> • <?php echo $terms;?></div>
			<div id="lfdb-socials"><div class="at-above-post"></div></div>
		</div>
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'lafabriquedeblogs' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', MYDOMAIN ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //lafabriquedeblogs_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

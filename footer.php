<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lafabriquedeblogs
 */

?>

	</div><!-- #content -->

	<footer id="footer">
		
		<div class="masthead">
			<div class="site-branding">
				<a href="/">
					<span class="lafabrique">la_fabrique</span><span class="parenthese">(</span><span class="blogs-logo">blogs</span><span class="parenthese">)</span>
				</a>
			
				<?php echo do_shortcode( '[gravityform id="1" title="true" description="true" ajax="true"]', false );?>
			
			</div><!-- .site-branding -->
			
			<div class="wrapper-search"></div>
			
			<div class="wrapper-devis">
				<a class="devis" href="/demande-de-devis/">Demande de devis</a>
			</div>
			
			<div class="wrapper-phone">
				<a class="phone" href="tel:+15149933700">514 993-3700</a>
			</div>
			
			<?php get_template_part( 'template-parts/navigation/section-top-nav' );?>				
			
		</div><!-- masthead -->
		
		<?php get_template_part( 'template-parts/navigation/section-footer-nav' );?>

	
	</footer><!-- #masthead -->
	
	
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

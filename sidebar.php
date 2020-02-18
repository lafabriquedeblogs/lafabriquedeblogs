<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package lafabriquedeblogs
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	
	<div id="tertiary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
	
	<div id="quartely">
		
		<div id="sidebar-2">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
		
		<div id="sidebar-3">
			<?php dynamic_sidebar( 'sidebar-3' ); ?>
		</div>
	
	</div>
	
</aside><!-- #secondary -->

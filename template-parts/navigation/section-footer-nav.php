<?php
	
	/*
	 *	
	 *
	 *	LFDB
	 *	SECTION FOOTER BARRE
	 *
	 *
	 *
	*/
	
	$requestmenu = wp_remote_get( LFDB_MENUS );
	$endpoint = '171';//local
	//$endpoint = '165';
	
	$requestmenu = wp_remote_get( LFDB_MENUS . $endpoint );
	$menu = wp_remote_retrieve_body( $requestmenu );
	$menu =  json_decode($menu);
	$menuItems = $menu->items;
	$item_count = 1;
?>
		<div class="wrapper-footer-menu">

			<nav id="social-logos">
				<a href="http://www.facebook.com/pages/La-Fabrique-de-Blogs/11175663812?ref=ts" target="_blank" class="facebook"><span>facebook</span></a>
				<a href="https://twitter.com/FabriqueDeBlogs" target="_blank" class="twitter"><span>twitter</span></a>
				<a href="https://www.google.com/maps/place/La+Fabrique+de+Blogs/@45.5230977,-73.583539,17z/data=!4m5!3m4!1s0x4cc91bcb8f86185b:0x2fbcd766b4e1e76f!8m2!3d45.523094!4d-73.581345" target="_blank" class="google"><span>google</span></a>
				<a href="http://www.linkedin.com/company/la-fabrique-de-blogs" target="_blank" class="linkedin"><span>linkedin</span></a>
				<a href="https://instagram.com/fabriquedeblogs/" target="_blank" class="instagram"><span>instagram</span></a>
				<a href="http://feeds.feedburner.com/LaFabriqueDeBlogs" target="_blank" class="rss"><span>rss</span></a>
			</nav>
			
			
			<nav class="footer-menu">

			<?php foreach( $menuItems as $item ): ?>

				<a href="<?php echo $item->url;?>" data-id="<?php echo $item->id;?>" target="<?php echo $item->target;?>"><?php echo $item->title;?></a>
			
			<?php
				
				echo ( $item_count < count($menuItems) ) ? '<span class="sep">&nbsp;&bull;&nbsp;</span>' : '';
			
				$item_count++;
				
				endforeach;
			?>
			
			</nav>


					
		</div>
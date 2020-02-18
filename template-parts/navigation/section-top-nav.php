<?php
	
	/*
	 *	
	 *
	 *	LFDB
	 *	SECTION TOP BARRE
	 *
	 *
	 *
	*/
	
	$requestmenu = wp_remote_get( LFDB_MENUS );
	$endpoint = '170';//local
	//$endpoint = '165';
	
	$requestmenu = wp_remote_get( LFDB_MENUS . $endpoint );
	$menu = wp_remote_retrieve_body( $requestmenu );
	$menu =  json_decode($menu);
	$menuItems = $menu->items;
	$item_count = 1;
?>
		<div class="wrapper-second-menu">
			<ul class="second-menu">

			<?php foreach( $menuItems as $item ): ?>
			
				<li class="<?php echo $item->classes;?>"><a href="<?php echo $item->url;?>" data-id="<?php echo $item->id;?>"><?php echo $item->title;?></a></li>
			
			<?php if( $item_count < count($menuItems)):?>
			
				<li>&nbsp;·&nbsp;</li>
			
			<?php
				endif;
				$item_count++;
				
				endforeach;
			?>
			
			</ul>
		</div>
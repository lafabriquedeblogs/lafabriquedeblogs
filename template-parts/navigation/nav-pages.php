<?php
	
	/*
	 *	
	 *
	 *	LFDB
	 *	NAVIGATION PRINCIPALE
	 *
	 *
	*/
	
	/*
	 *	Menu Services
	*/	
	$requestmenu = wp_remote_get( LFDB_MENUS );
	$endpoint = '169';
	
	$requestmenu = wp_remote_get( LFDB_MENUS . $endpoint );
	$menu = wp_remote_retrieve_body( $requestmenu );
	$menu =  json_decode($menu);
	$menuItems = $menu->items;
	
	
	/*
	 *	Menu TOP
	*/
	$top_requestmenu = wp_remote_get( LFDB_MENUS );
	$top_endpoint = '170';//local
	
	$top_requestmenu = wp_remote_get( LFDB_MENUS . $top_endpoint );
	$top_menu = wp_remote_retrieve_body( $top_requestmenu );
	$top_menu =  json_decode($top_menu);
	$top_menuItems = $top_menu->items;

?>
	<ul id="main-nav" class="main-menu" role="navigation">
<?php		
		foreach( $menuItems as $item ):
			
			$children = (isset($item->children)) ? $item->children : null;
			
			$class = "";
			$sub_menu = false;
				
			if( $children !== null  ){
				$class = " has-children";
				$sub_menu = true;
			}
			
		
	?>
		<li class="page-item page-item-<?php echo $item->id;?><?php echo $class; ?>">
			<a href="<?php echo $item->url;?>" data-id="<?php echo $item->id;?>">
				<?php echo $item->title;?>
			</a>
			<?php
				
				if( $sub_menu ):
			?>


				<ul class="sub-menu">
				<?php
					foreach( $children as $item ):
						
						$grand_children = (isset($item->children)) ? $item->children : null;
						$class = "";
						$sub_menu = false;
						
						if( $grand_children !== null  ){
							$class = " see-children";
							$sub_menu = true;
						}
					
				?>
					<li class="page-item page-item-<?php echo $item->id;?><?php echo $class; ?>">
						<a href="<?php echo $item->url;?>" data-id="<?php echo $item->id;?>">
							<?php echo $item->title;?>
						</a>
						<?php
							
							if( $sub_menu  ):
						?>
						
							<ul class="sub-sub-menu">
							<?php foreach( $grand_children as $n_item ): ?>
								<li class="page-item page-item-<?php echo $n_item->id;?>">
									<a href="<?php echo $n_item->url;?>" data-id="<?php echo $n_item->id;?>">
										<?php echo $n_item->title;?>
									</a>
								</li>
							<?php endforeach; ?>
							</ul>				
						
							
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
				</ul>	
			<?php
				endif
			?>
		</li>
	<?php endforeach; ?>

	<?php foreach( $top_menuItems as $item ): ?>
		<li class="hide-large <?php echo $item->classes;?>"><a href="<?php echo $item->url;?>" data-id="<?php echo $item->id;?>"><?php echo $item->title;?></a></li>
	<?php endforeach; ?>

	</ul>
	<div id="under-menu-active"></div>
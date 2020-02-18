<?php

	$args = array(
		'posts_per_page'	=> -1,
		'post_type' 		=> 'realisations',
		'post_status'		=> 'publish'
	);
		
	$realisations_query = new Wp_Query( $args );
	$realisations = (array) $realisations_query->posts;	
	
	
	shuffle($realisations);
	list($realisations1, $realisations2) = array_chunk($realisations, ceil(count($realisations) / 2));	
?>


<div id="reals-slideshow-wrapper">
	
	<div id="reals-slideshow-1" class="reals-slidedeshow">		
		
		<div class="slider-image">
			<div id="slider-1">
				<?php
					foreach( $realisations1 as $real ):
						$image = get_the_post_thumbnail_url( $real->ID, 'realisations-slide' );
						$titre =  $real->post_title;
				?>
				<div><img src="<?php echo $image;?>" alt="<?php echo $titre;?>" width="540" height="340" /></div>
				<?php endforeach; ?>
			</div><!-- slider-1 -->
		</div><!-- slider-image -->
		
		<div id="slider-content-1" class="slider-content">
			<ul>
				<?php
					$key = 0;
					foreach( $realisations1 as $real ):
						$titre =  $real->post_title;
						$content = $real->post_content;
						$type_de_site = get_terms_liste( $real->ID );
						$services = get_tag_liste( $real->ID );
						
				?>
				<li data-key="<?php echo $key;?>">
					<h2><?php echo $titre;?></h2>
					<p><?php echo $content;?></p>
					<p class="client-meta">
						Type de site: <span class="slider-type-de-site"><?php echo $type_de_site;?></span></br>
						Service: <span class="slider-type-de-service"><?php echo $services;?></span>
					</p>
				</li>
				<?php
					$key++;
					endforeach;
				?>
			</ul>
			
		</div><!-- slider-content-1 -->
		
	</div><!-- reals-slideshow-1 -->
	
	<div id="reals-slideshow-2"  class="reals-slidedeshow">
		<div class="slider-image">
			<div id="slider-2">
				<?php
					foreach( $realisations2 as $real ):
						$image = get_the_post_thumbnail_url( $real->ID, 'realisations-slide' );
						$titre =  $real->post_title;
				?>
				<div><img src="<?php echo $image;?>" alt="<?php echo $titre;?>" width="540" height="340" /></div>
				<?php endforeach; ?>
			</div>	
		</div>
		<div id="slider-content-2" class="slider-content">
			<ul>
				<?php
					$key = 0;
					foreach( $realisations2 as $real ):
						$titre =  $real->post_title;
						$content = $real->post_content;
						$type_de_site = get_terms_liste( $real->ID );
						$services = get_tag_liste( $real->ID );
				?>
				<li data-key="<?php echo $key;?>">
					<h2><?php echo $titre;?></h2>
					<p><?php echo $content;?></p>
					<p class="client-meta">
						Type de site: <span class="slider-type-de-site"><?php echo $type_de_site;?></span></br>
						Service: <span class="slider-type-de-service"><?php echo $services;?></span>
					</p>
				</li>
				<?php
					$key++;
					endforeach;
				?>
			</ul>
		</div>			
	</div>
	
</div>
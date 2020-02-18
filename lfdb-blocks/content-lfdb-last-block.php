<?php
	/**
	* Block Name: Block plein largeur service
	*
	* This is the template that displays the testimonial block.
	*/
	$block_id = $block['id'];
	
	$position = 'debut';
	$position = get_field('position_du_block');
		
	//
	
	if( is_admin()){
?>

	<div class="lfdb-block lfdb-block-pleine-page" style="background-color: #ccc;padding: 15px;">
		<div class="lfdb-block-pleine-page">
			&laquo;!-- <?php echo $position;?> -- Ce block à pour but de séparer les blocks --&raquo;
		</div>
	</div>
<?php 
	}
	
	if( !is_admin() ){
		if( $position == 'debut' ){
?>
					</article>
				</div><!-- services-details -->
			</div><!-- services-content -->
			
			<div class="block-lfdb-fin services-content services-content-full">
				<article>
					<div class="entry-content">
<?php

		}

		if( $position == 'fin' ){
?>
			
					</div><!-- entry-content -->
				</article>
			<!-- #block-lfdb-fin -->

<?php
			
		}
	}
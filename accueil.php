<?php
/**
 * Template name: Accueil
 */
 
get_header();
 

 ?>
	
		<section id="positionnement" class="section">
			<div class="inner-section">
				<p>
<!-- 					<span class="orange hel bold">la_fabrique</span><span class="orange hel light">(</span><span class="light hel logo-text-inline">blogs</span><span class="orange hel light">)</span> -->
					<span class="lafabrique orange">la_fabrique</span><span class="parenthese orange">(</span><span class="blogs-logo gris">blogs</span><span class="parenthese orange">)</span> se spécialise dans les <span>sites</span>, <span>blogues</span>, <span>boutiques en ligne</span>, <span>intranets</span>, <span>extranets</span>, <span>sites multilingues</span>, propulsés par <span class="bleu">WordPress</span>.</p>				
			</div>
		</section>
		
		<section id="services" class="section">
			<div class="inner-section">
				<div class="header-section">
					<h2 class="section-title"><?php _e( 'Nos expertises', MYDOMAIN );?></h2>
				</div><!-- header-secction -->
				
				<div id="home-services">
					<div class="home-service--item">
						<a href="/site-wordpress">
							<h3>Type de site</h3>
							<p>Vous souhaitez lancer votre activité et augmenter votre visibilité en ligne ? La création d’un site WordPress est un excellent moyen pour représenter votre entreprise sur le web.</p>
						</a>
						<footer class="entry-footer">
							 <a class="lire-la-suite" href="/site-wordpress"><?php _e( 'Lire la suite', MYDOMAIN );?></a>
						</footer>
					</div><!-- .home-service--item -->
					<div class="home-service--item">
						<a href="/agence-web-montreal">
							<h3>Services</h3>
							<p>Vous prévoyez le lancement de votre site web prochainement ? Vous aimeriez que votre entreprise ait une présence en ligne optimale afin d’obtenir rapidement du trafic sur votre site ? </p>
						</a>
						<footer class="entry-footer">
							 <a class="lire-la-suite" href="/agence-web-montreal"><?php _e( 'Lire la suite', MYDOMAIN );?></a>
						</footer>
					</div><!-- .home-service--item -->
					<div class="home-service--item">
						<a href="/conception-web-wordpress">
							<h3>Fonctionnalités</h3>
							<p>Votre site WordPress est en préparation ? Que direz-vous de profiter des fonctionnalités infinies offertes par le CMS ?</p>
						</a>
						<footer class="entry-footer">
							 <a class="lire-la-suite" href="/conception-web-wordpress"><?php _e( 'Lire la suite', MYDOMAIN );?></a>
						</footer>
					</div><!-- .home-service--item -->
					<div class="home-service--item">
						<a href="/specialiste-wordpress">
							<h3>Expertise Wordpress</h3>
							<p>La conception de votre site WordPress vous semble complexe ? Vous n’êtes pas en mesure de créer l’apparence visuelle de votre site et de la rendre unique ?</p>
						</a>
						<footer class="entry-footer">
							 <a class="lire-la-suite" href="/specialiste-wordpress"><?php _e( 'Lire la suite', MYDOMAIN );?></a>
						</footer>
					</div><!-- .home-service--item -->
				</div><!-- #home-services -->
			</div>
		</section>
		
		<section id="realisations" class="section">
			<div class="inner-section">
				<div class="header-section">
					<h2 class="section-title"><?php _e( 'Réalisations', MYDOMAIN );?></h2>
					<div id="timer-slider-wrapper">
						<a id="timer-slider"><span>Timer</span>
							<div class="rotator"></div>
							<div class="pause"></div>
							<div class="play"></div>
						</a>
					</div>
				</div><!-- header-secction -->
				<?php get_template_part( 'template-parts/realisations-slider' );?>	
			</div>
		</section>

		<section id="blogue" class="section">
			<div class="inner-section">
				
				<h2 class="section-title"><?php _e( 'Blogue', MYDOMAIN );?> <a class="" href="/blogue">»</a></h2>
				
				<div class="posts-list"><!--  -->
					
					<?php
						$postsArray = array();
						
						$requestPages = wp_remote_get( LFDB_POSTS . "?per_page=3");
						$requestHeaders = wp_remote_retrieve_headers( $requestPages );
						
						$Allposts = wp_remote_retrieve_body( $requestPages );
						$Xposts = $requestHeaders['x-wp-total'];
						$Xpages = $requestHeaders['x-wp-totalpages'];
						
						$Allposts = json_decode($Allposts);
											
						foreach( $Allposts as $p_ost){
							
							$date = date_i18n( 'j F Y', strtotime( $p_ost->date ) );
							$terms_array = $p_ost->cats;
/*
							echo '<pre>';
							var_dump($terms_array);
							echo '</pre>';
*/
							$terms = array();
							foreach( $terms_array as $term ){
								$term_url = BLOG.$term->slug;
								$term_name = $term->name;
								$termOutput = '<a href="'.$term_url.'" class="entry-term">'.$term_name.'</a>';
								$terms[] = $termOutput;
							}
							$terms = implode(', ', $terms);
							
							$excerpt = give_me_excerpt_raw( $p_ost->excerpt->rendered,150 );
					?>		
				
							<article id="post-<?php the_ID(); ?>" <?php post_class("post-list--item"); ?>>
								<div class="flx">
									<div class="feat-image-post-list">
										<?php //fi_medium || category_thumb || fi_medium_th?>
										<img src="<?php echo $p_ost->category_thumb;?>" width="300" height="300" alt="<?php echo $p_ost->link;?>"/>
									</div>
									<header class="entry-header">
										<h2 class="entry-title effect"><a href="<?php echo $p_ost->link;?>" rel="bookmark"><?php echo $p_ost->title->rendered;?></a></h2>
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
										 <a class="lire-la-suite" href="<?php echo $p_ost->link;?>"><?php _e( 'Lire la suite', MYDOMAIN );?></a>
									</footer><!-- .entry-footer -->
								</div><!-- flex -->
							</article><!-- #post-<?php the_ID(); ?> -->
					
					<?php	
						}
				/**/		
					?>
				
				</div><!-- .posts-list -->
				
			</div><!-- .inner-section -->
		</section>

<?php

get_footer();

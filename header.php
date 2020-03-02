<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/d574218b4b.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K8HSX77" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php $nom = 'blogs';?>
	
<div id="page" class="site">
	
	<div id="wrapper-searchform">
		<form action="/" method="get" id="searchform">
			<!-- <input type="submit" id="searchsubmit" value="rechercher" /> -->
			<button type="submit" id="searchsubmit" form="searchform"><span>Rechercher</span></button>
			<div>
				<label>Rechercher</label>
				<input type="text" name="s" id="s" placeholder="Rechercher..." />
			</div>
		</form>
	</div>
	<?php get_template_part( 'template-parts/navigation/nav-pages' );?>	
	
	<header id="masthead" class="site-header masthead">
		
		<div class="wrapper-hamburger">
			<button class="hamburger hamburger--spin hamburger--accessible js-hamburger" type="button" aria-controls="primary-menu" aria-expanded="false">
			  <span class="hamburger-box"><span class="hamburger-inner"></span></span>
			  <span class="hamburger-label"><?php _e('MENU',MYDOMAIN); ?></span>
			</button>
		</div>
		
		<div class="site-branding">
			<a href="/">
				<span class="lafabrique">la_fabrique</span><span class="parenthese">(</span><span class="blogs-logo">blogs</span><span class="parenthese">)</span>
			</a>
		</div><!-- .site-branding -->
		
		<div class="wrapper-search">
			<a id="search-icon"><span>&times;</span></a>
		</div>
		<div class="wrapper-devis">
			<a class="devis" href="/demande-de-devis/">Demande de devis</a>
		</div>
		<div class="wrapper-phone">
			<a class="phone" href="tel:+15149933700">514 993-3700</a>
		</div>

		<?php get_template_part( 'template-parts/navigation/section-top-nav' );?>	


	
	</header><!-- #masthead -->	
		
	<div id="content" class="site-content">
	

	

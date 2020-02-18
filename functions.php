<?php
/**
 * lafabriquedeblogs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lafabriquedeblogs
 */

if ( ! function_exists( 'lafabriquedeblogs_setup' ) ) :
	
	$lafaburl = get_site_url();
	//$lafaburl = 'https://lafabriquedeblogs.com';
	define('LFDB_URL', $lafaburl.'/wp-json/');
	define('LFDB_MENUS', $lafaburl.'/wp-json/wp-api-menus/v2/menus/');
	define('LFDB_POSTS', $lafaburl.'/wp-json/wp/v2/posts/');
	define('LFDB_FMEDIA', $lafaburl.'/wp-json/wp/v2/media/');
	define('BLOG', '/blogue/category/');
	define('MYDOMAIN', 'lfdb');		

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function lafabriquedeblogs_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on lafabriquedeblogs, use a find and replace
		 * to change 'lafabriquedeblogs' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'lafabriquedeblogs', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'lafabriquedeblogs' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'lafabriquedeblogs_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		add_image_size( 'category-thumb', 600, 375, true ); // 300 pixels wide (and unlimited height)
		add_image_size( 'medium-thumb', 320, 200, true );
		add_image_size( 'services', 226, 280, true );
		add_image_size( 'realisations-slide', 540, 350, true );
	}
endif;
add_action( 'after_setup_theme', 'lafabriquedeblogs_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lafabriquedeblogs_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lafabriquedeblogs_content_width', 640 );
}
add_action( 'after_setup_theme', 'lafabriquedeblogs_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lafabriquedeblogs_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lafabriquedeblogs' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lafabriquedeblogs' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 2', 'lafabriquedeblogs' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'lafabriquedeblogs' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 3', 'lafabriquedeblogs' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add widgets here.', 'lafabriquedeblogs' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
}
add_action( 'widgets_init', 'lafabriquedeblogs_widgets_init' );

/**
* Dequeue jQuery Migrate script in WordPress.
*/
function isa_remove_jquery_migrate( &$scripts) {
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
    }
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' );


/**
 * Enqueue scripts and styles.
 */
function lafabriquedeblogs_scripts() {
	
	wp_deregister_script( 'wp-embed' );
	 
	wp_enqueue_style( 'lafabriquedeblogs-font-awesome', 'https://pro.fontawesome.com/releases/v5.6.3/css/all.css');
	wp_enqueue_style( 'lafabriquedeblogs-style-main', get_stylesheet_directory_uri().'/css/main.css');
	
	wp_enqueue_script( 'lafabriquedeblogs-app', get_stylesheet_directory_uri().'/js/min/app-min.js',array('jquery'), null,true );
	
	if( is_front_page() || is_home() || is_page( 'realisations' )){
		wp_enqueue_script( 'lafabriquedeblogs-slick', get_stylesheet_directory_uri().'/js/min/slick.min.js',array('jquery'), null,true );
	}
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lafabriquedeblogs_scripts' );


function add_font_awesome_5_cdn_attributes( $html, $handle ) {
    if ( 'lafabriquedeblogs-font-awesome' === $handle ) {
        return str_replace( 'media="all"', 'media="all" integrity="sha384-LRlmVvLKVApDVGuspQFnRQJjkv0P7/YFrw84YYQtmYG4nK8c+M+NlmYDCv0rKWpG" crossorigin="anonymous"', $html );
    }
    return $html;
}
add_filter( 'style_loader_tag', 'add_font_awesome_5_cdn_attributes', 10, 2 );


function lafabriquedeblogs_head(){
?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-K8HSX77');</script>
	<!-- End Google Tag Manager -->
	
	<script>(function(d) {var config={kitId:'ngx5yej',scriptTimeout:3000,async:true},h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)})(document);</script>
	<script>var slick_lafab = <?php echo ( is_home() || is_front_page() || is_page( 'realisations' ) ) ? "true" : "false"; ?>;</script>
<?php		
}

add_action('wp_head','lafabriquedeblogs_head');

function lafabriquedeblogs_footer(){
?>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c3f9d871604bb68" async="async"></script>
<?php
}
add_action('wp_footer','lafabriquedeblogs_footer');

function prepare_rest($data, $post, $request){
    $_data = $data->data;

    // Thumbnails
    $thumbnail_id = get_post_thumbnail_id( $post->ID );
    $thumbnailMedium = wp_get_attachment_image_src( $thumbnail_id, 'medium' );
    $thumbnailMediumThumb = wp_get_attachment_image_src( $thumbnail_id, 'medium-thumb' );
    $full = wp_get_attachment_image_src( $thumbnail_id, 'full' );
	$category_thumb = wp_get_attachment_image_src( $thumbnail_id, 'category-thumb' );
    //Categories
    $cats = get_the_category($post->ID);

    //next/prev
    
    $thenextPost = get_adjacent_post(false, '', true );
    $nextPost = $thenextPost->ID;

    $theprevPost = get_adjacent_post(false, '', false );
    $prevPost = $theprevPost->ID;

    $_data['fi_medium'] = $thumbnailMedium[0];
    $_data['fi_medium_th'] = $thumbnailMediumThumb[0];
    $_data['full'] = $full[0];
    $_data['category_thumb'] = $category_thumb[0];
    
    $_data['cats'] = $cats;
    
    $_data['next_post'] = $nextPost;
    $_data['previous_post'] = $prevPost;
    $data->data = $_data;

    return $data;
}

add_filter('rest_prepare_post', 'prepare_rest', 10, 3);


function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php 
    if ( 'div' != $args['style'] ) { ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
    } ?>
        <div class="comment-author vcard"><?php 
            if ( $args['avatar_size'] != 0 ) {
                echo get_avatar( $comment, $args['avatar_size'] ); 
            } 
            printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
 
         <span class="comment-meta">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
                /* translators: 1: date, 2: time */
                printf( 
                    __('%1$s at %2$s'), 
                    get_comment_date(),  
                    get_comment_time() 
                ); ?>
            </a>
        </span>
        
        </div><?php 
        if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
        } ?>

		
		<div class="comment-content">
	        <?php comment_text(); ?>
		</div>
		
        <div class="reply"><?php 
                comment_reply_link( 
                    array_merge( 
                        $args, 
                        array( 
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                ); ?>
        </div><?php 
    if ( 'div' != $args['style'] ) : ?>
        </div><?php 
    endif;
}

function custom_posts_per_page( $query ) {
    if ( $query->is_search() ) {
        set_query_var('posts_per_page', -1);
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

function wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
 
add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );


function give_title($id){
	$title = get_the_title($id);
	return $title;
}
function give_url($id){
	$url = get_permalink($id);
	return $url;
}
function give_picture($id,$size){
	$default_attr = array(
	   'class'	=> "",
	   'alt'	=> give_title($id),
	   'title'	=> give_title($id),
	);
	
	//$thumb_img = get_the_post_thumbnail($id, 'Petite',$default_attr);
	$thumb_img = wp_get_attachment_image_src( get_post_thumbnail_id($id), $size );
	$url_thumb_img = $thumb_img[0];
	
	return $url_thumb_img;
}

function give_me_excerpt($id,$chars){
	$raw = get_post($id);
	$content = $raw->post_content;
	$content = strip_shortcodes($content);
	$content = strip_tags($content);
	$content = substr($content, 0, $chars);
	$content = substr($content, 0, strripos($content, " "));
	$content.=' [...]';
	
	return 	$content;	
}

function give_me_excerpt_raw($string,$chars){
	//$raw = get_post($id);
	//$content = $raw->post_content;
	$content = strip_shortcodes($string);
	$content = strip_tags($content);
	$content = substr($content, 0, $chars);
	$content = substr($content, 0, strripos($content, " "));
	$content.=' [...]';
	
	return 	$content;	
}

function iam_admin(){
	$current_user = wp_get_current_user();
	if( is_user_logged_in() && user_can( $current_user, 'administrator' ) ){
		return true;
	}
	return false;
}

function get_terms_liste( $id ){
	$tax = 'cat_realisation';
	
	$term_list = wp_get_post_terms( $id, $tax, array("fields" => "all") );
	$term_list_array = array();
	foreach( $term_list as $single_term ){
		$term_list_array[] = $single_term->name;
	}
	$output = implode(', ', $term_list_array);
	return $output;
}

function get_tag_liste( $id ){
	$tax = 'type_de_service';
	
	$term_list = wp_get_post_terms( $id, $tax, array("fields" => "all") );
	$term_list_array = array();
	foreach( $term_list as $single_term ){
		$term_list_array[] = $single_term->name;
	}
	$output = implode(', ', $term_list_array);
	return $output;
}

function crunchify_print_scripts_styles() {
    // Print all loaded Scripts
    global $wp_scripts;
    foreach( $wp_scripts->queue as $script ) :
       // echo $script . '  **  ';
       echo '<pre>';
       	var_dump($script);
       echo '</pre>';
    endforeach;
 
    // Print all loaded Styles (CSS)
    global $wp_styles;
    foreach( $wp_styles->queue as $style ) :
        //echo $style . '  ||  ';
        echo '<pre>';
        	var_dump($style);
        echo '</pre>';
    endforeach;
}

//add_action( 'wp_print_scripts', 'crunchify_print_scripts_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Disable EMojis.
 */
require get_template_directory() . '/inc/remove-emojis.php';

require get_template_directory() . '/inc/acf_gutenberg.php';

require get_template_directory() . '/inc/wp-rocket-custom-preload-intervals.php';
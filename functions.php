<?php

    /**
    * Define default background image
    **/
	define('BACKGROUND_IMAGE',get_template_directory_uri().'/images/mp-background-tile.jpg');

    /**
    * Registers menu
    **/
    function register_my_menus() {
    	register_nav_menus(array('header-menu' => __( 'Header Menu' )));
    }
    add_action( 'init', 'register_my_menus' );

    /**
    * Add css
    **/
    function theme_styles() {
    	wp_enqueue_style( 'bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css' );
    	wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );
    }
    add_action( 'wp_enqueue_scripts', 'theme_styles');

    /**
    * Add js
    **/
    function theme_js() {
        // Register the script like this for a theme:
        wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ) );
        // For either a plugin or a theme, you can then enqueue the script:
        wp_enqueue_script( 'bootstrap', '', null, false, true );
    }
    add_action( 'wp_enqueue_scripts', 'theme_js' );

    /**
    * Add font-awersome
    **/
	function enqueue_our_required_stylesheets(){
		wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'); 
	}
	add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');

    /**
    * Cleans wp_head
    **/
    function clean_wp_head () {
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
        add_filter('the_generator', '__return_false');
        add_filter('show_admin_bar','__return_false');
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
    }
    add_action('after_setup_theme', 'clean_wp_head');

	/**
	 * Register our sidebars and widgetized areas.
	 *
	 */
	function widgets_init() {

		register_sidebar( array(
			'name'          => 'Home right sidebar',
			'id'            => 'home_right_1',
			'before_widget' => '<div id="widget" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="rounded">',
			'after_title'   => '</h2>',
		) );

	}
	add_action( 'widgets_init', 'widgets_init' );

	/**
	 * Add image header
	 *
	 */
	$args = array(
	    'flex-width'    => true,
	    'width'         => 800,
	    'flex-height'   => true,
	    'height'        => 300,
	    'default-image' => get_template_directory_uri() . '/images/header.jpg',
	);
	add_theme_support( 'custom-header', $args );

function ctx_aj_site_title(){

//Get the theme options
$themeOpts = get_option('ctx-adventurejournal-options');
$themeTitle = $themeOpts['title-type'];

//Check if a site title option has been set, if not use the default value
if (!isset($themeTitle)){
	$themeTitle = 'title-default';
}

//Check and see if the site title option is set to default or custom logo option
if($themeTitle == 'title-default' || $themeTitle == 'title-logo'){
	?>
	<div id="logo">
	  <div id="logo-2">
		<div id="logo-3">
		  <table><tr><td>
              <?php
			  //Display the default styling
              if($themeTitle == 'title-default'){
			   ?>
              <div id="site-title"><a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				  <?php bloginfo( 'name' ); ?>
				  </a></div>
				<?php $sitedescr = get_bloginfo('description','display'); echo (empty($sitedescr)) ? '' : sprintf('<div id="site-description">%s</div>',$sitedescr);
			  //Display the custom logo
              } else {
			  ?>
              	<a href="<?php echo home_url( '/' ) ?>"><img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].'/'.$themeOpts['logo-path'];?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
              <?php
              }
			  ?>
          </td></tr></table>
		</div>
	  </div>
	</div>
	<?php
	}
}


?>
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
        wp_enqueue_script( 'bootstrap', '', null, false, false );
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

    add_filter('post_gallery','responsiveGallery',10,2);

    function responsiveGallery($string,$attr) {

        $output = '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">';
        $output .= '<div class="carousel-inner" role="listbox">';

        $posts = get_posts(array('include' => $attr['ids'],'post_type' => 'attachment'));


        foreach($posts as $key => $imagePost) {
            if ($key == 0) {
                $output .= '<div class="item active">';
            } 
            else {
                $output .= '<div class="item">';
            }

            $output .= "<img src='".wp_get_attachment_image_src($imagePost->ID, 'small')[0]."'>";
            $output .= '<div class="carousel-caption">';
            $output .= $imagePost->post_excerpt;
            $output .= '</div>';
            $output .= '</div>';
        }

        $output .= '</div>';

        $output .= 
            '<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>';

        $output .= '</div>';

        return $output;
    }


    function render_table($atts, $content) {
        $rows = array_values(array_filter(explode("\n", strip_tags($content))));
        $output = '<table class="table">';
        $headers = explode(",", $rows[0]);
        $output .= '<thead><tr>';
        foreach ($headers as $header) {
            $output .= '<th>'.$header.'</th>';
        }
        $output .= '</tr></thead>';
        $output .= '<tbody>';
        foreach ($rows as $key => $r) {
            if ($key < 1) continue;
            $output .='<tr>';
            $row = explode(",", $r);
            
            foreach ($row as $cell) {
                $output .= '<td>'.$cell.'</td>';
            }
            $output .='</tr>';
        }
        $output .='</tbody>';       
        $output .= '</table>';

        return $output;
    }
    add_shortcode( 'table', 'render_table' );

?>

    

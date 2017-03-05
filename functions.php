<?php
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
        wp_enqueue_script( 'bootstrap' );
    }
    add_action( 'wp_enqueue_scripts', 'theme_js' );


?>
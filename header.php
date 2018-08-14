<?php require get_template_directory() . '/inc/navwalker.php';?>

<!DOCTYPE html>
    <html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <?php wp_head(); ?>
    </head>
    <?php //echo '<body class="'.join(' ', get_body_class()).'">'.PHP_EOL; ?>
    <body>
    <div class='container-fluid'>
        <div class='row allPage'>
        <!--<div class='row' id='main_row'>
            <div class='col-sm-10 col-sm-offset-1' id='main_offset'>-->
            <!--class='col-lg-6 col-lg-offset-5 col-md-9 col-md-offset-2 col-sm-10 col-sm-offset-1-->
                <div class='row' id='menu_row'>
                    <div class='col-sm-12' id='menu_col'>
                    <!--<div class='col-xs-10 col-xs-offset-1' id='menu_col'>-->
                        <nav class="navbar" role="navigation">
                                <div class="navbar-header">
                                    <a class="navbar-brand" href="">
                                        <img class="brand" alt="Brand" src="http://wordpress.test/wp-content/uploads/2018/02/quadrifoglio_color.jpg">
                                    </a>
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>

                                <?php
                                    wp_nav_menu( array(
                                        'menu'              => 'header-menu',
                                        'theme_location'    => 'header-menu',
                                        'depth'             => 2,
                                        'container_class'   => 'collapse navbar-collapse',
                                        'container_id'      => 'navbar',
                                        'menu_class'        => 'nav navbar-nav',
                                        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                        'walker'            => new wp_bootstrap_navwalker())
                                    );
                                ?>
                        </nav>
                    </div>
                </div>    
    	<!--<?php if (!is_front_page()):?>
    		<h1><?php the_title();?></h1>
    	<?php endif;?>-->






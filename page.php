
<?php 
	get_header();
	$header_img = get_custom_header();
?>


<div class='row page'>
	<div class='col-sm-12'>	
		<div class='row headerImage'>
			<div class='col-xs-12 hidden-xs' id='headerimage'
				style='background-image: url(<?php echo $header_img->url; ?>); padding-top: <?php echo ($header_img->height/$header_img->width) * 100 * 0.83; ?>%''>
				<div class='logo hidden-sm'>
					<a href="<?php echo home_url('/') ?>"><?php echo get_bloginfo('name'); ?></a>
					<p><?php echo get_bloginfo('description'); ?></p>
				</div>
			</div>
		</div>
		<div class='row mainPage'>
			<div class='col-lg-9 col-md-8' id='main-page'>
		    	<?php if (!is_front_page()):?>
		    		<h1><?php the_title();?></h1>
		    	<?php endif;?>
				<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				?>
			</div>

			<div class='col-lg-3 col-md-4' id='sidebar-div'>
				<?php
					get_sidebar();
				?>
			</div>
		</div>
	</div>
</div>

<?php
	get_footer();
?>





<?php 
	get_header();
	$header_img = get_custom_header();
?>


<div class='row'>
	<div class='col-sm-10 col-sm-offset-1' id='all_page'>
		
		<div class='row'>
			<div class='col-xs-10 col-xs-offset-1 hidden-xs' id='headerimage'
				style='background-image: url(<?php echo $header_img->url; ?>); padding-top: <?php echo ($header_img->height/$header_img->width) * 100 * 0.83; ?>%''>
				<div class='logo'>
					<a href="<?php echo home_url('/') ?>"><?php echo get_bloginfo('name'); ?></a>
					<p><?php echo get_bloginfo('description'); ?></p>
				</div>
			</div>
		</div>
		<div class='row' id='page'>
			<div class='col-md-9' id='main-page'>
		    	<?php if (!is_front_page()):?>
		    		<h1><?php the_title();?></h1>
		    	<?php endif;?>
				<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				?>
			</div>

			<div class='col-md-3 col-md-offset-0 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1' id='sidebar-div'>
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




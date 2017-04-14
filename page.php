
<?php 
	get_header(); 
?>


<div class='row'>
	<div class='col-md-10 col-md-offset-1' id='all_page'>
		<div class ='row  hidden-xs'><?php ctx_aj_site_title() ;?></div>
			<div class=class='col-lg-12' id='div-headerimage'>
				<a href="<?php echo get_home_url(); ?>">
					<img id="banner" alt="" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>">
				</a>
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




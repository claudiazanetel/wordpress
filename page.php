
<?php 
	get_header(); 
?>


<div class='row'>
	<div class='col-lg-10 col-lg-offset-1' id='all_page'>
		<div class='row'>
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

			<div class='col-md-3' id='sidebar-div'>
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




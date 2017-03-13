
<?php 
	get_header(); 
?>


<div class='row'>
	<div class='col-sm-10 col-sm-offset-1' id='all_page'>
		<div class='row'>
			<div class='col-sm-9'>
		    	<?php if (!is_front_page()):?>
		    		<h1><?php the_title();?></h1>
		    	<?php endif;?>
				<?php
					while ( have_posts() ) : the_post();
						the_content();
					endwhile;
				?>
			</div>

			<div class='col-sm-3'>
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




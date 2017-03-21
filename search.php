<?php 
	get_header(); 
?>


<div class='row'>
	<div class='col-sm-10 col-sm-offset-1' id='all_page'>
		<div class='row'>
			<div class='col-md-9' id='main-page'>
				<?php
					while ( have_posts() ) : the_post();
						the_title('<h1>', '</h1>');
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








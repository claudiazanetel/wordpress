<?php
	get_header(); 
	//echo ('aaa');
?> 
<?php
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
	get_footer();
?>
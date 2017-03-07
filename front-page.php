<?php
	get_header(); 
	//echo ('aaa');
?>
<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?> 
<?php
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
	get_footer();
?>
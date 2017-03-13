

<div class="container">
	<div class='row'>
		<div class = 'col-sm-10 col-sm-offset-1'>
			<div class="row">
				<?php 
					get_header(); 
				?>
			</div>
			<div class='row'>
				<div class ='col-sm-12' id="all_page">
					<div class='row'>
						<div class='col-sm-9'>
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
			<div class='row'>
				<div class='col-sm-12'>
					<?php
						get_footer();
					?>
				</div>
			</div>
		</div>
	</div>
</div>

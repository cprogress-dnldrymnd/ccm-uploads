<?php
get_header();
?>
<div class="page-wrap home-page">
	<section class="four-o-four">	
		<div class="container the-content">	
			<div class="title-box">	
				<h1>
					<?= carbon_get_theme_option('error404_title') ?>
				</h1>
			</div>
			<div class="content-box">
				<p>	
					<?= carbon_get_theme_option('error404_description') ?>
				</p>
			</div>
		</div>
	</section>
</div>

<?php
get_footer();
?>
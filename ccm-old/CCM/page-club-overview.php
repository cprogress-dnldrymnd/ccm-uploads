<?php
/**
    *   Template Name: CLUB CCM: Overview
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$overviewTitle=get_field('owners_overview_title');
$page_name = 'Overview';
if(is_user_logged_in()) {
	wp_redirect('https://www.ccm-motorcycles.com/club-news'); exit;
}
?>
<main class="news careers club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<section class="careers-sc-one overview-sec">
		<div class="container">
			<div id="Overview">
				<div class="overview_content">
					<?php if($overviewTitle) { ?>
						<h2><?php echo $overviewTitle; ?></h2>
					<?php } ?>
					<?php if (have_posts()) { ?> 
						<?php while (have_posts()){ ?> 
							<?php the_post(); ?>
							<?php the_content(); ?>
						<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
</main>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
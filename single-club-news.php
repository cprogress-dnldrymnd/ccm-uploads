<?php
/**
    *   Template Name: Club CCM Event Single *
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.*
*/
get_header();
$page_name = 'Club News';
$user_id =  get_current_user_id();
$pfx_date = get_the_date( 'Y-M-d', $post->ID );
$ex_date=explode('-',$pfx_date);
?>

<main class="news careers page-template-page-owners events-main club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()) { ?>
		<?php if ( have_posts() ) { ?>
			<?php while ( have_posts() ) { ?>
				<?php the_post(); ?>
				<?php
				$thumb = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
				$start = carbon_get_the_post_meta( 'crb_event_start' ); 
				$end = carbon_get_the_post_meta('crb_event_end');
				$get_the_title = get_the_title();
				?>
				<section class="events-section-banner">
					<div class="container tight width1116">
						<div class="row">
							<div class="col-md-2">
								<div class="m-d-y-a-name">
									<div class="m-d-y">
										<h3 class="m-n"><?= $ex_date[1]; ?></h3>
										<h2 class="d-n"><?= $ex_date[2]; ?></h2>
										<h3 class="y-n"><?= $ex_date[0]; ?></h3>
									</div>
								</div>
							</div>
							<div class="col-md-10">
								<div class="img ctr cvr" style="background-image: url(<?= $thumb ?>)">
									<div class="inner">
										<div class="title-box">
											<h2>
												<?= $get_the_title ?>
											</h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="post-content">
					<div class="container tight width1116">
						<div class="row">
							<div class="col-md-2">
								
							</div>
							<div class="col-md-10">
								<div class="the-content">
									<?php the_content() ?>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="back text-center">
					<div class="container tight width1116">
						<div class="row">
							<div class="col-md-2">
								
							</div>
							<div class="col-md-10">
								<a class="btn ghost-btn red-b" href="http://www.ccm-motorcycles.com/club-news/">BACK TO CLUB NEWS</a>
							</div>
						</div>
					</div>
				</section>
			<?php } ?>
		<?php } ?>
	<?php } ?>
</main>

<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
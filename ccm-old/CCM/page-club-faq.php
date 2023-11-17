<?php
/**
    *   Template Name: CLUB CCM: FAQ
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$faqs = get_field('faq_group');
$page_name = 'FAQs';
$user = wp_get_current_user();
if ( !(in_array( 'ccm_owner', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles )) ) {
	wp_redirect('https://www.ccm-motorcycles.com/club-news'); exit;
}
?>

<main class="faq-page mid-section page-template-page-owners club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()){ ?>
		<section class="heading">	
			<div class="container tight width1116">
				<div class="title-box">
					<h1 class="title">
						FAQs
					</h1>
				</div>
				<div class="sub-content">
					<?php the_content() ?>
				</div>
			</div>
		</section>
		<section class="faqs-sec">
			<div class="container tight width1116">
				<div class="row">
					<?php if(!empty($faqs)) { ?>
						<div class="col-sm-4">
							<ul class="nav nav-pills ">
								<?php foreach ($faqs as $key => $faq ) { ?>
									<li class="<?php echo $key == 0 ? 'active' : ''; ?>"><a data-toggle="tab" href="#tab<?php echo $key; ?>"><?php echo $faq['faq_title']; ?></a></li>
								<?php } ?>
							</ul>
						</div>
					<?php } ?>
					<div class="col-sm-8">
						<div class="tab-content">
							<?php foreach ($faqs as $key => $faq ) { ?>
								<div id="tab<?php echo $key; ?>" class="tab-pane fade in <?php echo $key == 0 ? 'active' : ''; ?>">
									<p><?php echo $faq['faq_descriptions']; ?></p>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
				<!-- <div class="title-box">
					<p>
						We have a video showing how to remove the fuel tank which could be posted here
					</p>
				</div> -->
			</div>
		</section>
	<?php }  ?>
</main>



<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
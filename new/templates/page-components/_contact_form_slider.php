<?php
$heading = $page_component['heading'];
$description = $page_component['description'];
$contact_form_shortcode = $page_component['contact_form_shortcode'];
$diplay_bike_models = $page_component['diplay_bike_models'];
$is_iframe = $page_component['is_iframe'];


if ($slider == true) {
	$section_class = '';
	$div_class = 'col-md-6';
	$id = $page_component['id'];
} else {
	$section_class = 'not-slider';
	$id = '';
	$div_class = 'col-md-12';
}
if ($is_iframe) {
	$form_link = $contact_form_shortcode;
	$utm_medium = isset($_GET['utm_medium']) ? '&custentity_ccm_campaign_medium=' . $_GET['utm_medium'] : '';
	$utm_campaign = isset($_GET['utm_campaign']) ? '&custentity_ccm_campaign_name=' . $_GET['utm_campaign'] : '';
	$utm_content = isset($_GET['utm_content']) ? '&custentity_ccm_utm_content=' . $_GET['utm_content'] : '';
	$utm_source = isset($_GET['utm_source']) ? '&custentity_ccm_web_campaign_src=' . $_GET['utm_source'] : '';
	$product_name = isset($_GET['product_name']) ? '&custentity_ccm_product_name=' . $_GET['product_name'] : '';
	$form_final_link = $form_link . $utm_medium . $utm_campaign . $utm_content . $utm_source . $product_name;
}
?>
<section class="enquire-now-modal <?= $is_iframe ? 'is-iframe' : '' ?> <?= $section_class ?>" id="<?= $id ?>" data-id="<?= $section_id ?>" page="<?php the_title() ?>">
	<div class="container-fluid">
		<div class="row">
			<?php if ($slider == true) { ?>
				<div class="col-md-6 exit-col">
					<div class="valign">
						<div class="exit middle text-center">
							<a class="exit-modal" data-target="#<?= $id ?>"><i class="fas fa-times"></i></a>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="<?= $div_class ?> contact-form">
				<div class="shortcode valign">
					<div class="middle">
						<?php if ($heading) { ?>
							<div class="heading black medium semibold">
								<h2><?= $heading ?></h2>
								<?= wpautop($description) ?>
							</div>
						<?php } ?>

						<?php if ($diplay_bike_models) { ?>
							<?= do_shortcode('[bike_models]'); ?>
						<?php } ?>
						<?php if ($is_iframe) { ?>
							<iframe id="netsuite-form" src="<?= $form_final_link ?>" width="100%" style=" width: 100%; height: 100%; border: none; "></iframe>
						<?php } else { ?>
							<?= do_shortcode($contact_form_shortcode); ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
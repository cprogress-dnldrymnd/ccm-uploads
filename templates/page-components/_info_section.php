<?php
$heading = $page_component['heading'];
$description = $page_component['description'];
$image = $page_component['image'];
$button_text = $page_component['button_text'];
$button_link = $page_component['button_link'];
$style = $page_component['style'];
if ($style == 'style_2') {
	$width = 'witdh1700';
	$btn_class = 'pc-btn white anchor-modal';
	$heading_class = 'light';
	$section_class = 'style-2';
}
else {
	$width = 'witdh1800';
	$btn_class = 'anchor-modal';
	$heading_class = 'semibold medium';
	$section_class = 'style-1';
}
?>

<section class="info-section img ctr cvr <?= $section_class ?>" style="<?= get_bg_image($image) ?>">
	<div class="container <?= $container_width ?>">
		<div class="inner">
			<?php
			if ($heading) {
				echo get_heading($heading, $heading_class);
			}
			?>
			<?= get_description($description, 'white') ?>
			<div class="button-group d-flex" data-aos="fade-up" data-aos-duration="500">
				<?= get_button($button_text, $button_link, true, $btn_class, true, false) ?>
				<?php
				if (get_post_type() == 'bikes') {
					echo do_shortcode('[phone_number class="white desktop-only" dynamic=1]');
				}
				?>
			</div>
		</div>
	</div>
</section>
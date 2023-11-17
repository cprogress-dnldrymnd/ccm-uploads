<?php 
$image_carousel = $page_component['image_carousel'];
$heading = $page_component['heading'];
$description = $page_component['description'];
$description_top = $page_component['description_top'];
?>
<section class="fading-owl-carousel v2" id="<?= $section_id ?>">
	<div class="container">
		<div class="inner">
			<?= get_description($description_top, 'text-center white p-3') ?>
			<div class="owl-carousel" id="fading-owl">
				<?php foreach($image_carousel as $image) { ?>
					<div class="item">
						<div class="img ctr ctn nrp" style="<?= get_bg_image($image) ?>">
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="content-wrapper">
		<div class="container">
			<div class="contents">
				<?= get_heading($heading, 'text-center big semibold', 'h1') ?>
				<?= get_description($description, 'text-center white') ?>
			</div>
		</div>
	</div>
</section>
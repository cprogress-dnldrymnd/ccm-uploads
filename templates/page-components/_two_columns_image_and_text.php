<?php 
$image = $page_component['image'];
$heading = $page_component['heading'];
$description = $page_component['description'];
$buttons = $page_component['buttons'];
?>
<section class="two-column" id="<?= $section_id ?>">
	<div class="container <?= $container_width ?>">
		<div class="row">
			<div class="col-md-7">
				<div class="inner">
					<div class="img ctn nrp btm" style="<?= get_bg_image($image, 'large') ?>"></div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="inner valign">
					<div class="middle">
						<?= get_heading($heading, 'semibold medium') ?>
						<?= get_description($description, 'white') ?>
						<?php foreach($buttons as $button) { ?>
							<?= get_button($button['button_text'], $button['button_link'],true,  'pc-btn', false) ?>
						<?php } ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
$heading = $page_component['heading'];
$description = $page_component['description'];
$colourways = $page_component['colourways'];
$style = $page_component['style'];
$price = $page_component['price'];
$buttons = $page_component['buttons'];
$colourways_column = $page_component['colourways_column'];
$bottom_text = $page_component['bottom_text'];
?>

<section class="colourways">
	<div class="bar">
		<div class="container <?= $container_width ?>">
			<?= get_heading($heading, 'heading-box light') ?>
		</div>
	</div>
	<div class="content-row">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-12" data-aos="fade-up" data-aos-duration="500">
					<?= get_description($description, 'top-paragraph') ?>
				</div>
				<?php foreach($colourways as $colourway) { ?>
					<div class="<?= $colourways_column ?>" >
						<div class="inner big-image">
							<h3><?= $colourway['heading'] ?></h3>
							<img src="<?= get_image_url($colourway['image'], 'large') ?>" class="img zoooom no-lazyload"/>
							<?php if($style == 'style-2' || $style == 'style-3') { ?>
								<?php if($colourway['price']) { ?>
									<div class="price-con">
										<span class="label">
											OTR from
										</span>
										<span class="price">
											<?= $colourway['price'] ?>
										</span>
									</div>
								<?php } ?>
							<?php } ?>
							<?php if($style == 'style-2') { ?>
								<?php if($colourway['buttons']) { ?>
									<div class="btn-box d-block">
										<?php foreach($colourway['buttons'] as $key => $button) { ?>
											<?php
											if($key == 0) {
												$class = 'pc-btn white border';
											} else {
												$class = 'pc-btn';
											}	
											?>
											<?= get_button($button['button_text'], $button['button_link'], false, $class, false) ?>
										<?php } ?>
									</div>
								<?php } ?>
							<?php } ?>

						</div>
					</div>
				<?php } ?>
			</div>
			<?php if($style == 'style-1' && $price) { ?>
				<div class="price-con text-center" data-aos="fade-up" data-aos-duration="500">
					<span class="price-label">
						OTR from
					</span>
					<span class="price">
						<?= $price ?>
					</span>
				</div>
			<?php } ?>
			<?php if(($style == 'style-1' || $style == 'style-3') && $buttons) { ?>
				<div class="btn-box  text-center configure-enquire-btn" data-aos="fade-up" data-aos-duration="500">
					<?php foreach($buttons as $key => $button) { ?>
						<?php
						if($key == 0) {
							$class = 'pc-btn white anchor-modal border';
						} else {
							$class = 'pc-btn anchor-modal';
						}	
						?>
						<?= get_button($button['button_text'], $button['button_link'], false, $class, false) ?>
					<?php } ?>
				</div>
			<?php } ?>
			<?php if($bottom_text) { ?>
				<div class="list-box" data-aos="fade-up" data-aos-duration="500">
					<?= wpautop( $bottom_text ) ?>
				</div>
			<?php } ?>

		</div>
	</div>
</section>
<?php 
$shortcode = $page_component['shortcode'];
$mobile_parts = $page_component['mobile_parts'];
$top_text = $page_component['top_text'];
$bottom_text = $page_component['bottom_text'];
?>

<section class="bike-parts v2" style="background: #101010 !important;" id="<?= $section_id ?>">
	<div class="container">
		<div class="inner valign">
			<div class="middle">
				<?php if($top_text) { ?>

					<div class="heading text-center with-line">
						<span class=""> 
							<?= $top_text ?>
						</span>
					</div>
				<?php } ?>

				<div class="the-bike">
					<?php if($shortcode) { ?>
						<div class="image-hotspots">
							<?= do_shortcode( $shortcode ) ?>
						</div>
					<?php } ?>
					<?php if($mobile_parts) { ?>
						<div class="mobile-text show767">
							<?php foreach($mobile_parts as $mobile_part) { ?>
								<span><?= $mobile_part['part_name'] ?></span>
							<?php } ?>
						<?php } ?>
					</div>
					<div class="description  text-center bottom-text">
						<?php if($bottom_text) { ?>
							<?= wpautop( $bottom_text ) ?>
						<?php } ?>
					</div>

				</div>
			</div>
		</div>
	</section>
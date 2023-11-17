<?php  
$heading = $page_component['heading'];
$description = $page_component['description'];
$buttons = $page_component['buttons'];
?>

<section class="cta-modal" data-aos="fade-up" data-aos-duration="500">
	<div class="contents cta-style light">
		<div class="container wide witdh1800">
			<div class="outer">
				<div class="inner float-left d-flex">
					<?php if($heading) { ?>
						<h2><?= $heading ?></h2>
					<?php } ?>
					<?php if($description) { ?>
						<span><?= $description ?></span>
					<?php } ?>
				</div>
				<?php if($buttons) { ?>
					<div class="inner float-right d-flex btn-box with-margin">
						<?php foreach($buttons as $key => $button) { ?>
							<?php
							if($key == 0) {
								$class = 'pc-btn black';
							} else {
								$class = 'pc-btn';
							}	
							?>
							<?= get_button($button['button_text'], $button['button_link'], false, $class, false) ?>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php 
$bike_colors = $page_component['bike_colors'];
?>

<?php if(get_the_ID() == 11195) { ?>
	
	<section class="bike-colors v3">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="tab-content">
						<?php foreach($bike_colors as $key => $bike_color) { ?>
							<?php 
							$nav_class = $key == 0 ? 'active' : '';
							$bike_class = $key == 0 ? 'active in' : '';
							?>
							<div id="bike-<?= $key ?>" class="tab-pane fade <?= $bike_class ?>">
								<a href="<?= get_image_url($bike_color['image']) ?>" data-fancybox="gallery">
									<img src="<?= get_image_url($bike_color['image'], 'large') ?>" title="Click to zoom" alt="Bike Image">
								</a>
								<div class="price-holder">
									<h3><?= $bike_color['bike_color_name'] ?></h3>
									<p><?= $bike_color['price'] ?></p>
								</div>
							</div>
						<?php } ?>

						<ul class="nav nav-tabs nav-justified" id="services-tabs">

							<?php foreach($bike_colors as $key => $bike_color) { ?>
								<?php 
								$nav_class = $key == 0 ? 'active' : '';
								?>
								<li class="<?= $nav_class ?>">
									<a data-toggle="tab" href="#bike-<?= $key ?>" aria-expanded="false">
										<img src="<?= get_image_url($bike_color['color_image'], 'medium') ?>">
									</a>
								</li>
							<?php } ?>

						</ul>
					</div>
				</div>
			</div>
		</section>
	<?php } else { ?>

		<section class="bike-colors v2">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="tab-content">
							<?php foreach($bike_colors as $key => $bike_color) { ?>
								<?php 
								$nav_class = $key == 0 ? 'active' : '';
								$bike_class = $key == 0 ? 'active in' : '';
								?>
								<div id="bike-<?= $key ?>" class="tab-pane fade <?= $bike_class ?>">
									<a href="<?= get_image_url($bike_color['image']) ?>" data-fancybox="gallery">
										<img src="<?= get_image_url($bike_color['image'], 'large') ?>" title="Click to zoom" alt="Bike Image">
									</a>
									<div class="price-holder">
										<h3><?= $bike_color['bike_color_name'] ?></h3>
										<p><?= $bike_color['price'] ?></p>
									</div>
								</div>
							<?php } ?>

							<ul class="nav nav-tabs nav-justified" id="services-tabs">
								<?php foreach($bike_colors as $key => $bike_color) { ?>
									<li class="<?= $nav_class ?>">
										<a data-toggle="tab" href="#bike-<?= $key ?>" aria-expanded="false">
											<img src="<?= get_image_url($bike_color['color_image'], 'medium') ?>">
										</a>
									</li>
								<?php } ?>

							</ul>
						</div>
					</div>
				</div>
			</section>

			<?php } ?>
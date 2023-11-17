<?php 
$heading = $page_component['heading'];
$style = $page_component['style'];
$technical_specifications = $page_component['technical_specifications'];
?>

<section class="technical-specifications technical-specifications-js <?= $style ?>" id="<?= $section_id ?>">
	<?php if($style == 'style_2' ) {  ?>
		<div class="bar">
			<div class="container <?= $container_width ?>">
				<?= get_heading($heading, 'heading-box light') ?>
			</div>
		</div>
	<?php } ?>
	<div class="tabs-holder">
		<div class="container">
			<div class="inner">
				<div class="heading medium semibold black text-center">
					<?php if($style != 'style_2' ) {  ?>
						<h2><?= $heading ?></h2>
					<?php } ?>
					<span class="subheading toggle">
						<?php foreach($technical_specifications as $skey => $specs) { ?>
							<?php $class = $skey == 0 ? 'active': ''; ?>
							<span class="<?= $class ?>" data-target=".data-<?= $skey.'-'.$key ?>"><?= $specs['navigation'] ?></span> 
						<?php } ?>

					</span>
				</div>
				<div class="specs" data-aos="fade-up" data-aos-duration="500">
					<?php foreach($technical_specifications as $skey => $specs) { ?>
						<?php 
						$class = $skey == 0 ? 'open': '';
						$specification = $specs['specification'];
						?>
						<div class="the-specs data-<?= $skey.'-'.$key ?> <?= $class ?>">
							<table>
								<tbody>
									<?php foreach($specification as $spec) { ?>
										<tr>
											<td><span><?= $spec['specs_label'] ?></span></td>
											<td><span><?= $spec['specs_value'] ?></span></td>
										</tr>
									<?php } ?>

								</tbody>
							</table>

						</div>
						<?php  ?>
						<?php if(count($specification) > 7) { ?>
							<div class="expand-collapse-btn">
								<div class="expand-specs-button btn-expand text-center">
									<span class="parent" next=".chassis-engine-breaks"> <span class="plus icon">+</span> <span class="text">Expand specification</span></span>
								</div>
								<div class="expand-specs-button btn-collapse text-center dist-none">
									<span class="parent" next=".chassis-engine-breaks"> <span class="plus icon">-</span> <span class="text">Collapse specification</span></span>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					
				</div>
			</div>
		</div>
	</div>
</section>
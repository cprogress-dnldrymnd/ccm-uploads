<?php 
$justified_gallery = $page_component['justified_gallery'];
?>
<?php if ($justified_gallery) { ?>
	<section class="gallery bike-gallery" id="bike-gallery" data-id="<?= $section_id ?>">
		<div class="images">
			<?php foreach ($justified_gallery as $key => $gallery) { ?>
				<a id="image-<?= $key ?>" href="<?= wp_get_attachment_image_url( $gallery, 'full' ) ?>">
					<img src="<?= wp_get_attachment_image_url( $gallery, 'full' ) ?>"/ class="no-lazyload">
				</a>
			<?php } ?>
		</div>
	</section>
	<?php } ?>
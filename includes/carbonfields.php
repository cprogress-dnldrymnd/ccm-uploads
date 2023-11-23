<?php

function get_image_url($image_id, $size = 'full')
{
	return wp_get_attachment_image_url($image_id, $size);
}

function get_bg_image($image_id, $size = 'full')
{
	return 'background-image: url(' . get_image_url($image_id, $size) . ')';
}

function get_heading($heading, $class = '', $tag = 'h2')
{
	ob_start();
?>
	<div class="heading <?= $class ?>" data-aos="fade-up" data-aos-duration="500">
		<<?= $tag ?>><?= $heading ?></<?= $tag ?>>
	</div>
	<?php
	return ob_get_clean();
}


function get_button($text, $link, $wrapper = true, $class = '', $icon = true, $data_aos = true)
{
	if ($text) {
		ob_start();
	?>
		<?php if ($wrapper) { ?>
			<div class="btn-box">
			<?php } ?>
			<a class="anchor-modal <?= $class ?>" href="<?= $link ?>" data-target="<?= $link ?>" <?= $data_aos ? 'data-aos="fade-up" data-aos-duration="500"' : '' ?>>
				<?= do_shortcode($text) ?>
				<?php if ($icon == true) { ?>
					<span></span>
				<?php } ?>
			</a>
			<?php if ($wrapper) { ?>

			</div>
			<br />
			<br />
		<?php } ?>

	<?php
		return ob_get_clean();
	}
}
function get_description($description, $class = '')
{
	ob_start();
	?>
	<div class="paragraph <?= $class ?>" data-aos="fade-up" data-aos-duration="500">
		<?= wpautop($description, false) ?>
	</div>
<?php
	return ob_get_clean();
}


function get_templates()
{
	$args = array(
		'post_type' => 'templates',
		'post_per_page' => -1
	);
	$query = new WP_Query($args);
	$templates = array();
	while ($query->have_posts()) {
		$query->the_post();
		$templates[get_the_ID()] = get_the_title();
	}
	wp_reset_postdata();

	return $templates;
}

function page_components($hide_heading = 0)
{
	$page_components = carbon_get_the_post_meta('page_components');
	$container_width = carbon_get_the_post_meta('container_width') ? carbon_get_the_post_meta('container_width') : 'wide witdh1800';
	foreach ($page_components as $key => $page_component) {
		$section_type = $page_component['_type'];
		$section_id = 'section-' . get_the_ID() . '-' . $section_type . '_' . $key;
		switch ($section_type) {
			case 'columns':
				include(locate_template('/templates/page-components/_columns.php'));
				break;
			case 'banner':
				include(locate_template('/templates/page-components/_banner.php'));
				break;
			case 'template':
				include(locate_template('/templates/page-components/_template.php'));
				break;
			case 'cta_bar':
				include(locate_template('/templates/page-components/_cta_bar.php'));
				break;
			case 'carousel_with_description':
				include(locate_template('/templates/page-components/_carousel_with_description.php'));
				break;
			case 'bike_part_bullets':
				include(locate_template('/templates/page-components/_bike_part_bullets.php'));
				break;
			case 'bike_colors':
				include(locate_template('/templates/page-components/_bike_colors.php'));
				break;
			case 'technical_specifications':
				include(locate_template('/templates/page-components/_technical_specifications.php'));
				break;
			case 'two_columns_image_and_text':
				include(locate_template('/templates/page-components/_two_columns_image_and_text.php'));
				break;
			case 'justified_gallery':
				include(locate_template('/templates/page-components/_justified_gallery.php'));
				break;
			case 'justified_gallery':
				include(locate_template('/templates/page-components/_justified_gallery.php'));
				break;
			case 'contact_form_slider':
				$slider = true;
				include(locate_template('/templates/page-components/_contact_form_slider.php'));
				break;
			case 'info_section':
				include(locate_template('/templates/page-components/_info_section.php'));
				break;
			case 'banner_slider':
				include(locate_template('/templates/page-components/_banner_slider.php'));
				break;
			case 'bike_slider':
				include(locate_template('/templates/page-components/_bike_slider.php'));
				break;
			case 'latest_news':
				include(locate_template('/templates/page-components/_latest_news.php'));
				break;
			case 'colourways':
				include(locate_template('/templates/page-components/_colourways.php'));
				break;
			case 'cta_two_buttons':
				$two_buttons = true;
				foreach ($page_components as $key => $page_component) {
					$section_type = $page_component['_type'];
					if ($section_type == 'contact_form_slider') {
						$slider = false;
						include(locate_template('/templates/page-components/_contact_form_slider.php'));
					}
				}
				include(locate_template('/templates/page-components/_cta_two_buttons.php'));
				break;
			case 'image_hotspots':
				include(locate_template('/templates/page-components/_image_hotspots.php'));
				break;
			case 'three_column_image':
				include(locate_template('/templates/page-components/_three_column_image.php'));
				break;
			case 'logo_slider':
				include(locate_template('/templates/page-components/_logo_slider.php'));
				break;
			case 'wysiwyg':
				include(locate_template('/templates/page-components/_wysiwyg.php'));
				break;
		}
	}
	if ($two_buttons != true) {
		foreach ($page_components as $key => $page_component) {
			$section_type = $page_component['_type'];
			if ($section_type == 'contact_form_slider') {
				$slider = false;
				include(locate_template('/templates/page-components/_contact_form_slider.php'));
			}
		}
	}

	return;
}

function page_components_v2()
{
	$page_components = carbon_get_the_post_meta('page_components_v2');
	foreach ($page_components as $key => $page_component) {
		$section_type = $page_component['_type'];
		$section_id = 'section-' . get_the_ID() . '-' . $section_type . '_' . $key;
		switch ($section_type) {
			case 'wysiwyg':
				include(locate_template('/templates/page-components-v2/_wysiwyg.php'));
				break;
			case 'two_columns':
				include(locate_template('/templates/page-components-v2/_two_columns.php'));
				break;
			case 'background_image_section':
				include(locate_template('/templates/page-components-v2/_background_image_section.php'));
				break;
			case 'buttons':
				include(locate_template('/templates/page-components-v2/_buttons.php'));
				break;
		}
	}
	return;
}

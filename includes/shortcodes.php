<?php


add_shortcode('mega_nav_bike_models', 'mega_nav_bike_models');

function mega_nav_bike_models($atts)
{

	extract(shortcode_atts(array(
		'nav_name' => '',
	), $atts));
	$locations = get_registered_nav_menus();
	$menus = wp_get_nav_menus();
	$menu_locations = get_nav_menu_locations();

	$location_id = $atts['nav_name'];
	$args_new_model = array(
		'post_type' => 'bikes',
		'post_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'bike-type',
				'field' => 'term_id',
				'terms' => 257
			)
		)
	);

	$query_new_model = new WP_Query($args_new_model);

	if (isset($menu_locations[$location_id])) {

		foreach ($menus as $menu) {
			if ($menu->term_id == $menu_locations[$location_id]) {
				$menu_items = wp_get_nav_menu_items($menu);
				foreach ($menu_items as $item) {

					$mega_menu[$item->post_title]['cpt_name'] = $item->classes[0];
					$taxonomy_name = $item->classes[1];
					$mega_menu[$item->post_title]['taxonomy_name'] = $taxonomy_name;
					$mega_menu[$item->post_title]['url'] = $item->url;


					$terms = get_terms($taxonomy_name, array(
						'hide_empty' => false,
					));

					if (count($terms) && $taxonomy_name != '') {
						foreach ($terms as $key => $val) {
							$category_name = $val->name;
							$category_id = $val->term_id;

							$args = array(
								'post_type' => $cpt_name,
								'post_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => $taxonomy_name,
										'field' => 'term_id',
										'terms' => $category_id
									)
								)
							);

							$query = new WP_Query($args);
							if (count($query->posts) != 0) {
								$mega_menu[$item->post_title][$val->name] = $query->posts;
							} else {
								if ($mega_menu[$item->post_title])
									$mega_menu[$item->post_title][$val->name] = array();
							}
						}
					}
				}
			}
		} ?>
		<ul class="nav navbar-nav nav-menu-handler bike_menus">
			<?php foreach ($mega_menu as $parent_key => $parent_value) : ?>
				<?php if (count($parent_value) > 3) : ?>
					<li class="has-dropdown">
						<a href="javascript:void(0)" class="menu-parent menu-parent-new"><?= $parent_key ?> <img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
						<ul class="dropdown-menu mega-menu bike_menu" style="display: none;">
							<li class="mega-menu-column">
								<div class="megamenu-breadcrumb megamenu-breadcrumb-new">
									<div class="container wide witdh1700">
										<div class="inner">
											<?php foreach (array_reverse($parent_value) as $k => $v) :
												if ($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url') :
													$class_tax_button = preg_replace('/\s+/', '', $k); ?>
													<?php if ($class_tax_button != 'Featured' && $class_tax_button != 'BikeCompatibility') { ?>

														<a href="javascript:void(0)" class="taxonomy-button" data-menu-name="<?= $class_tax_button ?>"><?= $k ?><img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
													<?php } ?>
											<?php endif;
											endforeach ?>
										</div>
									</div>
								</div>

								<?php foreach ($parent_value as $k => $v) :
									echo $parent_value['bike-type'];
									if ($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url') :
										$class_tax_dropdown = preg_replace('/\s+/', '', $k); ?>
										<div class="mega-dropdown-menu mega-dropdown-menu-new <?= $class_tax_dropdown ?>" style="display: none;">
											<div class="container wide witdh1700">
												<div class="row">

													<div class="col-md-12 ">
														<h2><?= $k ?></h2>
														<div class="row overflow">
															<?php foreach ($v as $postkey => $postvalue) : ?>
																<?php
																$image_id = carbon_get_post_meta($postvalue->ID, 'bike_menu_image');

																if (!$image_id) {
																	$image_id = attachment_url_to_postid(carbon_get_post_meta($postvalue->ID, 'b_img'));
																}
																?>
																<div class="col-xs-4 bike-id-<?= $postvalue->ID ?>	">
																	<div class="bike-previews">
																		<a href="<?= get_permalink($postvalue->ID) ?>">
																			<div class="image-holder">
																				<img class="img-responsive" src="<?= wp_get_attachment_image_url($image_id, 'medium'); ?>" />
																			</div><span><?= $postvalue->post_title ?></span>
																		</a>
																	</div>
																</div>
															<?php endforeach;  ?>
														</div>
													</div>
												</div>
											</div>
										</div>
								<?php endif;
								endforeach ?>
							</li>
						</ul>
					</li>
				<?php else : ?>
					<li><a href="<?= $parent_value['menu_url'] ?>" target="_blank"><?= $parent_key ?> </a></li>
				<?php endif ?>
			<?php endforeach; ?>
		</ul>
	<?php }
}



function bike_models()
{
	ob_start();
	?>
	<?php
	$row = 0;
	if (($handle = fopen(get_template_directory() . "/car_make_model.csv", "r")) !== FALSE) {
		$car_make_array = array();
		$car_model_array = array();
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			$num = count($data);
			if ($row != 0) {
				$car_make_array[] = $data[0];
				$car_model_array[] = array(
					'class' => $data[0],
					'value' => $data[1]
				);
			}
			$row++;
		}
		fclose($handle);
	}
	?>
	<?php
	$car_make_array_unique = array_unique($car_make_array);
	sort($car_make_array_unique);
	sort($car_model_array);
	echo '<span class="wpcf7-form-control-wrap wpcf7-select select_car_make_div">';
	echo '<select id="select_car_make">';
	echo '<option value="">What make of motorcycle do you ride?</option>';
	foreach ($car_make_array_unique as $key => $car_make) {

	?>
		<option value="<?= $car_make ?>"><?= $car_make ?></option>
	<?php
	}


	echo '</select>';
	echo '</span>';
	foreach ($car_make_array_unique as $key => $car_make) {
		$style = 'style="display: none"';
	?>
		<span class="wpcf7-form-control-wrap wpcf7-select select_car_model_div">
			<select <?= $style ?> class="car_model" car_make="<?= $car_make ?>">
				<option value="">Which Model?</option>
				<?php
				foreach ($car_model_array as $key => $car_model) {
				?>
					<?php
					if ($car_model['class'] == $car_make) {
					?>
						<option car_make="<?= $car_model['class'] ?>" value="<?= $car_model['value'] ?>"><?= $car_model['value'] ?></option>
				<?php
					}
				}
				?>
			</select>
		</span>
	<?php
	}

	?>
	<script>
		jQuery(document).ready(function($) {
			jQuery('.select_car_make_div').appendTo('#car_make_div');
			jQuery('.select_car_model_div').appendTo('#car_model_div');
		});
		jQuery('#select_car_make').change(function(event) {
			$val = jQuery(this).val();
			jQuery('select.car_model[car_make="' + $val + '"]').css('display', 'block');
			jQuery('select.car_model[car_make!="' + $val + '"]').css('display', 'none');
			jQuery('select.car_model').val('');
			jQuery('input[name="car_make_val"]').val($val);
			jQuery('input[name="model"]').val('');
		});
		jQuery('select.car_model').change(function(event) {
			$val = jQuery(this).val();
			jQuery('input[name="model"]').val($val);

		});
	</script>
	<?php

	return ob_get_clean();
}

add_shortcode('bike_models', 'bike_models');


add_shortcode('mega_nav_bike_models_slider', 'mega_nav_bike_models_slider');

function mega_nav_bike_models_slider($atts)
{

	extract(shortcode_atts(array(
		'nav_name' => '',
	), $atts));
	$locations = get_registered_nav_menus();
	$menus = wp_get_nav_menus();
	$menu_locations = get_nav_menu_locations();

	$location_id = $atts['nav_name'];
	$args_new_model = array(
		'post_type' => 'bikes',
		'post_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'bike-type',
				'field' => 'term_id',
				'terms' => 257
			)
		)
	);

	$query_new_model = new WP_Query($args_new_model);

	if (isset($menu_locations[$location_id])) {

		foreach ($menus as $menu) {
			if ($menu->term_id == $menu_locations[$location_id]) {
				$menu_items = wp_get_nav_menu_items($menu);
				foreach ($menu_items as $item) {

					$mega_menu[$item->post_title]['cpt_name'] = $item->classes[0];
					$taxonomy_name = $item->classes[1];
					$mega_menu[$item->post_title]['taxonomy_name'] = $taxonomy_name;
					$mega_menu[$item->post_title]['url'] = $item->url;


					$terms = get_terms($taxonomy_name, array(
						'hide_empty' => false,
					));

					if (count($terms) && $taxonomy_name != '') {
						foreach ($terms as $key => $val) {
							$category_name = $val->name;
							$category_id = $val->term_id;

							$args = array(
								'post_type' => $cpt_name,
								'post_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => $taxonomy_name,
										'field' => 'term_id',
										'terms' => $category_id
									)
								)
							);

							$query = new WP_Query($args);
							if (count($query->posts) != 0) {
								$mega_menu[$item->post_title][$val->name] = $query->posts;
							} else {
								if ($mega_menu[$item->post_title])
									$mega_menu[$item->post_title][$val->name] = array();
							}
						}
					}
				}
			}
		} ?>
		<ul class="nav navbar-nav nav-menu-handler bike_menus">
			<?php foreach ($mega_menu as $parent_key => $parent_value) : ?>
				<?php if (count($parent_value) > 3) : ?>
					<li class="has-dropdown">
						<a href="javascript:void(0)" class="menu-parent menu-parent-new"><?= $parent_key ?> <img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
						<ul class="dropdown-menu mega-menu bike_menu" style="display: none;">
							<li class="mega-menu-column">
								<div class="megamenu-breadcrumb megamenu-breadcrumb-new">
									<div class="container wide witdh1700">
										<div class="inner">
											<?php foreach (array_reverse($parent_value) as $k => $v) :
												if ($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url') :
													$class_tax_button = preg_replace('/\s+/', '', $k); ?>
													<?php if ($class_tax_button != 'Featured' && $class_tax_button != 'BikeCompatibility') { ?>
														<a href="javascript:void(0)" class="taxonomy-button" data-menu-name="<?= $class_tax_button ?>"><?= $k ?><img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
													<?php } ?>
											<?php endif;
											endforeach ?>
										</div>
									</div>
								</div>

								<?php foreach ($parent_value as $k => $v) :
									echo $parent_value['bike-type'];
									if ($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url') :
										$class_tax_dropdown = preg_replace('/\s+/', '', $k); ?>
										<div class="mega-dropdown-menu mega-dropdown-menu-new mega-menu-slider <?= $class_tax_dropdown ?>" style="display: none;">
											<div class="container width-100">
												<div class="row">
													<div class="col-md-12 ">
														<!-- <h2><?= $k ?></h2> -->
														<div class="swiper-slider-holder swiper-slider-holder-thumbnail swiper-slider-style-one-holder swiper-slider-style-header-holder" data-aos="fade-up" data-aos-duration="500">
															<!-- Swiper -->
															<div class="swiper-container mySwiper-Header-<?= $k ?> swiper-slider-style-one swiper-slider-style-header">
																<div class="swiper-wrapper">
																	<?php foreach ($v as $postkey => $postvalue) : ?>
																		<?php
																		$bike_slider_background = carbon_get_post_meta($postvalue->ID, 'bike_slider_background');
																		$bike_slider_image = carbon_get_post_meta($postvalue->ID, 'bike_slider_image');
																		$b_img = attachment_url_to_postid(carbon_get_post_meta($postvalue->ID, 'b_img'));

																		if ($bike_slider_background) {
																			$bike_slider_background_id = $bike_slider_background;
																		} else {
																			$bike_slider_background_id = $b_img;
																		}
																		if ($bike_slider_image) {
																			$image_id = $bike_slider_image;
																		} else {
																			$image_id = $b_img;
																		}
																		?>
																		<div class="swiper-slide bike-id-<?= $postvalue->ID ?>">
																			<div class="item">
																				<div class="background-box background-box-small" style="background-image: url(<?= wp_get_attachment_image_url($bike_slider_background_id, 'large'); ?>)">
																					<div class="content-holder">
																						<div class="inner">
																							<div class="heading-box">
																								<h3>
																									<?= $postvalue->post_title ?>
																								</h3>
																							</div>
																							<a class="pc-btn white anchor-modal" href="<?= get_permalink($postvalue->ID) ?>">DISCOVER</a>
																						</div>
																					</div>
																				</div>
																				<div class="image-box image-box-small" data-swiper-parallax="-50%">
																					<img class="no-lazyload" src="<?= wp_get_attachment_image_url($image_id, 'large'); ?>" alt="<?= $postvalue->post_title ?>">
																				</div>
																			</div>
																		</div>
																	<?php endforeach;  ?>

																</div>
																<div class="swiper-pagination" style="display: none;"></div>
																<div class="swiper-button-next"></div>
																<div class="swiper-button-prev"></div>
															</div>
															<div class="thumb-wrapper">
																<div thumbsSlider="" class="swiper mySwiper mySwiperThumbs mySwiperThumbs-<?= $k ?>">
																	<div class="swiper-wrapper">
																		<?php foreach ($v as $postkey => $postvalue) : ?>
																			<?php
																			$postkey++;
																			$bike_slider_background = carbon_get_post_meta($postvalue->ID, 'bike_slider_background');
																			$bike_slider_image = carbon_get_post_meta($postvalue->ID, 'bike_slider_image');
																			$b_img = attachment_url_to_postid(carbon_get_post_meta($postvalue->ID, 'b_img'));

																			if ($bike_slider_image) {
																				$image_id = $bike_slider_image;
																			} else {
																				$image_id = $b_img;
																			}
																			?>
																			<div class="swiper-slide">
																				<div class="image-box">
																					<img class="bike-thumbnail no-lazyload" data-target="Go to slide <?= $postkey ?>" src="<?= wp_get_attachment_image_url($image_id, 'medium'); ?>" />
																				</div>
																			</div>
																		<?php endforeach;  ?>
																	</div>
																</div>
															</div>
														</div>

													</div>
												</div>
											</div>
										</div>
								<?php endif;
								endforeach ?>
							</li>
						</ul>
					</li>
				<?php else : ?>
					<li><a href="<?= $parent_value['menu_url'] ?>" target="_blank"><?= $parent_key ?> </a></li>
				<?php endif ?>
			<?php endforeach; ?>
		</ul>
	<?php }
}

//CONTACT FORM 7 DYNAMIC FIELDS

function get_param($atts)
{
	extract(shortcode_atts(array(
		'value' => '',
	), $atts));

	return $_GET[$value];
}

add_shortcode('get_param', 'get_param');

function phone_svg()
{
	return '<svg xmlns="http://www.w3.org/2000/svg" width="22.88" height="22.881" viewBox="0 0 22.88 22.881"> <path fill="transparent" id="Icon_awesome-phone-alt" data-name="Icon awesome-phone-alt" d="M20.753,15.1l-4.673-2a1,1,0,0,0-1.168.288l-2.069,2.528A15.465,15.465,0,0,1,5.449,8.516l2.528-2.07a1,1,0,0,0,.288-1.168l-2-4.673A1.008,1.008,0,0,0,5.115.026l-4.339,1A1,1,0,0,0,0,2a19.358,19.358,0,0,0,19.36,19.36,1,1,0,0,0,.976-.776l1-4.339a1.013,1.013,0,0,0-.585-1.152Z" transform="translate(0.75 0.768)" stroke="#fff" stroke-width="1.5"></path> </svg>';
}

add_shortcode('phone_svg', 'phone_svg');


function phone_number($atts)
{

	extract(shortcode_atts(array(
		'class' => 'white',
		'text' => '01204 544930',
		'dynamic' => false
	), $atts));

	$text_val = '[phone_svg] ' . $text;
	if ($dynamic) {
		$day = current_datetime()->format('N');
		if ($day != 6 && $day != 7) {
			$time = current_datetime()->format('H:i');
			$open_time = strtotime('08:30');
			$close_time = strtotime('17:00');
			if ((strtotime($time) >= $open_time) && (strtotime($time) < $close_time)) {
				return get_button($text_val, 'tel:01204544930', true, 'pc-btn ' . $class . ' bordered with-icon phone-number', false, false);
			}
		}
	} else {
		return get_button($text_val, 'tel:01204544930', true, 'pc-btn ' . $class . ' bordered with-icon phone-number', false, false);
	}
}

add_shortcode('phone_number', 'phone_number');


function page_submitted()
{
	return get_the_title(get_the_ID());
}

add_shortcode('page_submitted', 'page_submitted');

function bike_lists()
{
	ob_start();
	$bikes_categ = carbon_get_post_meta(14442, 'motorcycles');
	?>
	<section class="bike-lists bt-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-9">
					<?php foreach ($bikes_categ as $categ) { ?>
						<div class="bike-lists-holder">
							<div class="bike-category d-flex">
								<?= $categ['category_name'] ?>
							</div>
							<div class="bikes">
								<div class="row">
									<?php
									foreach ($categ['bikes'] as $bike) {
									?>
										<div class="col-lg-3 <?= $bike['bike_name'] ?>">
											<div class="column-holder">
												<div class="row flex-row">
													<div class="col-lg-12 col-half-mobile">
														<div class="image-box">
															<img src="<?= $bike['bike_image'] ?>" alt="<?= $bike['bike_name'] ?>">
														</div>
													</div>
													<div class="col-lg-12 col-half-mobile">
														<div class="bike-name-price d-flex ">
															<div class="bike-name">
																<h4><?= $bike['bike_name'] ?></h4>
															</div>
															<div class="bike-price">
																<span><?= $bike['bike_price'] ?></span>
															</div>
														</div>
													</div>
													<div class="col-lg-12">
														<div class="btn-box d-flex">
															<?php if ($bike['discover_link']) { ?>
																<a class="pc-btn" href="<?= $bike['discover_link'] ?>">
																	DISCOVER
																</a>
															<?php } ?>
															<?php if ($bike['configure_link']) { ?>
																<a class="pc-btn" href="<?= $bike['configure_link'] ?>">
																	CONFIGURE
																</a>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="col-lg-3">
					<div class="column-holder">
						<ul>
							<li><a href="#">VIEW ALL BIKES</a></li>
							<li><a href="#">CONFIGURE A BIKE</a></li>
							<li><a href="#">ENQUIRE</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	return ob_get_clean();
}

add_shortcode('bike_lists', 'bike_lists');




function bike_lists_menu()
{
	ob_start();
	$bikes_categ = carbon_get_post_meta(14442, 'motorcycles');
?>
	<section class="bike-lists-menu bt-5">
		<div class="container-fluid container-fluid-wide">
			<div class="row">
				<div class="col-lg-9">
					<div class="bike-lists-holder">
						<div class="bikes">
							<div class="row">
								<?php foreach ($bikes_categ as $categ) { ?>
									<?php
									foreach ($categ['bikes'] as $bike) {
										$bike_image_url = $bike['bike_image'];
										$bike_image_id = attachment_url_to_postid($bike_image_url);
										$image = wp_get_attachment_image_url($bike_image_id, 'large');
									?>
										<div class="col-lg-4 <?= $bike['bike_name'] ?>">
											<div class="column-holder text-center">
												<a href="<?= $bike['configure_link'] ? $bike['configure_link'] : '#'  ?>">
													<div class="bike-name">
														<h4><?= $bike['bike_name'] ?></h4>
													</div>
													<div class="image-box">
														<img src="<?= $image ?>" alt="<?= $bike['bike_name'] ?>">
													</div>
												</a>
											</div>
										</div>
									<?php } ?>
								<?php } ?>

							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="column-holder">
						<ul>
							<li><a href="#">VIEW ALL BIKES</a></li>
							<li><a href="#">CONFIGURE A BIKE</a></li>
							<li><a href="#">ENQUIRE</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	return ob_get_clean();
}

add_shortcode('bike_lists_menu', 'bike_lists_menu');

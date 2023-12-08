<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

function get_product_lists()
{
	$args = array(
		'numberposts' => -1,
		'post_type'   => 'product',
		'orderby'     => 'title',
		'order'       => 'ASC',
		'post_status' => array('publish', 'private'),

	);

	$products = get_posts($args);

	$products_arr = array();
	foreach ($products as $product_val) {
		$product = new WC_Product($product_val->ID);
		$products_arr[$product_val->ID] = $product_val->post_title . ' - ' . $product->get_sku();
	}
	return $products_arr;
}

function get_product_lists_sku()
{
	$args = array(
		'numberposts' => -1,
		'post_type'   => 'product',
		'orderby'     => 'title',
		'order'       => 'ASC',
		'post_status' => array('publish', 'private'),

	);

	$products = get_posts($args);

	$products_arr = array();
	foreach ($products as $product_val) {

		$product = new WC_Product($product_val->ID);
		if ($product->get_sku()) {
			$products_arr[$product->get_sku()] = $product_val->post_title . ' - ' . $product->get_sku();
		}
	}
	return $products_arr;
}

function product_in_bikes()
{
	ob_start();
	$current_product = $_GET['post'];
	$pages = get_pages(
		array(
			'meta_key'   => '_wp_page_template',
			'meta_value' => 'templates/page-configure-bike.php'
		)
	);
	echo '<ul style="max-width: 250px; list-style: inherit;">';
	foreach ($pages as $page) {
		$panel = carbon_get_post_meta($page->ID, 'panel');
		$product_id_array = array();
		foreach ($panel as $panel_key => $the_panel) {
			foreach ($the_panel['accesories'] as $acc_key => $accesories) {
				if ($accesories['accesory_type'] == 'product') {
					$product_id = $accesories['product'];
					$product_id_array[] = $product_id;
				}
			}
		}
		$product_ids = array_unique($product_id_array);
		if (in_array($current_product, $product_ids)) {
			echo '<li style="display: flex; justify-content: space-between;"> ' . get_the_title($page->ID);
			echo '<a target="_blank" class="button button-primary"  href="' . get_the_permalink($page->ID) . '"> View </a>';
			echo ' <a target="_blank" class="button button-accent" href="' . get_edit_post_link($page->ID) . '" > Edit </a> </li>';
		}
	}
	echo '</ul>';

	return ob_get_clean();
}

/* 
Global 		==========================================================
*/
Container::make('theme_options', 'Global Settings')
	->add_tab(
		__('Site Options'),
		array(
			Field::make('image', 'cv_logo', 'Logo')->set_value_type('url'),
		)
	)

	->add_tab(
		__('Bottom Page Links'),
		array(
			Field::make('text', 'link_text1', 'Link Text')->set_width(100),
			Field::make('text', 'link1', 'Links To')->set_width(100),
			Field::make('text', 'link_text2', 'Link Text')->set_width(100),
			Field::make('text', 'link2', 'Links To')->set_width(100),
			Field::make('text', 'link_text3', 'Link Text')->set_width(100),
			Field::make('text', 'link3', 'Links To')->set_width(100),
		)
	)

	->add_tab(
		__('Social Links'),
		array(
			Field::make('complex', 'floating_social_links', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'social_media', 'Social Media')->set_width(33),
						Field::make('image', 'social_media_image', 'Social Media Logo')->set_value_type('url')->set_width(33),
						Field::make('text', 'social_media_link', 'Social Media URL')->set_width(33),
					)
				)
		)
	)
	->add_tab(
		__('404 Page'),
		array(
			Field::make('text', 'error404_title', '404 Title')->set_width(100),
			Field::make('textarea', 'error404_description', '404 Description')->set_width(100),
		)
	);
/*->add_tab(__('Make Models'), array(
Field::make( 'complex', 'car_make_models', '' )
->set_layout( 'tabbed-vertical' )
->add_fields(array(
Field::make( 'text', 'car_make', 'Car Make' ),
Field::make( 'text', 'car_model', 'Car Model' )
))	
));*/

Container::make('theme_options', 'CLUB CCM Settings')
	->add_tab(
		__('Navigation Bar'),
		array(
			Field::make('complex', 'navigation-bar', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'menu_name', 'Menu Name')
							->set_width(33),
						Field::make('text', 'menu_link', 'Menu Link')
							->set_help_text('Do not include the domain. Example: /book-a-service')
							->set_width(33),
						Field::make('radio', 'status', 'Status')
							->add_options(
								array(
									'show_if_ccm_owner'  => 'Show only if ccm owner',
									'show_on_both'       => 'Show on both user',
									'show_on_logged_out' => 'Show only if user is logged out',
									'inactive'           => 'Inactive',
								)
							)
							->set_width(33),
					)
				)
				->set_header_template('<%- menu_name %>')
		)
	)
	->add_tab(
		__('Background Image'),
		array(
			Field::make('image', 'background_image_ccm', 'Background Image')
		)
	)
	->add_tab(
		__('Bike List'),
		array(
			Field::make('complex', 'bike_list', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'bike_name', 'Bike Name')
					)
				)
				->set_header_template('<%- bike_name %>')
		)
	);


/* 
Home Page 		==========================================================
*/

Container::make('post_meta', 'Home Page Data')
	->where('post_template', '=', 'page-home.php')
	->add_tab(
		__('Banner Slider'),
		array(
			Field::make('complex', 'bn_slider', 'Banner Slider')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'bn_img', 'Image')->set_value_type('url'),
						Field::make('rich_text', 'bn_txt', 'Content')->set_width(100),
					)
				)
		)
	)


	->add_tab(
		__('News'),
		array(
			Field::make('text', 'news_heading', 'News Heading')->set_width(100),
			Field::make('complex', 'news_group', 'News')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('date', 'news_date', 'News Date'),
						Field::make('text', 'news_title', 'News Title')->set_width(100),
						Field::make('textarea', 'news_excerpt', 'News Summary')->set_width(100),
					)
				)
		)
	)

	->add_tab(
		__('spitfire'),
		array(
			Field::make('image', 'sf_sm_title', 'Small Title')->set_value_type('url'),
			Field::make('text', 'sf_title', 'Section Title')->set_width(100),
			Field::make('image', 'sf_img', 'Section Main Image')->set_value_type('url'),
			Field::make('text', 'sf_text1', 'Bike Description')->set_width(100),
			Field::make('text', 'sf_text2', 'Bike Description')->set_width(100),
			Field::make('text', 'sf_text3', 'Bike Description')->set_width(100),
			Field::make('text', 'sf_text4', 'Bike Description')->set_width(100),
			Field::make('text', 'sf_text5', 'Bike Description')->set_width(100),
			Field::make('text', 'sf_text6', 'Bike Description')->set_width(100),
			Field::make('text', 'sf_btn1_text', 'Button1 Text')->set_width(100),
			Field::make('text', 'sf_btn1_link', 'Button1 Link')->set_width(100),
			Field::make('image', 'sf_btn2_img', 'Button2 Image')->set_value_type('url'),
			Field::make('text', 'sf_btn2_link', 'Button2 Link')->set_width(100),
			Field::make('image', 'sf_btn3_img', 'Button3 Image')->set_value_type('url'),
			Field::make('text', 'sf_btn3_link', 'Button3 Link')->set_width(100),
		)
	)

	->add_tab(
		__('bikes'),
		array(
			Field::make('text', 'bikes_heading', 'Section Title')->set_width(100),
			Field::make('image', 'feat_bike1_brand', 'Featured Bike Brand')->set_value_type('url'),
			Field::make('image', 'feat_bike1', 'Featured Bike')->set_value_type('url'),
			Field::make('text', 'feat_bike1_link', 'Links To')->set_width(100),
			Field::make('image', 'feat_bike2_brand', 'Featured Bike Brand')->set_value_type('url'),
			Field::make('image', 'feat_bike2', 'Featured Bike')->set_value_type('url'),
			Field::make('text', 'feat_bike2_link', 'Links To')->set_width(100),
			Field::make('image', 'feat_bike3_brand', 'Featured Bike Brand')->set_value_type('url'),
			Field::make('image', 'feat_bike3', 'Featured Bike')->set_value_type('url'),
			Field::make('text', 'feat_bike3_link', 'Links To')->set_width(100),
			Field::make('image', 'feat_bike4_brand', 'Featured Bike Brand')->set_value_type('url'),
			Field::make('image', 'feat_bike4', 'Featured Bike')->set_value_type('url'),
			Field::make('text', 'feat_bike4_link', 'Links To')->set_width(100),
			Field::make('text', 'bike_btn', 'Main Button Text')->set_width(100),
			Field::make('text', 'bike_link', 'Links To')->set_width(100),
		)
	)

	->add_tab(
		__('accessories'),
		array(
			Field::make('text', 'ac_sm_title', 'Mini Title')->set_width(100),
			Field::make('text', 'ac_title', 'Title')->set_width(100),
			Field::make('text', 'ac_btn', 'Button Text')->set_width(100),
			Field::make('text', 'ac_btn_link', 'Links To')->set_width(100),
			Field::make('image', 'ac_img', 'Image')->set_value_type('url'),
		)
	)

	->add_tab(
		__('apparel'),
		array(
			Field::make('text', 'ap_sm_title', 'Mini Title')->set_width(100),
			Field::make('text', 'ap_title', 'Title')->set_width(100),
			Field::make('text', 'ap_btn', 'Button Text')->set_width(100),
			Field::make('text', 'ap_btn_link', 'Links To')->set_width(100),
			Field::make('image', 'ap_img', 'Image')->set_value_type('url'),
		)
	);

/* 
Bike Page 		==========================================================
*/
Container::make('post_meta', 'Resource Hub')
	->where('post_type', '=', 'bikes')
	->where('post_template', '!=', 'templates/page-tablet.php')
	->where('post_template', '!=', 'templates/page-configure-bike-v2.php')
	->add_tab(
		'Photos',
		array(
			Field::make('complex', 'photos', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'photo_name', 'Photo Name'),
						Field::make('image', 'photo_file', 'Photo File')
							->set_required(true)
					)
				)
				->set_header_template('<%- photo_name %>'),
		)
	)
	->add_tab(
		'Videos',
		array(
			Field::make('complex', 'videos', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'video_name', 'Video Name'),
						Field::make('image', 'video_thumbnail', 'Video Thumbnail')
							->set_width(20),
						Field::make('file', 'video_file', 'Video File')
							->set_type(array('video'))
							->set_required(true)
							->set_width(80),

					)
				)
				->set_header_template('<%- video_name %>'),
		)
	)
	->add_tab(
		'PDFS',
		array(

			Field::make('complex', 'pdfs', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'pdf_name', 'PDF Name'),
						Field::make('image', 'pdf_thumbnail', 'PDF Thumbnail')
							->set_width(20),
						Field::make('file', 'pdf_file', 'PDF File')
							->set_type(array('application/pdf'))
							->set_required(true)
							->set_width(80),

					)
				)
				->set_header_template('<%- pdf_name %>')
		)
	);



Container::make('post_meta', 'Bike Data')
	->where('post_type', '=', 'bikes')
	->where('post_template', '!=', 'templates/page-components.php')
	->where('post_template', '!=', 'templates/page-tablet.php')
	->where('post_template', '!=', 'templates/page-configure-bike-v2.php')
	->where('post_template', '!=', 'templates/page-bike-template.php')
	->add_tab(
		__('Banner'),
		array(
			Field::make('image', 'single_bike_image', 'Banner Image')->set_value_type('url')->set_width(50),
			Field::make('file', 'single_bike_video', 'Banner Video')->set_help_text('Image will be ignored if a video is attached')->set_value_type('url')->set_width(50),
		)
	)
	->add_tab(
		__('Bike Spin'),
		array(
			Field::make('text', 'bike_spins', 'Bike Spins Iframe')->set_width(50),
			Field::make('image', 'bike_spins_alt', 'Bike Spins Replacement Image')->set_value_type('url')->set_help_text('Bike spins iframe will be ignored if an image is attached')->set_width(50),
		)
	)
	->add_tab(
		__('Bike Colors'),
		array(
			Field::make('checkbox', 'hide_bike_colors', 'Hide Bike Colors'),
			Field::make('complex', 'bike_colors_items', 'Colors')->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'image', 'Bike Image')->set_value_type('url'),
						Field::make('text', 'color', 'Color'),
						Field::make('image', 'color_image', 'Color Image')->set_value_type('url'),
						Field::make('text', 'price', 'Price'),
					)
				)
		)
	)
	->add_tab(
		__('Overview'),
		array(
			Field::make('text', 'bike_price', 'Bike Price')->set_width(50),
			Field::make('text', 'bike_name', 'Bike Name')->set_width(50),
			Field::make('text', 'bike_brochure', 'Brochure')->set_width(50),
			Field::make('image', 'b_img', 'Section Main Image')->set_value_type('url'),
		)
	)
	->add_tab(
		__('Features'),
		array(
			Field::make('rich_text', 'features_text', 'Bullet Points')->set_width(50),
			Field::make('image', 'features_image', 'Image')->set_value_type('url')->set_width(50),
		)
	)
	// ->add_tab(__('Bike'), array(
	// 	,
	// 	Field::make( 'text', 'b_title', 'Section Title')->set_width(100),
	// 	
	// 	Field::make( 'text', 'b_text1', 'Bike Description')->set_width(100),
	// 	Field::make( 'text', 'b_link1', 'Bike Modal Name')->set_width(100),
	// 	Field::make( 'image', 'bz_image1', 'Bike Image')->set_value_type( 'url' ),
	// 	Field::make( 'text', 'b_text2', 'Bike Description')->set_width(100),
	// 	Field::make( 'text', 'b_link2', 'Bike Modal Name')->set_width(100),
	// 	Field::make( 'image', 'bz_image2', 'Bike Image')->set_value_type( 'url' ),
	// 	Field::make( 'text', 'b_text3', 'Bike Description')->set_width(100),
	// 	Field::make( 'text', 'b_link3', 'Bike Modal Name')->set_width(100),
	// 	Field::make( 'image', 'bz_image3', 'Bike Image')->set_value_type( 'url' ),
	// 	Field::make( 'text', 'b_text4', 'Bike Description')->set_width(100),
	// 	Field::make( 'text', 'b_link4', 'Bike Modal Name')->set_width(100),
	// 	Field::make( 'image', 'bz_image4', 'Bike Image')->set_value_type( 'url' ),
	// 	Field::make( 'text', 'b_text5', 'Bike Description')->set_width(100),
	// 	Field::make( 'text', 'b_link5', 'Bike Modal Name')->set_width(100),
	// 	Field::make( 'image', 'bz_image5', 'Bike Image')->set_value_type( 'url' ),
	// 	Field::make( 'text', 'b_text6', 'Bike Description')->set_width(100),
	// 	Field::make( 'text', 'b_link6', 'Bike Modal Name')->set_width(100),
	// 	Field::make( 'image', 'bz_image6', 'Bike Image')->set_value_type( 'url' ),
	// ))

	->add_tab(
		__('Specs'),
		array(
			Field::make('complex', 'specs_group', 'Specifications')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'specs-cat', 'Category'),
						Field::make('rich_text', 'specs-details', 'Specifications'),
					)
				)
		)
	)

	->add_tab(
		__('Warranty'),
		array(
			Field::make('rich_text', 'warranty_text', 'Warranty Text')
		)
	)


	->add_tab(
		__('Slider'),
		array(
			// 	Field::make('text', 'bs_sm_title', 'Mini Title')->set_width(100),
			Field::make('rich_text', 'bs_desc', 'Description'),
			// 	Field::make( 'image', 'bs_bgimg', 'Slider Background Image')->set_value_type( 'url' ),
			Field::make('complex', 'bs_group', 'Image Slider')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'bs_img', 'Bike Image')->set_value_type('url')
					)
				),
			Field::make('rich_text', 'ibike_desc', 'Bike Description'),
		)
	)
	->add_tab(
		__('Contact Form Slider'),
		array(
			Field::make('text', 'heading', 'Heading'),
			Field::make('rich_text', 'description', 'Description'),
			Field::make('checkbox', 'diplay_bike_models', 'Display Bike Models Fields')->set_width(25),
			Field::make('checkbox', 'is_iframe', 'Form is Iframe')->set_width(25),
			Field::make('checkbox', 'display_at_bottom', 'Display form at Bottom')->set_width(25),
			Field::make('checkbox', 'replace_bronchure', 'Replace Brochure with Enquire Online for Modal')->set_width(25),
			Field::make('textarea', 'contact_form_shortcode', 'Contact Form Shortcode/Iframe'),
		)
	);

/*
Careers         ==========================================================
*/


Container::make('post_meta', 'Page Options')
	->where('post_template', '=', 'templates/page-text-content.php')
	->set_context('side')
	->add_fields(
		array(
			Field::make('checkbox', 'hide_header_and_footer', 'Hide Header and Footer')
		)
	);


/*
Page text content         ==========================================================
*/


Container::make('post_meta', 'Career Tabs')
	->where('post_template', '=', 'page-careers.php')
	->add_tab(
		__('Tab Items'),
		array(
			Field::make('complex', 'tab_careers', 'Tab Item')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'title', 'Title')->set_width(100),
						Field::make('rich_text', 'description', 'Description')->set_width(100),
						Field::make('text', 'buttonlink', 'Button Link')->set_width(100),
					)
				)
		)
	);

/* 
Subpage 		==========================================================
*/

Container::make('post_meta', 'Subpage Data')
	->where('post_type', '=', 'page')
	->where('post_template', '!=', 'page-customer-exp.php')
	->where('post_template', '!=', 'page-blog.php')
	->where('post_template', '!=', 'templates/page-components.php')
	->where('post_template', '!=', 'templates/page-components-v2.php')
	->where('post_template', '!=', 'templates/page-bikes.php')
	->where('post_template', '!=', 'templates/page-tablet.php')
	->where('post_type', '!=', '3d-flip-book')
	->add_tab(
		__('Banner'),
		array(
			Field::make('file', 'sp_banner', 'Banner')->set_value_type('url')->set_type(array('video', 'image')),
			Field::make('text', 'sp_banner_text', 'Banner Text')->set_width(100),
			Field::make('text', 'sp_banner_subtext', 'Banner Sub Text')->set_width(100),
			Field::make('text', 'sp_banner_btn1_title', 'Button 1 Title[White Background]')->set_width(50),
			Field::make('text', 'sp_banner_btn1_url', 'Button 1 Url')->set_width(50),
			Field::make('text', 'sp_banner_btn2_title', 'Button 2 title[Red Background]')->set_width(50),
			Field::make('text', 'sp_banner_btn2_url', 'Button 2 Url')->set_width(50),
			Field::make('checkbox', 'sp_banner_btn2_is_modal', 'Check this if button 2 is modal')->set_width(100),
		)
	)

	->add_tab(
		__('Content'),
		array(
			Field::make('text', 'sp_con_title', 'Section Title')->set_width(100),
			Field::make('rich_text', 'sp_content', 'Content'),
		)
	)

	->add_tab(
		__('Section with Photo'),
		array(
			Field::make('rich_text', 'sp_content2', 'Content'),
			Field::make('image', 'sp_bg_img', 'Image')->set_value_type('url'),
		)
	);

/* 
News		==========================================================
*/

Container::make('post_meta', 'Blog Data')
	->where('post_template', '=', 'page-blog.php')
	->add_tab(
		__('Banner'),
		array(
			Field::make('image', 'n_banner', 'Banner')->set_value_type('url'),
			Field::make('text', 'n_banner_text', 'Banner Text')->set_width(100),
		)
	);

/* 
Contact		==========================================================
*/

Container::make('post_meta', 'Contact Page Data')
	->where('post_template', '=', 'page-contact.php')
	->add_tab(
		__('Banner'),
		array(
			Field::make('image', 'cp_background', 'Background Image')->set_value_type('url')->set_width(33),
			Field::make('text', 'n_banner_text', 'Banner Text')->set_width(100),
		)
	);

/* 
Single Post		==========================================================
*/

Container::make('post_meta', 'Data')
	->where('post_type', '=', 'post')
	->set_context('side')
	->add_tab(
		__('Banner Image'),
		array(
			Field::make('image', 'sp_banner', '')->set_value_type('url'),
		)
	);

Container::make('post_meta', 'Featured Video')
	->set_priority('low')
	->where('post_type', '=', 'post')
	->set_context('side')
	->add_fields(
		array(
			Field::make('oembed', 'youtube_video', __(''))
				->set_help_text('Youtube video link only and make sure it has https/http/www'),
			Field::make('checkbox', 'use_video', __('Check this to use video in homepage'))

		)
	);

/* 
Customer Experience Page ==========================================================
*/

Container::make('post_meta', 'Customer Experience')
	->where('post_template', '=', 'page-customer-exp.php')
	->add_tab(
		__('Banner'),
		array(
			Field::make('image', 'ce_banner', 'Banner')->set_value_type('url'),
			Field::make('text', 'ce_banner_text', 'Banner Text')->set_width(100),
		)
	)

	->add_tab(
		__('Content'),
		array(
			Field::make('image', 'ce_img1', 'Content Image1')->set_value_type('url'),
			Field::make('image', 'ce_img2', 'Content Image2')->set_value_type('url'),
			Field::make('text', 'ce_con_title', 'Section Title')->set_width(100),
			Field::make('rich_text', 'ce_content', 'Content'),
			Field::make('image', 'ce_sign', 'Signature')->set_value_type('url'),
		)
	)

	->add_tab(
		__('Q&A'),
		array(
			Field::make('text', 'ce_qa_title', 'Section Title')->set_width(100),
			Field::make('text', 'ce_qa_subtitle', 'Section Sub Title')->set_width(100),
			Field::make('rich_text', 'ce_qa_content', 'Content'),
		)
	)

	->add_tab(
		__('Slider'),
		array(
			Field::make('complex', 'qa_group', 'Image Slider')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'qa_slider', 'Image')->set_value_type('url')
					)
				),
		)
	);

/* 
Defencves Page ==========================================================
*/

Container::make('post_meta', 'Defences and Security')
	->where('post_template', '=', 'page-defences.php')
	->add_tab(
		__('Banner'),
		array(
			Field::make('image', 'ds_banner', 'Banner')->set_value_type('url'),
			Field::make('text', 'ds_banner_text', 'Banner Text')->set_width(100),
		)
	)

	->add_tab(
		__('Content'),
		array(
			Field::make('text', 'ds_con_title', 'Section Title')->set_width(100),
			Field::make('rich_text', 'ds_content', 'Content'),
		)
	);

/* 
CCM Racing Page ==========================================================
*/

Container::make('post_meta', 'Timeline CCM Racing')
	->where('post_template', '=', 'page-ccmracing.php')
	->add_tab(
		__('Timeline'),
		array(
			Field::make('complex', 'cmracing_group', 'Racing Timeline Slider')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'ccmracing_slider', 'Image')->set_value_type('url')->set_width(10),
						Field::make('text', 'ccmracing_slidertext', 'Image Caption')->set_width(10),
						Field::make('text', 'ccmracing_year', 'Timeline Year')->set_width(10),
						Field::make('text', 'ccmracing_title', 'Timeline Title')->set_width(30),
						Field::make('rich_text', 'ccmracing_content', 'Timeline Content')->set_width(40),
						Field::make('rich_text', 'ccmracing_sc2_content', 'Content'),
						Field::make('image', 'ccmracing_sc2_image', 'Image')->set_value_type('url')->set_width(10),
						Field::make('text', 'ccmracing_sc2_caption', 'Caption')->set_width(30),
					)
				),
		)
	);

/*
Custom Product Page
*/
Container::make('post_meta', 'Custom Product Fields')
	->where('post_type', '=', 'product')

	->add_tab(
		__('Extra Info'),
		array(
			Field::make('text', 'product_age', 'Product Age'),
			Field::make('text', 'product_mileage', 'Product Mileage'),
		)
	);


/*
Custom Events Page
*/
Container::make('post_meta', 'Event Start and End time')
	->where('post_type', '=', 'events')
	->add_tab(
		__('Event Dates'),
		array(
			Field::make('date_time', 'crb_event_start', 'Event Start')->set_required(true),
			Field::make('date_time', 'crb_event_end', 'Event End')->set_required(true),
		)
	);

Container::make('post_meta', 'Page Components')
	->where('post_template', '=', 'page-club-book-a-service.php')
	->set_priority('high')
	->add_tab(
		__('The Team'),
		array(
			Field::make('text', 'the_team_heading', 'Heading'),
			Field::make('rich_text', 'intro_text', 'Intro Text'),
			Field::make('complex', 'the_team', 'The Team')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'name', 'Name'),
						Field::make('rich_text', 'description', 'Description'),
					)
				)
				->set_header_template('<%- name %>')
		)
	)
	->add_tab(
		__('Service Types'),
		array(
			Field::make('text', 'service_type_heading', 'Heading'),
			Field::make('complex', 'services', 'Services')
				->set_layout('tabbed-vertical')
				->add_fields(
					array(
						Field::make('checkbox', 'service_not_active', 'Service Not Active')
							->set_help_text('check this to hide this service'),
						Field::make('text', 'service_name', 'Service Name'),
						Field::make('image', 'service_img', 'Service Image'),
						Field::make('text', 'service_ccm_factory_price', 'CCM factory price')
							->set_width(33),
						Field::make('text', 'service_home_address_price', 'Home address price')
							->set_width(33),
						Field::make('text', 'buy_now_select_name', 'Buy now select value')
							->set_width(33),
						Field::make('checkbox', 'show_price_on_button', 'Show price on bottom'),
						Field::make('rich_text', 'service_desc', 'Description'),
						Field::make('rich_text', 'service_desc_bottom', 'Bottom Description'),
						Field::make('complex', 'service_types', 'Service Types')
							->set_layout('tabbed-vertical')
							->add_fields(
								array(
									Field::make('text', 'service_type', 'Service Type'),
									Field::make('complex', 'services', 'Services')
										->set_layout('tabbed-vertical')
										->add_fields(
											array(
												Field::make('text', 'the_service', 'The Service'),
												Field::make('radio', 'type', 'Type')
													->add_options(
														array(
															'replace'                  => 'Replace',
															'inspect_adjust_lubricate' => 'Inspect/Adjust/Lubricate',
														)
													),
											)
										)
										->set_header_template('<%- the_service %>')
								)
							)
							->set_header_template('<%- service_type %>')
					)
				)
				->set_header_template('<%- service_name %>')
		)
	)
	->add_tab(
		__('Book a Service'),
		array(
			Field::make('text', 'book_a_service_heading', 'Heading'),
			Field::make('rich_text', 'book_a_service', 'Intro Text'),
		)
	)
	->add_tab(
		__('Warranty'),
		array(
			Field::make('text', 'warranty_heading', 'Heading'),
			Field::make('rich_text', 'warranty_content', 'Warranty Content'),
		)
	)
	->add_tab(
		__('Thank You Message'),
		array(
			Field::make('rich_text', 'thank_you_message', ''),
		)
	);

Container::make('post_meta', 'Page Components')
	->where('post_template', '=', 'templates/page-servicing.php')
	->set_priority('high')
	->add_tab(
		__('The Team'),
		array(
			Field::make('text', 'the_team_heading', 'Heading'),
			Field::make('rich_text', 'intro_text', 'Intro Text'),
			Field::make('complex', 'the_team', 'The Team')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'name', 'Name'),
						Field::make('rich_text', 'description', 'Description'),
					)
				)
				->set_header_template('<%- name %>')
		)
	)
	->add_tab(
		__('Service Types'),
		array(
			Field::make('text', 'service_type_heading', 'Heading'),
			Field::make('complex', 'services', 'Services')
				->set_layout('tabbed-vertical')
				->add_fields(
					array(
						Field::make('checkbox', 'service_not_active', 'Service Not Active')
							->set_help_text('check this to hide this service'),
						Field::make('text', 'service_name', 'Service Name'),
						Field::make('image', 'service_img', 'Service Image'),
						Field::make('text', 'service_ccm_factory_price', 'CCM factory price')
							->set_width(33),
						Field::make('text', 'service_home_address_price', 'Home address price')
							->set_width(33),
						Field::make('text', 'buy_now_select_name', 'Buy now select value')
							->set_width(33),
						Field::make('checkbox', 'show_price_on_button', 'Show price on bottom'),
						Field::make('rich_text', 'service_desc', 'Description'),
						Field::make('rich_text', 'service_desc_bottom', 'Bottom Description'),
						Field::make('complex', 'service_types', 'Service Types')
							->set_layout('tabbed-vertical')
							->add_fields(
								array(
									Field::make('text', 'service_type', 'Service Type'),
									Field::make('complex', 'services', 'Services')
										->set_layout('tabbed-vertical')
										->add_fields(
											array(
												Field::make('text', 'the_service', 'The Service'),
												Field::make('radio', 'type', 'Type')
													->add_options(
														array(
															'replace'                  => 'Replace',
															'inspect_adjust_lubricate' => 'Inspect/Adjust/Lubricate',
														)
													),
											)
										)
										->set_header_template('<%- the_service %>')
								)
							)
							->set_header_template('<%- service_type %>')
					)
				)
				->set_header_template('<%- service_name %>')
		)
	)
	->add_tab(
		__('Book a Service'),
		array(
			Field::make('text', 'book_a_service_heading', 'Heading'),
			Field::make('rich_text', 'book_a_service', 'Intro Text'),
		)
	)
	->add_tab(
		__('Insurance'),
		array(
			Field::make('text', 'insurance_heading', 'Heading'),
			Field::make('rich_text', 'insurance_content', 'Intro Text'),
		)
	)
	->add_tab(
		__('Thank You Message'),
		array(
			Field::make('rich_text', 'thank_you_message', ''),
		)
	);

Container::make('post_meta', 'Page Components')
	->where('post_template', '=', 'page-club-forum.php')
	->set_priority('high')
	->add_tab(
		__('Forum Rules'),
		array(
			Field::make('text', 'forum_rule_heading', 'Heading'),
			Field::make('rich_text', 'forum_rule_content', 'Content')
		)
	);


/*
Ex bike displays
*/
Container::make('post_meta', 'Approved Motorcycles Components')
	->set_context('normal')
	->set_priority('high')
	->where(
		'post_term',
		'=',
		array(
			'field'    => 'slug',
			'value'    => 'approved-motorcycles',
			'taxonomy' => 'product_cat',
		)
	)
	->add_fields(
		array(
			Field::make('rich_text', 'provenance', 'Provenance'),
			Field::make('rich_text', 'more_details', 'More Details'),


			Field::make('checkbox', 'pre_reg_tag', 'Pre-reg Tag'),
			Field::make('text', 'model', 'Model'),
			Field::make('text', 'mileage', 'Mileage'),
			Field::make('text', 'registration_year', 'Registration Year'),
			Field::make('text', 'registration_number', 'Registration Number'),
			Field::make('text', 'series_number', 'Series Number'),
			Field::make('text', 'warranty_term', 'Warranty Term'),
		)
	);

Container::make('post_meta', 'Configure Bike')
	->where('post_template', '=', 'templates/page-configure-bike.php')
	->add_fields(
		array(
			Field::make('text', 'bike_name', 'Bike Name'),
			Field::make('text', 'bike_initial_price', 'Bike Initial Price')
				->set_attribute('type', 'number'),
			Field::make('image', 'small_image', 'Small Image'),
			Field::make('text', 'text_below_image', 'Text Below Main Image'),
			Field::make('textarea', 'custom_scripts', 'Custom Scripts'),
			Field::make('complex', 'panel', 'Panel')
				->set_layout('tabbed-vertical')
				->add_fields(
					array(
						Field::make('text', 'panel_title', 'Panel Title'),
						Field::make('checkbox', 'select_one', 'Select one item only')
							->set_width(33),
						Field::make('checkbox', 'change_image', 'Change bike image when this item is selected')
							->set_width(33)
							->set_conditional_logic(
								array(
									array(
										'field'   => 'select_one',
										'value'   => true,
										'compare' => '=',
									)
								)
							),
						Field::make('checkbox', 'required', 'Required')
							->set_width(33),
						Field::make('complex', 'accesories', 'Accessories')
							->set_layout('tabbed-horizontal')
							->add_fields(
								array(
									Field::make('text', 'accessory_name', 'Name')
										->set_width(33),
									Field::make('select', 'accesory_type', 'Accesory Type')
										->add_options(
											array(
												''        => 'Custom',
												'product' => 'Product'
											)
										)
										->set_classes('accesory-type')
										->set_width(33),
									Field::make('select', 'product', 'Select Product')
										->set_classes('select-product')
										->add_options(get_product_lists())
										->set_conditional_logic(
											array(
												array(
													'field'   => 'accesory_type',
													'value'   => 'product',
													'compare' => '=',
												)

											)
										)
										->set_width(100),
									Field::make('checkbox', 'pre_selected', 'Pre selected')
										->set_width(50),
									Field::make('checkbox', 'change_image', 'Change bike image when this item is selected')
										->set_width(50),
									Field::make('text', 'accessory_price', 'Price')
										->set_attribute('type', 'number')
										->set_width(33)
										->set_conditional_logic(
											array(
												array(
													'field'   => 'accesory_type',
													'value'   => 'product',
													'compare' => '!=',
												)

											)
										),

									Field::make('text', 'accessory_part_number', 'Part Number')
										->set_width(33)
										->set_conditional_logic(
											array(
												array(
													'field'   => 'accesory_type',
													'value'   => 'product',
													'compare' => '!=',
												)

											)
										),

									Field::make('image', 'image', 'Image')
										->set_width(33)
										->set_conditional_logic(
											array(
												array(
													'field'   => 'accesory_type',
													'value'   => 'product',
													'compare' => '!=',
												)

											)
										),

									Field::make('image', 'image_change', 'Main Image')
										->set_width(33)
										->set_conditional_logic(
											array(
												'relation' => 'OR',
												array(
													'field'   => 'parent.change_image',
													'value'   => true,
													'compare' => '=',
												),
												array(
													'field'   => 'change_image',
													'value'   => true,
													'compare' => '=',
												)

											)
										)
										->set_help_text('Main image to be set if this item is selected. Leave black to use the image on the left.'),
									Field::make('rich_text', 'accessory_description', 'Description')
										->set_conditional_logic(
											array(
												array(
													'field'   => 'accesory_type',
													'value'   => 'product',
													'compare' => '!=',
												)

											)
										),
								)
							)
							->set_classes('bike-accesory')
							->set_header_template('<%- accessory_name %>')

					)
				)
				->set_header_template('<%- panel_title %>')

		)
	);

/*Container::make('post_meta', 'Page Options')
->set_context('side')
->where('post_type', '=', 'page' )
->add_fields(array(
Field::make( 'checkbox', 'do_not_show_header', 'Hide header' ),
Field::make( 'checkbox', 'do_not_show_footer', 'Hide footer' )
));*/

Container::make('post_meta', 'Page Options')
	->where('post_template', '=', 'templates/page-components.php')
	->set_context('side')
	->add_fields(
		array(
			Field::make('select', 'header_type', 'Header Type')
				->add_options(
					array(
						''                       => 'Default',
						'logo-only'              => 'Logo Only',
						'logo-only-with-buttons' => 'Logo Only with Buttons'
					)
				),
			Field::make('complex', 'header_buttons', 'Buttons')
				->add_fields(
					array(
						Field::make('text', 'button_text', 'Button Text'),
						Field::make('text', 'button_link', 'Button Link')
					)
				)
				->set_header_template('<%- button_text %>')
				->set_conditional_logic(
					array(
						array(
							'field'   => 'header_type',
							'value'   => 'logo-only-with-buttons',
							'compare' => '=',
						)
					)
				)
				->set_collapsed(true),
			Field::make('select', 'footer_type', 'Footer Type')
				->add_options(
					array(
						''          => 'Default',
						'bike-page' => 'Bike Page',
					)
				),
			Field::make('select', 'container_width', 'Container Width')
				->add_options(
					array(
						'default'        => 'Default',
						'wide witdh1700' => '1700px',
						'wide witdh1800' => '1800px'
					)
				),
			Field::make('checkbox', 'hide_contact_slider', 'Hide Contact Form Slider')
		)
	);


$technical_specs_default = array(
	array(
		'navigation'    => 'Engine',
		'specification' => array(
			array(
				'specs_label' => 'DISPLACEMENT',
				'specs_value' => '600cc',
			),
			array(
				'specs_label' => 'ENGINE',
				'specs_value' => 'Bore x stroke - 100 x 76.5 mm',
			),
			array(
				'specs_label' => 'ENGINE TYPE',
				'specs_value' => 'Single cylinder, Four-stroke',
			),
			array(
				'specs_label' => 'POWER',
				'specs_value' => '55 bhp',
			),
			array(
				'specs_label' => 'TORQUE',
				'specs_value' => '50 Nm @ 5,500 RPM',
			),
			array(
				'specs_label' => 'COMPRESSION',
				'specs_value' => '12.0:1',
			),
			array(
				'specs_label' => 'FUEL SYSTEM',
				'specs_value' => 'Injection: Mikuni D45',
			),
			array(
				'specs_label' => 'COOLING SYSTEM',
				'specs_value' => 'Liquid',
			),
			array(
				'specs_label' => 'GEARBOX',
				'specs_value' => '6 Speed',
			),
			array(
				'specs_label' => 'FINAL DRIVE',
				'specs_value' => 'Chain',
			),
			array(
				'specs_label' => 'CLUTCH',
				'specs_value' => 'Multiple-disc, wet, Hydraulic control',
			),
			array(
				'specs_label' => 'AVERAGE FUEL CONSUMPTION',
				'specs_value' => '56 mpg (7 1/100 km)',
			),
			array(
				'specs_label' => 'TANK',
				'specs_value' => 'Nylon Composite – Painted Finish',
			),
			array(
				'specs_label' => 'SERVICE INTERVALS',
				'specs_value' => '3,500 miles (5,600 km)',
			),
		)
	),
	array(
		'navigation'    => 'CHASSIS, SUSPENSION & BRAKES',
		'specification' => array(
			array(
				'specs_label' => 'FRAME TYPE',
				'specs_value' => 'High strength steel, Hand Tig welded',
			),
			array(
				'specs_label' => 'RAKE (FORK ANGLE)',
				'specs_value' => '26°',
			),
			array(
				'specs_label' => 'TRAIL',
				'specs_value' => '118 mm',
			),
			array(
				'specs_label' => 'FRONT SUSPENSION',
				'specs_value' => '120 mm wheel travel. Adjustable',
			),
			array(
				'specs_label' => 'REAR SUSPENSION',
				'specs_value' => '120 mm wheel travel. Adjustable',
			),
			array(
				'specs_label' => 'FRONT BRAKE',
				'specs_value' => '320 mm Disc',
			),
			array(
				'specs_label' => 'REAR BRAKE',
				'specs_value' => '240 mm Disc',
			),
		)
	),
	array(
		'navigation'    => 'STATIC DIMENSIONS',
		'specification' => array(
			array(
				'specs_label' => 'DRY WEIGHT',
				'specs_value' => '145 kg',
			),
			array(
				'specs_label' => 'POWER / WEIGHT RATIO',
				'specs_value' => '0.41 HP / kg',
			),
			array(
				'specs_label' => 'SEAT HEIGHT',
				'specs_value' => '830 mm',
			),
			array(
				'specs_label' => 'OVERALL HEIGHT (EXCL MIRRORS)',
				'specs_value' => '1,130 mm',
			),
			array(
				'specs_label' => 'OVERALL LENGTH',
				'specs_value' => '2,145 mm',
			),
			array(
				'specs_label' => 'WHEELBASE',
				'specs_value' => '1,455 mm',
			),
			array(
				'specs_label' => 'FUEL CAPACITY',
				'specs_value' => '14 litres',
			),
		)
	)
);
Container::make('post_meta', 'Page Components')
	->where('post_template', '=', 'templates/page-components.php')
	->or_where('post_type', '=', 'templates')
	->add_fields(
		array(
			Field::make('complex', 'page_components', '')
				->add_fields(
					'template',
					array(
						Field::make('select', 'template', 'Template')
							->add_options(get_templates()),
						Field::make('checkbox', 'hide_heading', 'Hide Heading'),
					)
				)
				->set_header_template('Template : <%- template %>')
				->add_fields(
					'banner',
					array(
						Field::make('radio', 'style', 'Banner Style')
							->add_options(
								array(
									'style-1' => 'Style 1',
									'style-2' => 'Style 2',
									'style-3' => 'Style 3',
								)
							),
						Field::make('text', 'heading', 'Heading')
							->set_default_value(isset($_GET['post']) ? get_the_title($_GET['post']) : ''),
						Field::make('text', 'subheading', 'Subheading'),
						Field::make('radio', 'background_type', 'Background Type')
							->add_options(
								array(
									''      => 'Self Hosted',
									'embed' => 'Embed',
								)
							),
						Field::make('file', 'background', 'Background'),
						Field::make('text', 'embed_id', 'Youtube Video ID')
							->set_conditional_logic(
								array(
									array(
										'field'   => 'background_type',
										'value'   => 'embed',
										'compare' => '=',
									)
								)
							)
							->set_help_text('Will be use in desktop devices'),
						Field::make('image', 'logo', 'Logo')
							->set_width(100)
							->set_conditional_logic(
								array(
									array(
										'field'   => 'style',
										'value'   => 'style-1',
										'compare' => '=',
									)
								)
							),
						Field::make('text', 'button_text', 'Button Text')
							->set_help_text('Leave blank if no button')
							->set_conditional_logic(
								array(
									array(
										'field'   => 'style',
										'value'   => 'style-2',
										'compare' => '=',
									)
								)
							)
							->set_width(50),
						Field::make('text', 'button_link', 'Button Link')
							->set_conditional_logic(
								array(
									array(
										'field'   => 'style',
										'value'   => 'style-2',
										'compare' => '=',
									)
								)
							)
							->set_width(50),
					)
				)
				->set_header_template('Banner : <%- heading %>')
				->add_fields(
					__('banner_slider'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('complex', 'banner_slider', '')
							->set_layout('tabbed-horizontal')
							->add_fields(
								array(
									Field::make('image', 'background_image', 'Background Image'),
									Field::make('rich_text', 'top_text', 'Top Text')
										->set_width(50),
									Field::make('text', 'heading', 'Heading')
										->set_width(50),
									Field::make('text', 'tagline', 'Tagline')
										->set_width(50),
									Field::make('text', 'button_text', 'Button Text')
										->set_help_text('Leave blank if no button')
										->set_width(50),
									Field::make('text', 'button_link', 'Button Link')
										->set_width(50),
								)
							)
							->set_header_template('<%- heading %>')
					)
				)
				->set_header_template('Banner Slider : <%- title %>')

				->add_fields(
					'columns',
					array(
						Field::make('select', 'number_of_columns', 'Number of Columns')
							->add_options(
								array(
									'col-sm-12' => 'One',
									'col-sm-6'  => 'Two',
									'col-sm-4'  => 'Three',
									'col-sm-3'  => 'Four',
								)
							),
						Field::make('text', 'heading', 'Heading'),
						Field::make('complex', 'columns', 'The Columns')
							->set_layout('tabbed-horizontal')
							->add_fields(
								array(
									Field::make('text', 'heading', 'Heading'),
									Field::make('image', 'image', 'Image'),
									Field::make('text', 'button_text', 'Button Text [1]')
										->set_default_value('Discover')
										->set_width(50),
									Field::make('text', 'button_link', 'Button Link [1]')
										->set_width(50),
									Field::make('text', 'button_text_2', 'Button Text [2]')
										->set_default_value('Configure')
										->set_width(50),
									Field::make('text', 'button_link_2', 'Button Link [2]')
										->set_width(50),
								)
							)
							->set_header_template('<%- heading %>')
					)
				)
				->set_header_template('Columns : <%- heading %>')
				->add_fields(
					'cta_bar',
					array(
						Field::make('text', 'heading', 'Heading'),
						Field::make('select', 'button_type', 'Button Type')
							->add_options(
								array(
									'normal'          => 'Normal',
									'modal'           => 'Modal',
									'target="_blank"' => 'New Tab',
								)
							)
							->set_width(33),
						Field::make('text', 'button_text', 'Button Text')
							->set_width(33),
						Field::make('text', 'button_link', 'Button Link')
							->set_width(33),
						Field::make('text', 'modal_heading', 'Modal Heading')
							->set_conditional_logic(
								array(
									array(
										'field'   => 'button_type',
										'value'   => 'modal',
										'compare' => '=',
									)
								)
							),
						Field::make('rich_text', 'modal_content', 'Modal Content')
							->set_conditional_logic(
								array(
									array(
										'field'   => 'button_type',
										'value'   => 'modal',
										'compare' => '=',
									)
								)
							),
					)
				)
				->set_header_template('CTA Bar [<%- heading %>]')
				->add_fields(
					'carousel_with_description',
					array(
						Field::make('textarea', 'description_top', 'Description'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('textarea', 'description', 'Description Below Carousel'),
						Field::make('media_gallery', 'image_carousel', 'Image Carousel')
							->set_required(true)
							->set_type(array('image')),
					)
				)
				->set_header_template('Carousel with Description : <%- heading %>')

				->add_fields('bike_part_bullets', array())

				->add_fields(
					'bike_colors',
					array(
						Field::make('complex', 'bike_colors', '')
							->add_fields(
								array(
									Field::make('image', 'color_image', 'Color Image')
										->set_width(20),
									Field::make('image', 'image', 'Bike Image')
										->set_width(80),
									Field::make('text', 'bike_color_name', 'Color Name'),
									Field::make('text', 'price', 'Price'),
								)
							)
							->set_header_template('<%- bike_color_name %>')
							->set_layout('tabbed-vertical')
					)
				)
				->add_fields(
					'technical_specifications',
					array(
						Field::make('radio', 'style', 'Style')
							->add_options(
								array(
									'style_1' => 'Style 1',
									'style_2' => 'Style 2',

								)
							),
						Field::make('text', 'heading', 'Heading')
							->set_default_value('TECHNICAL SPECIFICATIONS'),
						Field::make('complex', 'technical_specifications', '')
							->add_fields(
								array(
									Field::make('text', 'navigation', 'Navigation')
										->set_required(true),
									Field::make('complex', 'specification', 'Specifications')
										->add_fields(
											array(
												Field::make('text', 'specs_label', 'Specs Label')
													->set_width(50)
													->set_required(true),
												Field::make('text', 'specs_value', 'Specs Value')
													->set_width(50)

											)
										)
										->set_header_template('<%- specs_label %>')
										->set_layout('tabbed-vertical')
								)
							)
							->set_header_template('<%- navigation %>')
							->set_layout('tabbed-horizontal')
							->set_default_value($technical_specs_default)
							->set_required(true)
					)
				)
				->set_header_template('Technical Specifications : <%- heading %>')
				->add_fields(
					'two_columns_image_and_text',
					array(
						Field::make('image', 'image', 'Image'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('rich_text', 'description', 'Description'),
						Field::make('complex', 'buttons', 'Buttons')
							->add_fields(
								array(
									Field::make('text', 'button_text', 'Button Text')
										->set_default_value('Discover')
										->set_width(50),
									Field::make('text', 'button_link', 'Button Link')
								)
							)
							->set_header_template('<%- button_text %>')
							->set_layout('tabbed-vertical')

					)
				)
				->set_header_template('Two Column : Image and Text : <%- heading %>')
				->add_fields(
					__('justified_gallery'),
					array(
						Field::make('media_gallery', 'justified_gallery', 'Gallery')
							->set_type(array('image')),
					)
				)
				->add_fields(
					__('contact_form_slider'),
					array(
						Field::make('text', 'id', 'ID'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('rich_text', 'description', 'Description'),
						Field::make('checkbox', 'diplay_bike_models', 'Display Bike Models Fields')->set_width(50),
						Field::make('checkbox', 'is_iframe', 'Form is Iframe')->set_width(50),
						Field::make('textarea', 'contact_form_shortcode', 'Contact Form Shortcode/Iframe'),
					)
				)
				->set_header_template('Contact Form Slider : <%- heading %> [#<%- id %>]')
				->add_fields(
					__('info_section'),
					array(
						Field::make('radio', 'style', 'Style')
							->add_options(
								array(
									'style_1' => 'Style 1',
									'style_2' => 'Style 2',

								)
							),
						Field::make('text', 'heading', 'Heading'),
						Field::make('rich_text', 'description', 'Description'),
						Field::make('image', 'image', 'Background Image'),
						Field::make('text', 'button_text', 'Button Text')
							->set_default_value('Discover')
							->set_width(50),
						Field::make('text', 'button_link', 'Button Link')
							->set_width(50),
					)
				)
				->set_header_template('Info Section : <%- heading %>')
				->add_fields(
					__('bike_slider'),
					array(
						Field::make('text', 'heading', 'Heading'),
						Field::make('association', 'bike_category', 'Bike Category')
							->set_types(
								array(
									array(
										'type'     => 'term',
										'taxonomy' => 'bike-type',
									),
								)
							)
					)
				)
				->set_header_template('Bike Slider : <%- heading %>')
				->add_fields(
					__('latest_news'),
					array(
						Field::make('text', 'heading', 'Heading'),
						Field::make('html', 'latest_news_html', 'latest_news')
							->set_html('<h1> This section will display the latest news </h1>')

					)
				)
				->set_header_template('Latest News : <%- heading %>')
				->add_fields(
					__('colourways'),
					array(
						Field::make('radio', 'style', 'Style')
							->add_options(
								array(
									'style-1' => 'Style 1 (Colourways have single set of buttons and price)',
									'style-2' => 'Style 2 (Colourways have individual set of buttons and price)',
									'style-3' => 'Style 3 (Colourways have single set of buttons and individual price)',
								)
							)
							->set_width(50),
						Field::make('select', 'colourways_column', 'Colourways Column')
							->add_options(
								array(
									'col-sm-6'          => 'Two Columns',
									'col-md-4 col-sm-6' => 'Three Columns',
									'col-md-3 col-sm-6' => 'Four Columns',
								)
							)
							->set_width(50),
						Field::make('text', 'heading', 'Heading'),
						Field::make('rich_text', 'description', 'Description'),
						Field::make('text', 'price', 'Price')
							->set_conditional_logic(
								array(
									array(
										'field'   => 'style',
										'value'   => 'style-1',
										'compare' => '=',
									),

								)
							),

						Field::make('complex', 'colourways', 'Colourways')
							->add_fields(
								array(
									Field::make('text', 'heading', 'Heading'),
									Field::make('image', 'image', 'Image'),
									Field::make('text', 'price', 'Price')
										->set_conditional_logic(
											array(
												'relation' => 'OR',
												array(
													'field'   => 'parent.style',
													'value'   => 'style-2',
													'compare' => '=',
												),
												array(
													'field'   => 'parent.style',
													'value'   => 'style-3',
													'compare' => '=',
												)
											)
										),
									Field::make('complex', 'buttons', 'Buttons')
										->add_fields(
											array(
												Field::make('text', 'button_text', 'Button Text')
													->set_default_value('Discover')
													->set_width(50),
												Field::make('text', 'button_link', 'Button Link')
											)
										)
										->set_default_value(
											array(
												array('button_text' => 'CONFIGURE YOUR OWN'),
												array('button_text' => 'ENQUIRE NOW'),
											)
										)
										->set_max(2)
										->set_layout('tabbed-vertical')
										->set_header_template('<%- button_text %>')
										->set_conditional_logic(
											array(
												array(
													'field'   => 'parent.style',
													'value'   => 'style-2',
													'compare' => '=',
												)
											)
										)
								)
							)
							->set_layout('tabbed-vertical')
							->set_header_template('<%- heading %>'),
						Field::make('complex', 'buttons', 'Buttons')
							->add_fields(
								array(
									Field::make('text', 'button_text', 'Button Text')
										->set_default_value('Discover')
										->set_width(50),
									Field::make('text', 'button_link', 'Button Link')
								)
							)
							->set_default_value(
								array(
									array('button_text' => 'CONFIGURE YOUR OWN'),
									array('button_text' => 'ENQUIRE NOW'),
								)
							)
							->set_max(2)
							->set_layout('tabbed-vertical')
							->set_header_template('<%- button_text %>')
							->set_conditional_logic(
								array(
									'relation' => 'OR',
									array(
										'field'   => 'style',
										'value'   => 'style-1',
										'compare' => '=',
									),
									array(
										'field'   => 'style',
										'value'   => 'style-3',
										'compare' => '=',
									)
								)
							),

						Field::make('rich_text', 'bottom_text', 'Bottom Text'),
					)
				)
				->set_header_template('Colourways : <%- heading %>')
				->add_fields(
					__('cta_two_buttons'),
					array(
						Field::make('text', 'heading', 'Heading')
							->set_default_value(isset($_GET['post']) ? get_the_title($_GET['post']) : ''),
						Field::make('textarea', 'description', 'Description'),
						Field::make('complex', 'buttons', 'Buttons')
							->add_fields(
								array(
									Field::make('text', 'button_text', 'Button Text')
										->set_default_value('Discover')
										->set_width(50),
									Field::make('text', 'button_link', 'Button Link')
								)
							)
							->set_default_value(
								array(
									array('button_text' => ''),
									array('button_text' => ''),
								)
							)
							->set_max(2)
							->set_layout('tabbed-vertical')
							->set_header_template('<%- button_text %>')
					)
				)
				->set_header_template('CTA Two Buttons : <%- heading %>')
				->add_fields(
					__('image_hotspots'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('text', 'top_text', 'Top Text'),
						Field::make('text', 'shortcode', 'Shortcode'),
						Field::make('complex', 'mobile_parts', 'Mobile Parts')
							->add_fields(
								array(
									Field::make('text', 'part_name', 'Part Name')
								)
							)
							->set_layout('tabbed-horizontal')
							->set_header_template('<%- part_name %>'),
						Field::make('rich_text', 'bottom_text', 'Bottom Text'),
					)
				)
				->add_fields(
					__('three_column_image'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('image', 'image_1', 'Image 1')->set_width(33),
						Field::make('image', 'image_2', 'Image 2')->set_width(33),
						Field::make('image', 'image_3', 'Image 3')->set_width(33),
					)
				)
				->add_fields(
					__('logo_slider'),
					array(
						Field::make('text', 'heading', 'Heading'),
						Field::make('media_gallery', 'logo_slider', 'Logos')
					)
				)
				->set_header_template('Logo Slider : <%- heading %>')
				->add_fields(
					__('wysiwyg'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('text', 'custom_class', 'Class'),
						Field::make('rich_text', 'wysiwyg', 'Wysiwyg')
					)
				)
				->set_header_template('Wysiwyg : <%- title %>')
				->set_collapsed(true),
			Field::make('textarea', 'custom_css', 'Custom CSS')

		),

	);
/**/
/**Homepage Redesign/
/**/

Container::make('post_meta', 'Home Page Data')
	->where('post_template', '=', 'templates/page-homepage-redesign.php')
	->add_tab(
		__('Banner Slider'),
		array(
			Field::make('complex', 'banner_slider', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('image', 'background_image', 'Background Image'),
						Field::make('text', 'heading', 'Heading')
							->set_width(50),
						Field::make('text', 'tagline', 'Tagline')
							->set_width(50),
						Field::make('text', 'button_text', 'Button Text')
							->set_help_text('Leave blank if no button')
							->set_width(50),
						Field::make('text', 'button_link', 'Button Link')
							->set_width(50),
					)
				)
				->set_header_template('<%- heading %>')

		)
	);


Container::make('post_meta', 'Page Components')
	->where('post_template', '=', 'templates/page-maverick.php')
	->add_tab(
		__('Justified Gallery'),
		array(
			Field::make('media_gallery', 'justified_gallery', 'Gallery')
				->set_type(array('image')),
		)
	);

/* 
Bike Page 		==========================================================
*/
Container::make('post_meta', 'Bike Settings')
	->where('post_type', '=', 'bikes')
	->where('post_template', '!=', 'templates/page-tablet.php')
	->set_context('side')
	->add_fields(
		array(
			Field::make('image', 'bike_slider_background', 'Bike Slider Background')
				->set_width(50),
			Field::make('image', 'bike_slider_image', 'Bike Slider Home Image(PNG)')
				->set_width(50),
			Field::make('image', 'bike_slider_image_bike_page', 'Bike Slider Bike Page Image(PNG)')
				->set_width(50),
			Field::make('image', 'bike_menu_image', 'Bike Menu Image')
				->set_width(50),
			Field::make('textarea', 'bike_tagline', 'Bike Tagline')
				->set_width(50),
			/*
				 Field::make('checkbox', 'display_sticky_button', 'Display Mobile Sticky Button'),
				 Field::make('text', 'stickty_button_text', 'Sticky Mobile Button Text'),
				 Field::make('text', 'sticky_button_link', 'Sticky Mobile Button Link')*/
		)
	);

/* 
Contact Page 		==========================================================
*/
Container::make('post_meta', 'Contact Settings')
	->where('post_template', '=', 'page-contact.php')
	->add_fields(
		array(
			Field::make('text', 'contact_form_shortcode', 'Contact Form Shortcode')
		)
	);

Container::make('post_meta', 'Contact Settings')
	->where('post_template', '=', 'templates/page-contact-form.php')
	->add_fields(
		array(
			Field::make('textarea', 'contact_form_shortcode', 'Contact Form URL')
		)
	);

/* 
Header and Footer Scripts 		==========================================================
*/
Container::make('theme_options', __('Header and Footer Scripts'))
	->add_fields(
		array(
			Field::make('header_scripts', 'header_scripts', __('Header Scripts')),
			Field::make('footer_scripts', 'footer_scripts', __('Footer Scripts'))
		)
	);


/* 
Bike Tablet 		==========================================================
*/
Container::make('post_meta', 'Tablet Settings')
	->where('post_template', '=', 'templates/page-tablet.php')
	->add_fields(
		array(
			Field::make('checkbox', 'white_bg', 'White Background'),
			Field::make('text', 'subheading', 'Subheading'),
			Field::make('text', 'bike_price', 'Bike OTR Price')->set_width(50),
			Field::make('text', 'bike_shown_price', 'Bike Model Shown Price')->set_width(50),
			Field::make('html', 'specs')->set_html('<strong> Specifications </strong>'),
			Field::make('text', 'power', 'Power(BHP)')->set_width(25),
			Field::make('text', 'weight', 'Weight(KG)')->set_width(25),
			Field::make('text', 'engine', 'Engine(CC)')->set_width(25),
			Field::make('text', 'seat_height', 'Seat Height(MM)')->set_width(25),
			Field::make('text', 'width', 'Width(MM)')->set_width(25),
			Field::make('text', 'fuel_capacity', 'Fuel Capacity (L)')->set_width(25),
			Field::make('text', 'chassis', 'Chassis')->set_width(25),
			Field::make('html', 'finance_ex')->set_html('<strong> Finance Example </strong>'),
			Field::make('text', 'deposit', 'Deposit')->set_width(20),
			Field::make('text', 'term', 'Term(months)')->set_width(20),
			Field::make('text', 'payments', 'Payments')->set_width(20),
			Field::make('text', 'final_payment', 'Final Payment')->set_width(20),
			Field::make('text', 'apr', 'APR(%)')->set_width(20),
			Field::make('image', 'qr_coded', 'QR CODE'),
			Field::make('text', 'form', 'Form'),

		)
	);


/* 
Product Page 		==========================================================
*/
/*
Container::make('post_meta', 'Product is in the following configure pages')
->where('post_type', '=', 'product')
->add_fields(
array(
Field::make('html', 'product_in_bikes')
->set_html(product_in_bikes())
)
);
*/

function bike_individual_product_details($bike_code, $bike_name)
{
	return array(
		Field::make('checkbox', $bike_code . '_is_std_equipment', 'Is Std Equipment')->set_width(20),
		Field::make('checkbox', $bike_code . '_disable_auto_select', 'Disable Auto Select for ' . $bike_name)->set_width(20)
			->set_conditional_logic(
				array(
					array(
						'field'   => $bike_code . '_is_std_equipment',
						'value'   => true,
						'compare' => '=',
					),
				)
			),
		Field::make('checkbox', $bike_code . '_pre_selected', 'Pre selected')->set_width(60),
		Field::make('text', $bike_code . '_price', $bike_name . ' Price')->set_attribute('type', 'number')
			->set_help_text('Leave blank to use default price')
			->set_conditional_logic(
				array(
					array(
						'field'   => $bike_code . '_is_std_equipment',
						'value'   => true,
						'compare' => '!=',
					),
				)
			),
		Field::make('text', $bike_code . '_section_order', $bike_name . ' Section Order')->set_attribute('type', 'number'),
		Field::make('multiselect', $bike_code . '_related_products', __('Related Products'))
			->add_options(get_product_lists_sku())
	);
}


$postid = $_GET['post'];
global $wpdb;
$product_cat = $wpdb->get_results(
	"SELECT terms.name,  terms.slug
			FROM wp_term_relationships as term_relationships
			INNER JOIN wp_term_taxonomy  as term_taxonomy
			ON term_relationships.term_taxonomy_id =  term_taxonomy.term_taxonomy_id AND 
			term_taxonomy.parent = 405
			INNER JOIN wp_terms as terms
			ON term_taxonomy.term_taxonomy_id = terms.term_id
			WHERE term_relationships.object_id = $postid"
);

$product_cat = get_post_meta($postid, 'product_cat', true);


foreach ($product_cat as $cat) {
	Container::make('post_meta', 'Configurator ' . $cat)
		->where('post_type', '=', 'product')
		->add_fields(bike_individual_product_details($key, $cat));
}
/*
Container::make('post_meta', 'Configurator')
	->where('post_type', '=', 'product')
	->add_tab(
		'General Settings',
		array(
			Field::make('text', 'configurator_part_code', 'Configurator part code'),
			Field::make('text', 'configurator_price', 'Configurator price')->set_attribute('type', 'number'),

		)
	)
	->add_tab('Infinite Maverick', bike_individual_product_details('infinite_maverick', 'Infinite Maverick'))
	->add_tab('Maverick', bike_individual_product_details('maverick', 'Maverick'))
	->add_tab('Sandbox Maverick Base', bike_individual_product_details('sandbox_maverick_base', 'Sandbox Maverick Base'))
	->add_tab('Sandbox Maverick Premium', bike_individual_product_details('sandbox_maverick_premium', 'Sandbox Maverick Premium'))
	->add_tab('Sandbox Maverick Ultimate', bike_individual_product_details('sandbox_maverick_ultimate', 'Sandbox Maverick Ultimate'))
	->add_tab('Stealth Bobber', bike_individual_product_details('stealth_bobber', 'Stealth Bobber'))
	->add_tab('Bobber', bike_individual_product_details('bobber', 'Bobber'))
	->add_tab('Sandbox Bobber Base', bike_individual_product_details('sandbox_bobber_base', 'Sandbox Bobber Base'))
	->add_tab('Sandbox Bobber Premium', bike_individual_product_details('sandbox_bobber_premium', 'Sandbox Bobber Premium'))
	->add_tab('Sandbox Bobber Ultimate', bike_individual_product_details('sandbox_bobber_ultimate', 'Sandbox Bobber Ultimate'))
	->add_tab('Stealth Six', bike_individual_product_details('stealth_six', 'Stealth Six'))
	->add_tab('Six', bike_individual_product_details('six', 'Six'))
	->add_tab('Sandbox Six Base', bike_individual_product_details('sandbox_six', 'Sandbox Six Base'))
	->add_tab('Sandbox Six Premium', bike_individual_product_details('sandbox_six_premium', 'Sandbox Six Premium'))
	->add_tab('Sandbox Six Ultimate', bike_individual_product_details('sandbox_six_ultimate', 'Sandbox Six Ultimate'))
	->add_tab('Street Classic', bike_individual_product_details('street_classic', 'Street Classic'))
	->add_tab('Street Classic Infinite', bike_individual_product_details('street_classic_infinite', 'Street Classic Infinite'))
	->add_tab('Street Tracker', bike_individual_product_details('street_tracker', 'Street Tracker'))
	->add_tab('Sandbox Tracker Base', bike_individual_product_details('sandbox_tracker_base', 'Sandbox Tracker Base'))
	->add_tab('Sandbox Tracker Premium', bike_individual_product_details('sandbox_tracker_premium', 'Sandbox Tracker Premium'))
	->add_tab('Sandbox Tracker Ultimate', bike_individual_product_details('sandbox_tracker_ultimate', 'Sandbox Tracker Ultimate'))
	->add_tab('Street Moto', bike_individual_product_details('street_moto', 'Street Moto'))
	->add_tab('RAF 100', bike_individual_product_details('raf_100', 'RAF 100'))
	->add_tab('Heritage 71', bike_individual_product_details('heritage_71', 'Heritage 71'));
*/


Container::make('post_meta', 'Configurator')
	->where('post_template', '=', 'templates/page-configure-bike-v2.php')
	->add_fields(
		array(
			Field::make('association', 'product_category', __('Product Category'))
				->set_types(
					array(
						array(
							'type'     => 'term',
							'taxonomy' => 'product_cat',
						),
					)
				)
				->set_max(1),
			Field::make('text', 'bike_initial_price', 'Bike Initial Price')->set_attribute('type', 'number')
		)
	);



Container::make('term_meta', __('Category Properties'))
	->where('term_taxonomy', '=', 'product_cat')
	->add_fields(
		array(
			Field::make('html', 'category_html')
				->set_html('<label> Configure Bike Options </label>'),
			Field::make('checkbox', 'select_one', 'Select one item only'),
			Field::make('checkbox', 'change_image', 'Change bike image when this item is selected')
				->set_conditional_logic(
					array(
						array(
							'field'   => 'select_one',
							'value'   => true,
							'compare' => '=',
						)
					)
				),
			Field::make('checkbox', 'required', 'Required'),
			Field::make('checkbox', 'exclude_from_deselection', 'Exclude from package deselection'),
		)
	);


/*Container::make('post_meta', 'Configurator')
->where('post_type', '=', 'product')
->add_tab('Infinite Maverick', array(
Field::make('text', 'infinite_maverick_price', 'Infinite Maverick'),
Field::make('text', 'maverick_price', 'Maverick'),
Field::make('text', 'stealth_bobber_price', 'Stealth Bobber'),
Field::make('text', 'bobber_price', 'Bobber'),
Field::make('text', 'stealth_six_price', 'Stealth Six'),
Field::make('text', 'six_price', 'Six'),
Field::make('text', 'street_classic_infinite_price', 'Six'),
));*/
$bikes_categ = array(
	array(
		'category_name' => 'Bobbers',
		'bikes'         => array(
			array(
				'bike_name'      => 'BOBBER',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Bobber-Kingsport-Grey-menui-300x159-1.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/bobber/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/bobber/configure/',
			),
			array(
				'bike_name'      => 'STEALTH BOBBER',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Bobber_Stealth_300_160-1.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/stealth-bobber/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/stealth-bobber/configure/',
			),
			array(
				'bike_name'      => 'RAF100',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/RAF-100-Kingsport-Grey-menu-300x159-1.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/raf-spitfire-100/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/raf-spitfire-100/configure/',
			),
		),
	),
	array(
		'category_name' => 'Roadsters',
		'bikes'         => array(

			array(
				'bike_name'      => 'SIX',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/six-trimmed-300x138-1.png',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/six/configure/',
			),
			array(
				'bike_name'      => 'Street Moto',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/moto-grey-300x157-1.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/street-moto/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/street-moto/configure/',
			),
			array(
				'bike_name'      => 'Heritage 71',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Heritage-side-shot-Crop-300x157-1.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/heritage-71/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/heritage-71/configure/',
			),
		),
	),
	array(
		'category_name' => 'Scramblers',
		'bikes'         => array(
			array(
				'bike_name'      => 'MAVERICK',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2022/11/Transparency_Maverick_Green-cropped.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/maverick/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/maverick/configure-maverick/',
			),
			array(
				'bike_name'      => 'MAVERICK INFINITE',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Maverick_Infinity_CLEAR_-Black-foot-controls-300x200-1.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/maverick/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/maverick/configure-infinite-maverick/',
			),
		),
	),
	array(
		'category_name' => 'Trackers',
		'bikes'         => array(
			array(
				'bike_name'      => 'STREET TRACKER',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Street-Tracker-2.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/street-tracker/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/street-tracker/configure/',
			),
			array(
				'bike_name'      => 'CLASSIC TRACKER',
				'bike_price'     => '£10,585.00',
				'bike_image'     => 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Classic-Tracker-2-1.png',
				'discover_link'  => 'https://www.ccm-motorcycles.com/bikes/classic-tracker/',
				'configure_link' => 'https://www.ccm-motorcycles.com/bikes/classic-tracker/configure-street-classic/',
			),
		),
	),

);
Container::make('post_meta', 'Motorcycles')
	->where('post_template', '=', 'templates/page-bike-lists.php')
	->add_fields(
		array(
			Field::make('complex', 'motorcycles', __(''))
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'category_name', 'Category Name'),
						Field::make('complex', 'bikes', __('Bikes'))
							->set_layout('tabbed-vertical')
							->add_fields(
								array(
									Field::make('image', 'bike_image', 'Bike Image')
										->set_value_type('url'),
									Field::make('text', 'bike_name', 'Bike Name'),
									Field::make('text', 'bike_price', 'Bike Price'),
									Field::make('text', 'discover_link', 'Discover Link'),
									Field::make('text', 'configure_link', 'Configure Link'),

								)
							)->set_header_template('<%- bike_name %>')
					)
				)->set_default_value($bikes_categ)->set_header_template('<%- category_name %>')
		)
	);

Container::make('post_meta', 'Bike Details')
	->where('post_template', '=', 'templates/page-bike-template.php')
	->add_tab(
		'Bike Options',
		array(
			Field::make('text', 'configure_url', __('Configure URL')),
			Field::make('select', 'template_style', __('Template Style'))
				->add_options(
					array(
						'standard' => 'Standard',
						'v2'       => 'V2',
					)
				)
		)
	)
	->add_tab(
		'Hero',
		array(
			Field::make('radio', 'background_type', 'Background Type')
				->add_options(
					array(
						''      => 'Self Hosted',
						'embed' => 'Embed',
					)
				),
			Field::make('file', 'background', 'Background')
				->set_help_text('Will be played only on mobile if has embed video'),
			Field::make('text', 'embed_id', 'Youtube Video ID')
				->set_help_text('Youtube video will only be played on desktop')
				->set_conditional_logic(
					array(
						array(
							'field'   => 'background_type',
							'value'   => 'embed',
							'compare' => '=',
						)
					)
				)
		)
	)
	->add_tab(
		'Overview',
		array(
			Field::make('text', 'overview_heading', __('Heading')),
			Field::make('rich_text', 'overview_description', __('Description')),
			Field::make('image', 'overview_image', __('Image')),
		)
	)
	->add_tab(
		'Features',
		array(
			Field::make('complex', 'features', '')
				->set_layout('tabbed-horizontal')
				->add_fields(
					array(
						Field::make('text', 'heading', 'Heading'),
						Field::make('textarea', 'description', 'Description')
					)
				)->set_header_template('<%- heading %>'),
			Field::make('image', 'feature_image', __('Image')),

		)
	)
	->add_tab(
		'Gallery',
		array(
			Field::make('media_gallery', 'gallery', '')
				->set_type(array('image')),
		)
	)
	->add_tab(
		'Specifications',
		array(
			Field::make('complex', 'specifications', '')
				->add_fields(
					array(
						Field::make('text', 'navigation', 'Specs Title')
							->set_required(true),
						Field::make('complex', 'specification', 'Specifications')
							->add_fields(
								array(
									Field::make('text', 'specs_label', 'Specs Label')
										->set_width(50)
										->set_required(true),
									Field::make('text', 'specs_value', 'Specs Value')
										->set_width(50)

								)
							)
							->set_header_template('<%- specs_label %>')
							->set_layout('tabbed-vertical')
					)
				)
				->set_header_template('<%- navigation %>')
				->set_layout('tabbed-horizontal')
				->set_default_value($technical_specs_default)
				->set_required(true)
		)
	)
	->add_tab(
		'Fullwidth Image',
		array(
			Field::make('image', 'fullwidth_image', '')
		)
	)
	->add_tab(
		'Contact Form',
		array(
			Field::make('textarea', 'contact_form', '')
		)
	);


Container::make('theme_options', 'Motorcycle Mega Menu')
	->set_page_parent('edit.php?post_type=bikes')
	->add_fields(
		array(
			Field::make('association', 'motorcycle_mega_menu', __('Select Bikes'))
				->set_types(
					array(
						array(
							'type'      => 'post',
							'post_type' => 'bikes',
						)
					)
				),
			Field::make('complex', 'side_links', 'Side Links')
				->add_fields(
					array(
						Field::make('text', 'link_text', 'Link Text'),
						Field::make('text', 'link_url', 'Link URL'),
					)
				)
				->set_header_template('<%- link_text %>')
		)
	);


/**page components v2 */
Container::make('post_meta', 'Page Components V2')
	->where('post_template', '=', 'templates/page-components-v2.php')
	->or_where('post_type', '=', 'templates')
	->add_tab(
		'Hero',
		array(
			Field::make('text', 'alt_title', 'Alt Title'),
			Field::make('file', 'background', 'Background Image'),
		)
	)
	->add_tab(
		'Sections',
		array(
			Field::make('complex', 'page_components_v2', '')
				->add_fields(
					__('wysiwyg'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('rich_text', 'wysiwyg', 'Wysiwyg'),
						Field::make('text', 'button_text', 'Button Text'),
						Field::make('text', 'button_link', 'Button Link')
					)
				)
				->set_header_template('Wysiwyg : <%- title %>')
				->add_fields(
					__('two_columns'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('image', 'image', 'Image'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('rich_text', 'description', 'Description'),
						Field::make('text', 'button_text', 'Button Text'),
						Field::make('text', 'button_link', 'Button Link'),
						Field::make('checkbox', 'reverse_row', 'Reverse Row'),
					)
				)
				->set_header_template('Two Columns : <%- title %>')
				->add_fields(
					__('background_image_section'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('image', 'image', 'Image'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('rich_text', 'description', 'Description'),
						Field::make('text', 'button_text', 'Button Text'),
						Field::make('text', 'button_link', 'Button Link'),
					)
				)
				->set_header_template('Background Image Section : <%- title %>')
				->add_fields(
					__('two_column_carousel'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('complex', 'item', 'Items')
							->add_fields(
								array(
									Field::make('image', 'image', 'Image'),
									Field::make('text', 'heading', 'Heading'),
									Field::make('rich_text', 'description', 'Description')

								)
							)
							->set_header_template('<%- heading %>')
							->set_layout('tabbed-vertical')
					)
				)
				->set_header_template('Two Column Carousel : <%- title %>')
				->add_fields(
					__('accordion'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('complex', 'item', 'Items')
							->add_fields(
								array(
									Field::make('text', 'accordion_title', 'Accordion Title'),
									Field::make('rich_text', 'accordion_description', 'accordion_description')

								)
							)
							->set_header_template('<%- accordion_title %>')
							->set_layout('tabbed-vertical')
					)
				)
				->set_header_template('Accordion : <%- title %>')
				->add_fields(
					__('contact_form'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('text', 'heading', 'Heading'),
						Field::make('rich_text', 'description', 'Description'),
						Field::make('textarea', 'contact_form', 'Contact Form')

					)
				)
				->set_header_template('Contact Form : <%- title %>')
				->add_fields(
					__('buttons'),
					array(
						Field::make('text', 'title', 'Title'),
						Field::make('complex', 'buttons', 'Buttons')
							->add_fields(
								array(
									Field::make('text', 'button_text', 'Button Text'),
									Field::make('text', 'button_link', 'Button Link'),
								)
							)
							->set_header_template('<%- button_text %>')
							->set_layout('tabbed-vertical')
							->set_max(2)
					)
				)
				->set_header_template('Buttons : <%- title %>')
				->set_layout('tabbed-vertical')

		),
	);


/* 
Bikes		==========================================================
*/

Container::make('theme_options', 'Bikes')
	->set_page_parent('edit.php?post_type=bikes')
	->add_fields(
		array(
			Field::make('association', 'bikes', __('Select Bikes'))
				->set_types(
					array(
						array(
							'type'      => 'post',
							'post_type' => 'bikes',
						)
					)
				)
		)
	);

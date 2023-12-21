<?php
/*-----------------------------------------------------------------------------------*/
/* This file will be referenced every time a template/page loads on your Wordpress site
/* This is the place to define custom fxns and specialty code
/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define('ccm_VERSION', 1.0);
define('style_version', 4.1);
define('WPSL_MARKER_URI', dirname(get_bloginfo('stylesheet_url')) . '/wpsl/wpsl-markers/');

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if (!isset($content_width))
	$content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support('automatic-feed-links');
add_post_type_support('forum', array('thumbnail'));
// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types)
{

	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes);

	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus(
	array(
		'left'          => __('CPT Menu', 'ccm'),
		'left-main'     => __('Left Primary Menu', 'ccm'),
		'right'         => __('Right Menu', 'ccm'),
		'mobile'        => __('Mobile Menu', 'ccm'),
		'footer1'       => __('Footer1 Menu', 'ccm'),
		'footer2'       => __('Footer2 Menu', 'ccm'),
		'footer3'       => __('Footer3 Menu', 'ccm'),
		'bottom-footer' => __('Bottom Footer Menu', 'ccm'),
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function ccm_register_sidebars()
{
	register_sidebar(
		array(
			// Start a series of sidebars to register
			'id'            => 'sidebar',
			// Make an ID
			'name'          => 'Sidebar',
			// Name it
			'description'   => 'Take it on the side...',
			// Dumb description for the admin side
			'before_widget' => '<div>',
			// What to display before each widget
			'after_widget'  => '</div>',
			// What to display following each widget
			'before_title'  => '<h3 class="side-title">',
			// What to display before each widget's title
			'after_title'   => '</h3>',
			// What to display following each widget's title
			'empty_title'   => '',
			// What to display in the case of no title defined for a widget
			// Copy and paste the lines above right here if you want to make another sidebar, 
			// just change the values of id and name to another word/name
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Sidebar 1',
			'id'            => 'footer-sidebar-1',
			'description'   => 'Appears in the footer area - Column 1',
			'before_widget' => '<aside id="%1$s" class="block %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Sidebar 2',
			'id'            => 'footer-sidebar-2',
			'description'   => 'Appears in the footer area - Column 2',
			'before_widget' => '<aside id="%1$s" class="block %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Sidebar 3',
			'id'            => 'footer-sidebar-3',
			'description'   => 'Appears in the footer area - Column 3',
			'before_widget' => '<aside id="%1$s" class="block %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Sidebar 4',
			'id'            => 'footer-sidebar-4',
			'description'   => 'Appears in the footer area - Column 4',
			'before_widget' => '<aside id="%1$s" class="block %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
}
// adding sidebars to Wordpress (these are created in functions.php)
add_action('widgets_init', 'ccm_register_sidebars');


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function onetarek_wpmut_admin_scripts()
{
	if (isset($_GET['page']) && $_GET['page'] == 'oneTarek_wpmut_plugin_page') {
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_register_script('my-upload', get_template_directory_uri() . '/onetarek-wpmut-admin-script.js', array('jquery', 'media-upload', 'thickbox'));
		wp_enqueue_script('my-upload');
	}
}

function onetarek_wpmut_admin_styles()
{
	if (isset($_GET['page']) && $_GET['page'] == 'oneTarek_wpmut_plugin_page') {
		wp_enqueue_style('thickbox');
	}
}
add_action('wp_enqueue_scripts', 'onetarek_wpmut_admin_scripts');
add_action('wp_enqueue_scripts', 'onetarek_wpmut_admin_styles');
function ccm_scripts()
{
	wp_enqueue_style('ccm-owl-style', get_template_directory_uri() . '/app/stylesheets/vendors/owl.carousel.min.css');
	wp_enqueue_style('ccm-owl-theme', get_template_directory_uri() . '/app/stylesheets/vendors/owl.theme.default.min.css');

	if (!is_front_page()) {
		wp_enqueue_style('ccm-jquery-ui', 'https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.min.css');
		wp_enqueue_style('ccm-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('ccm-timeline-theme', get_template_directory_uri() . '/app/stylesheets/vendors/timeline.min.css');
		wp_enqueue_style('ccm-remodal-theme', get_template_directory_uri() . '/app/stylesheets/vendors/remodal-default-theme.css');
		wp_enqueue_style('ccm-remodal-style', get_template_directory_uri() . '/app/stylesheets/vendors/remodal.css');
		wp_enqueue_style('ccm-justified-style', get_template_directory_uri() . '/app/stylesheets/vendors/justifiedGallery.css');
		wp_enqueue_style('ccm-fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css');
	}
	wp_enqueue_style('ccm-main-style', get_template_directory_uri() . '/app/stylesheets/main.css', '', style_version);

	wp_enqueue_script('ccm-jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
	if (!is_front_page()) {
		wp_enqueue_script('ccm-jquery-ui-js', 'https://code.jquery.com/ui/1.13.1/jquery-ui.min.js');
		wp_enqueue_script('ccm-timeline', get_template_directory_uri() . '/app/javascripts/vendors/timeline.min.js');
		wp_enqueue_script('ccm-remodal', get_template_directory_uri() . '/app/javascripts/vendors/remodal.js');
		wp_enqueue_script('ccm-justified', get_template_directory_uri() . '/app/javascripts/vendors/jquery.justifiedGallery.js');
		wp_enqueue_script('ct-match-height', get_template_directory_uri() . '/app/javascripts/vendors/jquery.matchHeight-min.js');
		wp_enqueue_script('ct-fanct', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js');
	}
	wp_enqueue_script('ccm-bootstrap', get_template_directory_uri() . '/app/javascripts/vendors/bootstrap.min.js');
	wp_enqueue_script('ccm-owl-script', get_template_directory_uri() . '/app/javascripts/vendors/owl.carousel.min.js');
	wp_enqueue_script('ccm-script', get_template_directory_uri() . '/app/javascripts/main.js', '', style_version);

	if (is_post_type_archive('bikes') || is_page_template('templates/page-components.php') || is_page_template('templates/page-components-v2.php') || is_page_template('templates/page-bikes.php') || is_page_template('templates/page-bike-template.php')) {
		wp_enqueue_style('ccm-aos', get_template_directory_uri() . '/app/vendors/aos.css');
		wp_enqueue_style('ccm-swiper', get_template_directory_uri() . '/app/vendors/swiper-bundle.min.css');

		wp_enqueue_script('ccm-aos-js', get_template_directory_uri() . '/app/vendors/aos.js');
		wp_enqueue_script('ccm-swiper-js', get_template_directory_uri() . '/app/vendors/swiper-bundle.min.js');
	}

	if (is_page_template('templates/page-tablet.php')) {
		wp_enqueue_script('ccm-no-sleep', get_template_directory_uri() . '/app/javascripts/NoSleep.min.js');
	}



	$data_array = array(
		'ajaxurl' => admin_url('admin-ajax.php')
	);

	wp_localize_script('ccm-script', 'myAjax', $data_array);
	wp_localize_script('ccm-script2', 'myAjax', $data_array);
}
add_action('wp_enqueue_scripts', 'ccm_scripts'); // Register this fxn and allow Wordpress to call it automatcally in the header


function remove_assets()
{
	if (is_front_page()) {
		wp_deregister_script('mfcf7_zl_multiline_files_script');
		wp_deregister_script('woo-advanced-discounts');
		wp_deregister_script('o-tooltip');
		wp_deregister_script('wc-add-to-cart');
		wp_deregister_script('woocommerce');
		wp_deregister_script('image_zoooom');
		wp_deregister_script('image_zoooom-init');
		wp_deregister_script('foobox-free-min');

		wp_deregister_style('cf7rt-front-style');
		wp_deregister_style('dashicons');
		wp_deregister_style('wp-emoji-styles-inline');
		wp_deregister_style('bbp-default');
		wp_deregister_style('contact-form-7');
		wp_deregister_style('powertip');
		wp_deregister_style('maps-points');
		wp_deregister_style('foobox-free-min');
		wp_deregister_style('mfcf7_zl_button_style');
		wp_deregister_style('woo-advanced-discounts');
		wp_deregister_style('o-tooltip');
		wp_deregister_style('woocommerce-layout');
		wp_deregister_style('woocommerce-smallscreen');
		wp_deregister_style('woocommerce-general');
		wp_deregister_style('wpsl-styles');
		wp_deregister_style('wpcf7-redirect-script-frontend');
		wp_deregister_style('tinvwl-webfont-font');
		wp_deregister_style('tinvwl-webfont');
		wp_deregister_style('tinvwl');
		wp_deregister_style('gdatt-attachments');
		wp_deregister_style('wc_acf_af');
	}
}
add_action('wp_enqueue_scripts', 'remove_assets', 999);
add_action('wp_head', 'remove_assets', 999);

function remove_scripts_styles_footer()
{
	if (is_front_page()) {
		wp_deregister_script('swv');
		wp_deregister_script('contact-form-7');
		wp_deregister_script('powertip');
		wp_deregister_script('maps-points');
		wp_deregister_script('tinvwl');
		wp_deregister_script('wc-cart-fragments');
		wp_deregister_script('gdatt-attachments');
		wp_deregister_script('wpcf7-redirect-script');
		wp_deregister_script('jquery-woo-login-styler');
	}
}

add_action('wp_footer', 'remove_scripts_styles_footer');
/*-----------------------------------------------------------------------------------*/
/* Donald Functions
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/*  USER REGISTRATION IN /my-account
/*-----------------------------------------------------------------------------------*/
function wooc_extra_register_fields()
{
?>

	<p class="form-row form-row-first">
		<label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name']))
																												esc_attr_e($_POST['billing_first_name']); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="reg_billing_last_name"><?php _e('Last name', 'woocommerce'); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name']))
																												esc_attr_e($_POST['billing_last_name']); ?>" />
	</p>
	<p class="form-row form-row-wide display_name_xx">
		<label for="reg_nickname"><?php _e('Display name', 'woocommerce'); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="nickname" id="reg_nickname" value="<?php if (!empty($_POST['nickname']))
																							esc_attr_e($_POST['nickname']); ?>" />
	</p>
	<p class="form-row form-row-wide">
		<label for="reg_confirm_password"><?php _e('Confirm Password', 'woocommerce'); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="confirm_password" id="reg_confirm_password" />
	</p>
	<p class="form-row form-row-wide heading">
	<h3>CONTACT INFORMATION</h3>
	</p>
	<p class="form-row form-row-wide">
		<label for="reg_billing_phone"><?php _e('Phone', 'woocommerce'); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e($_POST['billing_phone']); ?>" />
	</p>
	<p class="form-row form-row-wide">
		<label for="reg_billing_address_1"><?php _e('Street Address', 'woocommerce'); ?> <span class="required">*</span></label>
	</p>
	<p class="form-row form-row-first">
		<label for="reg_billing_address_1"><?php _e('', 'woocommerce'); ?></label>
		<input type="text" class="input-text" placeholder="House number and street name" name="billing_address_1" id="reg_billing_address_1" value="<?php esc_attr_e($_POST['billing_address_1']); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="reg_billing_address_2"><?php _e('', 'woocommerce'); ?></label>
		<input type="text" class="input-text" placeholder="Apartment, suite, unit, etc.(optional)" name="billing_address_2" id="reg_billing_address_2" value="<?php esc_attr_e($_POST['billing_address_2']); ?>" />
	</p>
	<p class="form-row form-row-first">
		<label for="reg_billing_city"><?php _e('Town/City', 'woocommerce'); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="<?php esc_attr_e($_POST['billing_city']); ?>" />
	</p>
	<p class="form-row form-row-last">
		<label for="reg_billing_postcode"><?php _e('Zip/Postcode', 'woocommerce'); ?> <span class="required">*</span></label>
		<input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php esc_attr_e($_POST['billing_postcode']); ?>" />
	</p>
	<?php
	$countries_obj = new WC_Countries();
	$countries = $countries_obj->__get('countries');
	?>
	<p class="form-row form-row-first">
		<label for="reg_billing_postcode"><?php _e('Country', 'woocommerce'); ?> <span class="required">*</span></label>
		<select name="billing_country" id="reg_billing_country" class="input-text">
			<option value=""></option>
			<?php foreach ($countries as $countries_key => $countries_value) : ?>
				<option value="<?php echo $countries_key; ?>"><?php echo $countries_value; ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<div class="ownership ">
		<p class="form-row form-row-wide">
			<input type="hidden" class="input-text" name="ownership" id="owner" value="<?php esc_attr_e($_POST['ownership']); ?>" />
		</p>

		<div class="clear">

		</div>
	<?php
}
add_action('woocommerce_register_form_start', 'wooc_extra_register_fields');

function wooc_validate_extra_register_fields($username, $email, $validation_errors)
{
	if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
		$validation_errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
	}

	if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
		$validation_errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
	}
	if (isset($_POST['nick_name']) && empty($_POST['nick_name'])) {
		$validation_errors->add('billing_nickname_error', __('<strong>Error</strong>: Nickname is required!', 'woocommerce'));
	}
	if (isset($_POST['billing_address_1']) && empty($_POST['billing_address_1'])) {
		$validation_errors->add('billing_address_1', __('<strong>Error</strong>: House number and street number is required!', 'woocommerce'));
	}
	if (isset($_POST['billing_city']) && empty($_POST['billing_city'])) {
		$validation_errors->add('billing_city', __('<strong>Error</strong>: Town/City is required!', 'woocommerce'));
	}
	if (isset($_POST['billing_postcode']) && empty($_POST['billing_postcode'])) {
		$validation_errors->add('billing_postcode', __('<strong>Error</strong>: Postcode is required!', 'woocommerce'));
	}
	if (isset($_POST['billing_country']) && empty($_POST['billing_country'])) {
		$validation_errors->add('billing_country', __('<strong>Error</strong>: Country is required!', 'woocommerce'));
	}
	return $validation_errors;
}
add_action('woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3);


function wooc_save_extra_register_fields($customer_id)
{
	/*if ( isset( $_POST['acf']['field_5d10995760714'] ) ) {
	 update_user_meta($customer_id, 'acf[field_5d10995760714]', $_POST['acf']['field_5d10995760714']);
	 }*/
	if (isset($_POST['billing_phone'])) {
		// Phone input filed which is used in WooCommerce
		update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
	}
	if (isset($_POST['billing_first_name'])) {
		//First name field which is by default
		update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
		// First name field which is used in WooCommerce
		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
	}
	if (isset($_POST['billing_last_name'])) {
		// Last name field which is by default
		update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
		// Last name field which is used in WooCommerce
		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
	}
	if (isset($_POST['nickname'])) {
		update_user_meta($customer_id, 'nickname', sanitize_text_field($_POST['nickname']));
		wp_update_user(array('ID' => $customer_id, 'display_name' => sanitize_text_field($_POST['nickname'])));
	}
	if (isset($_POST['billing_address_1'])) {
		// Phone input filed which is used in WooCommerce
		update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
	}
	if (isset($_POST['billing_address_2'])) {
		// Phone input filed which is used in WooCommerce
		update_user_meta($customer_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']));
	}
	if (isset($_POST['billing_city'])) {
		// Phone input filed which is used in WooCommerce
		update_user_meta($customer_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
	}
	if (isset($_POST['billing_postcode'])) {
		// Phone input filed which is used in WooCommerce
		update_user_meta($customer_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
	}

	if (isset($_POST['billing_country'])) {
		// country input filed which is used in WooCommerce
		update_user_meta($customer_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
	}

	if (isset($_POST['ownership'])) {
		// Phone input filed which is used in WooCommerce
		/*update_user_meta( $customer_id, 'ownership', sanitize_text_field( $_POST['ownership'] ) );*/
		if ($_POST['ownership'] == "yes") {
			$user = new WP_User($customer_id);
			$user->remove_role('customer');
			$user->add_role('ccm_owner');
		} else {
			$user = new WP_User($customer_id);
			$user->remove_role('customer');
			$user->add_role('subscriber');
			/*$new_role = array("subscriber" => 1);
				 $data = serialize( $new_role ); 
				 update_user_meta( $customer_id, 'wp_capabilities', $new_role);*/
		}
	}
}
add_action('woocommerce_created_customer', 'wooc_save_extra_register_fields');
/*-----------------------------------------------------------------------------------*/
/* END OF USER REGISTRATION IN /my-account
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
/*  USER REGISTRATION IN /ccm-login
/*-----------------------------------------------------------------------------------*/
function register_fields_ccm_login()
{
	?>

		<p class="form-row form-row-first">
			<label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name']))
																													esc_attr_e($_POST['billing_first_name']); ?>" />
		</p>
		<p class="form-row form-row-last">
			<label for="reg_billing_last_name"><?php _e('Last name', 'woocommerce'); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name']))
																													esc_attr_e($_POST['billing_last_name']); ?>" />
		</p>

		<p class="form-row form-row-wide the-email">

		</p>
		<p class="form-row form-row-wide the-display-name">

		</p>


		<p class="form-row form-row-wide">
			<label for="reg_password"><?php _e('Password', 'woocommerce'); ?> <span class="required">*</span></label>
			<input type="password" class="input-text" name="password" id="reg_password" value="<?php esc_attr_e($_POST['password']); ?>" />
		</p>
		<p class="form-row form-row-wide">
			<label for="reg_confirm_password"><?php _e('Confirm Password', 'woocommerce'); ?> <span class="required">*</span></label>
			<input type="password" class="input-text" name="confirm_password" id="reg_confirm_password" value="<?php esc_attr_e($_POST['confirm_password']); ?>" />
		</p>
		<p class="form-row form-row-wide heading">
		<h3>CONTACT INFORMATION</h3>
		</p>
		<p class="form-row form-row-wide">
			<label for="reg_billing_phone"><?php _e('Phone', 'woocommerce'); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e($_POST['billing_phone']); ?>" />
		</p>
		<p class="form-row form-row-wide">
			<label for="reg_billing_address_1"><?php _e('Street Address', 'woocommerce'); ?> <span class="required">*</span></label>
		</p>
		<p class="form-row form-row-first">
			<label for="reg_billing_address_1"><?php _e('', 'woocommerce'); ?></label>
			<input type="text" class="input-text" placeholder="House number and street name" name="billing_address_1" id="reg_billing_address_1" value="<?php esc_attr_e($_POST['billing_address_1']); ?>" />
		</p>
		<p class="form-row form-row-last">
			<label for="reg_billing_address_2"><?php _e('', 'woocommerce'); ?></label>
			<input type="text" class="input-text" placeholder="Apartment, suite, unit, etc.(optional)" name="billing_address_2" id="reg_billing_address_2" value="<?php esc_attr_e($_POST['billing_address_2']); ?>" />
		</p>
		<p class="form-row form-row-first">
			<label for="reg_billing_city"><?php _e('Town/City', 'woocommerce'); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="<?php esc_attr_e($_POST['billing_city']); ?>" />
		</p>
		<p class="form-row form-row-last">
			<label for="reg_billing_postcode"><?php _e('Zip/Postcode', 'woocommerce'); ?> <span class="required">*</span></label>
			<input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="<?php esc_attr_e($_POST['billing_postcode']); ?>" />
		</p>
		<?php
		$countries_obj = new WC_Countries();
		$countries = $countries_obj->__get('countries');
		?>
		<p class="form-row form-row-first">
			<label for="reg_billing_postcode"><?php _e('Country', 'woocommerce'); ?> <span class="required">*</span></label>
			<select name="billing_country" id="reg_billing_country" class="input-text" style="background-color: #eceaea; border: none; border-radius: 0; height: 50px; width: 100%;">
				<option value=""></option>
				<?php foreach ($countries as $countries_key => $countries_value) : ?>
					<option value="<?php echo $countries_key; ?>"><?php echo $countries_value; ?></option>
				<?php endforeach; ?>
			</select>
		</p>
		<div class="ownership hide-div">
			<p class="form-row form-row-wide">
				<input type="hidden" class="input-text" name="ownership" id="owner" value="<?php esc_attr_e($_POST['ownership']); ?>" />
			</p>
		</div>
		<div class="woocommerce-privacy-policy-text">
			<p>
				Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="https://www.ccm-motorcycles.com/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.
			</p>
		</div>
		<?php
	}
	add_action('register_form', 'register_fields_ccm_login');

	function registration_process_validation($errors, $sanitized_user_login, $user_email)
	{
		if (isset($_POST['password']) && empty($_POST['password'])) {
			$errors->add('password_error', __('<strong>Error</strong>: Password is empty!', 'woocommerce'));
		}

		if ($_POST['password'] != $_POST['confirm_password']) {
			$errors->add('password_not_match_error', __('<strong>Error</strong>: Password do not match!', 'woocommerce'));
		}

		if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
			$errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
		}

		if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
			$errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
		}
		if (isset($_POST['nick_name']) && empty($_POST['nick_name'])) {
			$errors->add('billing_nickname_error', __('<strong>Error</strong>: Nickname is required!', 'woocommerce'));
		}
		if (isset($_POST['billing_address_1']) && empty($_POST['billing_address_1'])) {
			$errors->add('billing_address_1', __('<strong>Error</strong>: House number and street number is required!', 'woocommerce'));
		}
		if (isset($_POST['billing_city']) && empty($_POST['billing_city'])) {
			$errors->add('billing_city', __('<strong>Error</strong>: Town/City is required!', 'woocommerce'));
		}
		if (isset($_POST['billing_postcode']) && empty($_POST['billing_postcode'])) {
			$errors->add('billing_postcode', __('<strong>Error</strong>: Postcode is required!', 'woocommerce'));
		}
		if (isset($_POST['billing_country']) && empty($_POST['billing_country'])) {
			$errors->add('billing_country', __('<strong>Error</strong>: Country is required!', 'woocommerce'));
		}
		return $errors;
	}
	add_filter('registration_errors', 'registration_process_validation', 10, 3);

	function register_user_ccm_login($user_id)
	{
		if (isset($_POST['password'])) {
			wp_set_password($_POST['password'], $user_id);
		}

		if (isset($_POST['acf']['field_5d10995760714'])) {
			update_user_meta($user_id, 'acf[field_5d10995760714]', $_POST['acf']['field_5d10995760714']);
		}
		if (isset($_POST['billing_phone'])) {
			// Phone input filed which is used in WooCommerce
			update_user_meta($user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
		}
		if (isset($_POST['billing_first_name'])) {
			//First name field which is by default
			update_user_meta($user_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
			// First name field which is used in WooCommerce
			update_user_meta($user_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
		}
		if (isset($_POST['billing_last_name'])) {
			// Last name field which is by default
			update_user_meta($user_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
			// Last name field which is used in WooCommerce
			update_user_meta($user_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
		}
		if (isset($_POST['nickname'])) {
			// Phone input filed which is used in WooCommerce
			update_user_meta($user_id, 'nickname', sanitize_text_field($_POST['nickname']));
			wp_update_user(array('ID' => $user_id, 'display_name' => sanitize_text_field($_POST['nickname'])));
		}
		if (isset($_POST['billing_address_1'])) {
			// Phone input filed which is used in WooCommerce
			update_user_meta($user_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
		}
		if (isset($_POST['billing_address_2'])) {
			// Phone input filed which is used in WooCommerce
			update_user_meta($user_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']));
		}
		if (isset($_POST['billing_city'])) {
			// Phone input filed which is used in WooCommerce
			update_user_meta($user_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
		}
		if (isset($_POST['billing_postcode'])) {
			// Phone input filed which is used in WooCommerce
			update_user_meta($user_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
		}
		if (isset($_POST['billing_country'])) {
			// Phone input filed which is used in WooCommerce
			update_user_meta($user_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
		}

		if (isset($_POST['ownership'])) {
			// Phone input filed which is used in WooCommerce
			if ($_POST['ownership'] == "yes") {
				$user = new WP_User($user_id);
				$user->remove_role('subscriber');
				$user->add_role('ccm_owner');
			} else {
				$user = new WP_User($user_id);
				$user->add_role('subscriber');
			}
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* Carbon Fields
/*-----------------------------------------------------------------------------------*/


	add_action('carbon_fields_register_fields', 'cv_register_custom_fields',);
	function cv_register_custom_fields()
	{
		require_once(dirname(__FILE__) . '/includes/post-meta.php');
	}
	require_once('includes/post-types.php');
	require_once('includes/shortcodes.php');
	require_once('includes/carbonfields.php');
	require_once('includes/theme-widgets.php');
	require_once('wpsl/wp-store-locator.php');
	add_shortcode('mega_nav', 'mega_nav_menu');

	function mega_nav_menu($atts)
	{

		extract(
			shortcode_atts(
				array(
					'nav_name' => '',
				),
				$atts
			)
		);
		$locations = get_registered_nav_menus();
		$menus = wp_get_nav_menus();
		$menu_locations = get_nav_menu_locations();

		$location_id = $atts['nav_name'];


		if (isset($menu_locations[$location_id])) {
			foreach ($menus as $menu) {
				if ($menu->term_id == $menu_locations[$location_id]) {
					$menu_items = wp_get_nav_menu_items($menu);
					foreach ($menu_items as $item) {

						$mega_menu[$item->post_title]['cpt_name'] = $item->classes[0];
						$taxonomy_name = $item->classes[1];
						$mega_menu[$item->post_title]['taxonomy_name'] = $taxonomy_name;
						$mega_menu[$item->post_title]['url'] = $item->url;


						$terms = get_terms(
							$taxonomy_name,
							array(
								'hide_empty' => false,
							)
						);

						if (count($terms) && $taxonomy_name != '') {
							foreach ($terms as $key => $val) {
								$category_name = $val->name;
								$category_id = $val->term_id;

								$args = array(
									'post_type' => $cpt_name,
									'tax_query' => array(
										array(
											'taxonomy' => $taxonomy_name,
											'field'    => 'term_id',
											'terms'    => $category_id
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
							<a href="javascript:void(0)" class="menu-parent"><?= $parent_key ?> <img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
							<ul class="dropdown-menu mega-menu bike_menu" style="display: none;">
								<li class="mega-menu-column">
									<div class="megamenu-breadcrumb">
										<div class="container">
											<?php foreach (array_reverse($parent_value) as $k => $v) :
												if ($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url') :
													$class_tax_button = preg_replace('/\s+/', '', $k); ?>
													<a href="javascript:void(0)" class="taxonomy-button" data-menu-name="<?= $class_tax_button ?>"><?= $k ?><img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
											<?php endif;
											endforeach ?>
										</div>
									</div>

									<?php foreach ($parent_value as $k => $v) :
										if ($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url') :
											$class_tax_dropdown = preg_replace('/\s+/', '', $k); ?>
											<div class="mega-dropdown-menu <?= $class_tax_dropdown ?>" style="display: none;">
												<div class="container">
													<h2><?= $k ?></h2>
													<div class="separator"></div>
													<div class="row">
														<?php foreach ($v as $postkey => $postvalue) : ?>
															<div class="col-xs-4">
																<div class="bike-previews">
																	<a href="<?= get_permalink($postvalue->ID) ?>">
																		<div class="image-holder">
																			<img class="img-responsive" src="<?= carbon_get_post_meta($postvalue->ID, 'b_img') ?>" />
																		</div><?= $postvalue->post_title ?>
																	</a>
																</div>
															</div>
														<?php endforeach; ?>
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

	add_shortcode('mega_nav_left', 'mega_nav_menus');

	function mega_nav_menus($atts)
	{

		$locations = get_registered_nav_menus();
		$menus = wp_get_nav_menus();
		$menu_locations = get_nav_menu_locations();

		$location_id = $atts['left_menu'];


		$mainALL = array(
			0 => array(
				'month' => 'DEC 2019',
				'link'  => 'http://online.fliphtml5.com/gyqxu/euun/',
				'img'   => 'http://www.ccm-motorcycles.com/wp-content/themes/CCM/app/images/dec19.jpg',
			),
			1 => array(
				'month' => 'SEP 2019',
				'link'  => 'http://online.fliphtml5.com/gyqxu/glqp/',
				'img'   => 'http://www.ccm-motorcycles.com/wp-content/themes/CCM/app/images/Sep-19.jpg',
			),
			2 => array(
				'month' => 'JAN 2019',
				'link'  => 'http://online.fliphtml5.com/gyqxu/nivg/',
				'img'   => 'http://ccmstaging.theprogressteam.co.uk/wp-content/themes/CCM/app/images/January.jpg',
			),
			3 => array(
				'month' => 'DEC 2018',
				'link'  => 'http://online.fliphtml5.com/gyqxu/nese/',
				'img'   => 'http://ccmstaging.theprogressteam.co.uk/wp-content/themes/CCM/app/images/December.jpg',
			),



		);


		foreach ($menus as $menu) {

			if ($menu->slug == 'left') {
				$menu_items = wp_get_nav_menu_items($menu);

				//print_r($menu_items);

				foreach ($menu_items as $item) {
					$mega_menus[$item->title]['cpt_name'] = $item->classes[0];
					$mega_menus[$item->title]['url'] = $item->url;
					$mega_menus[$item->title]['menu_item_parent'] = $item->menu_item_parent;
					$mega_menus[$item->title]['post_title'] = $item->title;
				}
			}
		}

		$parent_valueinner = array();
		$cssclass = array();
		foreach ($mega_menus as $parent_v) {
			if ($parent_v['menu_item_parent'] != 0) {
				$parent_valueinner[] = $parent_v['post_title'] . '__' . $parent_v['url'];
			}
		}
		?>
		<ul class="nav navbar-nav nav-menu-handler explre_menu exploreMenu">
			<?php

			foreach ($mega_menus as $parent_values) {
				if ($parent_values['post_title'] == 'Explore') {
					$has_dropdown = 'has-dropdown explore_menu';
					$has_link = 'javascript:void(0)';
				} else {
					$has_dropdown = '';
					$has_link = $parent_values['url'];
				}


			?>

				<li class="<?php echo $has_dropdown; ?> ">
					<?php if ($parent_values['menu_item_parent'] == 0) { ?>
						<a href="<?php echo $has_link; ?>" class="menu-parents remove_menu"><?php echo $parent_values['post_title']; ?> <img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
					<?php } ?>
					<ul class="dropdown-menu mega-menu " style="display: none;">
						<li class="mega-menu-column">
							<div class="megamenu-breadcrumb">
								<div class="container">
									<?php
									//print_r($parent_values);
									foreach ($parent_valueinner as $v) {
										$explode = explode("__", $v);
										$title = $explode[0];



										if ($title == 'Squadron Mag') {
											$cssclass = 'taxonomy-button activeclass';
											$title_link = 'javascript:void(0)';
										} else {
											$cssclass = '';
											$title_link = $explode[1];
										}
									?>
										<a href="<?php echo $title_link; ?>" class=" <?php echo $cssclass; ?>"><?= $title ?><img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
									<?php
									} ?>
								</div>
							</div>

							<?php
							// print_r($parent_value);
							foreach ($mega_menus as $parent_value) {
								if ($parent_value['cpt_name'] == 'squadron_magazine') {
							?>
									<div class="mega-dropdown-menus squan_magazi" style="display: none;">
										<div class="container">
											<h2>LATEST EDITIONS</h2>
											<div class="separator"></div>
											<div class="row">
												<?php foreach ($mainALL as $k => $v_main) { ?>
													<div class="bike-previews">
														<div class="bike-pre">
															<a target="_blank" href="<?php echo $v_main['link']; ?>">
																<div class="image-holder">
																	<img class="img-responsive" src="<?php echo $v_main['img']; ?>" />
																</div>
																<!--<div class="month_yr">-->
																<?php echo $v_main['month']; ?>
																<!--</div>-->
															</a>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
							<?php
								}
							} ?>

						</li>
					</ul>
				</li>
			<?php } ?>
		</ul>
		<script>
			jQuery(document).ready(function() {
				jQuery(".explore_menu").each(function() {

					var parent_div = jQuery(this).find('a.remove_menu').html();
					console.log(parent_div);
					if (parent_div) {

					} else {
						jQuery(this).remove();
					}
				});

				var current = location.pathname;
				console.log(current);
				if (current != '/') {
					$('.exploreMenu li a').each(function() {
						var $this = $(this);
						// if the current path is like this link, make it active
						if ($this.attr('href').indexOf(current) !== -1) {
							$this.addClass('active');
						} else {

						}
					});
				}




				jQuery('.activeclass').click(function() {

					jQuery(".dropdown-menu.mega-menu .squan_magazi").toggle();

					if (jQuery('.custom_show_arrow .squan_magazi').is(':visible')) {
						jQuery(this).addClass('activesub');
					} else {
						jQuery(this).removeClass('activesub');
					}


				});

				$('.explore_menu .menu-parents').click(function() {
					$(".PreviousModels").hide();
					$(".SpitfireSeries").hide();
					$(".SpitfireSeries").removeClass('active');
					$(".PreviousModels").removeClass('active');
					$(".bike_menus .menu-parent").removeClass('active');
					$(".bike_menus ul.bike_menu").hide();
					$(this).parent('.explore_menu').find(".dropdown-menu.mega-menu").toggle();
					if ($('.explore_menu .dropdown-menu.mega-menu').is(':visible')) {
						$("body").addClass('overlay');
						$(this).parent('li.explore_menu').addClass('custom_show_arrow');

					} else {
						$("body").removeClass('overlay');
						$(this).parent('li.explore_menu').removeClass('custom_show_arrow');

					}

				});

				jQuery('.menu-parent').click(function() {
					jQuery(".explore_menu .dropdown-menu.mega-menu").hide();
					jQuery(".explore_menu").removeClass('custom_show_arrow');

				});
			});
		</script>

	<?php

	}

	/* Post Filter */

	function cs_filters()
	{
		$terms = $_POST['category'];
		$query = new WP_Query(
			array(
				'post_type'      => 'post',
				'cat'            => $terms,
				'posts_per_page' => -1,
			)
		); ?>
		<?php if ($query->have_posts()) :
			echo '<div class="row">';
			while ($query->have_posts()) :
				$query->the_post(); ?>
				<?php
				$date = get_the_date();
				$title = get_the_title();
				?>
				<article class="article-card blog-content">
					<div class="image_container">
						<?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full'); ?>
						<?php if ($thumb) : ?>
							<a href="<?php the_permalink(); ?>"><span class="blog-image" style="background-image:url('<?php echo $thumb['0']; ?>')"></span></a>
						<?php endif; ?>

						<div class="article-content custom-article-content">
							<div class="row">
								<div class="col-xs-3">
									<div class="m-d-y-a-name">
										<div class="m-d-y">
											<h3 class="m-n"><?php echo date('M', strtotime($date)); ?></h3>
											<h2 class="d-n"><?php echo date('d', strtotime($date)); ?></h2>
											<h3 class="y-n"><?php echo date('Y', strtotime($date)); ?></h3>
										</div>
									</div>
									<!--<span class="">Date:<?php echo date('d, M, y', strtotime($date)); ?> - <?php echo date('d, M, y', strtotime($end)); ?> Time: <?php echo date('H:i', strtotime($date)); ?> - <?php echo date('H:i', strtotime($end)); ?></span>-->
								</div>
								<div class="col-xs-9 pl-0">
									<h3><a href="<?php the_permalink(); ?>"><?= $title ?></a></h3>
									<!--<h3><a href="<?php the_permalink(); ?>" class="blog-link"><?php echo get_the_title($query->ID); ?></a></h3>          -->
								</div>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile;
			wp_reset_postdata(); ?>
	</div>
	<?php echo '<div class="pagination">';
			$big = 999999999; // need an unlikely integer
			echo paginate_links(
				array(
					'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
					'format'  => '?paged=%#%',
					'current' => max(1, get_query_var('paged')),
					'total'   => $wp_query->max_num_pages
				)
			);
			echo '</div>' ?>
<?php endif; // reset the query 
?>
<?php die();
	}
	add_action('wp_ajax_customfilter', 'cs_filters');
	add_action('wp_ajax_nopriv_customfilter', 'cs_filters');


	add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

	function custom_override_checkout_fields($fields)
	{
		unset($fields['billing']['billing_ownership']);
		unset($fields['shipping']['shipping_ownership']);

		return $fields;
	}


	function jeherve_remove_state_field($fields)
	{
		unset($fields['state']);
		return $fields;
	}
	add_filter('woocommerce_default_address_fields', 'jeherve_remove_state_field');

	function pn_get_attachment_id_from_url($attachment_url = '')
	{

		global $wpdb;
		$attachment_id = false;

		// If there is no url, return.
		if ('' == $attachment_url)
			return;

		// Get the upload directory paths
		$upload_dir_paths = wp_upload_dir();

		// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
		if (false !== strpos($attachment_url, $upload_dir_paths['baseurl'])) {

			// If this is the URL of an auto-generated thumbnail, get the URL of the original image
			$attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);

			// Remove the upload path base directory from the attachment URL
			$attachment_url = str_replace($upload_dir_paths['baseurl'] . '/', '', $attachment_url);

			// Finally, run a custom database query to get the attachment ID from the modified attachment URL
			$attachment_id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url));
		}

		return $attachment_id;
	}

	// Login page custumization

	function my_custom_login()
	{
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
		echo '<script  src="' . get_bloginfo('stylesheet_directory') . '/login/customadmin.js" /></script>';
	}
	add_action('login_head', 'my_custom_login');

	function my_login_logo_url()
	{
		return get_bloginfo('url');
	}
	add_filter('login_headerurl', 'my_login_logo_url');

	function my_login_logo_url_title()
	{
		return get_bloginfo();
	}
	add_filter('login_headertitle', 'my_login_logo_url_title');

	add_filter('lostpassword_url', 'wdm_lostpassword_url', 10, 0);
	function wdm_lostpassword_url()
	{
		return site_url('/ccm-login?action=lostpassword');
	}


	add_action('after_setup_theme', 'my_add_role_function');
	function my_add_role_function()
	{
		$roles_set = get_option('my_roles_are_set');
		if (!$roles_set) {
			add_role(
				'club_member',
				'Club Member',
				array(
					'read'         => true,
					'edit_posts'   => true,
					'delete_posts' => true,
					'upload_files' => true
				)
			);
			update_option('my_roles_are_set', true);
		}
	}



	add_action('wp_ajax_stories_post', 'stories_post');
	add_action('wp_ajax_nopriv_stories_post', 'stories_post');

	function stories_post()
	{

		$stories_title = $_POST['stories_title'];
		$story_file = $_POST['story_file'];
		$story_content = $_POST['story_content'];
		$gallery_files = $_POST['gallery_files'];
		echo $story_ids = $_POST['story_ids'];

		if ($story_ids == '') {
			$post_id = wp_insert_post(
				array(
					'post_title'   => $stories_title,
					'post_type'    => 'story',
					'post_status'  => 'draft',
					'post_content' => $story_content
				)
			);
		} else {
			echo $post_id = $story_ids;
			$my_post = array(
				'ID'           => $post_id,
				'post_title'   => $stories_title,
				'post_content' => $story_content,
			);
			wp_update_post($my_post);
		}

		if ($post_id) {

			require_once(ABSPATH . 'wp-admin/includes/image.php');
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/media.php');

			$files = $_FILES['story_file'];
			if ($files['name'] != '') {
				$file_set = array(
					'name'     => $files['name'],
					'type'     => $files['type'],
					'tmp_name' => $files['tmp_name'],
					'error'    => $files['error'],
					'size'     => $files['size']
				);

				$upload_overridess = array('test_form' => false);
				$uploads = wp_handle_upload($file_set, $upload_overridess);

				$filename_fe = $uploads['file'];
				$parent_post_ids = $post_id;
				$filetypes = wp_check_filetype(basename($filename_fe), null);
				$wp_upload_dirs = wp_upload_dir();
				$attachments = array(
					'guid'           => $wp_upload_dirs['url'] . '/' . basename($filename_fe),
					'post_mime_type' => $filetypes['type'],
					'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename_fe)),
					'post_content'   => '',
					'post_status'    => 'inherit'
				);

				$attach_ids = wp_insert_attachment($attachments, $filename_fe, $parent_post_ids);

				require_once(ABSPATH . 'wp-admin/includes/image.php');
				$attach_datas = wp_generate_attachment_metadata($attach_ids, $filename_fe);
				wp_update_attachment_metadata($attach_ids, $attach_datas);
				set_post_thumbnail($post_id, $attach_ids);
			}




			$files_photo = $_FILES['gallery_files'];
			//	print_r($files_photo);
			if (!empty($files_photo)) {
				$count = 0;
				$galleryImages = array();

				foreach ($files_photo['name'] as $count => $value) {

					if ($files_photo['name'][$count]) {

						$file = array(
							'name'     => $files_photo['name'][$count],
							'type'     => $files_photo['type'][$count],
							'tmp_name' => $files_photo['tmp_name'][$count],
							'error'    => $files_photo['error'][$count],
							'size'     => $files_photo['size'][$count]
						);

						$upload_overrides = array('test_form' => false);
						$upload = wp_handle_upload($file, $upload_overrides);

						$filename = $upload['file'];
						$parent_post_id = $post_id;
						$filetype = wp_check_filetype(basename($filename), null);
						$wp_upload_dir = wp_upload_dir();
						$attachment = array(
							'guid'           => $wp_upload_dir['url'] . '/' . basename($filename),
							'post_mime_type' => $filetype['type'],
							'post_title'     => preg_replace('/\.[^.]+$/', '', basename($filename)),
							'post_content'   => '',
							'post_status'    => 'inherit'
						);

						$attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);

						array_push($galleryImages, $attach_id);
						require_once(ABSPATH . 'wp-admin/includes/image.php');
						$attach_data = wp_generate_attachment_metadata($attach_id, $filename);
						wp_update_attachment_metadata($attach_id, $attach_data);
					}

					$count++;
				}



				$repeater_field = 'stories_gallery_section';
				$repeater_key = 'field_5d95745a95d6d';
				$sub_field = 'stories_gallery';
				$sub_field_key = 'field_5d95747d95d6e';

				$counts = count($galleryImages);
				if ($counts) {
					// the db value stored in the db for a repeater is
					// the number if rows in the repeater
					add_post_meta($post_id, $repeater_field, $counts, true);
					add_post_meta($post_id, '_' . $repeater_field, $repeater_key, true);
					for ($i = 0; $i < $counts; $i++) {

						$sub_field_name = $repeater_field . '_' . $i . '_' . $sub_field;
						add_post_meta($post_id, $sub_field_name, $galleryImages[$i], false);
						add_post_meta($post_id, '_' . $sub_field_name, $sub_field_key, false);
					}
				}
			}
		}
	}




	if (is_user_logged_in() && !is_admin()) {
		global $wp;
		$curr_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		$edit_billing_path = __('/club-ccm', 'woocommerce');


		$targ_url = home_url($edit_billing_path);
	}



	add_filter('woocommerce_account_menu_items', 'bbloomer_remove_address_my_account', 999);

	function bbloomer_remove_address_my_account($items)
	{
		unset($items['edit-address']);
		return $items;
	}

	// -------------------------------
	// 2. Second, print the ex tab content into an existing tab (edit-account in this case)

	add_action('woocommerce_account_edit-account_endpoint', 'woocommerce_account_edit_address');




	if (is_user_logged_in()) {
		// Queried URL
		$curr_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		// localisable "Edit billing information" path
		$edit_billing_path = __('/club-ccm', 'woocommerce');
		// Target URL
		$targ_url = home_url($edit_billing_path);
	}



	/* Generate Quote Ticket */
	function genTicketString()
	{
		return substr(md5(uniqid(mt_rand(), true)), 0, 5);
	}
	add_shortcode('quoteticket', 'genTicketString');

	add_action('wp_ajax_delete_story', 'delete_story');
	add_action('wp_ajax_nopriv_delete_story', 'delete_story');

	function delete_story()
	{
		$ID = $_POST['ID'];
		$success = wp_delete_post($ID);
		if ($success) {
			echo "Story successfully deleted";
		}
		exit;
	}
	function ccm_set_vehicle_dropdown($scanned_tag, $replace)
	{

		if ($scanned_tag['name'] != 'vehicle')
			return $scanned_tag;

		$bike_list = carbon_get_theme_option('bike_list');
		$bike_info = get_field('bike_information', 'user_' . get_current_user_id());

		if (!$bike_info) {
			if ($bike_list) {
				foreach ($bike_list as $bikes) {
					$bike_name = $bikes['bike_name'];
					$scanned_tag['raw_values'][] = $bike_name;
					$scanned_tag['labels'][] = $bike_name;
				}
			} else {
				$scanned_tag['raw_values'][] = "No bike list available.";
				$scanned_tag['labels'][] = "No bike list available.";
			}
		} else {
			foreach ($bike_info as $info) {
				$bike_model = $info['bike_model'];
				$bike_regist = $info['bike_registration'];
				$scanned_tag['raw_values'][] = $bike_model . ' - ' . $bike_regist;
				$scanned_tag['labels'][] = $bike_model . ' - ' . $bike_regist;
			}
		}

		$pipes = new WPCF7_Pipes($scanned_tag['raw_values']);

		$scanned_tag['values'] = $pipes->collect_befores();
		$scanned_tag['pipes'] = $pipes;

		return $scanned_tag;
	}

	add_filter('wpcf7_form_tag', 'ccm_set_vehicle_dropdown', 10, 2);


	add_action('wp_logout', 'ccm_redirect_after_logout');
	function ccm_redirect_after_logout()
	{
		$logout_url = site_url() . '/ccm-login';
		wp_redirect($logout_url);
		exit();
	}
	add_filter('woocommerce_catalog_orderby', 'ccm_change_orderby_options', 20);

	function ccm_change_orderby_options($options)
	{
		$options['menu_order'] = __('Filter by bike', 'ccm');
		return $options;
	}
	function getwishlist_download_pdf_fn($wishlist_id = 0, $data = array())
	{


		$products = tinvwl_get_wishlist_products($wishlist_id = 0, $data = array());
		if (empty($products)) {
			return false;
		}
		$html = '';
		$html .= '<div class="main" style="max-width: 1000px;margin: 30px auto;width: 100%; position: relative;">';
		$html .= '<div style="text-align:right; ">';
		$html .= '<img style="" src="./pdf/ccm-logo.png" />';
		$html .= '</div>';
		$html .= '<div class="content" style="display: inline-block;width: 100%;margin: 20px 0px;">';
		$html .= '<div class="tital" style="background: #bdb7b77a;padding: 5px 20px;"><h1 style="color: gray; margin: 10px 0; font-size: 24px;">WISHLIST</h1></div>';
		$html .= '<div class="productlist" style="margin: 30px 0px;">';
		foreach ($products as $wl_product) {
			if (empty($wl_product['data'])) {
				continue;
			}

			// override global product data.
			$product = apply_filters('tinvwl_wishlist_item', $wl_product['data']);
			// override global post data.
			//$post = get_post( $product->get_id() );
			$html .= '<div class="item" style="border-top: 3px solid #808080bf;padding: 15px 0px;border-bottom: 3px solid #808080bf;margin-top: -3px;">';
			$html .= '<div class="name" style="font-size: 20px;font-weight: bold;">' . $product->get_name() . '</div>';
			$html .= '<div class="code" style"color: #808080eb;font-weight: 500;font-size: 19px;padding: 5px 0px 0px;"><label>Part No.</label> ' . $product->get_sku() . '</div> ';
			$html .= '</div>';
		}
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<footer style="position: absolute; width: 100%; left: 0px; bottom:0px">';
		$html .= '<div class="leftslide" style="display: inline-block;width: 79%;vertical-align: bottom;">';
		$html .= '<strong style="color: #E50050;font-size: 12px;text-transform: uppercase;">CCM Motorcycles | Great British Motorcycles</strong>';
		$html .= '<p style="font-size: 10px;font-weight: bold;text-transform: uppercase;">UNIT 5 JUBILEE WORKS, VALE STREET, BOLTON, BL2 6QF <br />P: +44 (0)1204 544930<br />www.ccm-motorcycles.com</p>';
		$html .= '</div>';
		$html .= '<div class="rightfooter" style="width: 20%;display: inline-block;vertical-align: top;">';
		$html .= '<img style="float: right;" src="./pdf/ccm-logo.png" />';
		$html .= '</div>';
		$html .= '</footer>';
		$html .= '</div>';
		return $html;
	}
	add_shortcode('wishlist_download_pdf', 'getwishlist_download_pdf_fn');

	function getwishlist_download_pdf_order_form_fn($wishlist_id = 0, $data = array())
	{
		//return 'hello';
		/*if (!session_id()) {
	 session_start();
	 }
	 $wishlist = tinv_wishlist_get( $wishlist_id );
	 if ( empty( $wishlist ) ) {
	 return false;
	 }
	 $wlp      = new TInvWL_Product( $wishlist );
	 $products = $wlp->get_wishlist( $data );*/

		$products = tinvwl_get_wishlist_products($wishlist_id = 0, $data = array());
		/*if ( empty( $products ) ) {
	 return false;
	 }*/
		$html = '';
		$html .= '<div class="main" style="max-width: 1000px;margin: 30px auto;width: 100%; position: relative;">';
		if (count($_SESSION['your-data'])) {
			$html .= '<div style="text-align:left; float: left; ">';
			$html .= '<strong>Name : </strong>' . $_SESSION['your-data']['your-firstname'] . ' ' . $_SESSION['your-data']['your-lastname'];
			$html .= '<br /><strong>Email : </strong>' . $_SESSION['your-data']['your-email'];
			$html .= '<br /><strong>Telephone : </strong>' . $_SESSION['your-data']['telephone'];
			$html .= '</div>';
		}
		$html .= '<div style="text-align:right; ">';
		$html .= '<img style="" src="/var/www/vhosts/ccm-motorcycles.com/httpdocs/wp-content/uploads/2018/02/logo.png" />';
		$html .= '</div>';
		$html .= '<div class="content" style="display: inline-block;width: 100%;margin: 20px 0px;">';
		$html .= '<div class="tital" style="background: #bdb7b77a;padding: 5px 20px;"><h1 style="color: gray; margin: 10px 0; font-size: 24px;">Order Form</h1></div>';
		$html .= '<div class="productlist" style="margin: 30px 0px;">';
		foreach ($products as $wl_product) {
			if (empty($wl_product['data'])) {
				continue;
			}

			// override global product data.
			$product = apply_filters('tinvwl_wishlist_item', $wl_product['data']);
			// override global post data.
			//$post = get_post( $product->get_id() );
			$html .= '<div class="item" style="border-top: 3px solid #808080bf;padding: 15px 0px;border-bottom: 3px solid #808080bf;margin-top: -3px;">';
			$html .= '<div class="name" style="font-size: 20px;font-weight: bold;">' . $product->get_name() . '</div>';
			$html .= '<div class="code" style"color: #808080eb;font-weight: 500;font-size: 19px;padding: 5px 0px 0px;"><label>Part No.</label> ' . $product->get_sku() . '</div> ';
			$html .= '</div>';
		}
		$html .= '</div>';
		$html .= '</div>';
		$html .= '<footer style="position: absolute; width: 100%; left: 0px; bottom:0px">';
		$html .= '<div class="leftslide" style="display: inline-block;width: 79%;vertical-align: bottom;">';
		$html .= '<strong style="color: #E50050;font-size: 12px;text-transform: uppercase;">CCM Motorcycles | Great British Motorcycles</strong>';
		$html .= '<p style="font-size: 10px;font-weight: bold;text-transform: uppercase;">UNIT 5 JUBILEE WORKS, VALE STREET, BOLTON, BL2 6QF <br />P: +44 (0)1204 544930<br />www.ccm-motorcycles.com</p>';
		$html .= '</div>';
		$html .= '<div class="rightfooter" style="width: 20%;display: inline-block;vertical-align: top;">';
		$html .= '<img style="float: right;" src="/var/www/vhosts/ccm-motorcycles.com/httpdocs/wp-content/uploads/2018/02/logo.png" />';
		$html .= '</div>';
		$html .= '</footer>';
		$html .= '</div>';
		return $html;
	}

	function order_wishlist()
	{
		$products = tinvwl_get_wishlist_products($wishlist_id = 0, $data = array());
		/*if ( empty( $products ) ) {
	 return false;
	 }*/
		$html = '';
		foreach ($products as $wl_product) {
			if (empty($wl_product['data'])) {
				continue;
			}


			// override global product data.
			$product = apply_filters('tinvwl_wishlist_item', $wl_product['data']);
			// override global post data.
			//$post = get_post( $product->get_id() );

			$html .= $product->get_name() . ' - ' . 'Part No.:' . $product->get_sku() . '<br>';
		}

		return $html;
	}
	add_shortcode('order_wishlist', 'order_wishlist');
	add_shortcode('wishlist_download_pdf_order_form', 'getwishlist_download_pdf_order_form_fn');

	add_action('wpcf7_before_send_mail', 'my_custom_function');
	function my_custom_function($cf7)
	{
		if ($cf7->id() == 3989) {
			$form_to_DB = WPCF7_Submission::get_instance();
			if ($form_to_DB) {
				$posted_data = $form_to_DB->get_posted_data();
				if (!session_id()) {
					session_start();
				}
				$_SESSION['your-data'] = $posted_data;
			}
			//include('/var/www/vhosts/ccm-motorcycles.com/httpdocs/attachment_pdf.php');
		}
	}
	global $whishlist_pdf_filename;
	$whishlist_pdf_filename = '/var/www/vhosts/ccm-motorcycles.com/httpdocs/order_whislist_mail_pdf/order_whislist_' . date("d_m_Y") . '_' . get_current_user_id() . '.pdf';
	function is_courses_page()
	{
		global $post;
		global $whishlist_pdf_filename;
		$post_slug = $post->post_name;
		if ($post_slug == "wishlist") {
			include('/var/www/vhosts/ccm-motorcycles.com/httpdocs/attachment_pdf.php');
		} else {
			if (file_exists($whishlist_pdf_filename)) {
				unlink($whishlist_pdf_filename);
			}
		}
	}

	add_action('loop_end', 'is_courses_page');
	add_filter('wpcf7_mail_components', 'mycustom_wpcf7_mail_components');
	//function mycustom_wpcf7_mail_components( $components, $form ) {
	function mycustom_wpcf7_mail_components($components)
	{
		$wpcf7 = WPCF7_ContactForm::get_current();
		if ($wpcf7->id() == 3989) {
			//$components['attachments'][] = '/var/www/vhosts/ccm-motorcycles.com/httpdocs/order_form.pdf';
			global $whishlist_pdf_filename;
			$components['attachments'][] = $whishlist_pdf_filename;
		}
		return $components;
	}

	add_action('wpcf7_mail_sent', function ($cf7) {
		// Run code after the email has been sent
		if ($cf7->id() == 3989) {
			//unlink("/var/www/vhosts/ccm-motorcycles.com/httpdocs/order_form.pdf");
			global $whishlist_pdf_filename;
			if (file_exists($whishlist_pdf_filename)) {
				unlink($whishlist_pdf_filename);
			}
		}
	});

	/*21-11*/
	function ccm_theme_get_catalog_ordering_args($args)
	{

		$orderby_value = isset($_GET['orderby']) ? woocommerce_clean($_GET['orderby']) : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
		if (isset($_GET['product_type']) && !empty($_GET['product_type']) && $_GET['orderby'] != 'menu_order') {

			$args['meta_key'] = 'ccm_product_bike_com';
			$args['meta_value'] = $_GET['orderby'];
			$args['orderby'] = 'meta_value_num';
			$args['order'] = 'DESC';
		}
		return $args;
	}

	add_filter('woocommerce_get_catalog_ordering_args', 'ccm_theme_get_catalog_ordering_args');

	add_action('woocommerce_product_query', 'ccm_product_query_by_sku');
	function ccm_product_query_by_sku($q)
	{
		$category = get_queried_object();
		if (isset($_GET['orderby']) && !empty($_GET['orderby']) && !is_product_category() && $_GET['orderby'] != 'menu_order') {

			$meta_query = $q->get('meta_query');
			$meta_query[] = array(
				'key'     => 'ccm_product_bike_com',
				'value'   => $_GET['orderby'],
				'compare' => 'LIKE'
			);

			$q->set('meta_query', $meta_query);
		}
	}
	function search_filter_get_posts($query)
	{

		if (isset($_GET['orderby']) && !empty($_GET['orderby']) && $query->query_vars['post_type'] == 'product' && !is_shop() && $_GET['orderby'] != 'menu_order') {

			$category = get_queried_object();
			$taxquery = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'term_id',
					'terms'    => $category->term_id
				)
			);
			$meta_query[] = $query->get('meta_query');
			$meta_query[] = array(
				'key'     => 'ccm_product_bike_com',
				'value'   => $_GET['orderby'],
				'compare' => 'LIKE'
			);

			$query->set('meta_query', $meta_query);
			$query->set('tax_query', $taxquery);
		}
	}
	add_action('pre_get_posts', 'search_filter_get_posts');




	/*function hide_alog() {
remove_menu_page( 'themes.php' );
remove_menu_page( 'plugins.php' );
remove_menu_page( 'users.php' );
remove_menu_page( 'tools.php' );
remove_menu_page( 'options-general.php' );
}
add_action( 'admin_menu', 'hide_alog', 999 );*/

	function iconic_register_redirect($redirect)
	{
		$redirect_url = $_GET['redirect'];
		if ($redirect_url) {
			return $redirect_url;
		} else {
			return home_url('/club-ccm/');
		}
	}

	add_filter('woocommerce_registration_redirect', 'iconic_register_redirect');

	function ccm_check_orderby_product()
	{

		$category = get_queried_object();

		if (is_product_category()) {
			$tax_query = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'term_id',
					'terms'    => $category->term_id
				),
			);
		}
		$args = array(
			'post_type'  => 'product',
			'meta_query' => array(
				array(
					'key'     => 'ccm_product_bike_com',
					'value'   => $_GET['orderby'],
					'compare' => 'LIKE',
				),
			),
			'tax_query'  => $tax_query
		);
		$query = new WP_Query($args);
		if (empty($query->posts) && isset($_GET['product_type'])) {
			$catalog_orderby_options = apply_filters(
				'woocommerce_catalog_orderby',
				array(
					'menu_order' => __('Default sorting', 'woocommerce'),
					'popularity' => __('Sort by popularity', 'woocommerce'),
					'rating'     => __('Sort by average rating', 'woocommerce'),
					'date'       => __('Sort by latest', 'woocommerce'),
					'price'      => __('Sort by price: low to high', 'woocommerce'),
					'price-desc' => __('Sort by price: high to low', 'woocommerce'),
				)
			);
			$default_orderby = wc_get_loop_prop('is_search') ? 'relevance' : apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby', ''));
			$orderby = isset($_GET['orderby']) ? wc_clean(wp_unslash($_GET['orderby'])) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.
			$show_default_orderby = 'menu_order' === apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby', 'menu_order'));

			return wc_get_template(
				'loop/orderby.php',
				array(
					'catalog_orderby_options' => $catalog_orderby_options,
					'orderby'                 => $orderby,
					'show_default_orderby'    => $show_default_orderby,
				)
			);
		}
	}

	function cf7_footer_script()
	{
?>
	<script>
		document.addEventListener('wpcf7submit', function(event) {
			if ('3675' == event.detail.contactFormId) {
				location = 'http://example.com/thank-you';
			}
		}, false);
	</script>
<?php
	}
	add_action('wp_footer', 'cf7_footer_script');

	function my_login_logo()
	{
		wp_enqueue_script('my-script', get_template_directory_uri() . '/app/javascripts/loginmain.js', null, null, true);
?>
	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@100;300&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,500,600" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
	<style type="text/css">
		<?php
		include(get_template_directory() . '/app/new-styles/_login.css');
		?>
	</style>
	<?php }
	add_action('login_enqueue_scripts', 'my_login_logo');



	function limit($limit, $the_content)
	{
		$content = explode(' ', $the_content, $limit);
		if (count($content) >= $limit) {
			array_pop($content);
			$content = implode(" ", $content) . '...';
		} else {
			$content = implode(" ", $content);
		}
		$content = preg_replace('/[.+]/', '', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]>', $content);
		return $content;
	}

	// Changing Sale icon in shop page
	add_filter('woocommerce_sale_flash', 'wc_custom_replace_sale_text');
	function wc_custom_replace_sale_text($html)
	{
		return str_replace(__('Sale!', 'woocommerce'), __('OFFER', 'woocommerce'), $html);
	}

	// Excluding service product in accessories page
	add_action('woocommerce_product_query', 'custom_pre_get_posts_query');

	function custom_pre_get_posts_query($q)
	{

		$tax_query = (array) $q->get('tax_query');

		$tax_query[] = array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => array('services', 'approved-motorcycles'),
			'operator' => 'NOT IN'
		);


		$q->set('tax_query', $tax_query);
	}

	// Empty cart
	add_filter('wc_empty_cart_message', 'custom_wc_empty_cart_message');

	function custom_wc_empty_cart_message()
	{
		$returned .= 'Your cart is empty';
		$returned .= '<a class="button wc-backward" href="https://www.ccm-motorcycles.com/club-news">Back to CLUB CCM</a>';
		return $returned;
	}



	// add the action 
	add_action('woocommerce_edit_account_form', 'action_woocommerce_edit_account_form', 10, 0);

	/*add_action( 'woocommerce_save_account_details', 'save_user_role');
function save_user_role( $user_id ) {
if($_POST['ownership'] == "yes") {
$user = new WP_User( $user_id );
$user->remove_role( 'subscriber' ); 
$user->add_role( 'ccm_owner' );
} else {
$user = new WP_User( $user_id );
$user->remove_role( 'ccm_owner' ); 
$user->add_role( 'subscriber' );
}
exit( wp_redirect('/my-account/edit-account/#'.$user_id.$_POST['ownership']) );
}*/

	// prevent other user to access wp-admin
	function redirect_non_admin_users()
	{
		if (wp_doing_ajax()) {
			return; // Don't block Ajax requests.
		}

		if (!(current_user_can('administrator') || current_user_can('shop_manager')) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF']) {
			wp_redirect(home_url());
			exit;
		}
	}
	add_action('admin_init', 'redirect_non_admin_users');

	add_action('woocommerce_after_shop_loop', 'wpse333192_add_showall', 100000);
	function wpse333192_add_showall()
	{
		echo '<div class="back-to thank-you" style="text-align: center;"><a class="btn" href="https://www.ccm-motorcycles.com/offers/">Back to Offers</a></div>';
	}

	add_filter("woocommerce_form_field_country", 'filter_woocommerce_form_field_type', 10, 4);
	function filter_woocommerce_form_field_type($field, $key, $args, $value)
	{
		global $wp;
		if ($wp->request == "my-account/edit-address/billing") {
			$countries_obj = new WC_Countries();
			$countries = $countries_obj->__get('countries');
			$require_html = ($args['required'] == 1) ? '&nbsp;<abbr class="required" title="required">*</abbr>' : '';
			$validationClass = ($args['required'] == 1) ? 'validate-required' : '';
			$field = '<p class="form-row form-row-first ' . $validationClass . '" id="billing_country_field" data-priority="' . $args['priority'] . '">';
			$field .= '<label for="billing_country" class="">' . $args['label'] . $require_html . '</label>';
			$field .= '<select name="' . esc_attr($key) . '" id="reg_billing_country" class="input-text" style="width: auto;"><option value="">' . esc_html__('Select a country / region&hellip;', 'woocommerce') . '</option>';
			foreach ($countries as $countries_key => $countries_value) {
				$field .= '<option value="' . esc_attr($countries_key) . '" ' . selected($value, $countries_key, false) . '>' . $countries_value . '</option>';
			}
			$field .= '</select>';
			$field .= '</p>';
		}
		return $field;
	}

	/**
	 * Add new query var.
	 *
	 * @param array $vars
	 * @return array
	 */
	function my_custom_query_vars($vars)
	{
		$vars[] = 'forum-settings';

		return $vars;
	}

	add_filter('query_vars', 'my_custom_query_vars', 0);


	/**
	 * Flush rewrite rules on theme activation.
	 */
	function my_custom_flush_rewrite_rules()
	{
		add_rewrite_endpoint('forum-settings', EP_ROOT | EP_PAGES);
		flush_rewrite_rules();
	}

	add_action('after_switch_theme', 'my_custom_flush_rewrite_rules');

	// Rename user role name in bbPress.
	function ntwb_bbpress_custom_role_names()
	{
		return array(

			// Keymaster
			bbp_get_keymaster_role()   => array(
				'name'         => 'Staff',
				'capabilities' => bbp_get_caps_for_role(bbp_get_keymaster_role())
			),

			// Participant
			bbp_get_participant_role() => array(
				'name'         => 'Member',
				'capabilities' => bbp_get_caps_for_role(bbp_get_participant_role())
			),

			// Spectator
			bbp_get_spectator_role()   => array(
				'name'         => 'Spectator',
				'capabilities' => bbp_get_caps_for_role(bbp_get_spectator_role())
			),

			// Blocked
			bbp_get_blocked_role()     => array(
				'name'         => 'Blocked',
				'capabilities' => bbp_get_caps_for_role(bbp_get_blocked_role())
			)
		);
	}

	add_filter('bbp_get_dynamic_roles', 'ntwb_bbpress_custom_role_names');

	/*add_filter( 'bbp_get_dynamic_roles', 'ntwb_bbpress_custom_role_names' );
function ntwb_bbpress_custom_role_names() {
return array(
// Keymaster
bbp_get_keymaster_role() => array(
'name'         => 'Keymaster',
'capabilities' => bbp_get_caps_for_role( bbp_get_keymaster_role() )
),
// Enthusiast
bbp_get_participant_role() => array(
'name'         => 'Enthusiast',
'capabilities' => bbp_get_caps_for_role( bbp_get_participant_role() )
),
// Moderator
bbp_get_moderator_role() => array(
'name'         => 'Moderator',
'capabilities' => bbp_get_caps_for_role( bbp_get_moderator_role() )
),
// Spectator
bbp_get_spectator_role() => array(
'name'         => 'Spectator',
'capabilities' => bbp_get_caps_for_role( bbp_get_spectator_role() )
),
// Blocked
bbp_get_blocked_role() => array(
'name'         => 'Blocked',
'capabilities' => bbp_get_caps_for_role( bbp_get_blocked_role() )
)
);
}
*/
	/*
function bbpress_forum_custom_roles( $bbp_roles ){
$bbp_roles['ccm_owner'] = array(
'name' => 'CCM Owner',
'capabilities' => bbp_get_caps_for_role( bbp_get_participant_role())
);
return $bbp_roles;
}
add_filter( 'bbp_get_dynamic_roles', 'bbpress_forum_custom_roles', 1 );*/

	function forum_thumbnail($url)
	{
		$returned .= '<div class="img ctr cvr forum-thumbnail" style="background-image: url(' . $url . ')">';
		$returned .= '</div>';
		if ($url) {
			return $returned;
		}
	}

	function wpdocs_enqueue_custom_admin_style()
	{
		wp_register_style('custom_wp_admin_css', get_template_directory_uri() . '/admin/style.css', false, '1.0.0');
		wp_enqueue_script('admin_js', get_template_directory_uri() . '/admin/admin-js.js', array(), '1.9.1');
		wp_enqueue_style('custom_wp_admin_css');
	}
	add_action('admin_enqueue_scripts', 'wpdocs_enqueue_custom_admin_style');

	/*-----------------------------------------------------------------------------------*/
	/* Code Miror
/*-----------------------------------------------------------------------------------*/
	add_action('admin_enqueue_scripts', 'codemirror_enqueue_scripts');

	function codemirror_enqueue_scripts($hook)
	{
		$cm_settings = array(
			'ce_css'  => wp_enqueue_code_editor(array('type' => 'text/css')),
			'ce_html' => wp_enqueue_code_editor(array('type' => 'text/html'))
		);
		wp_localize_script('jquery', 'cm_settings', $cm_settings);

		wp_enqueue_style('wp-codemirror');
	}

	add_action('wp_ajax_nopriv_research_hub', 'research_hub'); // for not logged in users
	add_action('wp_ajax_research_hub', 'research_hub');
	function research_hub()
	{

		$bike_id = $_POST['bike_id'];
		$resource_type = $_POST['resource_type'];

		if ($bike_id) {
			$args_wp = array(
				'post_type' => 'bikes',
				'p'         => $bike_id,

			);
			$wp_query_bikes = new WP_Query($args_wp);
			while ($wp_query_bikes->have_posts()) {
				$wp_query_bikes->the_post();

				$photos = carbon_get_the_post_meta('photos');
				$videos = carbon_get_the_post_meta('videos');
				$pdfs = carbon_get_the_post_meta('pdfs');

				$total_resources = count($photos) + count($videos) + count($pdfs);
				$no_resources_message = '<h2> No resources found for ' . get_the_title() . '.</h2>';

				function get_resource($resources, $icon, $type)
				{
					foreach ($resources as $resource) {

						$resource_name = $resource[$type . '_name'];
						$resource_file = wp_get_attachment_url($resource[$type . '_file']);
						$download = basename($resource_file);
						if ($type != 'photo') {
							$resource_thumbnail = wp_get_attachment_image_url($resource[$type . '_thumbnail'], 'large');
						} else {
							$resource_thumbnail = wp_get_attachment_image_url($resource[$type . '_file'], 'large');
						}


						$html_resource .= '<div class="col-md-3 col-sm-6"><div class="inner">';

						if ($type != 'photo') {
							if ($resource_thumbnail) {
								$html_resource .= /**/ '<div class="resource-thumbnail" style="background-image: url(' . $resource_thumbnail . ')">';
							} else {
								$html_resource .= /**/ '<div class="resource-thumbnail">';
								$html_resource .= /**/ '<div class="resource-placeholder icon-placeholder"> <i class="' . $icon . '"></i> </div>';
							}
						} else {
							$html_resource .= /**/ '<div class="resource-thumbnail" style="background-image: url(' . $resource_thumbnail . ')">';
						}



						$html_resource .=
							/****/
							'<div class="meta">';
						$html_resource .=
							/******/
							'<div class="type">' . $type . '</div>';
						$html_resource .=
							/******/
							'<div class="name">' . $resource_name . '</div>';
						$html_resource .=
							/****/
							'</div>';

						$html_resource .= /**/ '</div>';

						$html_resource .= /**/ '<div class="download">';
						$html_resource .=
							/****/
							'<span href="#" data-href="' . $resource_file . '" download="' . $download . '" onclick="forceDownload(this)">Download</span>';
						$html_resource .= /**/ '</div>';

						$html_resource .= '</div></div>';
					}
					return $html_resource;
				}

				if ($resource_type) {
					if ($resource_type == 'Photos') {
						echo get_resource($photos, 'none', 'photo');
					} else if ($resource_type == 'Videos') {
						echo get_resource($videos, 'fas fa-file-video', 'video');
					} else if ($resource_type == 'PDF') {
						echo get_resource($pdfs, 'fas fa-file-pdf', 'pdf');
					}
				} else {
					echo get_resource($photos, 'none', 'photo');
					echo get_resource($videos, 'fas fa-file-video', 'video');
					echo get_resource($pdfs, 'fas fa-file-pdf', 'pdf');
				}
				if ($total_resources == 0) {
					echo $no_resources_message;
				}
			}
			wp_reset_postdata();
		} else {
			echo '<h2> Please select a bike.</h2>';
		}
		die();
	}



	function ex_bike_name()
	{
		return get_the_title();
	}

	add_shortcode('ex_bike_name', 'ex_bike_name');


	function admin_post_list_add_export_button($which)
	{
		global $typenow;

		if ('product' === $typenow && 'top' === $which) {
	?>
		<input type="submit" name="export_all_posts" class="button button-primary" value="<?php _e('Export Product'); ?>" />
	<?php
		}
	}

	add_action('manage_posts_extra_tablenav', 'admin_post_list_add_export_button', 20, 1);


	function func_export_product()
	{
		if (isset($_GET['export_all_posts'])) {


			$tax_query[] = array(
				'taxonomy' => 'product_cat',
				'field'    => 'slug',
				'terms'    => array('ex-display-bikes', 'services'),
				'operator' => 'NOT IN'
			);
			$args = array(
				'post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'tax_query'      => $tax_query,
			);

			$wp_query = new WP_Query($args);

			if ($wp_query->have_posts()) {

				header('Content-type: text/csv');
				header('Content-Disposition: attachment; filename="Product Data.csv"');
				header('Pragma: no-cache');
				header('Expires: 0');

				$file = fopen('php://output', 'w');

				fputcsv($file, array('Product Name', 'Description', 'Bike Compatibility', 'Price', 'SKU'));

				while ($wp_query->have_posts()) {
					$wp_query->the_post();
					$price = '£' . get_post_meta(get_the_ID(), '_price', true);
					$sku = get_post_meta(get_the_ID(), '_sku', true);
					$the_excerpt = get_the_excerpt();

					$compatibility = get_field('ccm_product_bike_com');


					fputcsv($file, array(get_the_title(), $the_excerpt, implode(", ", $compatibility), $price, $sku));
				}
				exit();
			}
		}
	}

	add_action('init', 'func_export_product');


	// PHP code to extract IP  

	function getVisIpAddr()
	{

		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			return $_SERVER['HTTP_CLIENT_IP'];
		} else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}

	function get_country_by_ip()
	{
		$ip = getVisIpAddr();
		$ipdat = @json_decode(
			file_get_contents(
				"http://www.geoplugin.net/json.gp?ip=" . $ip
			)
		);

		$country_name = $ipdat->geoplugin_countryName;

		return $country_name;
	}
	add_shortcode('get_country_by_ip', 'get_country_by_ip');



	function page_submitted_sc()
	{
		return get_the_title();
	}

	add_shortcode('page_submitted_sc', 'page_submitted_sc');


	function custom_gallery_shortcode()
	{

		if (is_user_logged_in()) {
			echo get_field('content');
			echo '<a class="btn red-btn cg-gallery-upload cg_gallery_control_element cg_fe_controls_style_white custom-upload" data-cg-gid="3">Upload your photo <i class="fas fa-upload" style="margin-left: 15px;" aria-hidden="true"></i> </a>';
			echo do_shortcode(get_field('gallery_shortcode'));
		} else {
			echo get_field('not_logged-in_user_content');
			echo '<a class="btn red-btn" href="https://www.ccm-motorcycles.com/my-account/?redirect=https://www.ccm-motorcycles.com/ccm-motorcycles-through-the-decades/" data-toggle="modal">LOGIN/REGISTER</a>';
		}

		return;
	}

	add_shortcode('custom_gallery_shortcode', 'custom_gallery_shortcode');





	// define the woocommerce_before_checkout_form callback 
	function action_woocommerce_before_checkout_form($wccm_autocreate_account)
	{
		if (current_user_can('administrator')) {
			echo '<script src="https://www.google.com/recaptcha/api.js?render=6LedtMUaAAAAADQwx-nR_faeF3U89JHdH3Bpe6q2"></script>';
		}
	};

	// add the action 
	add_action('woocommerce_checkout_before_customer_details', 'action_woocommerce_before_checkout_form', 10, 1);


	function get_user_role()
	{
		global $current_user;
		$user_roles = $current_user->roles;
		$user_role = array_shift($user_roles);
		return $user_role;
	}

	add_filter('body_class', 'my_class_names');
	function my_class_names($classes)
	{

		if (is_page_template('templates/page-components.php')) {
			$classes[] = 'body-page-components';
		}

		$classes[] = get_user_role();
		return $classes;
	}

	// Bike list dynamic

	function acf_dynamic_bike_list($field)
	{

		$bike_list = carbon_get_theme_option('bike_list');
		$bike_list_array = array();

		foreach ($bike_list as $bikes) {
			$bike_list_array[] = $bikes['bike_name'];
		}

		$field['choices'] = array();


		$field['choices'] = $bike_list_array;

		return $field;
	}

	add_filter('acf/load_field/name=bike_model', 'acf_dynamic_bike_list');

	// Date format

	function ccm_date_format($date)
	{
		ob_start();
	?>
	<div class="month-day-year">
		<span class="month"><?php echo date('M', strtotime($date)); ?></span>
		<span class="day"><?php echo date('d', strtotime($date)); ?></span>
		<span class="year"><?php echo get_the_date('Y') ?></span>
	</div>
<?php
		return ob_get_clean();
	}

	// Date format
	function acf_load_bike_checkbox($field)
	{
		$args = array(
			'numberposts' => -1,
			'post_type'   => 'bikes',
			'post_status' => array('publish', 'private'),
			'tax_query'   => array(
				array(
					'taxonomy' => 'bike-type',
					'field'    => 'id',
					'terms'    => array(324)
				)
			)
		);

		$bikes = get_posts($args);

		// reset choices
		$field['choices'] = array();


		// loop through array and add to field 'choices'


		foreach ($bikes as $bike) {
			$field['choices'][$bike->ID] = $bike->post_title;
		}




		// return the field
		return $field;
	}

	add_filter('acf/load_field/name=ccm_product_bike_com_cb', 'acf_load_bike_checkbox');

	// remove "Private: " from titles
	function remove_private_prefix($title)
	{
		$title = str_replace('Private: ', '', $title);
		return $title;
	}
	add_filter('the_title', 'remove_private_prefix');


	// Vehicle Dropdown Book a Service
	function ccm_set_vehicle_dynamic_dropdown($scanned_tag, $replace)
	{

		if ($scanned_tag['name'] != 'vehicle_dynamic')
			return $scanned_tag;

		$bike_list = carbon_get_theme_option('bike_list');
		if ($bike_list) {
			foreach ($bike_list as $bikes) {
				$bike_name = $bikes['bike_name'];
				$scanned_tag['raw_values'][] = $bike_name;
				$scanned_tag['labels'][] = $bike_name;
			}
		} else {
			$scanned_tag['raw_values'][] = "No bike list available.";
			$scanned_tag['labels'][] = "No bike list available.";
		}

		$pipes = new WPCF7_Pipes($scanned_tag['raw_values']);

		$scanned_tag['values'] = $pipes->collect_befores();
		$scanned_tag['pipes'] = $pipes;

		return $scanned_tag;
	}

	add_filter('wpcf7_form_tag', 'ccm_set_vehicle_dynamic_dropdown', 10, 2);


	//select 2 for configurator select product
	function enqueue_select2_jquery()
	{
		wp_register_style('select2css', '//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.css', false, '1.0', 'all');
		wp_register_script('select2', '//cdnjs.cloudflare.com/ajax/libs/select2/3.4.8/select2.js', array('jquery'), '1.0', true);
		wp_enqueue_style('select2css');
		wp_enqueue_script('select2');
	}
	add_action('admin_enqueue_scripts', 'enqueue_select2_jquery');

	function action_admin_head()
	{
?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			jQuery('.select-product select').select2();

			jQuery('.accesory-type').each(function(index, el) {
				$this = jQuery(this);

				$this.find('select').change(function(event) {
					$this.next().find('select').select2();
				});
			});

		});
	</script>
	<style>
		.select2-container {
			width: 100% !important;
		}

		.wrap_svl {
			background-color: #000;
		}
	</style>
<?php
	}

	add_action('admin_head', 'action_admin_head');

	function clean_string($string)
	{
		$string = preg_replace('/[0-9]+/', '', $string);

		return str_replace('-', '', $string);
	}

	function clean_string_2($string)
	{
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}

	function custom_css()
	{
		$custom_css = carbon_get_the_post_meta('custom_css');

		echo '<style>' . $custom_css . '</style>';
	}

	add_action('wp_head', 'custom_css');
	/*
add_action('wp_head', 'show_template');
function show_template() {
		global $template;
		echo basename($template);
}*/


	function breadcrumbs()
	{
		$breadcrumbs = '<div class="breadcrumbs"><ul class="d-flex align-items-center">';

		$breadcrumbs .= '<li class="d-flex align-items-center"><a href="' . get_site_url() . '">HOME</a></li>';

		if (get_post_type() == 'bikes') {
			$breadcrumbs .= '<li class="d-flex align-items-center"><a href="#">MOTORCYCLES</a></li>';
		}
		$breadcrumbs .= '<li class="d-flex align-items-center"><span>' . get_the_title() . '</span></li>';

		$breadcrumbs .= '</ul></div>';
		return $breadcrumbs;
	}

	function from_header_wp_head()
	{
?>
	<!-- Facebook Pixel Code -->
	<script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '265318043901425');
		fbq('track', 'PageView');
	</script>
	<!-- start webpush tracking code -->
	<script type='text/javascript'>
		var _at = {};
		window._at.track = window._at.track || function() {
			(window._at.track.q = window._at.track.q || []).push(arguments);
		};
		_at.domain = 'www.ccm-motorcycles.com/';
		_at.owner = 'be2712d5eff8';
		_at.idSite = '25586';
		_at.attributes = {};
		_at.webpushid = 'web.2.aimtell.com';
		(function() {
			var u = '//s3.amazonaws.com/cdn.aimtell.com/trackpush/';
			var d = document,
				g = d.createElement('script'),
				s = d.getElementsByTagName('script')[0];
			g.type = 'text/javascript';
			g.async = true;
			g.defer = true;
			g.src = u + 'trackpush.min.js';
			s.parentNode.insertBefore(g, s);
		})();
	</script>
	<!-- end webpush tracking code -->
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=265318043901425&ev=PageView&noscript=1" /></noscript>
	<!-- End Facebook Pixel Code -->
	<!-- Google Tag Manager -->

	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start':

					new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],

				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =

				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);

		})(window, document, 'script', 'dataLayer', 'GTM-MGZQQRX');
	</script>

	<!-- End Google Tag Manager -->
	<?php
		if (!is_front_page()) {
	?>
		<style>
			.woocommerce form .form-row select.input-text {
				border: 1px solid #ECECEC;
				background-color: #ECECEC;
				height: 50px;
			}

			.product-item-handler {
				padding: 20px 0;
			}

			.mid-section {
				background: #fdfdfd;
				padding: 40px 0;
			}

			.product-item-handler .related .products .button,
			.woocommerce ul.products li.product .button {
				background: #ed383f;
				color: #fff;
				font-size: 14px;
				padding: 15px 25px;
			}

			.woocommerce span.onsale {
				width: 50px;
				height: 50px;
				font-size: 13px;
				box-shadow: 1px 1px 6px #949393;
				background-color: #ed383f;
			}

			h1 {
				border-bottom: solid 2px #222;
			}

			.woocommerce-loop-product__title {
				font-size: 22px !important;
			}

			.woocommerce ul.products li.product .price {
				font-size: 14px;
				color: #222;
			}

			h1,
			h2,
			h3,
			h4,
			h5 {
				font-family: "Barlow Semi Condensed Extrabold Italic", "Helvetica Neue Light", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
				color: #222;
			}

			.product-name-handler {
				font-family: "Barlow Semi Condensed Extrabold Italic", "Helvetica Neue Light", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
				color: #222;
				border-bottom: solid 2px #222;
				padding: 15px;
				margin-bottom: 40px;
				border-radius: 3px;
				margin-top: 0;
			}

			.product-name-handler h1 {
				margin: 0;
			}

			.product-item-handler .woocommerce-Price-amount {
				color: #08368e;
				font-size: 22px;
			}

			.product-item-handler .woocommerce-product-details__short-description p {
				font-size: 16px;
			}

			.product-item-handler .cart .button {
				background: #ed383f !important;
				font-size: 16px;
				padding: 15px 30px;
				text-transform: uppercase;
			}

			.product-item-handler .woocommerce .quantity .qty {
				font-size: 16px;
				padding: 0;
				height: 46px;
			}

			.product-item-handler .flex-control-thumbs {
				margin-top: 20px !important;
				margin-bottom: 40px !important;
			}

			.woocommerce div.product .woocommerce-product-gallery--columns-4 .flex-control-thumbs li:nth-child(4n+1) {
				clear: none !important;
			}

			.product-item-handler .flex-control-thumbs li img {
				margin: 0 !important;
				width: 55% !important;
				margin-left: auto !important;
				margin-right: auto !important;
			}

			.product-item-handler .flex-control-thumbs li {
				width: 18% !important;
				border: solid 1px !important;
				margin: 0 5px !important;
				padding: 5px !important;
				margin-bottom: 5px !important;
			}

			.post-banner {
				background-image: url(/wp-content/uploads/2018/02/news-and-updates-bg-1.png);
				background-size: cover;
				background-position: center;
				background-repeat: no-repeat;
				padding-top: 60px;
				padding-bottom: 30px;
			}

			.post-banner h1 {
				color: #fff;
				border-bottom: 0;
				position: relative;
			}

			.post-banner h1:before {
				content: "";
				position: absolute;
				width: 1px;
				height: 30px;
				background: #fff;
				bottom: -30px;
			}

			.bike-previews img {
				max-height: 100px;
				margin: 0 auto 10px;
			}

			.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a {
				color: #000;
			}

			.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a:hover {
				color: #dc3524;
			}

			.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a:focus {
				color: #dc3524;
			}

			.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a:active {
				color: #dc3524;
			}

			.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb p,
			.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a {
				padding: 0 20px;
			}
		</style>
<?php
		}
	}

	add_action('wp_head', 'from_header_wp_head');


	function set_post_id()
	{
		if (isset($_GET['post']) && get_post_type($_GET['post']) == 'product') {
			$dir = WP_CONTENT_DIR . '/products-configurator/postid.txt';
			$random_file = fopen($dir, "w");
			fwrite($random_file, $_GET['post']);
			fclose($random_file);

			if (!$_GET['redirect']) {
				$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				echo $actual_link;
				wp_redirect($actual_link . '&redirect=true');
			}
		}
	}

	add_action('admin_init', 'set_post_id');


	add_action('template_redirect', 'action_redirect_sectors');
	function action_redirect_sectors()
	{
		if (is_singular('configurator')) :
			global $post;
			$config_url = get_post_meta($post->ID, '_config_url', true);
			wp_redirect($config_url);
			exit;
		endif;
	}

	/*-----------------------------------------------------------------------------------*/
	/* REDIRECTS
/*-----------------------------------------------------------------------------------*/

	add_action('user_register', 'register_user_ccm_login');

	function wpse_19692_registration_redirect()
	{
		return get_site_url() . '/ccm-login?action=success';
	}

	add_filter('registration_redirect', 'wpse_19692_registration_redirect');


	/**
	 * @snippet       Redirect to Referrer @ WooCommerce My Account Login
	 * @how-to        Get CustomizeWoo.com FREE
	 * @author        Rodolfo Melogli, BusinessBloomer.com
	 * @testedwith    WooCommerce 5
	 * @donate $9     https://businessbloomer.com/bloomer-armada/
	 */

	add_action('woocommerce_login_form_end', 'bbloomer_actual_referrer');

	function bbloomer_actual_referrer()
	{
		global $post;
		if (get_page_template_slug($post->ID) == 'templates/page-configure-bike-v2.php') {
			$redirect_url = get_permalink($post->ID);
		} else {
			$redirect_url = '/club-news/';
		}
		echo '<input type="hidden" name="redirect" value="' . $redirect_url . '" />';
	}



	function rohil_login_redirect_based_on_roles($user_login, $user)
	{
		global $post;
		if (get_page_template_slug($post->ID) != 'templates/page-configure-bike-v2.php') {
			$redirect_url = $_GET['redirect'];
			if ($redirect_url) {
				return $redirect_url;
			} else {
				if (in_array('ccm_owner', (array) $user->roles)) {
					exit(wp_redirect('/club-news/'));
				} else if (in_array('administrator', (array) $user->roles)) {
					exit(wp_redirect('/wp-admin/'));
				} else {
					exit(wp_redirect('/club-news/'));
				}
			}
		}
	}

	add_action('wp_login', 'rohil_login_redirect_based_on_roles', 10, 2);

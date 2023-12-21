<?php

/**
 *  Template Name: Configure Bike V2
 *  Template Post Type: page, bikes
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
 */
get_header(); // This fxn gets the header.php file and renders it 
?>
<style>
    .cs-section .img-pro {
        width: auto;
        height: auto;
        background-color: transparent;
    }

    table {
        width: 100% !important;
        border-bottom: none !important;
    }

    table.cs-list th {
        background-color: transparent !important;
        padding: 0 !important;
    }

    #ccm-motors-header {
        background-color: var(--black-color) !important;
        display: none !important;
    }

    .main-image-holder {
        display: none !important;
    }
</style>
<style>
    .red-btn:focus,
    .red-btn:active {
        color: #ed181f !important;
    }

    .custom-modal {
        position: fixed;
        right: 0;
        bottom: 0;
        z-index: 99999999;
        padding: 0;
        display: flex;
        align-items: center;
        transition: 300ms;
        max-width: 500px;
        width: 100%;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -70%) !important;
        visibility: hidden;
        opacity: 0;
        display: none;
    }

    .custom-modal-backdrop {
        position: fixed;
        z-index: 0;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: rgba(0, 0, 0, .5);
        display: none;
    }

    .custom-modal .container {
        background-color: var(--white-color);
        position: relative;
        z-index: 1;
        padding: 40px;
        max-width: 500px !important;
    }

    .custom-modal h2 {
        margin-top: 0;
        margin-bottom: 30px;
        font-size: 30px !important;
    }

    .custom-modal-backdrop.modal-active {
        display: block;
    }

    .custom-modal.modal-active {
        display: block;
    }

    .custom-modal.show-modal {
        transform: translate(-50%, -50%) !important;
        opacity: 1;
        visibility: visible;

    }

    .custom-modal .col-1 {
        width: 100% !important;
    }

    .custom-modal .col-1 h2 {
        font-size: 40px !important;
        margin-top: 0 !important;
    }
</style>
<?php
$bike_initial_price = carbon_get_the_post_meta('bike_initial_price');
$small_image = wp_get_attachment_image_url(carbon_get_the_post_meta('small_image'), 'medium');
$custom_scripts = carbon_get_the_post_meta('custom_scripts');

$bike_section = get_terms(
    array(
        'taxonomy'   => 'product_cat',
        'parent'     => 408,
        'hide_empty' => false,
    )
);

$product_category = carbon_get_the_post_meta('product_category')[0]['id'];
$bike_code = str_replace('-', '_', get_term($product_category)->slug);
$bike_name = get_term($product_category, 'product_cat')->name;

if (isset($_GET['action'])) {
    // Create post object
    $config_data = [];

    foreach ($_GET as $key => $data) {
        if ($key != 'action' && $key != 'config_id' && $key != 'title' && $key != 'notes' && $key != 'id') {
            $config_data[] = array(
                'category' => $key,
                'product_lists' => $data
            );
        }
    }


    if ($_GET['action'] == 'create-post') {
        $my_post = array(
            'post_type' => 'configurator',
            'post_title'    => wp_strip_all_tags(isset($_GET['title']) ? $_GET['title'] : get_the_title($_GET['config_id'])),
            'post_content' => $_GET['notes'],
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),

        );
        $post_id =  wp_insert_post($my_post);
    } else if ($_GET['action'] == 'update-post') {
        $my_post = array(
            'ID' => $_GET['id'],
            'post_title'    => wp_strip_all_tags(isset($_GET['title']) ? $_GET['title'] : get_the_title($_GET['id'])),
            'post_content' => $_GET['notes'],
            'post_status'   => 'publish',
            'post_author'   => get_current_user_id(),

        );
        wp_update_post($my_post);

        $post_id = $_GET['id'];
    }

    $config_url = get_the_permalink($_GET['config_id']) . '?id=' . $post_id;
    carbon_set_post_meta($post_id, 'config_data', $config_data);
    carbon_set_post_meta($post_id, 'config_id', $_GET['config_id']);
    carbon_set_post_meta($post_id, 'config_url', $config_url);
    wp_redirect($config_url);

    exit;
}




?>


<div class="buy-order-bike-page configure-bike-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="caption">
                    <h1 class="bike-name">
                        <?= $bike_name ?>
                    </h1>
                    <a href="#scroll-down" class="scroll-down" address="true">
                        <span>CONFIGURE</span>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                </div>
                <?php if (get_the_post_thumbnail_url()) { ?>
                    <div class="main-image-holder">
                        <img id="main-image" src="<?php the_post_thumbnail_url(); ?>" class="first_image" source="<?php the_post_thumbnail_url(); ?>" class="first_image">
                    </div>
                <?php } ?>
                <?php if (get_the_content()) { ?>
                    <div class="text-below-image">
                        <?php the_content() ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="scroll-down"></div>
    <div class="acc-option <?= isset($_GET['id']) ? 'saved-data-loaded' : '' ?>">
        <div class="container-fluid px-0">
            <form method="GET" id="configurator-form">
                <input type="hidden" name="action" value="<?= isset($_GET['id']) ? 'update-post' : 'create-post' ?>">
                <input type="hidden" name="config_id" value="<?= get_the_ID() ?>">
                <input type="hidden" name="title" value="<?= isset($_GET['id']) ? get_the_title($_GET['id']) : '' ?>">
                <input type="hidden" name="notes" value="<?= isset($_GET['id']) ? get_the_content('', false, $_GET['id']) : '' ?>">
                <input type="hidden" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : '' ?>">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-group" id="accordion">
                            <?php foreach ($bike_section as $key => $section) { ?>
                                <?php
                                $area_expanded = $key == 0 ? ' true' : 'false';
                                if ($key != 0) {
                                    $class = 'collapse';
                                    $class_a = 'collapsed';
                                } else {
                                    $class = 'collapse in';
                                }
                                $args = array(
                                    'post_type'      => 'product',
                                    'posts_per_page' => -1,
                                    'post_status'    => array('private', 'publish'),
                                    'orderby'        => 'meta_value_num',
                                    'meta_key'       => '_' . $bike_code . '_section_order',
                                    'order'          => 'ASC',
                                    'tax_query'      => array(
                                        'relation' => 'AND',
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'term_id',
                                            'terms'    => array($product_category),
                                        ),
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field'    => 'term_id',
                                            'terms'    => array($section->term_id),
                                        ),
                                    ),
                                );
                                $the_query = new WP_Query($args);
                                ?>
                                <?php if ($the_query->have_posts()) { ?>
                                    <div class="panel <?= $section->slug ?>">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#<?= $section->slug ?>" aria-expanded="<?= $area_expanded ?>">
                                                    <div class="container">
                                                        <span>
                                                            <?= clean_string($section->name) ?>
                                                        </span>
                                                    </div>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="<?= $section->slug ?>" class="panel-collapse <?= $class ?>" aria-expanded="<?= $area_expanded ?>">
                                            <div class="container">
                                                <div class="panel-body px-0 py-5 ">
                                                    <div class="boxes">
                                                        <div class="row flex-row">
                                                            <?php while ($the_query->have_posts()) { ?>
                                                                <?php
                                                                $the_query->the_post();
                                                                $product = wc_get_product(get_the_ID());
                                                                $accessory_description = get_the_content();
                                                                $the_image = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png';
                                                                $email_image = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/no-image-ccm-150x150-1.png';
                                                                $is_std_equipment = carbon_get_the_post_meta($bike_code . '_is_std_equipment');
                                                                $bike_price_custom = carbon_get_the_post_meta($bike_code . '_price');
                                                                $disable_auto_select = carbon_get_the_post_meta($bike_code . '_disable_auto_select');
                                                                $configurator_price = carbon_get_the_post_meta('configurator_price');
                                                                $bike_price_custom_val = $bike_price_custom ? $bike_price_custom : $configurator_price;

                                                                $related_products = carbon_get_the_post_meta($bike_code . '_related_products');
                                                                $related_products_val = '';
                                                                $related_products_arr = array();
                                                                $is_package = '';
                                                                if ($related_products) {
                                                                    foreach ($related_products as $product_included) {
                                                                        $related_products_arr[] = "[sku='" . clean_string_2($product_included) . "']";
                                                                    }
                                                                    $related_products_val = 'products-included="' . implode(", ", $related_products_arr) . '"';
                                                                    $is_package = ' is-package';
                                                                }
                                                                $pre_selected_item = carbon_get_the_post_meta($bike_code . '_pre_selected');

                                                                $bike_price = $bike_price_custom_val != '' ? $bike_price_custom_val : $product->get_price();
                                                                $bike_price = floatval($bike_price);
                                                                if ($is_std_equipment) {
                                                                    $price = 'Std Equipment';
                                                                    $accessory_price = 0.00;
                                                                } else {
                                                                    $price = '&#163; ' . number_format($bike_price, 2, '.', '');
                                                                    $accessory_price = $bike_price;
                                                                }
                                                                $select_one_panel = carbon_get_term_meta($section->term_id, 'select_one');
                                                                $required_panel = carbon_get_term_meta($section->term_id, 'select_one');
                                                                $exclude_from_deselection = carbon_get_term_meta($section->term_id, 'exclude_from_deselection');
                                                                $exclude_from_deselection_val = $exclude_from_deselection ? ' exclude-deselection' : '';
                                                                $required = $required_panel ? ' required' : '';
                                                                $select_one = $select_one_panel ? ' select-one' : '';
                                                                $pre_selected = ($pre_selected_item || $is_std_equipment) &&  ($disable_auto_select == false) ? ' pre-selected' : '';
                                                                $accessory_id = 'box-' . $section->slug . '-' . get_the_ID();
                                                                if ($key != 0) {
                                                                    $class = 'collapse';
                                                                    $class_a = 'collapsed';
                                                                }
                                                                $configurator_part_code = carbon_get_the_post_meta('configurator_part_code');
                                                                $part_code = $configurator_part_code ? $configurator_part_code : $product->get_sku();
                                                                ?>
                                                                <div class="col-md-3 col-sm-6 col-xs-6 mb-30 <?= $accessory_id ?>">
                                                                    <input product_id="<?= get_the_ID() ?>" name="<?= $section->slug ?>[]" class="tot_amount<?= $pre_selected . $required . $is_package . $exclude_from_deselection_val ?> " type="checkbox" id="<?= $accessory_id ?>" accesory_value="<?= $accessory_price ?>" main_id="<?= 'box-' . $key ?>" <?= $related_products_val ?> sku="<?= clean_string_2($product->get_sku()) ?>" value="<?= get_the_ID() ?>">
                                                                    <label for="<?= $accessory_id ?>" class="acc_box<?= $select_one . $change_image ?> " main_id="<?= 'box-' . $key ?>">
                                                                        <!-- IMAGE HOLDER  -->
                                                                        <h4>
                                                                            <?= get_the_title() ?>
                                                                        </h4>
                                                                        <div class="description">
                                                                            <?= wpautop($accessory_description) ?>
                                                                        </div>

                                                                        <div class="d-block sku">
                                                                            Part Code: <?= $part_code ?>
                                                                        </div>
                                                                        <div class="price" original-price-text="<?= $price ?>" original-price-val="<?= $accessory_price ?>">
                                                                            <?= $price ?>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            <?php } ?>
                                                            <?php wp_reset_postdata() ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="reserve_bike mt-50 cs-section" id="config-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7 ">
                    <h2>CONFIGURATION SUMMARY</h2>
                    <div class="border-line"></div>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7" id="summary_list">
                    <style>
                    </style>
                    <span id="summery-items2"></span>
                    <table class="table cs-list" style="width: 500px">
                        <tbody>
                            <tr>
                                <td colspan="3" class="text-right" style="text-align: right"><span class="count" style="color: #ed181f ">TOTAL: </span></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>



    <div class="reserve_bike mt-50" id="reserve_bike">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7 ">
                    <h2>CONFIGURE THIS BIKE</h2>
                    <p>Simply submit this form to save your desired bike configuration. You can configure as many
                        variations as you like to create your dream machine.</p>
                    <div class="border-line"></div>
                    <div class="form-reserve">
                        <?php if (isset($_GET['submitted']) && $_GET['submitted'] == 'true') { ?>
                            <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
                            <script>
                                hbspt.forms.create({
                                    css: '',
                                    region: "eu1",
                                    portalId: "139521183",
                                    formId: "7aa928aa-a966-4357-b74a-1f78c6b1c7c2",
                                    onFormReady: function($form) {
                                        $form.submit();
                                    }
                                });
                            </script>
                        <?php } else { ?>
                            <div class="wpcf7">
                                <form class="wpcf7-form" action="<?= get_permalink() ?>" method="GET">
                                    <input type="hidden" id="config-summary" name="configurator_options">
                                    <input type="hidden" name="submitted" value="true">
                                    <input type="hidden" name="configurator_code" value="<?= get_the_title() ?>">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>
                                                <label>
                                                    First Name <span>*</span>
                                                    <span class="wpcf7-form-control-wrap" data-name="first-name">
                                                        <input size="40" class="wpcf7-form-control wpcf7-text  form-control" aria-required="true" aria-invalid="false" type="text" name="firstname" required />
                                                    </span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label>
                                                    Last Name <span>*</span>
                                                    <span class="wpcf7-form-control-wrap" data-name="last-name">
                                                        <input size="40" class="wpcf7-form-control wpcf7-text  form-control" aria-required="true" aria-invalid="false" type="text" name="lastname" required />
                                                    </span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label>
                                                    Email Address <span>*</span>
                                                    <span class="wpcf7-form-control-wrap" data-name="email-address">
                                                        <input size="40" class="wpcf7-form-control wpcf7-email  wpcf7-text wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" type="email" name="email" required />
                                                    </span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <label>
                                                    Phone number <span>*</span>
                                                    <span class="wpcf7-form-control-wrap" data-name="telephone">
                                                        <input size="40" class="wpcf7-form-control wpcf7-tel form-control" aria-required="true" aria-invalid="false" type="tel" name="phone" required />
                                                    </span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                                <label>
                                                    Postcode <span>*</span>
                                                    <span class="wpcf7-form-control-wrap" data-name="zip">
                                                        <input size="40" class="wpcf7-form-control wpcf7-text  form-control" aria-required="true" aria-invalid="false" type="text" name="zip" required />
                                                    </span>
                                                </label>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                                <label>
                                                    Additional Information
                                                    <span class="wpcf7-form-control-wrap" data-name="lead_comments__ole_">
                                                        <textarea cols="110" rows="5" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" name="lead_comments__ole_"></textarea>
                                                    </span>
                                                </label>
                                            </p>
                                        </div>

                                        <div class="col-md-12">
                                            <p style="font-size: 14px; margin-top: 10px;">
                                                CCM Motorcycles needs the contact information you provide to us to contact you about our products and
                                                services. You may unsubscribe from these communications at any time. For information on how to unsubscribe,
                                                as well as our privacy practices and commitment to protecting your privacy, please review our Privacy
                                                Policy.</p>
                                            <p>
                                                <input class="wpcf7-form-control wpcf7-submit has-spinner red-btn" type="submit" value="COMPLETE MY CONFIGURATION" /><span class="wpcf7-spinner">
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </div>
    <div class="footer-order">
        <div class="container" style="max-width: 1400px; width: 100% !important;">
            <div class="row">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <img id="footer-image" src="<?php _e($small_image) ?>" source="<?php _e($small_image) ?>">
                </div>
                <div class="col-md-7 col-sm-7 title-pro">
                    <h2>
                        <?php _e($bike_name) ?>
                    </h2>
                    <p class="total">TOTAL: &#163;<input type="text" id="total1" readonly></p>
                </div>
                <div class="col-md-3 col-sm-3 ">
                    <button class="red-btn" id="popup-button"><?= isset($_GET['id']) ? 'Update Configuration' : 'Save Configuration' ?></button>
                    <?php if (!isset($_GET['id'])) { ?>
                        <a href="" class="red-btn">Reset Configuration</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="custom-modal-backdrop"></div>
<div class="buy-order-bike-page custom-modal">
    <div class="container">
        <div class="form-reserve">
            <div class="wpcf7-form">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?= get_the_title() ?></h2>
                    </div>
                    <?php if (is_user_logged_in()) { ?>
                        <div class="col-md-12">
                            <p>
                                <label>
                                    Title <span>*</span>
                                    <span class="wpcf7-form-control-wrap">
                                        <input value="<?= isset($_GET['id']) ? get_the_title($_GET['id']) : '' ?>" size="40" class="wpcf7-form-control wpcf7-text  form-control" aria-required="true" aria-invalid="false" type="text" id="title" required>
                                    </span>
                                </label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <p>
                                <label>
                                    Notes <span>*</span>
                                    <span class="wpcf7-form-control-wrap">
                                        <textarea cols="110" rows="5" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" id="notes"><?= isset($_GET['id']) ? get_the_content('', false, $_GET['id']) : '' ?></textarea>
                                    </span>
                                </label>
                            </p>
                        </div>
                        <div class="col-md-12">
                            <button id="save-button" class="red-btn "><?= isset($_GET['id']) ? 'Update Configuration' : 'Save Configuration' ?></button>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-12">
                            <div>
                                <div class="woocommerce">
                                    <div class="woocommerce-notices-wrapper">
                                        <ul class="woocommerce-error" role="alert">
                                            <li>
                                                <strong>Error:</strong> Username is required.
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="u-columns col2-set" id="customer_login">

                                        <div class="u-column1 col-1 the-login">


                                            <h2>Login</h2>

                                            <form class="woocommerce-form woocommerce-form-login login" method="post" data-hs-cf-bound="true">


                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="username">Username or email address&nbsp;<span class="required">*</span></label>
                                                    <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="">
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password">Password&nbsp;<span class="required">*</span></label>
                                                    <span class="password-input"><input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password"><span class="show-password-input"></span></span>
                                                </p>


                                                <p class="form-row">
                                                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                                        <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember me</span>
                                                    </label>
                                                    <input type="hidden" id="woocommerce-login-nonce" name="woocommerce-login-nonce" value="8061503ae7"><input type="hidden" name="_wp_http_referer" value="/bikes/maverick-configure/?test=testss"> <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="Log in">Log in</button>
                                                </p>
                                                <p class="woocommerce-LostPassword lost_password">
                                                    <a href="https://ccm.theprogressteam.com/bikes/maverick-configure/lost-password/">Lost your password?</a>
                                                </p>


                                            </form>


                                        </div>

                                        <div class="u-column2 col-2 the-register hide-div">

                                            <h2>Register</h2>

                                            <form method="post" class="woocommerce-form woocommerce-form-register register" data-hs-cf-bound="true">


                                                <p class="form-row form-row-first">
                                                    <label for="reg_billing_first_name">First name <span class="required">*</span></label>
                                                    <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="">
                                                </p>
                                                <p class="form-row form-row-last">
                                                    <label for="reg_billing_last_name">Last name <span class="required">*</span></label>
                                                    <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="">
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide email_xx">
                                                    <label for="reg_email">Email address&nbsp;<span class="required">*</span></label>
                                                    <input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="">
                                                </p>
                                                <p class="form-row form-row-wide display_name_xx">
                                                    <label for="reg_nickname">Display name <span class="required">*</span></label>
                                                    <input type="text" class="input-text" name="nickname" id="reg_nickname" value="">
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide password_xx">
                                                    <label for="reg_password">Password&nbsp;<span class="required">*</span></label>
                                                    <span class="password-input"><input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password"><span class="show-password-input"></span></span>
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label for="reg_confirm_password">Confirm Password <span class="required">*</span></label>
                                                    <input type="password" class="input-text" name="confirm_password" id="reg_confirm_password">
                                                </p>
                                                <p class="form-row form-row-wide heading">
                                                </p>
                                                <h3>CONTACT INFORMATION</h3>
                                                <p></p>
                                                <p class="form-row form-row-wide">
                                                    <label for="reg_billing_phone">Phone <span class="required">*</span></label>
                                                    <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <label for="reg_billing_address_1">Street Address <span class="required">*</span></label>
                                                </p>
                                                <p class="form-row form-row-first">
                                                    <label for="reg_billing_address_1"></label>
                                                    <input type="text" class="input-text" placeholder="House number and street name" name="billing_address_1" id="reg_billing_address_1" value="">
                                                </p>
                                                <p class="form-row form-row-last">
                                                    <label for="reg_billing_address_2"></label>
                                                    <input type="text" class="input-text" placeholder="Apartment, suite, unit, etc.(optional)" name="billing_address_2" id="reg_billing_address_2" value="">
                                                </p>
                                                <p class="form-row form-row-first">
                                                    <label for="reg_billing_city">Town/City <span class="required">*</span></label>
                                                    <input type="text" class="input-text" name="billing_city" id="reg_billing_city" value="">
                                                </p>
                                                <p class="form-row form-row-last">
                                                    <label for="reg_billing_postcode">Zip/Postcode <span class="required">*</span></label>
                                                    <input type="text" class="input-text" name="billing_postcode" id="reg_billing_postcode" value="">
                                                </p>
                                                <p class="form-row form-row-first">
                                                    <label for="reg_billing_postcode">Country <span class="required">*</span></label>
                                                    <select name="billing_country" id="reg_billing_country" class="input-text">
                                                        <option value=""></option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU">Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="PW">Belau</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia</option>
                                                        <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo (Brazzaville)</option>
                                                        <option value="CD">Congo (Kinshasa)</option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curaçao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="SZ">Eswatini</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and McDonald Islands</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="CI">Ivory Coast</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Laos</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao</option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia</option>
                                                        <option value="MD">Moldova</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="KP">North Korea</option>
                                                        <option value="MK">North Macedonia</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PS">Palestinian Territory</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Reunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russia</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="ST">São Tomé and Príncipe</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="SH">Saint Helena</option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="SX">Saint Martin (Dutch part)</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia/Sandwich Islands</option>
                                                        <option value="KR">South Korea</option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syria</option>
                                                        <option value="TW">Taiwan</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TL">Timor-Leste</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom (UK)</option>
                                                        <option value="US">United States (US)</option>
                                                        <option value="UM">United States (US) Minor Outlying Islands</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VA">Vatican</option>
                                                        <option value="VE">Venezuela</option>
                                                        <option value="VN">Vietnam</option>
                                                        <option value="VG">Virgin Islands (British)</option>
                                                        <option value="VI">Virgin Islands (US)</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                </p>
                                                <div class="ownership ">
                                                    <p class="form-row form-row-wide">
                                                        <input type="hidden" class="input-text" name="ownership" id="owner" value="no">
                                                    </p>

                                                    <div class="clear">

                                                    </div>








                                                    <div id="acf-form-data" class="acf-hidden">
                                                        <input type="hidden" id="_acf_screen" name="_acf_screen" value="acf_form"><input type="hidden" id="_acf_post_id" name="_acf_post_id" value="13923"><input type="hidden" id="_acf_validation" name="_acf_validation" value="1"><input type="hidden" id="_acf_form" name="_acf_form" value="bHBGY3lMR0lCRFZ4NXhUVUErR1dFVG1JRFdVc3NoakFDUk5yUWRtK3E4S3ltNG5IWlBuVm04YjEyUXZTZnBtQzN0Q1Zkc1JKWitWWkQ3Nm4rS0dYZzd1N3kySXJiWTNYYXlwTDYxbmk1RmJ4VWRkTFZBMW5QeHo1SndYeDhZc0FPaCtrcGRtMCtqWEt5VVRJd1RHZGtHK1hscmhXditWazM1TDZXUjFvR2JZcmtFQ3RISExHT0dHZE1hN1ZKTVl3ZE5URzZUWldLNTV6aFovd3dTQXVVU0lzSnRTalIrK1BPR3JuTm00QmpjSUNvTVNaeHd6b0RMQllvdEdvdUgwNHNwTzBmZldxejgwUkFmemVTbEdmVXlrYUw1eUdpcHVUdmpJR2ZiZE1oSjVLeDJ0aDAwMHVBZHJJekpIZWg2aWNjMFpBT0t1cWZIN1dLRkZySjZaTVZvcW1MUVNsZGpWeFRPQmJUREdXS0QycWhkNFl1MFZkdWVPa3EwQm5HZHFST3ZzNFJpbFJXcnk3T2x3dGRtRkVveis0alM0M2pYeG5LQ2JOMlhOekJFUS9iWnRBN1gwbGhpanovWFFkTHZOYklodjYybno3SjdVb2cweGpHOUZkZzFpT2ZoeE1VRm0wUytYVkJOZGs3R2xPT25Yejk1VGdmZVZNSURud3hBc3dLUjNKeG4vM1lYempmb1Jsd2ErV2RXSm9XWTRCYk0zT1RYTDQ2eHVQL0I3VDRlUnRIa1lVWXJmRjNjcVFpMUhUQUFqZUluQ3l6amtQMzB1MVhwU21DL1NhQmxnT2syeE5HYzJJNENlekxGMjAxdS9rWjNRVG5CcmdybzNOT255dytFbUh5bkxjVUpDZGoyRDhMY2N5aHpDZElkRjhoN0tVVWk5bG9PQzUyOXk2K2lLY1cxNU9HdlVGNXkxNCs4cXVlVzNiOGZtMzFYRGMvUENleXRFblVNVnZPYlF6Qy81STFKc1Y0ais1YndTbU8ySFJ0UEN3RkJoTmlscDdaeXZYb2x1WDdMR0s0QUo5RWtCVk53eXBQbGhZVGZxQTV2dHdyTlo0SXVITDJSRlpITkNtejVLT3B2d1hNam4yME9iQ3NoVngrdFRVNXgyd0lrUjNzNEhNaXlJalVyQ0tIM215blhiVncwdWtoZjE4YjNGdjBVdkl6R1AwWDg0ZHdVTXhlZG5GNXd3SngzZlJKWjY3SjMrYUdBOTdDSEVyVHBZUHhRUGx1QjFueGdCeUZzaTU1cGhNY0Q3Y1N4aUNhWlUxdmhyUmwwMGhna0ZRTkI2RVZ4eTVPdz09OjpcWMmkSFHpcSJc/33Kh5UM"><input type="hidden" id="_acf_nonce" name="_acf_nonce" value="4858cfd39d"><input type="hidden" id="_acf_changed" name="_acf_changed" value="0">
                                                    </div>
                                                    <div class="acf-fields acf-form-fields -top">

                                                        <div class="acf-field acf-field-radio acf-field-5ec7dea293736 form-row radio-btn radio-btn-3 form-row form-row" data-name="gender" data-type="radio" data-key="field_5ec7dea293736">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5ec7dea293736">Gender</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <input type="hidden" name="acf[field_5ec7dea293736]">
                                                                <ul class="acf-radio-list acf-bl  input-text" data-allow_null="1" data-other_choice="0">
                                                                    <li><label><input type="radio" id="acf-field_5ec7dea293736-male" name="acf[field_5ec7dea293736]" value="Male">Male</label></li>
                                                                    <li><label><input type="radio" id="acf-field_5ec7dea293736-female" name="acf[field_5ec7dea293736]" value="Female">Female</label></li>
                                                                    <li><label><input type="radio" id="acf-field_5ec7dea293736-prefer-not-to-say" name="acf[field_5ec7dea293736]" value="Prefer not to say">Prefer not to say</label></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-radio acf-field-5eb16b9ef7297 form-row form-row do-you-own form-row radio-btn form-row form-row form-row form-row form-row form-row form-row form-row form-row form-row form-row" data-name="do_you_own_a_ccm_motorcycle" data-type="radio" data-key="field_5eb16b9ef7297">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5eb16b9ef7297">DO YOU OWN A CCM MOTORCYCLE?</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <input type="hidden" name="acf[field_5eb16b9ef7297]">
                                                                <ul class="acf-radio-list acf-hl  input-text" data-allow_null="1" data-other_choice="0">
                                                                    <li><label><input type="radio" id="acf-field_5eb16b9ef7297-yes-im-a-ccm-owner" name="acf[field_5eb16b9ef7297]" value="Yes, I'm a CCM owner!">Yes, I'm a CCM owner!</label></li>
                                                                    <li><label><input type="radio" id="acf-field_5eb16b9ef7297-no-im-just-an-enthusiast" name="acf[field_5eb16b9ef7297]" value="No, I'm just an enthusiast!">No, I'm just an enthusiast!</label></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-repeater acf-field-5ced50e8d2411 form-row acf-hidden form-row bike-list-wrapper form-row" data-name="bike_information" data-type="repeater" data-key="field_5ced50e8d2411" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16b9ef7297&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;Yes, I'm a CCM owner!&quot;}]]">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5ced50e8d2411">TELL US WHICH CCM/S YOU OWN</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <div class="acf-repeater -empty -table" data-min="0" data-max="0">
                                                                    <input type="hidden" name="acf[field_5ced50e8d2411]" value="" disabled="">
                                                                    <table class="acf-table">

                                                                        <thead>
                                                                            <tr>
                                                                                <th class="acf-row-handle"></th>

                                                                                <th class="acf-th" data-name="bike_model" data-type="select" data-key="field_5ced5159d2412">
                                                                                    <label>Bike model</label>
                                                                                </th>
                                                                                <th class="acf-th" data-name="bike_registration" data-type="text" data-key="field_5ced51ad6511e">
                                                                                    <label>Bike Registration</label>
                                                                                </th>

                                                                                <th class="acf-row-handle"></th>
                                                                            </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                            <tr class="acf-row acf-clone" data-id="acfcloneindex">

                                                                                <td class="acf-row-handle order" title="Drag to reorder">
                                                                                    <span>1</span>
                                                                                </td>


                                                                                <td class="acf-field acf-field-select acf-field-5ced5159d2412 form-row form-row" data-name="bike_model" data-type="select" data-key="field_5ced5159d2412">
                                                                                    <div class="acf-input">
                                                                                        <select id="acf-field_5ced50e8d2411-acfcloneindex-field_5ced5159d2412" class="input-text" name="acf[field_5ced50e8d2411][acfcloneindex][field_5ced5159d2412]" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0" disabled="">
                                                                                            <option value="0">Foggy S Edition Spitfire</option>
                                                                                            <option value="1">CCM Spitfire Six</option>
                                                                                            <option value="2">Foggy Edition Spitfire</option>
                                                                                            <option value="3">RAF Benevolent Fund Spitfire</option>
                                                                                            <option value="4">GP450 Adventure</option>
                                                                                            <option value="5">Spitfire Scrambler</option>
                                                                                            <option value="6">Spitfire Flat Tracker</option>
                                                                                            <option value="7">Spitfire Café Racer</option>
                                                                                            <option value="8">Spitfire Bobber</option>
                                                                                            <option value="9">Spitfire</option>
                                                                                            <option value="10">Stealth Six</option>
                                                                                            <option value="11">Stealth Foggy</option>
                                                                                            <option value="12">Stealth Bobber</option>
                                                                                            <option value="13">Blackout</option>
                                                                                            <option value="14">Maverick</option>
                                                                                            <option value="15">Heritage ‘71</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </td>

                                                                                <td class="acf-field acf-field-text acf-field-5ced51ad6511e form-row form-row" data-name="bike_registration" data-type="text" data-key="field_5ced51ad6511e">
                                                                                    <div class="acf-input">
                                                                                        <div class="acf-input-wrap"><input type="text" id="acf-field_5ced50e8d2411-acfcloneindex-field_5ced51ad6511e" class="input-text" name="acf[field_5ced50e8d2411][acfcloneindex][field_5ced51ad6511e]" disabled=""></div>
                                                                                    </div>
                                                                                </td>



                                                                                <td class="acf-row-handle remove">
                                                                                    <a class="acf-icon -plus small acf-js-tooltip hide-on-shift" href="#" data-event="add-row" title="Add row"></a>
                                                                                    <a class="acf-icon -duplicate small acf-js-tooltip show-on-shift" href="#" data-event="duplicate-row" title="Duplicate row"></a>
                                                                                    <a class="acf-icon -minus small acf-js-tooltip" href="#" data-event="remove-row" title="Remove row"></a>
                                                                                </td>

                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <div class="acf-actions">
                                                                        <a class="acf-button button button-primary" href="#" data-event="add-row">Add a Bike</a>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-group acf-field-5eb16bc2f7298 form-row group form-row" data-name="first_hear_about_ccm" data-type="group" data-key="field_5eb16bc2f7298">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5eb16bc2f7298">FIRST HEAR ABOUT CCM</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <div class="acf-fields -top -border">
                                                                    <div class="acf-field acf-field-select acf-field-5eb16c0ff7299 form-row form-row" data-name="where_did_you_first_hear_about_ccm" data-type="select" data-key="field_5eb16c0ff7299">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16bc2f7298-field_5eb16c0ff7299">WHERE DID YOU FIRST HEAR ABOUT CCM?</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <select id="acf-field_5eb16bc2f7298-field_5eb16c0ff7299" class="input-text" name="acf[field_5eb16bc2f7298][field_5eb16c0ff7299]" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0">
                                                                                <option value="At a bike show">At a bike show</option>
                                                                                <option value="At an event">At an event</option>
                                                                                <option value="Social media">Social media</option>
                                                                                <option value="Magazine">Magazine</option>
                                                                                <option value="Google Search">Google Search</option>
                                                                                <option value="Word of mouth">Word of mouth</option>
                                                                                <option value="Other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="acf-field acf-field-text acf-field-5eb16c2df729a form-row subfield form-row" data-name="please_name" data-type="text" data-key="field_5eb16c2df729a" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16c0ff7299&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;At a bike show&quot;}],[{&quot;field&quot;:&quot;field_5eb16c0ff7299&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;At an event&quot;}]]">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16bc2f7298-field_5eb16c2df729a">Please name</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <div class="acf-input-wrap"><input type="text" id="acf-field_5eb16bc2f7298-field_5eb16c2df729a" class="input-text" name="acf[field_5eb16bc2f7298][field_5eb16c2df729a]"></div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="acf-field acf-field-select acf-field-5eb16caa0d3d7 subfield form-row acf-hidden" data-name="social_media" data-type="select" data-key="field_5eb16caa0d3d7" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16c0ff7299&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;Social media&quot;}]]" hidden="">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16bc2f7298-field_5eb16caa0d3d7">Social media</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <select id="acf-field_5eb16bc2f7298-field_5eb16caa0d3d7" class="input-text" name="acf[field_5eb16bc2f7298][field_5eb16caa0d3d7]" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0" disabled="">
                                                                                <option value="Facebook">Facebook</option>
                                                                                <option value="Instagram">Instagram</option>
                                                                                <option value="Twitter">Twitter</option>
                                                                                <option value="Youtube">Youtube</option>
                                                                                <option value="Pinterest">Pinterest</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="acf-field acf-field-select acf-field-5eb16cefb1a79 subfield  form-row acf-hidden" data-name="magazine" data-type="select" data-key="field_5eb16cefb1a79" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16c0ff7299&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;Magazine&quot;}]]" hidden="">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16bc2f7298-field_5eb16cefb1a79">Magazine</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <select id="acf-field_5eb16bc2f7298-field_5eb16cefb1a79" class="input-text" name="acf[field_5eb16bc2f7298][field_5eb16cefb1a79]" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0" disabled="">
                                                                                <option value="Bike">Bike</option>
                                                                                <option value="Ride">Ride</option>
                                                                                <option value="MCN">MCN</option>
                                                                                <option value="Built">Built</option>
                                                                                <option value="Classic Bike">Classic Bike</option>
                                                                                <option value="Other">Other</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="acf-field acf-field-text acf-field-5eb16d0db1a7a subfield   form-row form-row acf-hidden" data-name="please_specify" data-type="text" data-key="field_5eb16d0db1a7a" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16c0ff7299&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;Other&quot;}]]" hidden="">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16bc2f7298-field_5eb16d0db1a7a">Please specify</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <div class="acf-input-wrap"><input type="text" id="acf-field_5eb16bc2f7298-field_5eb16d0db1a7a" class="input-text" name="acf[field_5eb16bc2f7298][field_5eb16d0db1a7a]" disabled=""></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-select acf-field-5eb16d98a2c1a form-row acf-hidden" data-name="how_many_miles_do_you_ride_annually" data-type="select" data-key="field_5eb16d98a2c1a" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16b9ef7297&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;Yes, I'm a CCM owner!&quot;}]]" hidden="">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5eb16d98a2c1a">HOW MANY MILES DO YOU RIDE ANNUALLY?</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <select id="acf-field_5eb16d98a2c1a" class="input-text" name="acf[field_5eb16d98a2c1a]" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0" disabled="">
                                                                    <option value="500 - 1000">500 - 1000</option>
                                                                    <option value="1000 - 3000">1000 - 3000</option>
                                                                    <option value="3000 - 5000">3000 - 5000</option>
                                                                    <option value="5000+">5000+</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-checkbox acf-field-5eb16dbda2c1b radio-btn form-row form-row" data-name="what_other_bikes_do_you_own" data-type="checkbox" data-key="field_5eb16dbda2c1b">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5eb16dbda2c1b">WHAT OTHER BIKES DO YOU OWN?</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <input type="hidden" name="acf[field_5eb16dbda2c1b]">
                                                                <ul class="acf-checkbox-list acf-hl  input-text">
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-Sports-bike" name="acf[field_5eb16dbda2c1b][]" value="Sports bike"> Sports bike</label></li>
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-Track-day-bike" name="acf[field_5eb16dbda2c1b][]" value="Track day bike"> Track day bike</label></li>
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-Adventure-bike" name="acf[field_5eb16dbda2c1b][]" value="Adventure bike"> Adventure bike</label></li>
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-Custom/Cruiser" name="acf[field_5eb16dbda2c1b][]" value="Custom/Cruiser"> Custom/Cruiser</label></li>
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-Dirt-bike" name="acf[field_5eb16dbda2c1b][]" value="Dirt bike"> Dirt bike</label></li>
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-Electric" name="acf[field_5eb16dbda2c1b][]" value="Electric"> Electric</label></li>
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-Tourer" name="acf[field_5eb16dbda2c1b][]" value="Tourer"> Tourer</label></li>
                                                                    <li><label><input type="checkbox" id="acf-field_5eb16dbda2c1b-None" name="acf[field_5eb16dbda2c1b][]" value="None"> None</label></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-select acf-field-5eb16de3a2c1c form-row form-row" data-name="when_do_you_plan_to_buy_your_next_bike" data-type="select" data-key="field_5eb16de3a2c1c">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5eb16de3a2c1c">WHEN DO YOU PLAN TO BUY YOUR NEXT BIKE?</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <select id="acf-field_5eb16de3a2c1c" class="input-text" name="acf[field_5eb16de3a2c1c]" data-ui="0" data-ajax="0" data-multiple="0" data-placeholder="Select" data-allow_null="0">
                                                                    <option value="Within the next few weeks">Within the next few weeks</option>
                                                                    <option value="This summer">This summer</option>
                                                                    <option value="Later this year">Later this year</option>
                                                                    <option value="Next year">Next year</option>
                                                                    <option value="No plans">No plans</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-group acf-field-5eb16dfba2c1d group form-row form-row acf-hidden" data-name="consider_another_ccm" data-type="group" data-key="field_5eb16dfba2c1d" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16b9ef7297&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;Yes, I'm a CCM owner!&quot;}]]" hidden="">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5eb16dfba2c1d">CONSIDER ANOTHER CCM</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <div class="acf-fields -top -border">
                                                                    <div class="acf-field acf-field-radio acf-field-5eb16e17a2c1e radio-btn form-row" data-name="would_you_consider_another_ccm" data-type="radio" data-key="field_5eb16e17a2c1e">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16dfba2c1d-field_5eb16e17a2c1e">WOULD YOU CONSIDER ANOTHER CCM?</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <input type="hidden" name="acf[field_5eb16dfba2c1d][field_5eb16e17a2c1e]" disabled="">
                                                                            <ul class="acf-radio-list acf-hl  input-text" data-allow_null="0" data-other_choice="0">
                                                                                <li><label class=""><input type="radio" id="acf-field_5eb16dfba2c1d-field_5eb16e17a2c1e-yes" name="acf[field_5eb16dfba2c1d][field_5eb16e17a2c1e]" value="Yes" disabled="">Yes</label></li>
                                                                                <li><label><input type="radio" id="acf-field_5eb16dfba2c1d-field_5eb16e17a2c1e-no" name="acf[field_5eb16dfba2c1d][field_5eb16e17a2c1e]" value="No" disabled="">No</label></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="acf-field acf-field-text acf-field-5eb16e3ea2c1f subfield form-row acf-hidden" data-name="why_not" data-type="text" data-key="field_5eb16e3ea2c1f" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16e17a2c1e&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;No&quot;}]]" hidden="">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16dfba2c1d-field_5eb16e3ea2c1f">Why not?</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <div class="acf-input-wrap"><input type="text" id="acf-field_5eb16dfba2c1d-field_5eb16e3ea2c1f" class="input-text" name="acf[field_5eb16dfba2c1d][field_5eb16e3ea2c1f]" disabled=""></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-group acf-field-5eb16e56a2c20 group  form-row form-row" data-name="bike_you_want_ccm_to_make" data-type="group" data-key="field_5eb16e56a2c20">
                                                            <div class="acf-label">
                                                                <label for="acf-field_5eb16e56a2c20">BIKE YOU WANT CCM TO MAKE</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <div class="acf-fields -top -border">
                                                                    <div class="acf-field acf-field-checkbox acf-field-5eb16e71a2c21 radio-btn form-row form-row form-row" data-name="what_sort_of_bike_would_you_like_to_see_ccm_make" data-type="checkbox" data-key="field_5eb16e71a2c21">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16e56a2c20-field_5eb16e71a2c21">WHAT SORT OF BIKE WOULD YOU LIKE TO SEE CCM MAKE?</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <input type="hidden" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21]">
                                                                            <ul class="acf-checkbox-list acf-hl  input-text">
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Classic-Adventure-Bike" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Classic Adventure Bike"> Classic Adventure Bike</label></li>
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Modern-Retro-Naked" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Modern Retro Naked"> Modern Retro Naked</label></li>
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Modern-Retro-Sports" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Modern Retro Sports"> Modern Retro Sports</label></li>
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Classic-Track-Racing" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Classic Track Racing"> Classic Track Racing</label></li>
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Twinshock-Roadster" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Twinshock Roadster"> Twinshock Roadster</label></li>
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Comfortable-Commuter" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Comfortable Commuter"> Comfortable Commuter</label></li>
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Cruiser" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Cruiser"> Cruiser</label></li>
                                                                                <li><label><input type="checkbox" id="acf-field_5eb16e56a2c20-field_5eb16e71a2c21-Other" name="acf[field_5eb16e56a2c20][field_5eb16e71a2c21][]" value="Other"> Other</label></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="acf-field acf-field-text acf-field-5eb16e86a2c22 subfield  form-row acf-hidden" data-name="please_specify" data-type="text" data-key="field_5eb16e86a2c22" data-conditions="[[{&quot;field&quot;:&quot;field_5eb16e71a2c21&quot;,&quot;operator&quot;:&quot;==&quot;,&quot;value&quot;:&quot;Other&quot;}]]" hidden="">
                                                                        <div class="acf-label">
                                                                            <label for="acf-field_5eb16e56a2c20-field_5eb16e86a2c22">Please specify</label>
                                                                        </div>
                                                                        <div class="acf-input">
                                                                            <div class="acf-input-wrap"><input type="text" id="acf-field_5eb16e56a2c20-field_5eb16e86a2c22" class="input-text" name="acf[field_5eb16e56a2c20][field_5eb16e86a2c22]" disabled=""></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="acf-field acf-field-text acf-field--validate-email form-row" style="display:none !important;" data-name="_validate_email" data-type="text" data-key="_validate_email">
                                                            <div class="acf-label">
                                                                <label for="acf-_validate_email">Validate Email</label>
                                                            </div>
                                                            <div class="acf-input">
                                                                <div class="acf-input-wrap"><input type="text" id="acf-_validate_email" class="input-text" name="acf[_validate_email]"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="woocommerce-privacy-policy-text">
                                                        <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="https://ccm.theprogressteam.com/privacy-policy/" class="woocommerce-privacy-policy-link" target="_blank">privacy policy</a>.</p>
                                                    </div>
                                                    <p class="woocommerce-form-row form-row">
                                                        <input type="hidden" id="woocommerce-register-nonce" name="woocommerce-register-nonce" value="f6af311a48"><input type="hidden" name="_wp_http_referer" value="/bikes/maverick-configure/?test=testss"> <button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="Register">Register</button>
                                                    </p>




                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        <?php if (isset($_GET['id'])) { ?>
            is_saved_data();
        <?php } else { ?>
            pre_selected();
            is_package();
        <?php } ?>

        scroll();
        getTotal();
        click_acc();
        jQuery(".tot_amount").click(function(event) {
            getTotal();
        });
        getTotal(false);
        save_form();

        $("form").submit(function(e) {
            var firstname = $("input[name='first-name']").val();
            var lastname = $("input[name='last-name']").val();
            var emailadd = $("input[name='email-address']").val();
            var telephoneno = $("input[name='telephone']").val();
            if ((firstname == '') || (lastname == '') || (emailadd == '') || (telephoneno == '')) {
                $("#contact-form-error").html('Please fill all required field.').show();
                return false;
            }
        });


        var proname = $('.bike-name').text();
        $("input[name='product_name']").val(proname);


        $('.panel-collapse').on('show.bs.collapse', function(e) {

            var $panel = $(this).closest('.panel');
            var $open = $(this).closest('.panel-group').find('.panel-collapse.in');

            var additionalOffset = 0;
            if ($panel.prevAll().filter($open.closest('.panel')).length !== 0) {
                additionalOffset = $open.height();
            }

            $('html,body').animate({
                scrollTop: $panel.offset().top - (additionalOffset + 70)
            }, 500);
        });

    });


    function save_form() {
        jQuery('#popup-button').click(function(e) {
            jQuery('.custom-modal, .custom-modal-backdrop').addClass('modal-active');
            setTimeout(function() {
                jQuery('.custom-modal').addClass('show-modal');
            }, 300);
            e.preventDefault();
        });

        jQuery('.custom-modal-backdrop').click(function(e) {
            jQuery('.custom-modal').removeClass('show-modal');
            setTimeout(function() {
                jQuery('.custom-modal, .custom-modal-backdrop').removeClass('modal-active');
            }, 300);
            e.preventDefault();
        });

        jQuery('#title').keyup(function(e) {
            jQuery('input[name="title"]').val(jQuery(this).val());
        });
        jQuery('#notes').keyup(function(e) {
            jQuery('input[name="notes"]').val(jQuery(this).val());
        });

        jQuery('#save-button').click(function(e) {
            jQuery("#configurator-form").submit();
            e.preventDefault();
        });

    }


    function mh() {
        jQuery('.panel-heading').click(function(event) {
            var $this = jQuery(this).next().find('.');
            setTimeout(function() {
                $this.matchHeight();
            }, 300);
        });


        setTimeout(function() {
            jQuery('.').matchHeight();
        }, 300);
    }

    function scroll() {
        jQuery(".scroll-down").on('click', function(event) {

            if (this.hash !== "") {
                event.preventDefault();

                var hash = this.hash;

                jQuery('html, body').animate({
                    scrollTop: jQuery(hash).offset().top - 70
                }, 800, function() {

                    window.location.hash = hash;
                });
            }
        });

    }

    function getTotal(isInit) {

        var total = <?php _e($bike_initial_price) ?>;
        var selector = isInit ? ".tot_amount" : ".tot_amount:checked";

        $(selector).each(function() {
            tempname = '';
            total += parseFloat($(this).attr('accesory_value'));
        });
        total = total.toFixed(2);
        if (total == 0) {
            $('#total1').val('');
            $('.count').html('');

        } else {
            $('#total1').val(ReplaceNumberWithCommas(total));
            $('.count').html('TOTAL: &#163;' + ReplaceNumberWithCommas(total));
            $("input[name='total_price']").val(total);
        }
    }

    function pre_selected() {
        jQuery('.pre-selected').each(function(index, el) {
            jQuery(this).prop("checked", true).addClass('clicked');
            if (jQuery(this).hasClass('is-package')) {
                package_function(jQuery(this));
            }
            setTimeout(function() {
                update_summary();
            }, 500);
        });
    }

    function is_package() {
        jQuery('.is-package').change(function(index, el) {
            if (jQuery('.acc-option').hasClass('saved-data-loaded')) {
                package_function(jQuery(this));
            }
            setTimeout(function() {
                update_summary();
            }, 500);
        });
    }

    function package_function($this) {
        $products_included = $this.attr('products-included');

        jQuery('.price').each(function(index, el) {
            $original_price_text = jQuery(this).attr('original-price-text');
            $original_price_val = jQuery(this).attr('original-price-val');
            jQuery(this).text($original_price_text);
            jQuery(this).parent().prev().attr('accesory_value', $original_price_val);
            jQuery(this).parent().prev().removeClass('disabled-unselect');
            if (!jQuery(this).parent().prev().hasClass('exclude-deselection')) {
                jQuery(this).parent().prev().prop("checked", false).removeClass('clicked');
            }
        });

        jQuery($products_included).next().find('.price').text('Included in package');
        jQuery($products_included).attr('accesory_value', 0);
        jQuery($products_included).addClass('clicked');
        if (!jQuery('.acc-option').hasClass('saved-data-loaded')) {
            jQuery($products_included).click();
        }
        jQuery($products_included).addClass('disabled-unselect');
        $this.prop("checked", true).addClass('clicked');

        console.log($products_included);

    }

    function is_saved_data() {
        <?php $config_data = carbon_get_post_meta($_GET['id'], 'config_data') ?>
        <?php foreach ($config_data as $data) { ?>
            <?php
            $category = $data['category'];
            $term = get_term_by('slug', $category, 'product_cat');
            $select_one = carbon_get_term_meta($term->term_id, 'select_one');
            $product_lists = $data['product_lists'];
            ?>
            <?php if ($category != 'model') { ?>
                <?php foreach ($product_lists as $product) { ?>
                    jQuery('input[product_id="<?= $product ?>"]').prop("checked", true).addClass('clicked');
                <?php } ?>
            <?php } else { ?>
                <?php foreach ($product_lists as $product) { ?>
                    jQuery('input[product_id="<?= $product ?>"]').click();
                    package_function(jQuery('input[product_id="<?= $product ?>"]'));
                <?php } ?>
            <?php } ?>
            setTimeout(function() {
                jQuery('.acc-option').addClass('saved-data-loaded');
            }, 300);

        <?php } ?>
    }

    function click_acc() {
        jQuery('.acc_box').click(function(event) {
            if (jQuery(this).hasClass('select-one')) {
                $main_id = jQuery(this).attr('main_id');
                $input = jQuery(this).prev();

                if (!($input.hasClass('required') && $input.hasClass('clicked'))) {
                    $main_id = jQuery('input[main_id="' + $main_id + '"]');
                    $main_id.removeClass('clicked');
                    $input.addClass('clicked');
                    $main_id.each(function(index, el) {
                        if (!jQuery(this).hasClass('clicked')) {
                            jQuery(this).prop("checked", false);
                        }
                    });
                } else {
                    event.preventDefault();
                    event.stopPropagation();
                    $input.prop("checked", true);
                }
            }
            if (jQuery(this).hasClass('change-image')) {
                $this = jQuery(this);
                $realmain = jQuery('#main-image').attr('source');
                $real_small_image = jQuery('#main-image').attr('source');
                $real_small_image = jQuery('#footer-image').attr('source');
                setTimeout(function() {
                    $prop = $this.prev().prop('checked');
                    if ($prop == false) {
                        $main_image.attr('src', $realmain);
                        $footer_image.attr('src', $real_small_image);

                    } else {
                        $main_image = jQuery('#main-image');
                        $footer_image = jQuery('#footer-image');
                        $big_image = $this.find('img').attr('big-image');
                        $small_image = $this.find('img').attr('src');
                        $main_image.attr('src', $big_image);
                        $footer_image.attr('src', $small_image);
                    }
                }, 100);

            }
            update_summary();
        });
    }

    function ReplaceNumberWithCommas(total) {
        var n = total.toString().split(".");
        n[0] = n[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return n.join(".");
    }

    function update_summary() {
        var $table_row;
        var $summary_items = jQuery('#summery-items2');
        var $entire_summary = jQuery('#summary_list');
        var $summary_field = '';

        setTimeout(function() {
            jQuery('#summery-items2').html('');
            jQuery('#config-summary').html('');
            <?php foreach ($bike_section as $panel_key => $section) { ?>
                <?php
                $key = ' summary_items_ ' . $panel_key;
                $class = '.' . strtolower(str_replace(" ", "", $section->slug));
                ?>
                var $selector = jQuery('<?php _e($class) ?>').find('.tot_amount:checked');
                $selector_length = $selector.length;
                if ($selector_length > 0) {
                    $summary = '<table class="table cs-list" style="width: 100%; max-width: 800px !important; margin-left: auto; margin-right: auto"><thead><tr><th colspan="3" style="background-color: #000; color: #fff; padding: 5px;"><span class="summary-section-heading"><?php _e(clean_string($section->name)) ?></span></th></tr></thead><tbody>';
                    $summary_field += '<?php _e(clean_string($section->name)) ?>\r\n';
                    $selector.each(function(index, el) {
                        var $productimg = jQuery(this).siblings("label").find("img").attr('email-image');
                        var $productname = jQuery.trim(jQuery(this).siblings("label").find("h4").text());
                        var $productnum = jQuery(this).siblings("label").find(".d-block").text();
                        var $productprice = jQuery.trim(jQuery(this).siblings("label").find(".price").text());

                        $summary += '<tr><td style="width: 150px;"><div class="img-pro" style="width: 150px"><img src="' + $productimg + '" style="width: 150px; height: 150px"></div></td><td class="text-left; padding: 10px !important;"><h4 class="summary-product-name" style="margin: 0; color: #000;">' + $productname + '</h4><p style="margin: 0; color: #000;"><span style="margin: 0; color: #000;">' + $productnum + '</span></p></td><td class="text-right" style="text-align: right; padding: 10px !important;"><span class="count" style="color: #ed181f;">' + $productprice + '</span></td></tr>';

                        $summary_field += $productname + '(' + $productprice + '), ';
                    });

                    $summary_field += '\r\n';

                    $summary += '</tbody></table>';
                    $summary_items.append($summary);
                    jQuery('#config-summary').val($summary_field);
                    jQuery('textarea[name="product_list"]').val($entire_summary.html());
                }
            <?php } ?>
        }, 300);

    }

    /*
    function update_summary() {
        var $table_row;
        var $summary_items = jQuery('#summery-items2');
        var $entire_summary = jQuery('#summary_list');
        setTimeout(function() {
            jQuery('#summery-items2').html('');
            <?php //foreach ($bike_section as $panel_key => $section) { 
            ?>
                <?php
                // $key = ' summary_items_ ' . $panel_key;
                // $class = '.' . strtolower(str_replace(" ", "", $section->slug));
                ?>
                var $selector = jQuery('<?php // _e($class) 
                                        ?>').find('.tot_amount:checked');
                $selector_length = $selector.length;
                if ($selector_length > 0) {
                    $summary = '<table class="table cs-list" style="width: 100%; max-width: 800px !important; margin-left: auto; margin-right: auto"><thead><tr><th colspan="3" style="background-color: #000; color: #fff; padding: 5px;"><span class="summary-section-heading"><?php //_e(clean_string($section->name)) 
                                                                                                                                                                                                                                                                                    ?></span></th></tr></thead><tbody>';
                    $selector.each(function(index, el) {
                        var $productimg = jQuery(this).siblings("label").find("img").attr('email-image');
                        var $productname = jQuery(this).siblings("label").find("h4").text();
                        var $productnum = jQuery(this).siblings("label").find(".d-block").text();
                        var $productprice = jQuery(this).siblings("label").find(".price").text();

                        $summary += '<tr><td style="width: 150px;"><div class="img-pro" style="width: 150px"><img src="' + $productimg + '" style="width: 150px; height: 150px"></div></td><td class="text-left; padding: 10px !important;"><h4 class="summary-product-name" style="margin: 0; color: #000;">' + $productname + '</h4><p style="margin: 0; color: #000;"><span style="margin: 0; color: #000;">' + $productnum + '</span></p></td><td class="text-right" style="text-align: right; padding: 10px !important;"><span class="count" style="color: #ed181f;">' + $productprice + '</span></td></tr>';
                    });
                    $summary += '</tbody></table>';
                    $summary_items.append($summary);
                    jQuery('textarea[name="product_list"]').val($entire_summary.html());
                }
            <?php //} 
            ?>
        }, 300);

    }*/
    <?php if (isset($_GET['submitted']) && $_GET['submitted'] == 'true') { ?>
        jQuery(document).ready(function() {
            jQuery('html, body').animate({
                scrollTop: jQuery("#reserve_bike").offset().top
            }, 2000);
        });
    <?php } ?>
</script>


<?php

if ($custom_scripts) {
    echo $custom_scripts;
}
?>
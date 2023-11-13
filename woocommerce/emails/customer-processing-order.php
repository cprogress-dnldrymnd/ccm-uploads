<?php
/**
 * Customer processing order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-processing-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates/Emails
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<style>
	table {
		background-color: #fff !important;
	}
	table h1 {
		background-color: #000 !important;
		text-align: center;
		padding: 20px !important;
	}
	table > tbody > tr > td > table > tbody > tr:first-child > td {
		background-color: #000;
	}
</style>
<?php

$product_categories = array();

// Loop through order items
$services_prod = '';
foreach( $order->get_items() as $items ){
    // Get an array of the WP_Terms of the product categories
	$terms = wp_get_post_terms( $items->get_product_id(), 'product_cat' );

    // Loop through the product categories WP_Term objects
	foreach( $terms as $wp_term ){
        // Get the product category ID
		$term_id = $wp_term->term_id;
        // Get the product category Nmae
		$term_name = $wp_term->name;
        // Get the product category Slug
		$term_slug = $wp_term->slug;
        // Get the product category Parent ID
		$term_parent_id = $wp_term->parent;

        // Set each product category WP_Term object in an array (avoiding duplicates)
		$product_categories[$wp_term->term_id] = $wp_term;
		$services_prod .=  $wp_term->name;

	}
}
$service = '';
if (strpos($services_prod, 'Services') !== false) {
	$service = ' If your order includes a service, a member of our servicing team will be in touch soon to get you booked in.';
}
/*
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); 
?>

<?php /* translators: %s: Customer first name */ ?>
<p><?php printf( esc_html__( 'Hi %s,', 'woocommerce' ), esc_html( $order->get_billing_first_name() ) ); ?></p>
<?php /* translators: %s: Order number */ ?>
<p><?php printf( esc_html__( 'Just to let you know — we\'ve received your order #%s, and it is now being processed. We will let you know once your order has been dispatched.' .$service, 'woocommerce' ), esc_html( $order->get_order_number() ) ); ?></p>

<?php

/*
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/*
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * Show user-defined additional content - this is set in each email's settings.
 */
if ( $additional_content ) {
	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );
}

/*
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );

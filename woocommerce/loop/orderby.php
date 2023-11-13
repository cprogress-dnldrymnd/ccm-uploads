<?php
/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/*$args = array(
    'numberposts' => -1,
    'post_type'   => 'bikes',
    'post_status'    => array('publish', 'private'),
    'tax_query' => array(
        array(
            'taxonomy' => 'bike-type',
            'field'    => 'id',
            'terms'    => array(324)
        )
    )
);

$bikes = get_posts( $args );

    // reset choices
$option_array = array();


    // loop through array and add to field 'choices'


foreach( $bikes as $bike ) {
    $option_array[] = $bike->post_title;
}*/
$option_array = array(
            'Bobber',
            'CaféRacer',
            'Flat Tracker',
            'Foggy FT',
            'Foggy S',
            'RAF BF',
            'Six',
			'Scrambler',
			'Spitfire'
);
?>
<form class="woocommerce-ordering" method="get">
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
	    <?php foreach ( $catalog_orderby_options as $id => $name ) : 
	                    if( $id == 'menu_order') { 
        ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php } 
		endforeach; ?>
		<?php foreach( $option_array as $lab => $val ) {
		            $selected = $val == $_GET['orderby'] ? 'selected="selected"' : '';
                ?>
            <option value="<?php echo esc_attr( $val ); ?>" <?php echo $selected; ?>><?php echo esc_html( $val ); ?></option>
    <?php } ?>
	</select>
	
	<input type="hidden" name="paged" value="1" />
	<input type="hidden" name="product_type" value="bike" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page' ) ); ?>
</form>

<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
/*Real Version 3.4.0*/
?>
<li <?php wc_product_class(); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );

	if ( is_shop() || is_product_category() ) {
		echo 'Part No.    '. $product->get_sku();
	}

	$age = carbon_get_the_post_meta('product_age');
	$mileage = carbon_get_the_post_meta('product_mileage');
	$bike_com = get_field( 'ccm_product_bike_com',$product->get_ID() );
	if(!$age && !$mileage):
	/**
	 * Hook: woocommerce_after_shop_loop_item_title.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	/**
	 * Hook: woocommerce_after_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	
	if( !is_shop() && !is_product_category() ){
		do_action( 'woocommerce_after_shop_loop_item' );
	}

	$bike_com_d = get_field('ccm_product_bike_com_cb', $product->get_ID());
	if( is_shop() || is_product_category()){ ?>
		<div class="a-toottip">
			<?php if($bike_com_d) { ?>
				<ul class="list-inline">
					<?php foreach($bike_com_d as $bike_com) { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="<?= get_the_title($bike_com) == 'Maverick Old' ? 'Maverick' : get_the_title($bike_com) ?>"><img src="<?= wp_get_attachment_image_url( get_field('bike_icon', $bike_com), 'medium' ) ?>"></a></li>
					<?php } ?>
				</ul>
			<?php } else { ?>
				<ul class="list-inline">
					<?php if (in_array("Bobber", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Bobber"><img src="<?php echo get_template_directory_uri();?>/app/assets/images/b.png"></a></li>
					<?php } if ( in_array("CaféRacer", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="CaféRacer"><img src="<?php echo get_template_directory_uri();?>/app/assets/images/cr.png"></a></li>
					<?php } if ( in_array("Flat Tracker", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Flat Tracker"><img src="<?php echo get_template_directory_uri();?>/app/assets/images/ft.png"></a></li>
					<?php } if (in_array("Foggy FT", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Foggy FT"><img src="<?php echo get_template_directory_uri();?>/app/assets/images/fft.png"></a></li>
					<?php } if (in_array("Foggy S", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Foggy S"><img src="<?php echo get_template_directory_uri();?>/app/assets/images/fs.png"></a></li>
					<?php } if (in_array("RAF BF", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="RAF BF"><img src="<?php echo get_template_directory_uri();?>/app/assets/images/r.png"></a></li>
					<?php } if (in_array("Six", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Six"><img src="<?php echo get_template_directory_uri();?>/app/assets/images/six.png"></a></li>
					<?php } if (in_array("Scrambler", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Scrambler"><img src="/wp-content/uploads/2019/11/sc.png"></a></li>
					<?php } if (in_array("Spitfire", $bike_com) )  { ?>
						<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="Spitfire"><img src="/wp-content/uploads/2019/11/spit.png"></a></li>
					<?php } ?>
				</ul>
			<?php } ?>
		</div>
		<?php 
	}
	?>
	<script>
		jQuery(document).ready(function(){
			jQuery('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
	
	<?php
else:
		// var_dump($product);
	?>
	<span class="price" style="color: #000000;">
		<span class="woocommerce-Price-amount amount"><strong style="display: inline;">Age: </strong><?php echo $age; ?></span>
	</span>
	<span class="price" style="color: #000000;">
		<span class="woocommerce-Price-amount amount"><strong style="display: inline;">Mileage: </strong><?php echo $mileage; ?></span>
	</span>
	<span class="price" style="color: #000000;">
		<span class="woocommerce-Price-amount amount"><strong style="display: inline;">Price: </strong><span class="woocommerce-Price-amount amount"><?php echo get_woocommerce_currency_symbol(); ?></span><?php echo $product->regular_price; ?></span>
	</span>
	<div style="margin-top: 30px">
		<a href="<?php the_permalink(); ?>" class="single_add_to_cart_button">More Info</a>
	</div>
<?php endif; ?>
<a type="submit" href="<?php the_permalink( ); ?>"  class="gift-ideads-view tinvwl_add_to_wishlist_button tinvwl-icon-heart  tinvwl-position-after tinvwl-loop">View Product</a>
<?php echo do_shortcode("[ti_wishlists_addtowishlist loop=yes]"); ?>
</li>

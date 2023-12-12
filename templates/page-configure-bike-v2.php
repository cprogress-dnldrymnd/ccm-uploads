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
?>
<?php
$product_category = carbon_get_the_post_meta('product_category')[0]['id'];
$bike_code = str_replace('-', '_', get_term($product_category)->slug);
$bike_name = get_term($product_category, 'product_cat')->name;
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
</style>
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
    <div class="acc-option">
        <div class="container-fluid px-0">
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
                                                                <input class="tot_amount<?= $pre_selected . $required . $is_package . $exclude_from_deselection_val ?> " type="checkbox" id="<?= $accessory_id ?>" value="<?= $accessory_price ?>" main_id="<?= 'box-' . $key ?>" <?= $related_products_val ?> sku="<?= clean_string_2($product->get_sku()) ?>">
                                                                <label for="<?= $accessory_id ?>" class="acc_box<?= $select_one . $change_image ?> " main_id="<?= 'box-' . $key ?>">
                                                                    <div class="image-holder">
                                                                        <div class="inner">
                                                                            <?php if ($the_panel['change_image'] || $accesories['change_image']) { ?>
                                                                                <img src="<?= $the_image ?>" big-image="<?= $big_image ?>" email-image="<?= $email_image ?>">
                                                                            <?php } else { ?>
                                                                                <img src="<?= $the_image ?>" email-image="<?= $email_image ?>">
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
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
        </div>
    </div>

    <div class="reserve_bike mt-50 cs-section">
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

    <form action="">
        <textarea id="config-summary" style="width: 100%; height: 500px"> </textarea>
        <button type="submit"> SUBMIT </button>
    </form>


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
                        <script charset="utf-8" type="text/javascript" src="//js-eu1.hsforms.net/forms/embed/v2.js"></script>
                        <script>
                            hbspt.forms.create({
                                css: '',
                                region: "eu1",
                                portalId: "139521183",
                                formId: "7aa928aa-a966-4357-b74a-1f78c6b1c7c2",
                                onFormReady: function($form) {
                                    $form.find('input[name="firstname"]').val('<?= get_the_title() ?>').change();
                                }
                            });
                        </script>

                        <?php echo do_shortcode('[contact-form-7 id="6057" title="Configurator Form V2"]'); ?>
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
                    <a href="" class="red-btn pull-right scroll-down start-config">Reset Configuration</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer() ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        scroll();
        getTotal();
        click_acc();
        pre_selected();
        is_package();
        jQuery(".tot_amount").click(function(event) {
            getTotal();
        });


        getTotal(false);

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
            total += parseFloat($(this).val());
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
            package_function(jQuery(this));
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
            jQuery(this).parent().prev().val($original_price_val);
            jQuery(this).parent().prev().removeClass('disabled-unselect');
            if (!jQuery(this).parent().prev().hasClass('exclude-deselection')) {
                jQuery(this).parent().prev().prop("checked", false).removeClass('clicked');
            }
        });

        jQuery($products_included).next().find('.price').text('Included in package');
        jQuery($products_included).val(0);
        jQuery($products_included).prop("checked", true).addClass('clicked');
        jQuery($products_included).addClass('disabled-unselect');
        $this.prop("checked", true).addClass('clicked');

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
</script>


<?php

if ($custom_scripts) {
    echo $custom_scripts;
}
?>
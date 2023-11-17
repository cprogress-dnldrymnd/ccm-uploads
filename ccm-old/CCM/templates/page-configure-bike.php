<?php

/**
 *  Template Name: Configure Bike
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
 */
get_header(); // This fxn gets the header.php file and renders it 
?>
<?php
$panel = carbon_get_the_post_meta('panel');
$bike_name = carbon_get_the_post_meta('bike_name');
$bike_initial_price = carbon_get_the_post_meta('bike_initial_price');
$small_image = wp_get_attachment_image_url(carbon_get_the_post_meta('small_image'), 'medium');
$text_below_image = carbon_get_the_post_meta('text_below_image');
$custom_scripts = carbon_get_the_post_meta('custom_scripts');
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
<div class="buy-order-bike-page">
    <div class="container table-div">
        <table>
            <?php foreach ($panel as $panel_key => $the_panel) { ?>
                <?php
                $f_panel_key = $panel_key + 1;
                $id = strtolower(str_replace(" ", "", $the_panel['panel_title']));
                $class = '';
                $class_a = '';
                $select_one = '';
                $change_image = '';
                if ($f_panel_key != 1) {
                    $class = 'collapse';
                    $class_a = 'collapsed';
                } else {
                    $class = 'collapse in';
                }

                $area_expanded = $f_panel_key == 1 ? ' true' : 'false';

                $select_one = $the_panel['select_one'] ? ' select-one' : '';


                $required = $the_panel['required'] ? ' required' : '';
                $colspan = max($the_panel['accesories']);
                ?>
                <tr>
                    <td>
                        <h4><?= $the_panel['panel_title'] ?></h4>
                    </td>
                    <?php foreach ($the_panel['accesories'] as $acc_key => $accesories) { ?>
                        <td>
                            <?php
                            $f_acc_key = $acc_key + 1;
                            $acc_id =  'box-' . $f_panel_key . '-' . $f_acc_key;
                            $change_image = ($the_panel['change_image'] || $accesories['change_image']) ? ' change-image' : '';

                            $pre_selected = $accesories['pre_selected'] ? ' pre-selected' : '';


                            $accessory_price = 0;
                            $accessory_price = 'POA';
                            $accessory_part_number = 'N/A';
                            $the_image = 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png';
                            if ($accesories['accesory_type'] == 'product') {
                                $product_id = $accesories['product'];
                                $product = wc_get_product($product_id);

                                $configurator_price = carbon_get_post_meta($product_id, 'configurator_price');

                                $accessory_name = $product->get_name();

                                $accessory_part_number = $product->get_sku();
                                $the_image = wp_get_attachment_image_src($product->get_image_id(), 'medium')[0];

                                if ($configurator_price) {
                                    $accessory_price = number_format((float)$configurator_price, 2, '.', '');
                                } else {
                                    $accessory_price = number_format((float)$product->get_price(), 2, '.', '');
                                }
                            } else {
                                $accessory_name = $accesories['accessory_name'];

                                $accessory_price = number_format((float)$accesories['accessory_price'], 2, '.', '');

                                $accessory_part_number = $accesories['accessory_part_number'];
                            }
                            ?>
                            <?= $accessory_name ?> <?= $accesories['accesory_type'] == 'product' ? '(' . $accesories['accesory_type'] . ')' : '' ?> <br><br>
                            Part No. <?= $accessory_part_number ?> <br>
                            £ <?= $accessory_price ?>
                        </td>
                    <?php } ?>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="caption">
                    <h1 class="bike-name"><?php _e($bike_name) ?></h1>
                    <a href="#scroll-down" class="scroll-down" address="true">
                        <span>CONFIGURE</span>
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </a>
                </div>
                <?php if (get_the_post_thumbnail_url()) { ?>
                    <img id="main-image" src="<?php the_post_thumbnail_url(); ?>" class="first_image" source="<?php the_post_thumbnail_url(); ?>" class="first_image">
                <?php } ?>
                <?php if ($text_below_image) { ?>
                    <div class="text-below-image">
                        <p>
                            <?php _e($text_below_image) ?>
                        </p>
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
                        <?php foreach ($panel as $panel_key => $the_panel) { ?>
                            <?php
                            $f_panel_key = $panel_key + 1;
                            $id = strtolower(str_replace(" ", "", $the_panel['panel_title']));
                            $class = '';
                            $class_a = '';
                            $select_one = '';
                            $change_image = '';
                            if ($f_panel_key != 1) {
                                $class = 'collapse';
                                $class_a = 'collapsed';
                            } else {
                                $class = 'collapse in';
                            }

                            $area_expanded = $f_panel_key == 1 ? ' true' : 'false';

                            $select_one = $the_panel['select_one'] ? ' select-one' : '';


                            $required = $the_panel['required'] ? ' required' : '';

                            ?>
                            <div class="panel <?= $id ?>">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" class="<?= $class_a ?>" data-parent="#accordion" href="#<?= $id ?>" aria-expanded="<?= $area_expanded ?>">
                                            <div class="container">
                                                <span> <?= $the_panel['panel_title'] ?> </span>
                                            </div>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?php _e($id) ?>" class="panel-collapse <?= $class ?>" aria-expanded="<?= $area_expanded ?>">
                                    <div class="container">
                                        <div class="panel-body px-0 py-5 ">
                                            <div class="boxes">
                                                <div class="row">
                                                    <?php foreach ($the_panel['accesories'] as $acc_key => $accesories) { ?>
                                                        <?php
                                                        $f_acc_key = $acc_key + 1;
                                                        $acc_id =  'box-' . $f_panel_key . '-' . $f_acc_key;
                                                        $change_image = ($the_panel['change_image'] || $accesories['change_image']) ? ' change-image' : '';

                                                        $pre_selected = $accesories['pre_selected'] ? ' pre-selected' : '';


                                                        $accessory_price = 0;
                                                        $accessory_price = 'POA';
                                                        $accessory_part_number = 'N/A';
                                                        $the_image = 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png';
                                                        if ($accesories['accesory_type'] == 'product') {
                                                            $product_id = $accesories['product'];
                                                            $product = wc_get_product($product_id);

                                                            $configurator_price = carbon_get_post_meta($product_id, 'configurator_price');

                                                            $accessory_name = $product->get_name();

                                                            $accessory_part_number = $product->get_sku();
                                                            $the_image = wp_get_attachment_image_src($product->get_image_id(), 'medium')[0];

                                                            if ($configurator_price) {
                                                                $accessory_price = number_format((float)$configurator_price, 2, '.', '');
                                                            } else {
                                                                $accessory_price = number_format((float)$product->get_price(), 2, '.', '');
                                                            }


                                                            if ($the_panel['change_image'] || $accesories['change_image']) {
                                                                if ($accesories['image_change']) {
                                                                    $big_image = wp_get_attachment_image_src($accesories['image_change'], 'full')[0];
                                                                } else {
                                                                    $big_image = wp_get_attachment_image_src($product->get_image_id(), 'large')[0];
                                                                }
                                                            }
                                                        } else {
                                                            $accessory_name = $accesories['accessory_name'];

                                                            $accessory_price = number_format((float)$accesories['accessory_price'], 2, '.', '');

                                                            $accessory_part_number = $accesories['accessory_part_number'];
                                                            $the_image = wp_get_attachment_image_src($accesories['image'], 'medium')[0] ? wp_get_attachment_image_src($accesories['image'], 'medium')[0] : 'https://www.ccm-motorcycles.com/wp-content/uploads/2020/02/no-image-ccm.png';

                                                            if ($the_panel['change_image'] || $accesories['change_image']) {
                                                                if ($accesories['image_change']) {
                                                                    $big_image = wp_get_attachment_image_src($accesories['image_change'], 'full')[0];
                                                                } else {
                                                                    $big_image = wp_get_attachment_image_src($accesories['image'], 'large')[0];
                                                                }
                                                            }
                                                        }


                                                        ?>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mb-30 <?php _e($acc_id) ?>">
                                                            <input class="tot_amount<?= $pre_selected . $required ?>" type="checkbox" id="<?php _e($acc_id) ?>" value="<?= $accessory_price ?>" main_id="<?= 'box-' . $f_panel_key ?>">
                                                            <label for="<?php _e($acc_id) ?>" class="acc_box<?= $select_one . $change_image ?> mhc" main_id="<?= 'box-' . $f_panel_key ?>">
                                                                <div class="image-holder">
                                                                    <div class="inner">
                                                                        <?php if ($the_panel['change_image'] || $accesories['change_image']) { ?>
                                                                            <img src="<?= $the_image ?>" big-image="<?= $big_image ?>">
                                                                        <?php } else { ?>
                                                                            <img src="<?= $the_image ?>">
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <h4>
                                                                    <?= $accessory_name ?>
                                                                </h4>
                                                                <?= wpautop($accesories['accessory_description']) ?>
                                                                <span class="d-block">
                                                                    Part No. <?= $accessory_part_number ?>
                                                                </span>
                                                                <span class="price">
                                                                    &#163;
                                                                    <?= $accessory_price ?>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
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
    <div class="reserve_bike mt-50" id="reserve_bike">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-7 ">
                    <h2>CONFIGURE THIS BIKE</h2>
                    <p>Simply submit this form to save your desired bike configuration. You can configure as many variations as you like to create your dream machine.</p>
                    <div class="border-line"></div>
                    <div class="form-reserve">
                        <?php echo do_shortcode('[contact-form-7 id="6057" title="Configurator Form V2"]'); ?>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
    </div>
    <div class="footer-order">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 hidden-xs">
                    <img id="footer-image" src="<?php _e($small_image) ?>" source="<?php _e($small_image) ?>">
                </div>
                <div class="col-md-7 col-sm-7 title-pro">
                    <h2><?php _e($bike_name) ?></h2>
                    <p class="total">TOTAL: &#163;<input type="text" id="total1" readonly></p>
                </div>
                <div class="col-md-3 col-sm-3 ">
                    <a href="#scroll-down" class="red-btn pull-right scroll-down start-config">START CONFIGURING</a>
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
        mh();
        pre_selected();
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
            var $this = jQuery(this).next().find('.mhc');
            setTimeout(function() {
                $this.matchHeight();
            }, 300);
        });


        setTimeout(function() {
            jQuery('.mhc').matchHeight();
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
        jQuery('.pre-selected').prop("checked", true).addClass('clicked');
        update_summary();
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
        setTimeout(function() {
            jQuery('#summery-items2').html('');
            <?php foreach ($panel as $panel_key => $the_panel) { ?>
                <?php
                $f_panel_key = 'summary_items_' . $panel_key;
                $class = '.' . strtolower(str_replace(" ", "", $the_panel['panel_title']));
                ?>
                var $selector = jQuery('<?php _e($class) ?>').find('.tot_amount:checked');
                $selector_length = $selector.length;
                if ($selector_length > 0) {
                    $summary = '<table class="table cs-list" style="width: 500px;"><thead><tr><th colspan="3" style="background-color: #000; color: #fff; padding: 5px;"><span class="summary-section-heading"><?php _e($the_panel['panel_title']) ?></span></th></tr></thead><tbody>';
                    $selector.each(function(index, el) {
                        var $productimg = jQuery(this).siblings("label").find("img").attr('data-src');
                        var $productname = jQuery(this).siblings("label").find("h4").text();
                        var $productnum = jQuery(this).siblings("label").find(".d-block").text();
                        var $productprice = jQuery(this).siblings("label").find(".price").text();

                        $summary += '<tr><td style="width: 66px;"><div class="img-pro"><img src="' + $productimg + '" style="width: 66px; height: auto"></div></td><td class="text-left"><h4 class="summary-product-name" style="margin: 0; color: #000;">' + $productname + '</h4><p style="margin: 0; color: #000;"><span style="margin: 0; color: #000;">' + $productnum + '</span></p></td><td class="text-right" style="text-align: right"><span class="count" style="color: #ed181f;">' + $productprice + '</span></td></tr>';
                    });
                    $summary += '</tbody></table>';
                    $summary_items.append($summary);
                    jQuery('textarea[name="product_list"]').val($entire_summary.html());
                }
            <?php } ?>
        }, 300);

    }
</script>


<?php

if ($custom_scripts) {
    echo $custom_scripts;
}
?>
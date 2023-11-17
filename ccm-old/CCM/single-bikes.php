<?php

get_header(); ?>

<?php
$display_sticky_button = carbon_get_the_post_meta('display_sticky_button');
$button_text = carbon_get_the_post_meta('stickty_button_text');
$button_link = carbon_get_the_post_meta('sticky_button_link');
?>

<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>

        <div class="page-wrap single-bike-new">
            <section class="new-banner" <?php echo empty(carbon_get_the_post_meta('single_bike_video')) ? 'style="background-image: url(' . carbon_get_the_post_meta('single_bike_image') . ')"' : ''; ?>>
                <?php if (!empty(carbon_get_the_post_meta('single_bike_video'))) { ?>
                    <video id="vid" autoplay preload="metadata" muted loop playsinline>
                        <source src="<?php echo carbon_get_the_post_meta('single_bike_video'); ?>" type="video/mp4">
                    </video>
                    <!--  <?php //if ( wp_is_mobile() ) { 
                            ?>
                          <div class="button-holder">
                           <a href="javascript:void(0);" id="videoplay" class="btn btn-outline-red videoplay"><i class="fa fa-play" aria-hidden="true"></i></a>
                       </div> -->
                <?php //}
                } ?>
            </section>

            <section class="new-meta">
                <div class="container">
                    <div class="row">
                        <h2><?php the_title(); ?></h2>
                        <?php
                        $spec = carbon_get_the_post_meta('specs_group');
                        $replace_bronchure = carbon_get_the_post_meta('replace_bronchure');
                        foreach ($spec as $specs) {
                            $price = $specs['specs-details'];
                        }
                        ?>
                        <p>BASE PRICE: <?php echo carbon_get_the_post_meta('bike_price') ?></p>


                        <div class="button-holder">
                            <?php if (!$replace_bronchure) { ?>
                                <?php
                                $brochure =  carbon_get_the_post_meta('bike_brochure');
                                ?>
                                <?php if (!$brochure) { ?>
                                    <a href="<?php echo  $brochure; ?>" target="_blank" class="button-red btn-outline-black">Brochure</a>
                                <?php } ?>

                            <?php } else { ?>
                                <a data-target="#contact-slider" class="button-red btn-outline-black anchor-modal">Enquire Online</a>
                            <?php } ?>

                            <a href="<?php the_field('page_link'); ?>" class="button-red">Configure <i class="fas fa-wrench"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <?php if (carbon_get_the_post_meta('bike_spins')) : ?>
                <section class="spins">
                    <iframe src="<?php echo carbon_get_the_post_meta('bike_spins'); ?>" frameborder="0"></iframe>
                </section>
            <?php else : ?>
                <section class="spins" style="background-image: url('<?php echo carbon_get_the_post_meta('bike_spins_alt') ?>')"></section>
            <?php endif; ?>
            <?php if (carbon_get_the_post_meta('bike_colors_items') && !carbon_get_the_post_meta('hide_bike_colors')) : ?>
                <section class="bike-colors">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content">
                                    <?php $items = carbon_get_the_post_meta('bike_colors_items'); ?>
                                    <?php foreach ($items as $key => $item) : ?>
                                        <div id="bike-<?php echo sanitize_title($item['color']) ?>" class="tab-pane fade<?php echo !$key ? ' in active' : '' ?>">
                                            <img src="<?php echo $item['image'] ?>" alt="">
                                            <div class="price-holder">
                                                <h3><?php echo $item['color'] ?></h3>
                                                <p><?php echo $item['price'] ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <ul class="nav nav-tabs nav-justified" id="services-tabs">
                                    <?php $items = carbon_get_the_post_meta('bike_colors_items'); ?>
                                    <?php foreach ($items as $key => $item) : ?>
                                        <li class="<?php echo !$key ? 'active' : '' ?>">
                                            <a data-toggle="tab" href="#bike-<?php echo sanitize_title($item['color']) ?>">
                                                <img src="<?php echo $item['color_image'] ?>" alt="">
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <section class="new-features">
                <div class="container">
                    <h2>Features</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="left-content">
                                <?php echo carbon_get_the_post_meta('features_text') ?>
                            </div>
                        </div>
                        <div class="col-md-6 right-content" style="background-image: url(' <?php echo carbon_get_the_post_meta('features_image') ?>')"></div>
                    </div>
                </div>
            </section>
            <?php $bs_group = carbon_get_the_post_meta('bs_group');  ?>
            <section class="gallery" id="bike-gallery">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-center">
                            <h2>Servicing &amp; Warranty</h2>
                            <?php echo wpautop(carbon_get_the_post_meta('warranty_text')) ?>
                        </div>
                    </div>
                </div>
                <div class="images">
                    <?php
                    foreach ($bs_group as $bs) {
                        $id = pn_get_attachment_id_from_url($bs["bs_img"]);
                        // $attachment_title = get_post_meta( $id, '_wp_attachment_image_alt', true);
                        $attachment_title = get_the_title($id);
                    ?>
                        <a href="<?php echo $bs["bs_img"] ?>">
                            <img src="<?php echo $bs["bs_img"] ?>" alt="">
                            <div class="caption"><?php echo $attachment_title; ?></div>
                        </a>
                    <?php }
                    ?>
                </div>

            </section>
            <section class="new-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-center">
                            <h2><?php echo carbon_get_the_post_meta('bs_desc') ?></h2>
                            <p class="title"><?php the_title() ?></p>
                            <div class="the-content">
                                <?php echo apply_filters('the_content', carbon_get_the_post_meta('ibike_desc')); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="new-specifications">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>Technical Specification</h2>
                            <ul class="nav nav-tabs" role="tablist">
                                <?php
                                $spec = carbon_get_the_post_meta('specs_group');
                                $i = 0;
                                foreach ($spec as $specs) {
                                    $i++; ?>
                                    <li role="presentation" class="<?php echo ($i == 1) ? 'active' : ''; ?>">
                                        <a href="#<?php echo 'tab-content' . $i; ?>" role="tab" data-toggle="tab"><?php echo $specs['specs-cat']; ?></a>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                            <ul class="tab-content">
                                <?php
                                $spec = carbon_get_the_post_meta('specs_group');
                                $i = 0;
                                foreach ($spec as $specs) {
                                    $i++; ?>
                                    <li role="tabpanel" class="tab-pane<?php echo ($i == 1) ? ' active' : ''; ?>" id="<?php echo 'tab-content' . $i; ?>">
                                        <?php echo apply_filters('the_content', $specs['specs-details']); ?>
                                    </li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

                        
            <?php
            $heading = carbon_get_the_post_meta('heading');
            $description = carbon_get_the_post_meta('description');
            $contact_form_shortcode = carbon_get_the_post_meta('contact_form_shortcode');
            $diplay_bike_models = carbon_get_the_post_meta('diplay_bike_models');
            $is_iframe = carbon_get_the_post_meta('is_iframe');
            $display_at_bottom = carbon_get_the_post_meta('display_at_bottom');
            if ($is_iframe) {
                $form_link = carbon_get_the_post_meta('contact_form_shortcode');
                $utm_medium = isset($_GET['utm_medium']) ? '&custentity_ccm_campaign_medium=' . $_GET['utm_medium'] : '';
                $utm_campaign = isset($_GET['utm_campaign']) ? '&custentity_ccm_campaign_name=' . $_GET['utm_campaign'] : '';
                $utm_content = isset($_GET['utm_content']) ? '&custentity_ccm_utm_content=' . $_GET['utm_content'] : '';
                $utm_source = isset($_GET['utm_source']) ? '&custentity_ccm_web_campaign_src=' . $_GET['utm_source'] : '';
                $product_name = isset($_GET['product_name']) ? '&custentity_ccm_product_name=' . $_GET['product_name'] : '';
                $form_final_link = $form_link . $utm_medium . $utm_campaign . $utm_content . $utm_source . $product_name;
            }
            ?>
            <?php if ($display_at_bottom) { ?>
                <section class="enquire-now-modal is-iframe not-slider" id="" data-id="section-12087-cta_two_buttons_7" page="Classic Tracker">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 contact-form">
                                <div class="shortcode valign">
                                    <div class="middle">
                                        <div class="heading black medium semibold">
                                            <h2><?= $heading ?></h2>
                                            <?= wpautop($description) ?>
                                        </div>
                                        <?php if ($is_iframe) { ?>
                                            <iframe id="netsuite-form" src="<?= $form_final_link ?>" width="100%" style=" width: 100%; height: 100%; border: none; "></iframe>
                                        <?php } else { ?>
                                            <?= do_shortcode($contact_form_shortcode); ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <section class="new-meta" style=" border-top: 1px solid #efefef; ">
                <div class="container">
                    <div class="row">
                        <h2><?php the_title(); ?></h2>
                        <?php
                        $spec = carbon_get_the_post_meta('specs_group');
                        foreach ($spec as $specs) {
                            $price = $specs['specs-details'];
                        }
                        ?>
                        <p>BASE PRICE: <?php echo carbon_get_the_post_meta('bike_price') ?></p>

                        <div class="button-holder">
                            <?php if (!$replace_bronchure) { ?>
                                <?php
                                $brochure =  carbon_get_the_post_meta('bike_brochure');
                                ?>
                                <?php if (!$brochure) { ?>
                                    <a href="<?php echo  $brochure; ?>" target="_blank" class="button-red btn-outline-black">Brochure</a>
                                <?php } ?>

                            <?php } else { ?>
                                <a data-target="#contact-slider" class="button-red btn-outline-black anchor-modal">Enquire Online</a>
                            <?php } ?>

                            <a href="<?php the_field('page_link'); ?>" class="button-red">Configure <i class="fas fa-wrench"></i></a>
                        </div>
                    </div>
                </div>
            </section>


            <?php if ($contact_form_shortcode) { ?>
                <section class="enquire-now-modal <?= $is_iframe ? 'is-iframe' : '' ?> page-components" id="contact-slider" data-id="contact-slider" page="<?php the_title() ?>">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 exit-col">
                                <div class="valign">
                                    <div class="exit middle text-center">
                                        <a class="exit-modal" data-target="#contact-slider"><i class="fas fa-times"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 contact-form">
                                <div class="shortcode valign">
                                    <div class="middle">
                                        <div class="heading black medium semibold">
                                            <h2><?= $heading ?></h2>
                                            <?= wpautop($description) ?>
                                        </div>
                                        <?php if ($diplay_bike_models) { ?>
                                            <?= do_shortcode('[bike_models]'); ?>
                                        <?php } ?>
                                        <?php if ($is_iframe) { ?>
                                            <iframe id="netsuite-form" src="<?= $form_final_link ?>" width="100%" style=" width: 100%; height: 100%; border: none; "></iframe>
                                        <?php } else { ?>
                                            <?= do_shortcode($contact_form_shortcode); ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>

            <?php if ($display_sticky_button) { ?>
                <div class="sticky-mobile-buttons">
                    <div class="button-group d-flex">
                        <?= get_button($button_text, $button_link, true, 'anchor-modal pc-btn', false, false) ?>
                        <?php
                        if (get_post_type() == 'bikes') {
                            echo do_shortcode('[phone_number class="white white-bg" text="SPEAK TO US" dynamic=1]');
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>

    <?php endwhile; // OK, let's stop the post loop once we've displayed it 
    ?>
<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) 
?>

<?php get_footer(); ?>



<script>
    jQuery(document).ready(function($) {
        navbar_toggle();
    });

    function navbar_toggle() {
        $body = jQuery('body');
        jQuery('.navbar-toggle').click(function(event) {
            if ($body.hasClass('navbar-active')) {
                $body.removeClass('navbar-active');
            } else {
                $body.addClass('navbar-active');
            }
        });
    }
</script>
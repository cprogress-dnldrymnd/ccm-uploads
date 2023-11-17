<?php

/**
 * 	Template Name: Contact Form
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
 */
get_header(); // This fxn gets the header.php file and renders it
?>
<?php if (have_posts()) : ?>

    <?php while (have_posts()) : the_post(); ?>
        <?php
        $form_link = carbon_get_the_post_meta('contact_form_shortcode');
        $utm_medium = isset($_GET['utm_medium']) ? '&custentity_ccm_campaign_medium=' . $_GET['utm_medium'] : '';
        $utm_campaign = isset($_GET['utm_campaign']) ? '&custentity_ccm_campaign_name=' . $_GET['utm_campaign'] : '';
        $utm_content = isset($_GET['utm_content']) ? '&custentity_ccm_utm_content=' . $_GET['utm_content'] : '';
        $utm_source = isset($_GET['utm_source']) ? '&custentity_ccm_web_campaign_src=' . $_GET['utm_source'] : '';
        $product_name = isset($_GET['product_name']) ? '&custentity_ccm_product_name=' . $_GET['product_name'] : '';
        $form_final_link = $form_link . $utm_medium . $utm_campaign . $utm_content . $utm_source . $product_name;
        ?>
        <iframe id="netsuite-form" src="<?= $form_final_link ?>" width="100%"></iframe>
    <?php endwhile; // OK, let's stop the post loop once we've displayed it 
    ?>
<?php endif; // OK, I think that takes care of both scenarios (having a post or not having a post to show) 
?>
<?php get_footer(); // This fxn gets the footer.php file and renders it 
?>
<?php 
/**
 * 	Template Name: Page Text Content
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php
    $hide_header_and_footer = carbon_get_the_post_meta('hide_header_and_footer');
?>
<style>
    footer, section.options {
        display:  none !important;
    }
    .text-content .content.content.content h2 {
        font-style:  normal !important;
        text-transform:  uppercase;
        color:  #000;
        margin-bottom:  30px;
        font-size:  45px;
    }
    .text-content .content.content.content p {
        font-size:  18px;
    }

    <?php if($hide_header_and_footer) { ?>
        header, footer {
            display: none !important;
        }
    <?php } ?>
</style>

<div class="container new-bike-col config-bikes text-content">
    <div class="row">
        <div class="content">
            <div class="text-center">
                <?php the_content() ?>
            </div>

        </div>
    </div>
</div>

<?php get_footer() ?>
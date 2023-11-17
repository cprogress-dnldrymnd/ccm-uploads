<?php 
/**
 * 	Template Name: Sub Page
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php 
    $banner = carbon_get_the_post_meta( 'sp_banner' ); 
    $banner_text = carbon_get_the_post_meta( 'sp_banner_text' ); 
?>
	<main class="subpage">
        <section class="sp-banner" style="background-image: url(<?php echo $banner; ?>)">
            <div class="container no-padding">
                <h2><?php echo $banner_text; ?></h2>
            </div>
        </section>
        <section class="content innerpadding xlarge">
            <?php 
                $title = carbon_get_the_post_meta( 'sp_con_title' ); 
                $content = carbon_get_the_post_meta('sp_content');
            ?>
            <div class="container">
                <div class="row">
                    <h2><?php echo $title; ?></h2>
                    <div class="col-sm-4 col-md-5 no-padding">
                        <div class="separator"></div>
                    </div>
                    <div class="col-sm-8 col-md-7">
                        <?php echo apply_filters( 'the_content', $content ); ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="hero">
            <?php 
                $content2 = carbon_get_the_post_meta('sp_content2');
                $bg_img = carbon_get_the_post_meta('sp_bg_img');
            ?>
            <div class="container-fluid no-padding">
                <div class="col-md-8 col-sm-7 no-padding">
                    <div class="left innerpadding xxlarge">
                        <?php echo apply_filters( 'the_content', $content2 ); ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-5 no-padding">
                    <div class="right" style="background-image: url(<?php echo $bg_img;?>);">

                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
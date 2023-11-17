<?php 
/**
 * 	Template Name: Customer Experience
 *
 *	This page template has a sidebar built into it, 
 * 	and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php 
    $banner = carbon_get_the_post_meta( 'ce_banner' ); 
    $banner_text = carbon_get_the_post_meta( 'ce_banner_text' ); 
?>
	<main class="customer-exp">
        <section class="ce-banner" style="background-image: url(<?php echo $banner; ?>)">
            <div class="container no-padding">
                <h2><?php echo $banner_text; ?></h2>
            </div>
        </section>
        <section class="content">
            <?php 
                $img1 = carbon_get_the_post_meta( 'ce_img1' ); 
                $img2 = carbon_get_the_post_meta('ce_img2');
                $title = carbon_get_the_post_meta('ce_con_title');
                $content = carbon_get_the_post_meta('ce_content');
                $sign = carbon_get_the_post_meta('ce_sign');
            ?>
            <div class="container-fluid no-padding">
                <div class="row innerpadding xlarge">
                    <div class="col-sm-6">
                        <div class="left" style="background-image:url('<?php echo $img1; ?>');"></div>
                        <div class="right" style="background-image:url('<?php echo $img2; ?>');"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="content-holder">
                            <h3><?php echo $title; ?></h3>
                            <?php echo apply_filters( 'the_content', $content ); ?>
                            <img class="sign" src="<?php echo $sign; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="q-and-a innerpadding large">
            <?php 
                $qasub = carbon_get_the_post_meta('ce_qa_subtitle');
                $qat = carbon_get_the_post_meta('ce_qa_title');
                $content2 = carbon_get_the_post_meta('ce_qa_content');
            ?>
            <div class="title-holder">
                <div class="img-holder">
                    <span class="text"><?php echo $qasub; ?></span>
                </div>
                <h3><?php echo $qat; ?></h3>
            </div>
            <div class="content2">
              <div class="container">
                   <?php if ( have_posts() ) :  while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                            <?php endwhile; endif; ?>
              </div>
            </div>
        </section>
        <section class="image-slider">
            <?php $qa_group = carbon_get_the_post_meta( 'qa_group' );  ?>
            <div class="container-fluid no-padding">
                <div id="c-img-slider" class="owl-carousel">
                    <?php
                    foreach ( $qa_group as $qa ) { ?>
                    <a href="<?php echo $qa["qa_slider"]?>" class="foobox" rel="cust-exp">
                        <div class="item" style="background-image: url('<?php echo $qa["qa_slider"]?>');"></div>
                    </a>
                    <?php }
                    ?>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
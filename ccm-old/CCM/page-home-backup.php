<?php 
/**
 *  Template Name:Home Page Backup
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<main class="home">                          
    <section id="banner-slider" class="owl-carousel owl-theme hidden">
        <?php
        $bn_slider = carbon_get_the_post_meta( 'bn_slider' );
        foreach ( $bn_slider as $bn_slide ) { ?>
        <div class="item" style="background-image: url('<?php echo $bn_slide['bn_img']; ?>')">
            <div class="container">
                <div class="banner-caption">
                    <?php echo apply_filters( 'the_content', $bn_slide['bn_txt'] ); ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </section>
    <!-- hello-->
    <section class="new-banner" <?php echo !empty(carbon_get_the_post_meta('sp_banner')) ? 'style="background-image: url('.carbon_get_the_post_meta('sp_banner').')"' : ''; ?>>

            <?php /* <video id="vid" <?php echo !wp_is_mobile() ? 'autoplay' : ''; ?> muted loop>
                <source src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/04/CCM-5-BikesSpin.mp4" type="video/mp4">
            </video>
            <?php if ( wp_is_mobile() ) { ?>
        		<div class="button-holder">
        			<a href="javascript:void(0);" id="videoplay" class="btn btn-outline-red videoplay"><i class="fa fa-play" aria-hidden="true"></i></a>
        		</div>
            <?php } */	?>

            <div class="banner-content">
                <h6><?php echo carbon_get_the_post_meta('sp_banner_text'); ?></h6>
                <h1><?php echo carbon_get_the_post_meta('sp_banner_subtext'); ?></h1>
                <div class="btns">
                    <a class="btn white-btn" href="<?php echo carbon_get_the_post_meta('sp_banner_btn1_url'); ?>"><?php echo carbon_get_the_post_meta('sp_banner_btn1_title'); ?></a>
                    <a class="btn red-btn" href="<?php echo carbon_get_the_post_meta('sp_banner_btn2_url'); ?>"><?php echo carbon_get_the_post_meta('sp_banner_btn2_title'); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>
				<!--<div class="phones-down no-mob" style="margin: 20px auto 0 auto; padding: 25px; background-color: rgba(0,0,0,0.8); border-radius: 5px; max-width: 600px;">
					<i style="font-size: 40px; margin-bottom: 20px;" class="fas fa-exclamation-circle blinking"></i>
					<p style="font-weight: bold;">Our phone lines are currently down. The engineers are investigating and we hope to resume normal service soon.</p>
<p style="font-weight: bold;">Please email us at <a href="mailto:spitfire@ccm-motorcycles.net">spitfire@ccm-motorcycles.net</a> in the meantime.</p>
					<p style="font-weight: bold;">Thank you for your patience.</p></div>-->
                </div>
            </div>
    </section>
    <section class="new-meta" style="display: none">
		
		
		
            <div class="container">
                <div class="row flex-banner">
                    <div>
                   <h1 class="newbanner" style="border:none!important; margin: 0 0 5px 0!important; font-si">GREAT BRITISH BIKES</h1>
                   <style>
                        .new-banner video {
                            transform: translateY(-50%) translateX(-20%);
                        }
                        .newbanner {
                            font-size: 32px;
                        }
                        .flex-banner p {
                            font-family: 'Fira Sans Condensed';
                        }

                        @media only screen and (min-width: 991px) {
                            .newbanner {
                                font-size: 48px;
                            }
                            .flex-banner {
                                display: flex;
                            }

                        }
                        @media only screen and (min-width: 1200px) {
                            .new-banner video {
                            transform: translateY(-50%) translateX(0%);
                        }
                        }
                    </style>
                    <p>SINCE 1971</p>
                    </div>

                    <div class="button-holder">
                        <!--<a href="#news" class="arrow-container scroll">-->
                        <!--    <div class="arrow"></div>-->
                        <!--    <div class="arrow"></div>-->
                        <!--    <div class="arrow"></div>  -->
                        <!--</a>-->
                        
                        <a href="<?php the_field('page_link'); ?>" class="btn btn-outline-red">Enquire</a>
                    </div>
                </div>
            </div>
    </section>
    <section class="news innerpadding" id="news">
		<!--<div class="phones-down no-desk" style="margin: -40px auto 20px auto; padding: 25px; background-color: rgba(0,0,0,1.0); max-width: 800px;">
					<p style="text-align: center;"><i style="font-size: 40px; margin-bottom: 10px; color: #fff;" class="fas fa-exclamation-circle blinking"></i>
						
			</p>
					<p style="font-weight: bold; color: #fff; text-align: center;">Our phone lines are currently down. The engineers are investigating and we hope to resume normal service soon.</p>
<p style="font-weight: bold; color: #fff; text-align: center;">Please email us at <a href="mailto:spitfire@ccm-motorcycles.net">spitfire@ccm-motorcycles.net</a> in the meantime.</p>
					<p style="font-weight: bold; color: #fff; text-align: center;">Thank you for your patience.</p></div>-->
        <div class="container-fluid no-padding">
            <div class="left">
                <h2><?php echo carbon_get_the_post_meta( 'news_heading' ); ?></h2>
                <div class="separator"></div>
                <div class="owl-theme">
                    <div class="owl-controls">
                        <div id="customDots" class="owl-nav"></div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div id="news-slider" class="owl-carousel owl-theme">
                    <?php 
                       // the query
                       $the_query = new WP_Query( array(
                          'post_type' => 'post',
                          'posts_per_page' => 3,
                       )); 
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                        <div class="item">
                            <p class="date"><?php echo get_the_date('Y-d-m'); ?></p>
                            <p class="title"><a href="<?php the_permalink(); ?>" class="blog-link"><?php the_title();?></a></p>
                            <p class="excerpt"><?php the_excerpt();?></p>      
                        </div>

                      <?php endwhile; ?>
                      <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="spitfire innerpadding xlarge">
        <?php 
        $sf_sm_title = carbon_get_the_post_meta( 'sf_sm_title' ); 
        $sf_title = carbon_get_the_post_meta( 'sf_title' ); 
        $sf_img = carbon_get_the_post_meta( 'sf_img' ); 
        $sf_text1 = carbon_get_the_post_meta( 'sf_text1' ); 
        $sf_text2 = carbon_get_the_post_meta( 'sf_text2' ); 
        $sf_text3 = carbon_get_the_post_meta( 'sf_text3' ); 
        $sf_text4 = carbon_get_the_post_meta( 'sf_text4' ); 
        $sf_text5 = carbon_get_the_post_meta( 'sf_text5' ); 
        $sf_text6 = carbon_get_the_post_meta( 'sf_text6' ); 
        $sf_btn1_text = carbon_get_the_post_meta( 'sf_btn1_text' ); 
        $sf_btn1_link = carbon_get_the_post_meta( 'sf_btn1_link' );
        $sf_btn2_img = carbon_get_the_post_meta( 'sf_btn2_img' ); 
        $sf_btn2_link = carbon_get_the_post_meta( 'sf_btn2_link' );
        $sf_btn3_img = carbon_get_the_post_meta( 'sf_btn3_img' ); 
        $sf_btn3_link = carbon_get_the_post_meta( 'sf_btn3_link' );
        ?>
        <div class="container">
            <div class="row">
                <div class="title-holder">
                    <div class="img-holder">
                        <img class="img-responsive" src="<?php echo $sf_sm_title; ?>"/>
                    </div>
                    <h3><?php echo $sf_title; ?></h3>
                </div>
                <div class="floating-text content">
                    <span class="top-left"><?php echo $sf_text1; ?></span>
                    <span class="mid-left"><?php echo $sf_text2; ?></span>
                    <span class="bot-left"><?php echo $sf_text3; ?></span>
                    <img class="img-responsive" alt="<?php echo $sf_title; ?>" src="<?php echo $sf_img; ?>" />
                    <span class="top-right"><?php echo $sf_text4; ?></span>
                    <span class="mid-right"><?php echo $sf_text5; ?></span>
                    <span class="bot-right"><?php echo $sf_text6; ?></span>
                    <div class="buttons">
                        <a href="<?php echo $sf_btn1_link; ?>" class="btn red-btn btn-outline-red"><?php echo $sf_btn1_text; ?></a>
                        <a href="<?php echo $sf_btn2_link; ?>" class="btn gray-btn"><img class="img-responsive" src="<?php echo $sf_btn2_img; ?>" /></a>
                        <a href="<?php echo $sf_btn3_link; ?>" class="btn gray-btn"><img class="img-responsive" src="<?php echo $sf_btn3_img; ?>" /></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bikes innerpadding">
        <?php 
        $bikes_heading = carbon_get_the_post_meta( 'bikes_heading' ); 
        $feat_bike1_brand = carbon_get_the_post_meta( 'feat_bike1_brand' ); 
        $feat_bike1 = carbon_get_the_post_meta( 'feat_bike1' ); 
        $feat_bike1_link = carbon_get_the_post_meta( 'feat_bike1_link' ); 
        $feat_bike2_brand = carbon_get_the_post_meta( 'feat_bike2_brand' ); 
        $feat_bike2 = carbon_get_the_post_meta( 'feat_bike2' ); 
        $feat_bike2_link = carbon_get_the_post_meta( 'feat_bike2_link' ); 
        $feat_bike3_brand = carbon_get_the_post_meta( 'feat_bike3_brand' ); 
        $feat_bike3 = carbon_get_the_post_meta( 'feat_bike3' ); 
        $feat_bike3_link = carbon_get_the_post_meta( 'feat_bike3_link' ); 
        $feat_bike4_brand = carbon_get_the_post_meta( 'feat_bike4_brand' ); 
        $feat_bike4 = carbon_get_the_post_meta( 'feat_bike4' ); 
        $feat_bike4_link = carbon_get_the_post_meta( 'feat_bike4_link' );
        $bike_btn = carbon_get_the_post_meta( 'bike_btn' ); 
        $bike_link = carbon_get_the_post_meta( 'bike_link' ); 
        ?>
        <div class="title hidden">
            <h2><?php echo $bikes_heading; ?></h2>
        </div>
         <div class="title divide-stealth">
            <h2><img alt="Stealth Series" src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/stealth-logo.png"></h2>
        </div>
        <div class="container hidden">
            <div class="row">
                <div class="content">
                    <div class="col-sm-3">
                        <div class="bike-brand">
                            <img class="img-responsive brand" src="<?php echo $feat_bike1_brand; ?>" />
                        </div>
                        <div class="bike">
                            <img class="img-responsive" src="<?php echo $feat_bike1; ?>" />
                            <a href="<?php echo $feat_bike1_link; ?>"><p>Discover</p></a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bike-brand">
                            <img class="img-responsive brand" src="<?php echo $feat_bike4_brand; ?>" />
                        </div>
                        <div class="bike">
                            <img class="img-responsive" src="<?php echo $feat_bike4; ?>" />
                            <a href="<?php echo $feat_bike4_link; ?>"><p>Discover</p></a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bike-brand">
                            <img class="img-responsive brand" src="<?php echo $feat_bike2_brand; ?>" />
                        </div>
                        <div class="bike">
                            <img class="img-responsive" src="<?php echo $feat_bike2; ?>" />
                            <a href="<?php echo $feat_bike2_link; ?>"><p>Discover</p></a>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="bike-brand">
                            <img class="img-responsive brand" src="<?php echo $feat_bike3_brand; ?>" />
                        </div>
                        <div class="bike">
                            <img class="img-responsive" src="<?php echo $feat_bike3; ?>" />
                            <a href="<?php echo $feat_bike3_link; ?>"><p>Discover</p></a>
                        </div>
                    </div>
                </div>
                <?php /*<a href="echo $bike_link; " class="btn red-btn">echo $bike_btn; </a>*/ ?>
            </div>
        </div>
         <div class="container new-bike-col">
            <div class="row">
                <div class="content">
                    <div class="col-sm-6">
                        <div class="bike-brand">
                            <img class="img-responsive brand" src="<?php echo $feat_bike1_brand; ?>" />
                        </div>
                        <div class="bike">
                             <h3>STEALTH FOGGY</h3>
                            <div class="bike-img">
                                <img class="img-responsive" alt="Stealth Foggy" src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/stealth-foggy-trimmed-1.jpg" />
                            </div>
                            <a class="btn-outline-red" href="https://www.ccm-motorcycles.com/bikes/stealth-foggy/">Discover</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="bike-brand">
                            <img class="img-responsive brand" src="<?php echo $feat_bike4_brand; ?>" />
                        </div>
                        <div class="bike">
                            <h3>STEALTH SIX</h3>
                            <div class="bike-img">
                               <img class="img-responsive" alt="Stealth Six" src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/six-trimmed.jpg" />
                              </div>
                            <a class="btn-outline-red" href="https://www.ccm-motorcycles.com/bikes/stealth-six/">Discover</a>
                        </div>
                    </div>
                   
                </div>
                <?php /*<a href="echo $bike_link; " class="btn red-btn">echo $bike_btn; </a>*/ ?>
            </div>
        </div>
    </section>
    <section class="accessories">
        <?php 
        $ac_sm_title = carbon_get_the_post_meta( 'ac_sm_title' ); 
        $ac_title = carbon_get_the_post_meta( 'ac_title' ); 
        $ac_btn = carbon_get_the_post_meta( 'ac_btn' ); 
        $ac_btn_link = carbon_get_the_post_meta( 'ac_btn_link' ); 
        $ac_img = carbon_get_the_post_meta( 'ac_img' ); 
        ?>
        <div class="container-fluid no-padding">
            <div class="col-md-8 col-sm-7">
                <div class="left">
                    <div class="title-holder">
                        <div class="img-holder">
                            <span class="text"><?php echo $ac_sm_title; ?></span>
                        </div>
                        <h3><?php echo $ac_title; ?></h3>
                    </div>
                    <a href="<?php echo $ac_btn_link; ?>" class="btn ghost-btn"><?php echo $ac_btn; ?></a>
                </div>
            </div>
            <div class="col-md-4 col-sm-5">
                <div class="right" style="background-image: url(<?php echo $ac_img; ?>);background-size: cover;height: 100%;width: 100%;"></div>
            </div>
        </div>
    </section>
    <section class="apparel">
        <?php 
        $ap_sm_title = carbon_get_the_post_meta( 'ap_sm_title' ); 
        $ap_title = carbon_get_the_post_meta( 'ap_title' ); 
        $ap_btn = carbon_get_the_post_meta( 'ap_btn' ); 
        $ap_btn_link = carbon_get_the_post_meta( 'ap_btn_link' ); 
        $ap_img = carbon_get_the_post_meta( 'ap_img' ); 
        ?>
        <div class="container-fluid no-padding">
            <div class="col-md-6 col-sm-6">
                <div class="left" style="background-image: url('<?php echo $ap_img; ?>');background-size: cover;height: 100%;width: 100%;"></div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="right">
                    <div class="title-holder">
                        <div class="img-holder">
                            <span class="text"><?php echo $ap_sm_title; ?></span>
                        </div>
                        <h3><?php echo $ap_title; ?></h3>
                    </div>
                    <a href="<?php echo $ap_btn_link; ?>" class="btn ghost-btn"><?php echo $ap_btn; ?></a>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
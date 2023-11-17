<?php 
/**
 * 	Template Name: CCM Racing
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


        <section class="timeline-racing content">
              <div class="arrow-timeline">
              </div>
              <div class="arrowprevnext-handler">
              	<i class="fa fa-angle-left" aria-hidden="true"></i>
              	<i class="fa fa-angle-right" aria-hidden="true"></i>
              </div>
              <div class="timeline js-timeline">
              
                    <?php

                    foreach(carbon_get_the_post_meta('cmracing_group') as $itemTimeline){
                        ?>
      
                        <div data-time="<?php echo $itemTimeline['ccmracing_year']; ?>">
                            <div class="col-md-6">
                                <img src="<?php echo $itemTimeline['ccmracing_slider']; ?>" class="img-responsive"/>
                                <p class="timeline-caption">
                                	<?php echo $itemTimeline['ccmracing_slidertext']; ?>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h2><?php echo $itemTimeline['ccmracing_title']; ?></h2>
                                <p><?php echo $itemTimeline['ccmracing_content']; ?></p>
                            </div>
                        </div>
     
                        <?php

                    }

                    ?>
                    
              </div>
        </section>


        <script>
            $(document).ready(function(){
                $('.js-timeline').Timeline({
                  itemClass: 'box-item',
                  dotsPosition: 'top'
                });

            });

            $('.arrowprevnext-handler .fa:first-child').click(function(){
            	$('.timeline-horizontal .timeline-dots .slide-prev button').click();
            });

            $('.arrowprevnext-handler .fa:last-child').click(function(){
            	$('.timeline-horizontal .timeline-dots .slide-next button').click();
            });

            setInterval(function(){
         

            	var y = $('.timeline-dots .slide-active button').text();
            	$('.timeline-bottom-sc .row .data-time').each(function(){

						if ($(this).attr('data-time') === y) {
						    $(this).fadeIn();
						}
						else{
							$(this).fadeOut();
						}
            		});
            }, 100);
        </script>



        <section class="timeline-bottom-sc">
            <div class="container">
                <div class="row">
                	<?php
                	foreach(carbon_get_the_post_meta('cmracing_group') as $itemTimeline){
                        ?>
      
                        <div class="data-time" data-time="<?php echo $itemTimeline['ccmracing_year']; ?>">
                            <div class="col-md-1 hidden-xs">
		                    </div>
		                    <div class="col-md-5">
		                        <p><?php 
		                            echo $itemTimeline['ccmracing_sc2_content'];
		                        ?></p>
		                    </div>
		                    <div class="col-md-6">
		                        <img src="<?php echo $itemTimeline['ccmracing_sc2_image']; ?>" class="img-responsive"/>
		                        <p><?php echo $itemTimeline['ccmracing_sc2_caption']; ?></p>
		                    </div>
                        </div>
     
                        <?php

                    }
                    ?>
                    
                </div>
            </div>
        </section>
        <!--<section class="content innerpadding xlarge">
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
        </section>-->
        <!--<section class="hero">
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
        </section>-->
    </main>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
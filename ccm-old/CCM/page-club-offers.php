<?php
/**
    *   Template Name: CLUB CCM: Offers
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$page_name = 'Offers';
$offers = get_field('offers');

$user = wp_get_current_user();
if ( !(in_array( 'ccm_owner', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles )) ) {
	wp_redirect('https://www.ccm-motorcycles.com/club-news'); exit;
}

?>
<main class="news careers page-template-page-owners club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()) { ?>
		<section class="heading">	
			<div class="container tight width1116">
				<div class="title-box">
					<h1 class="title">
						CLUB MEMBER BENEFITS
					</h1>
				</div>
				<div class="sub-content">
					<?php the_content() ?>
				</div>
			</div>
		</section>
		<section class="careers-sc-one offers-section">
			<div class="container tight width1116">
				<div class="row">
					<div class="col-md-8">
						<div class="the-offers">
							<?php 
							$offers = get_field('offers');
							$order = array();
							foreach( $offers as $i => $offer ) {
								$order[ $i ] = $offer['valid_until'];
							}
							array_multisort( $order, SORT_ASC, $offers );
							?>
							<?php if( $offers ) { ?>
								<?php foreach( $offers as $i => $offer ) { ?>
									<?php  
									$image = wp_get_attachment_url( $offer['image'] );
									$offer_title = $offer['offer_title'];
									$discount_off = $offer['discount_off'];
									$valid_until = $offer['valid_until'];
									$description = $offer['description'];
									$button_text = $offer['button_text'];
									$button_link = $offer['button_link'];

									$valid_until_f = date( 'F d, Y', strtotime( $valid_until ) );
									//$valid_until_d = date( 'd', strtotime( $valid_until ) );
									//$valid_until_y = date( 'Y', strtotime( $valid_until ) );
									$current_time  = current_time('mysql');
									?>
									<?php if($valid_until >  $current_time) { ?>
										<div class="row">
											<div class="upper clear">
												<div class="offer"><?= $discount_off ?></div>
												<div class="img cvr ctr" style="background-image: url(<?= $image ?>)">

												</div>
												<div class="right-offer-content">
													<div class="title-box">
														<h2>
															<?= $offer_title ?>
														</h2>
														<div class="valid-until">
															<i class="fas fa-clock"></i> Valid Until: <span><?= $valid_until_f ?></span>
														</div>
													</div>
													<div class="desc-box">
														<p>
															<?= $description ?>
														</p>
													</div>
													<div class="btn-box">
														<a href="<?= $button_link ?>"><?= $button_text ?></a>
													</div>
												</div>
											</div>
											<?php/*<div class="lower">
												
											</div>*/?>
										</div>
									<?php } ?>
								<?php } ?>
							<?php } else { ?>
								No offers found
							<?php } ?>
						</div>
					</div>
					<?php 
					$prev_off = 0;
					foreach( $offers as $i => $offer ) {
						$valid_until = $offer['valid_until'];
						$valid_until_f = date( 'F d, Y', strtotime( $valid_until ) );
						$current_time  = current_time('mysql');
						if($valid_until <  $current_time) {
							$prev_off++;
						}
					}
					?>

					<div class="col-md-4">
						<?php if( $prev_off != 0 ) { ?>
							<div class="previous-offers">
								<div class="title-box">
									<h2>Previous Offers</h2>
								</div>
								<div class="the-previous-offer">
									<?php foreach( $offers as $i => $offer ) { ?>
										<?php  

										$offer_title = $offer['offer_title'];
										$valid_until = $offer['valid_until'];
										$description = $offer['description'];
										$button_text = $offer['button_text'];
										$button_link = $offer['button_link'];

										$valid_until_f = date( 'F d, Y', strtotime( $valid_until ) );
											//$valid_until_d = date( 'd', strtotime( $valid_until ) );
											//$valid_until_y = date( 'Y', strtotime( $valid_until ) );
										$current_time  = current_time('mysql');
										?>
										<?php if($valid_until <  $current_time) { ?>
											<div class="row">
												<div class="title-box">
													<h3>
														<?= $offer_title ?>
													</h3>
												</div>
												<div class="expired-on">
													<i class="fas fa-clock"></i> Expired on: <span><?= $valid_until_f ?></span>
												</div>
											</div>
										<?php } ?>
									<?php } ?>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php }  ?>
</main>

<style>
main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper .img {
    height: 348px;
    width: 40%;
    float: left;
}
.right-offer-content {
    display: inline-block;
    width: 60%;
    padding: 0px;
    position: relative;
    height: 348px;
}
main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper .title-box {
    padding: 20px 30px 15px !important;
}
.right-offer-content .desc-box {
    padding: 0px 30px 0px;
}
.right-offer-content .desc-box p {
    display: block;
    width: 100%;
    padding: 0px;
    margin: 0px;
}
main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper {
    padding: 0px !important;
}
main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper .btn-box {
    padding: 0px;
    float: none;
    text-align: center;
    position: absolute;
    width: 100%;
    bottom: 0;
}
main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper .btn-box a {
    padding: 15px 40px;
    font-size: 20px;
	text-decoration:none;
}
.offer {
    width: auto;
    position: absolute;
    left: -15px;
    top: 30px;
    font-size: 16px;
    color: #fff;
    padding: 10px 15px;
    font-weight: bold;
    background: url(https://www.ccm-motorcycles.com/wp-content/uploads/discount_off.png);
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
}
main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper {
    position: relative;
	-webkit-box-shadow: 0px 2px 33px -6px rgba(135,131,132,0.54);
-moz-box-shadow: 0px 2px 33px -6px rgba(135,131,132,0.54);
box-shadow: 0px 2px 33px -6px rgba(135,131,132,0.54);
}
main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row {
    margin-bottom: 50px;
}
@media only screen and (max-width: 768px) {
	main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper .img {
		height: 300px;
		width: 100%;
	}
	.right-offer-content {
		width: 100%;
		height: 350px;
	}
	main.club-main section.offers-section .container .row [class*='col-'] .the-offers .row .upper .title-box {
		max-width: 100%;
		padding-top: 0;
		display: block !important;
		width: 100% !important;
	}
}
@media only screen and (max-width: 500px) {
	.right-offer-content {
		height: 440px;
	}
}
</style>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
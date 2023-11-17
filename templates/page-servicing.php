<?php
/**
    *   Template Name: Servicing Page - Public
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$page_name = 'Servicing';
?>

<main class="news careers page-template-page-owners faq-page club-main">
	<?php //if(is_user_logged_in()) { ?>
		<?php if(have_posts() ){ ?>
			<?php while(have_posts()) { ?>
				<?php the_post(); ?>
				<?php 
				$thankyou_text = carbon_get_the_post_meta('ccm_booking_thank_you_page_text');  
				$the_team_heading = carbon_get_the_post_meta('the_team_heading');  
				$intro_text = carbon_get_the_post_meta('intro_text');
				$the_team = carbon_get_the_post_meta('the_team');  
				$book_a_service = carbon_get_the_post_meta('book_a_service');  
				$book_a_service_heading = carbon_get_the_post_meta('book_a_service_heading');  
				$service_type_heading = carbon_get_the_post_meta('service_type_heading');  
				$insurance_heading = carbon_get_the_post_meta('insurance_heading');  
				$insurance_content = carbon_get_the_post_meta('insurance_content');  
				$services = carbon_get_the_post_meta('services');  

				$tab = $_GET['tab'];
				$book_a_service_class = '';
				$service_types_class = '';
				$meet_our_team_class = '';
				if($tab == 'book-a-service') {
					$book_a_service_class = 'active';
				} else if($tab == 'service-type') {
					$service_types_class = 'active';
				} else if($tab == 'team') {
					$meet_our_team_class = 'active';
				} else if($tab == 'insurance') {
					$insurance_class = 'active';
				}  else {
					$meet_our_team_class = 'active';
				}
				?>
			<?php } ?>
		<?php } ?>
		<section class="sp-banner" style="background-image: url(https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/IMG_3363-scaled.jpg)">
			<div class="container wide width1500">
				<div class="the-user">
					<div class="the-user-content text-center"> 
						<h1>Book a Service</h1>							
					</div>
				</div>
			</div>
		</section>
		<section class="careers-sc-one book-a-service-sec">
			<div class="container tight width1116">
				<div class="row">
					<div class="col-md-4">
						<ul class="nav nav-pills ">
							<li class="<?= $meet_our_team_class ?>">
								<a data-toggle="tab" href="#team">
									MEET OUR TEAM
								</a>
							</li>
							<li class="<?= $service_types_class ?>">
								<a data-toggle="tab" href="#service-type">
									Service Types
								</a>
							</li>
							<li class="<?= $book_a_service_class ?>">
								<a data-toggle="tab" href="#book-a-service">
									Book A Service
								</a>
							</li>
							<li class="<?= $insurance_class ?>">
								<a data-toggle="tab" href="#insurance">
									Insurance
								</a>
							</li>
						</ul>
					</div>
					<div class="col-md-8">
						<div class="tab-content">
							<div id="team" class="tab-pane fade in <?= $meet_our_team_class ?>">
								<div class="meet-the-team">
									<div class="title-box">
										<h2 class="title">
											<?= $the_team_heading ?>
										</h2>
									</div>
									<div class="intro-text">
										<?= wpautop( $intro_text ) ?>
									</div>
									<div class="the-team">
										<?php foreach($the_team as $team) { ?>
											<?php 
											$name = $team['name'];
											$description = $team['description'];
											?>
											<div class="team">
												<div class="name">
													<h3>
														<?= $name ?>
													</h3>
												</div>
												<div class="description">
													<?= wpautop( $description ) ?>
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
							<div id="service-type" class="tab-pane fade in <?= $service_types_class ?>">
										<!-- <div class="content-box">
											<?php the_content() ?>
										</div> -->
										<div class="title-box">
											<h3 class="title">
												<?= $service_type_heading ?>
											</h3>
										</div>
										<div class="the-team">
											<?php foreach($services as $service) { ?>
												<?php 
												$service_name = $service['service_name'];
												$service_desc = $service['service_desc'];
												$service_desc_bottom = $service['service_desc_bottom'];
												$service_types = $service['service_types'];
												$service_img = $service['service_img'];
												$service_not_active = $service['service_not_active'];
												if(!$service_not_active) {
													$service_ccm_factory_price = $service['service_ccm_factory_price'];
													$service_home_address_price = $service['service_home_address_price'];
													$buy_now_select_name = $service['buy_now_select_name'];
													$show_price_on_button = $service['show_price_on_button'];

													if($service_ccm_factory_price && $service_home_address_price) {
														$col_class = 'col-md-6';
													} else {
														$col_class = 'col-md-12';
													}

													?>
													<div class="team service">
														<div class="description services">
															<div class="name">
																<h4>
																	<?= $service_name ?>
																</h4>
																<div class="image-con">
																	<div class="img ctr cvr" style="background-image: url(<?= wp_get_attachment_url($service_img) ?>)">
																	</div>
																</div>
															</div>
															<div class="table-con hide-table">
																<table class="table">
																	<thead>
																		<tr>
																			<td colspan="3">
																				<?php if($service_ccm_factory_price || $service_home_address_price) { ?>
																					<div class="row">
																						<?php if($service_ccm_factory_price) { ?>
																							<div class="<?= $col_class ?>">
																								<strong>CCM Factory</strong> <?= $service_ccm_factory_price ?>
																								<div class="buy-now">
																									<span select-val="<?= $buy_now_select_name?>" location-val="CCM Factory">BUY NOW</span>
																								</div>
																							</div>
																						<?php } ?>

																						<?php if($service_home_address_price) { ?>
																							<div class="<?= $col_class ?>">
																								<strong>Home Address</strong> <?= $service_home_address_price ?>
																								<div class="buy-now">
																									<span select-val="<?= $buy_now_select_name ?>" location-val="Customer Address">BUY NOW</span>
																								</div>
																							</div>
																						<?php } ?>
																					</div>
																				<?php } ?>
																				<?= wpautop($service_desc) ?>
																			</td>
																		</tr>
																	</thead>
																	<tbody>
																		<?php foreach($service_types as $service_type) { ?>
																			<?php
																			$the_service_type = $service_type['service_type'];
																			$the_services = $service_type['services'];
																			?>
																			<tr class="the_service_type">
																				<td> <?= $the_service_type ?> </td>
																				<td> Replace </td>
																				<td> Inspect / Adjust / Lubricate </td>
																			</tr>
																			<?php foreach($the_services as $the_service) { ?>
																				<?php 
																				$theservice = $the_service['the_service'];
																				$type = $the_service['type'];
																				if($type == 'replace') {
																					$replace = '<span class="check"></span>';
																					$inspect = '';
																				} else {
																					$replace = '';
																					$inspect = '<span class="check"></span>';
																				}
																				?>
																				<tr class="the_service">
																					<td> <?= $theservice ?> </td>
																					<td  class="type"> <?= $replace ?> </td>
																					<td class="type"> <?= $inspect ?> </td>
																				</tr>
																			<?php } ?>
																		<?php } ?>
																	</tbody>
																	<?php if($service_desc_bottom || $show_price_on_button) { ?>
																		<tfoot>
																			<tr>
																				<td colspan="3">
																					<?= wpautop($service_desc_bottom) ?>
																					<?php if(($service_ccm_factory_price || $service_home_address_price) && $show_price_on_button) { ?>
																						<div class="row">
																							<?php if($service_ccm_factory_price) { ?>
																								<div class="<?= $col_class ?>">
																									<strong>CCM Factory</strong> <?= $service_ccm_factory_price ?>
																									<div class="buy-now">
																										<span select-val="<?= $buy_now_select_name ?>" location-val="CCM Factory">BUY NOW</span>
																									</div>
																								</div>
																							<?php } ?>

																							<?php if($service_home_address_price) { ?>
																								<div class="<?= $col_class ?>">
																									<strong>Home Address</strong> <?= $service_home_address_price ?>
																									<div class="buy-now">
																										<span  select-val="<?= $buy_now_select_name ?>" location-val="Customer Address">BUY NOW</span>
																									</div>
																								</div>
																							<?php } ?>
																						</div>
																					<?php } ?>
																				</td>
																			</tr>
																		</tfoot>
																	<?php } ?>
																</table>
															</div>
														</div>
													</div>
												<?php } ?>
											<?php } ?>
										</div>
									</div>
									<div id="book-a-service" class="tab-pane fade in <?= $book_a_service_class ?>">
										<div class="">
											<h2 class="title">
												<?= $book_a_service_heading ?>
											</h2>
											<div class="intro-text">
												<?= wpautop( $book_a_service ) ?>
											</div>
										</div>
										<div class="service_form">
											<?php echo do_shortcode('[contact-form-7 id="11559" title="Book a Service - Public"]'); ?>
										</div>
										<div class="booking-thankyou-page col-md-10" style="margin: 0 auto; float:none;">
											<?php echo $thankyou_text; ?>
										</div>
										<a style="display: none" href="https://www.ccm-motorcycles.com//cart/?add-to-cart=4185" class="service-link">CCM Spitfire First Service</a>
									</div>
									<div id="insurance" class="tab-pane fade in <?= $insurance_class ?>">
										<section class="heading insurance">	
											<div class="ccm-page-title with-button" style="margin-top: 0;">
												<h2 class="title">
													<?= $insurance_heading ?>
												</h2>
												<div class="ccm-button small bg-hover">
													<a href="https://mackenziehodgson.quote-secure.co.uk/mc?affn=MHCM" target="_blank"> <span class="text">GET A QUOTE</span> </a>
												</div>
											</div>
											<div class="sub-content">
												<?= wpautop($insurance_content) ?>
											</div>
											<div class="ccm-button with-arrow">
												<a href="https://mackenziehodgson.quote-secure.co.uk/mc?affn=MHCM" target="_blank">
													<span class="text">
														GET A QUOTE
													</span> 
													<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.0.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#fff" d="M438.6 278.6l-160 160C272.4 444.9 264.2 448 256 448s-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L338.8 288H32C14.33 288 .0016 273.7 .0016 256S14.33 224 32 224h306.8l-105.4-105.4c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160C451.1 245.9 451.1 266.1 438.6 278.6z"/></svg>
												</a>
											</div>
										</section>
										<section class="ccm-team">
											<div class="team-wrapper">
												<div class="row">
													<div class="col-sm-6">
														<div class="column-holder">
															<div class="image-box">
																<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Niall-Mackenzie.jpg" alt="">
																<div class="name">
																	NIALL<br>MACKENZIE
																</div>
															</div>
															<div class="bio">
																<p>
																	Niall Mackenzie had his first GP race in 1984 at the British Grand Prix hosted at the famous Silverstone. This was the start of a successful career in the sport, during which he won the British Superbike Championship three times from 1996 to 1998, having already won the British 250cc and 350cc titles twice earlier in his career.
																</p>
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="column-holder">
															<div class="image-box">
																<img src="https://www.ccm-motorcycles.com/wp-content/uploads/2020/11/Neil-Hodgson.jpg" alt="">
																<div class="name">
																	NEIL<br>HODGSON
																</div>
															</div>
															<div class="bio">
																<p>
																	Neil Hodgson started his GP journey 11 years later in 1995 at the Australian Grand Prix at Eastern Creek. Again, this proved to be the starting block of a successful career in the sport which took Neil all over the world. He won the 2000 British Superbike Championship and became Superbike World Champion in 2003.
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="contact-wrapper">
												<div class="custom-row">
													<div class="col-6">
														<div class="column-holder contact-number-holder">
															<a href="tel:03330053100">
																Call <span>0333 0035 475</span>
															</a>
														</div>
													</div>
													<div class="col-6">
														<div class="column-holder office-hours-holder">
															<ul>
																<li>
																	<strong>Monday - Friday:</strong> 9:00am - 6:00pm
																</li>
																<li>
																	<strong>Saturday:</strong> 9:00am - 1:00pm
																</li>
																<li>
																	<strong>Sunday:</strong> Closed 
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>
						</div>
					</section>

					<?php //}  ?>


					<script>
						$('.booking-thankyou-page').hide();
					</script>

				</main>


				<?php get_footer(); // This fxn gets the footer.php file and renders it ?>

				<script>
					jQuery(document).ready(function($) {
						jQuery( ".date_select" ).datepicker().datepicker('setDate', new Date());;
					});
				</script>


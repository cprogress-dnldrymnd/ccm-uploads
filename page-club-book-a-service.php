<?php
/**
    *   Template Name: Servicing
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$page_name = 'Servicing';
?>

<main class="news careers page-template-page-owners faq-page club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()) { ?>
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
				$services = carbon_get_the_post_meta('services');  
				$warranty_heading = carbon_get_the_post_meta('warranty_heading');  
				$warranty_content = carbon_get_the_post_meta('warranty_content');  

				$tab = $_GET['tab'];
				$book_a_service_class = '';
				$service_types_class = '';
				$meet_our_team_class = '';
				$warranty_class = '';
				if($tab == 'book-a-service') {
					$book_a_service_class = 'active';
				} else if($tab == 'service-type') {
					$service_types_class = 'active';
				} else if($tab == 'team') {
					$meet_our_team_class = 'active';
				} else if($tab == 'owners-warranty') {
					$warranty_class = 'active';
				} else if($tab == 'handbook') {
					$handbook_class = 'active';
				} else {
					$meet_our_team_class = 'active';
				}
				?>
			<?php } ?>
		<?php } ?>
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
							<li class="<?= $warranty_class ?>">
								<a data-toggle="tab" href="#owners-warranty">
									Warranty
								</a>
							</li>
							<li class="<?= $handbook_class ?>">
								<a data-toggle="tab" href="#handbook">
									Handbook
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
											<?php echo do_shortcode('[contact-form-7 id="4193" title="Book a Service v2"]'); ?>
										</div>
										<div class="booking-thankyou-page col-md-10" style="margin: 0 auto; float:none;">
											<?php echo $thankyou_text; ?>
										</div>
										<a style="display: none" href="https://www.ccm-motorcycles.com//cart/?add-to-cart=4185" class="service-link">CCM Spitfire First Service</a>
									</div>
									<div id="owners-warranty" class="tab-pane fade in <?= $warranty_class ?>">
										<div class="title-box">
											<h2 class="title">
												<?= $warranty_heading ?>
											</h2>
										</div>
										<div class="warranty-content">
											<?= wpautop( $warranty_content ) ?>
										</div>
									</div>
									<div id="handbook" class="tab-pane fade in <?= $handbook_class ?>">
										<div class="inner">
											<div class="title-box">
												<h2 class="title">
													Handbook
												</h2>
											</div>
											<div class="the-handbook">
												<?php 
												$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
												$args_wp = array(
													'post_type' => '3d-flip-book',
													'posts_per_page' => 6,
													'paged' => $paged,
												);

												$wp_query = new WP_Query($args_wp);
												?>
												<?php if($wp_query->have_posts() ) { ?>
													<div class="row">
														<?php while ( $wp_query->have_posts() ) { ?>
															<?php $wp_query->the_post(); ?>	
															<?php  
															$data = get_post_meta(get_the_ID(), '3dfb_data', false );
															$pdf = $data[0]['guid'];
															$thumb = get_post_meta(get_the_ID(), '3dfb_thumbnail', false );
															$data_thumb = wp_get_attachment_url($thumb[0]['data']['post_ID']);
															?>
															
															<div class="col-md-6">
																<div class="book-con clear">
																	<div class="img-box">
																		<div class="img ctr cvr" style="background-image: url(<?php _e($data_thumb) ?>)">
																		</div>
																	</div>
																	<div class="title-box">
																		<h3 class="title mh">
																			<a href="<?php the_permalink() ?>">	<?php the_title() ?></a>
																		</h3>
																	</div>
																	<div class="buttons">
																		<div class="btn-box-v3">
																			<a href="<?php the_permalink() ?>">Read Online</a>
																		</div>
																		<div class="pdf-download">
																			<a target="_blank" href="<?php _e($pdf) ?>">	<i class="fas fa-file-pdf"></i>Download PDF</a>
																		</div>
																	</div>
																</div>
															</div>
														<?php } ?>
													</div>
													<?php wp_reset_postdata(); ?>
												<?php	}  ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

				<?php }  ?>


				<script>
					$('.booking-thankyou-page').hide();
				</script>

			</main>


			<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
			
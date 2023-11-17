<?php
/**
    *   Template Name: CLUB CCM: Events
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$page_name = 'Events';

?>
<main class="news careers page-template-page-owners club-main">
	<?php include(locate_template('/ccm-club/banner.php')); ?>
	<?php if(is_user_logged_in()) { ?>
		<section class="heading">	
			<div class="container tight width1116">
				<div class="title-box">
					<h1 class="title">
						ALL EVENTS
					</h1>
				</div>
				<div class="sub-content">
					<?php the_content() ?>
				</div>
			</div>
		</section>
		<section class="careers-sc-one events-bg events-archive">
			<div class="container tight width1116">
				<div class="row">
					<div id="Events" class="news">
						<div class="content">
							<div class="container tight width1116">
								<div id="post-grid">

									<?php
									$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
									$current_time  = current_time('mysql');
									$args_wp = array(
										'post_type' => 'events',
										'posts_per_page' => 6,
										'paged' => $paged,
										'orderby' => 'crbdate',
										'order' => 'asc',
										'post_status' => array('publish',  'future'),   
										'meta_query'=>array(
											'relation' => 'AND',
											'crbdate' => array(
												'key' => '_crb_event_start',
												'compare' => 'EXISTS',
												'type' => 'DATE',
											),
											array(
												'key' => '_crb_event_start',
												'compare' => '>',
												'value' => $current_time,
											),
										),
									);
									
									$wp_query_event = new WP_Query($args_wp);
									if($_SERVER['REMOTE_ADDR'] == '103.106.20.165'){

									}
									echo '<div class="row"><div class="col-md-12">';
									while ( $wp_query_event->have_posts() ) : $wp_query_event->the_post(); 
										$start = carbon_get_the_post_meta( 'crb_event_start' );
										$end = carbon_get_the_post_meta( 'crb_event_end' );
										$title = get_the_title();
										?>
										<?php if($start > $current_time) { ?>
											<div class="col-md-6">
												<article class="article-card blog-content">
													<div class="image_container">
														<?php
														$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($wp_query_event->ID), 'full' );
														//$thumb = 'https://www.ccm-motorcycles.com/wp-content/uploads/2019/11/Carbon-Rear-Hugger.jpg';
														?>

														<?php if($thumb): ?>
															<a href="<?php the_permalink(); ?>"><span class="blog-image" style="background-image:url('<?php echo $thumb[0];?>')"></span></a>
														<?php endif;?>
														<div class="article-content custom-article-content">
															<div class="row">
																<div class="col-xs-3">
																	<div class="m-d-y-a-name">
																		<div class="m-d-y">
																			<h3 class="m-n"><?php echo date( 'M', strtotime( $start ) ); ?></h3>
																			<h2 class="d-n"><?php echo date( 'd', strtotime( $start ) ); ?></h2>
																			<h3 class="y-n"><?php echo date( 'Y', strtotime( $start ) ); ?></h3>
																		</div>
																		<div class="a-name">
																			<span>Starts<br><?php echo date( 'H:i', strtotime( $start ) ); ?></span>
																		</div>
																	</div>
																	<!--<span class="">Date:<?php echo date( 'd, M, y', strtotime( $start ) ); ?> - <?php echo date( 'd, M, y', strtotime( $end ) ); ?> Time: <?php echo date( 'H:i', strtotime( $start ) ); ?> - <?php echo date( 'H:i', strtotime( $end ) ); ?></span>-->
																</div>
																<div class="col-xs-9 pl-0">
																	<h3><a href="<?php the_permalink(); ?>"><?= $title ?></a></h3>
																	<!--<h3><a href="<?php the_permalink(); ?>" class="blog-link"><?php echo get_the_title($wp_query_event->ID); ?></a></h3>			-->
																</div>
															</div>


														</div>
													</div>
												</article>
											</div>
										<?php } ?>
									<?php endwhile;
									wp_reset_postdata();
									echo '<div class="col-md-12 pagination_link"><div class="pagination">';
								$big = 999999999; // need an unlikely integer
								echo paginate_links( array(
									'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
									'format' => '?paged=%#%',
									'current' => max( 1, get_query_var('paged') ),
									'total' => $wp_query_event->max_num_pages
								) );
								echo '</div></div>' ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
</main>


<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
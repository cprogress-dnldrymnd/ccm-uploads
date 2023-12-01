<?php 
$heading = $page_component['heading'];

$args_wp= array(
	'category_name' => 'news-and-updates', 
	'posts_per_page' => 3,
);
$wp_query = new WP_Query($args_wp);
?>
<section class="latest-news">
	<div class="bar">
		<div class="container <?= $container_width ?>">
			<div class="inner">
				<div class="heading-box light" data-aos="fade-right" data-aos-duration="500">
					<h2 class="mb-0">
						<?php 
						if($heading) {
							echo $heading;
						} else {
							echo 'Latest News';
						}
						?>
					</h2>
				</div>
				<a class="pc-btn anchor-modal with-arrow float-right" href="https://www.ccm-motorcycles.com/updates/">VIEW ALL</a>
			</div>
		</div>
	</div>
	<div class="latest-news-holder">
		<div class="container <?= $container_width ?>">
			<div class="row">
				<?php while ( $wp_query->have_posts() ) { ?>
					<?php $wp_query->the_post();  ?>
					<div class="col-sm-4">
						<a href="<?php the_permalink() ?>" class="column-holder" data-aos="zoom-in" data-aos-duration="500" data-aos-delay="300">
							<?php the_post_thumbnail( 'large' ); ?>
							<img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'large') ?>" alt="<?php the_title() ?>">
							<div class="post-details-box">
								<div class="post-date inner">
									<?= ccm_date_format(get_the_date()) ?>
								</div>
								<div class="post-title inner">
									<h3><?php the_title() ?></h3>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
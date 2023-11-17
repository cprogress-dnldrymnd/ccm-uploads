<?php 


add_shortcode('mega_nav_bike_models', 'mega_nav_bike_models');

function mega_nav_bike_models($atts) {

	extract(shortcode_atts(array(
		'nav_name' => '',
	), $atts));
	$locations = get_registered_nav_menus();
	$menus = wp_get_nav_menus();
	$menu_locations = get_nav_menu_locations();

	$location_id = $atts['nav_name'];
	$args_new_model = array(
		'post_type' => 'bikes',
		'post_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'bike-type',
				'field' => 'term_id',
				'terms' => 257
			)
		)
	);

	$query_new_model = new WP_Query( $args_new_model );

	if (isset($menu_locations[ $location_id ])) { 

		foreach ($menus as $menu) {
			if ($menu->term_id == $menu_locations[ $location_id ]) {
				$menu_items = wp_get_nav_menu_items($menu);
				foreach ( $menu_items as $item ) {

					$mega_menu[$item->post_title]['cpt_name'] = $item->classes[0];
					$taxonomy_name = $item->classes[1];
					$mega_menu[$item->post_title]['taxonomy_name'] = $taxonomy_name;
					$mega_menu[$item->post_title]['url'] = $item->url;


					$terms = get_terms( $taxonomy_name, array(
						'hide_empty' => false,
					) );

					if(count($terms) && $taxonomy_name != '') {
						foreach($terms as $key => $val){
							$category_name = $val->name;
							$category_id = $val->term_id;

							$args = array(
								'post_type' => $cpt_name,
								'post_per_page' => -1,
								'tax_query' => array(
									array(
										'taxonomy' => $taxonomy_name,
										'field' => 'term_id',
										'terms' => $category_id
									)
								)
							);

							$query = new WP_Query( $args );
							if(count($query->posts) != 0) {
								$mega_menu[$item->post_title][$val->name] = $query->posts;
							}else{
								if($mega_menu[$item->post_title])
									$mega_menu[$item->post_title][$val->name] = array();
							}
						}
					}

				}
			}
		}?>
		<ul class="nav navbar-nav nav-menu-handler bike_menus">
			<?php foreach($mega_menu as $parent_key => $parent_value): ?>
				<?php if(count($parent_value) > 3 ): ?>
					<li class="has-dropdown">
						<a href="javascript:void(0)" class="menu-parent menu-parent-new"><?=$parent_key?> <img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
						<ul class="dropdown-menu mega-menu bike_menu" style="display: none;">
							<li class="mega-menu-column">
								<div class="megamenu-breadcrumb megamenu-breadcrumb-new">
									<div class="container wide witdh1700">
										<div class="inner">
											<?php foreach(array_reverse($parent_value) as $k => $v):
												if($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url'):
													$class_tax_button = preg_replace('/\s+/', '', $k);?>
													<a href="javascript:void(0)" class="taxonomy-button" data-menu-name="<?=$class_tax_button?>"><?=$k?><img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
												<?php endif;
											endforeach ?>
										</div>
									</div>
								</div>

								<?php foreach($parent_value as $k => $v):
									echo $parent_value['bike-type'];
									if($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url'):
										$class_tax_dropdown = preg_replace('/\s+/', '', $k);?>
										<div class="mega-dropdown-menu mega-dropdown-menu-new <?=$class_tax_dropdown?>" style="display: none;">
											<div class="container wide witdh1700">
												<div class="row">
													<div class="col-md-3">
														<h2>NEW FOR 2021</h2>
														<div class="row overflow">
															<?php while ( $query_new_model->have_posts() ) { $query_new_model->the_post();  ?>
																<?php 
																$image_id = attachment_url_to_postid(carbon_get_post_meta( get_the_ID(),'b_img'));
																?>
																<div class="col-xs-12 bike-id-<?= get_the_ID() ?>">
																	<div class="bike-previews">
																		<a href="<?php the_permalink() ?>"><div class="image-holder">  

																			<img class="img-responsive" src="<?= wp_get_attachment_image_url( $image_id, 'medium' ); ?>"/>
																		</div><span><?php the_title() ?></span></a>
																	</div>
																</div>
															<?php } ?>
															<?php wp_reset_postdata(); ?>
														</div>
													</div>
													<div class="col-md-9 ">
														<h2><?=$k?></h2>
														<div class="row overflow">
															<?php foreach ($v as $postkey => $postvalue) : ?>
																<?php 
																$image_id = attachment_url_to_postid(carbon_get_post_meta($postvalue->ID,'b_img'));
																?>
																<div class="col-xs-4 bike-id-<?= $postvalue->ID ?>	">
																	<div class="bike-previews">
																		<a href="<?=get_permalink($postvalue->ID)?>"><div class="image-holder">  
																			<img class="img-responsive" src="<?= wp_get_attachment_image_url( $image_id, 'medium' ); ?>"/>
																		</div><span><?=$postvalue->post_title?></span></a>
																	</div>
																</div>
															<?php endforeach;  ?>
														</div>
													</div>
												</div>
											</div>
										</div> 
									<?php endif;
								endforeach ?>
							</li>
						</ul>
					</li>
				<?php else: ?>
					<li><a href="<?=$parent_value['menu_url']?>" target="_blank"><?=$parent_key?> </a></li>
				<?php endif ?>
			<?php endforeach; ?>
		</ul>
	<?php }
}
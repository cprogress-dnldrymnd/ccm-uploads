<?php
/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
	define( 'JND_VERSION', 1.0 );

	/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

// Register Custom Navigation Walker
require_once('wp-bootstrap-navwalker.php');

//add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){

	$new_filetypes = array();
	$new_filetypes['svg'] = 'image/svg+xml';
	$file_types = array_merge($file_types, $new_filetypes );

	return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'left'	=>	__( 'CPT Menu', 'jnd' ), 
		'left-main'	=>	__( 'Left Primary Menu', 'jnd' ), 
		'right'	=>	__( 'Right Menu', 'jnd' ), 
		'mobile'	=>	__( 'Mobile Menu', 'jnd' ),
		'footer1'	=>	__( 'Footer1 Menu', 'jnd' ),
		'footer2'	=>	__( 'Footer2 Menu', 'jnd' ),
		'footer3'	=>	__( 'Footer3 Menu', 'jnd' ),
		'bottom-footer'	=>	__( 'Bottom Footer Menu', 'jnd' ),  
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
		)
	);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function jnd_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
		));

	register_sidebar( array(
		'name' => 'Footer Sidebar 1',
		'id' => 'footer-sidebar-1',
		'description' => 'Appears in the footer area - Column 1',
		'before_widget' => '<aside id="%1$s" class="block %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );

	register_sidebar( array(
		'name' => 'Footer Sidebar 2',
		'id' => 'footer-sidebar-2',
		'description' => 'Appears in the footer area - Column 2',
		'before_widget' => '<aside id="%1$s" class="block %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );

	register_sidebar( array(
		'name' => 'Footer Sidebar 3',
		'id' => 'footer-sidebar-3',
		'description' => 'Appears in the footer area - Column 3',
		'before_widget' => '<aside id="%1$s" class="block %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );

	register_sidebar( array(
		'name' => 'Footer Sidebar 4',
		'id' => 'footer-sidebar-4',
		'description' => 'Appears in the footer area - Column 4',
		'before_widget' => '<aside id="%1$s" class="block %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
		) );
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'jnd_register_sidebars' );


/*-----------------------------------------------------------------------------------*/
/* Custom Post Type
/*-----------------------------------------------------------------------------------*/

function cp_bikes() {
	$labels = array(
		'name'               => _x( 'Bikes', 'post type general name' ),
		'singular_name'      => _x( 'Bikes', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'bike' ),
		'add_new_item'       => __( 'Add New bike' ),
		'edit_item'          => __( 'Edit bike' ),
		'new_item'           => __( 'New bike' ),
		'all_items'          => __( 'All bikes' ),
		'view_item'          => __( 'View bike' ),
		'search_items'       => __( 'Search bikes' ),
		'not_found'          => __( 'No bike found' ),
		'not_found_in_trash' => __( 'No bike found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Bikes'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our articles and article specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
		);
	register_post_type( 'bikes', $args ); 
}
add_action( 'init', 'cp_bikes' );

function cp_defences() {
	$labels = array(
		'name'               => _x( 'Defence', 'post type general name' ),
		'singular_name'      => _x( 'Defence', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'defence' ),
		'add_new_item'       => __( 'Add New defence' ),
		'edit_item'          => __( 'Edit defence' ),
		'new_item'           => __( 'New defence' ),
		'all_items'          => __( 'All defence' ),
		'view_item'          => __( 'View defence' ),
		'search_items'       => __( 'Search defences' ),
		'not_found'          => __( 'No defence found' ),
		'not_found_in_trash' => __( 'No defence found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Defences'
		);
	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'menu_position' => 6,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
		);
	register_post_type( 'defences', $args ); 
}
add_action( 'init', 'cp_defences' );


// create two taxonomies, genres and writers for the post type "book"
function create_project_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Bike Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Bike Types', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Bike Types', 'textdomain' ),
		'all_items'         => __( 'All Bike Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Bike Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Bike Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Bike Type', 'textdomain' ),
		'update_item'       => __( 'Update Bike Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Bike Type', 'textdomain' ),
		'new_item_name'     => __( 'New Bike Type Name', 'textdomain' ),
		'menu_name'         => __( 'Bike Type', 'textdomain' ),
		);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'bike-type' ),
		);

	register_taxonomy( 'bike-type', array( 'bikes' ), $args );
}

add_action( 'init', 'create_project_taxonomies', 0 );

/*-----------------------------------------------------------------------------------*/
/* Custom Post Type Event
/*-----------------------------------------------------------------------------------*/

function cp_events() {
	$labels = array(
		'name'               => _x( 'Events', 'post type general name' ),
		'singular_name'      => _x( 'Events', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Event' ),
		'add_new_item'       => __( 'Add New Event' ),
		'edit_item'          => __( 'Edit Event' ),
		'new_item'           => __( 'New Event' ),
		'all_items'          => __( 'All Events' ),
		'view_item'          => __( 'View Event' ),
		'search_items'       => __( 'Search Events' ),
		'not_found'          => __( 'No bike found' ),
		'not_found_in_trash' => __( 'No bike found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Events'
		);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our articles and article specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
    'menu_icon'   => 'dashicons-calendar-alt',

		);
	register_post_type( 'events', $args ); 
}
add_action( 'init', 'cp_events' );


// create two taxonomies, genres and writers for the post type "book"
function create_events_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Event Types', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Events Types', 'textdomain' ),
		'all_items'         => __( 'All Event Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Event Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Event Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Event Type', 'textdomain' ),
		'update_item'       => __( 'Update Event Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Event Type', 'textdomain' ),
		'new_item_name'     => __( 'New Event Type Name', 'textdomain' ),
		'menu_name'         => __( 'Event Type', 'textdomain' ),
		);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event-type' ),
		);

	register_taxonomy( 'event-type', array( 'events' ), $args );
}

add_action( 'init', 'create_events_taxonomies', 0 );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function jnd_scripts()  { 

	wp_enqueue_style('jnd-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	
	
	wp_enqueue_style('jnd-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('jnd-owl-style', get_template_directory_uri() . '/app/stylesheets/vendors/owl.carousel.min.css');
	wp_enqueue_style('jnd-owl-theme', get_template_directory_uri() . '/app/stylesheets/vendors/owl.theme.default.min.css');
	wp_enqueue_style('jnd-timeline-theme', get_template_directory_uri() . '/app/stylesheets/vendors/timeline.min.css');
	wp_enqueue_style('jnd-remodal-theme', get_template_directory_uri() . '/app/stylesheets/vendors/remodal-default-theme.css');
	wp_enqueue_style('jnd-remodal-style', get_template_directory_uri() . '/app/stylesheets/vendors/remodal.css');
	wp_enqueue_style('jnd-main-style', get_template_directory_uri() . '/app/stylesheets/main.css');
	wp_enqueue_style('jnd-new-style', get_template_directory_uri() . '/app/new-styles/new.css');
	wp_enqueue_style('jnd-justified-style', get_template_directory_uri() . '/app/new-styles/justifiedGallery.css');
	wp_enqueue_style('jnd-single-bike-style', get_template_directory_uri() . '/app/new-styles/single-bike.css');
	wp_enqueue_style('jnd-custom-style', get_template_directory_uri() . '/app/new-styles/custom.css');

	wp_enqueue_script('jnd-jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
	wp_enqueue_script('jnd-bootstrap', get_template_directory_uri() . '/app/javascripts/vendors/bootstrap.min.js');
	wp_enqueue_script('jnd-timeline', get_template_directory_uri() . '/app/javascripts/vendors/timeline.min.js');
	wp_enqueue_script('jnd-owl-script', get_template_directory_uri() . '/app/javascripts/vendors/owl.carousel.min.js');
	wp_enqueue_script('jnd-remodal', get_template_directory_uri() . '/app/javascripts/vendors/remodal.js');
	wp_enqueue_script('jnd-justified', get_template_directory_uri() . '/app/new-styles/jquery.justifiedGallery.js');
	wp_enqueue_script('jnd-script', get_template_directory_uri() . '/app/javascripts/main.js');


		$data_array = array(
	'ajaxurl' => admin_url( 'admin-ajax.php' )
	);

	wp_localize_script( 'jnd-script', 'myAjax', $data_array );

}
add_action( 'wp_enqueue_scripts', 'jnd_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

/*-----------------------------------------------------------------------------------*/
/* Carbon Fields
/*-----------------------------------------------------------------------------------*/


add_action( 'carbon_fields_register_fields', 'cv_register_custom_fields' );
function cv_register_custom_fields() {
	require_once(dirname(__FILE__) . '/includes/post-meta.php');
}

add_shortcode('mega_nav', 'mega_nav_menu');

function mega_nav_menu($atts){

	extract(shortcode_atts(array(
	'nav_name' => '',
	), $atts));
  $locations = get_registered_nav_menus();
  $menus = wp_get_nav_menus();
  $menu_locations = get_nav_menu_locations();

  $location_id = $atts['nav_name'];
  

  if (isset($menu_locations[ $location_id ])) { 
    foreach ($menus as $menu) {
      if ($menu->term_id == $menu_locations[ $location_id ]){
        $menu_items = wp_get_nav_menu_items($menu);
        foreach ( $menu_items as $item ){

          $mega_menu[$item->post_title]['cpt_name'] = $item->classes[0];
          $taxonomy_name = $item->classes[1];
          $mega_menu[$item->post_title]['taxonomy_name'] = $taxonomy_name;
          $mega_menu[$item->post_title]['url'] = $item->url;


          $terms = get_terms( $taxonomy_name, array(
              'hide_empty' => false,
          ) );
          
          if(count($terms) && $taxonomy_name != ''){
            foreach($terms as $key => $val){
              $category_name = $val->name;
              $category_id = $val->term_id;

              $args = array(
                'post_type' => $cpt_name,
                'tax_query' => array(
                  array(
                    'taxonomy' => $taxonomy_name,
                    'field' => 'term_id',
                    'terms' => $category_id
                  )
                )
              );

              $query = new WP_Query( $args );
              if(count($query->posts) != 0){
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
	        <a href="javascript:void(0)" class="menu-parent"><?=$parent_key?> <img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
	        <ul class="dropdown-menu mega-menu bike_menu" style="display: none;">
	          <li class="mega-menu-column">
	            <div class="megamenu-breadcrumb">
	                <div class="container">
	                  <?php foreach(array_reverse($parent_value) as $k => $v):
	                    if($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url'):
	                      $class_tax_button = preg_replace('/\s+/', '', $k);?>
	                      <a href="javascript:void(0)" class="taxonomy-button" data-menu-name="<?=$class_tax_button?>"><?=$k?><img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
	                    <?php endif;
	                  endforeach ?>
	                </div>
	            </div>

	             <?php foreach($parent_value as $k => $v):
	              if($k != 'cpt_name' && $k != 'taxonomy_name' && $k != 'url'):
	                $class_tax_dropdown = preg_replace('/\s+/', '', $k);?>
	                  <div class="mega-dropdown-menu <?=$class_tax_dropdown?>" style="display: none;">
	                    <div class="container">
	                        <h2><?=$k?></h2>
	                        <div class="separator"></div>
	                        <div class="row">
	                            <?php foreach ($v as $postkey => $postvalue) : ?>
	                              <div class="col-xs-4">
	                                <div class="bike-previews">
	                                    <a href="<?=get_permalink($postvalue->ID)?>"><div class="image-holder">  
	                                    	<img class="img-responsive" src="<?=carbon_get_post_meta( $postvalue->ID,'b_img')?>"/>
	                                    </div><?=$postvalue->post_title?></a>
	                                </div>
	                            </div>
	                            <?php endforeach;  ?>
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

add_shortcode('mega_nav_left', 'mega_nav_menus');

function mega_nav_menus($atts){
	
  $locations = get_registered_nav_menus();
  $menus = wp_get_nav_menus();
  $menu_locations = get_nav_menu_locations();

  $location_id = $atts['left_menu'];


$mainALL= Array
(
	0 => Array
        (
            'month' => 'SEP 2019',
            'link' => 'http://online.fliphtml5.com/gyqxu/glqp/',
            'img'=> 'http://www.ccm-motorcycles.com/wp-content/themes/CCM/app/images/Sep-19.jpg',
        ),
	1 => Array
        (
            'month' => 'JAN 2019',
            'link' => 'http://online.fliphtml5.com/gyqxu/nivg/',
            'img'=> 'http://ccmstaging.theprogressteam.co.uk/wp-content/themes/CCM/app/images/January.jpg',
        ),
	2 => Array
        (
            'month' => 'DEC 2018',
            'link' => 'http://online.fliphtml5.com/gyqxu/nese/',
            'img'=> 'http://ccmstaging.theprogressteam.co.uk/wp-content/themes/CCM/app/images/December.jpg',
        ),
    3 => Array
        (
            'month' => 'NOV 2018',
            'link' => 'http://online.fliphtml5.com/czfkk/mscz/#p=1',
            'img' => 'http://ccmstaging.theprogressteam.co.uk/wp-content/themes/CCM/app/images/November.jpg',
        ),
	
	
	
); 


    foreach ($menus as $menu) {
		
      if ($menu->slug == 'left'){
        $menu_items = wp_get_nav_menu_items($menu);
		
		//print_r($menu_items);
		
        foreach ( $menu_items as $item ){
		  $mega_menus[$item->title]['cpt_name'] = $item->classes[0];
          $mega_menus[$item->title]['url'] = $item->url;
          $mega_menus[$item->title]['menu_item_parent'] = $item->menu_item_parent;
          $mega_menus[$item->title]['post_title'] = $item->title;


        }
      }
    }
	
	$parent_valueinner=array();
	$cssclass=array();
	foreach($mega_menus as $parent_v){
		if($parent_v['menu_item_parent'] != 0 ){
			$parent_valueinner[]=$parent_v['post_title'].'__'.$parent_v['url'];
			
		}
		
	}
	?>
    <ul class="nav navbar-nav nav-menu-handler explre_menu exploreMenu">
	<?php 
		
	    foreach($mega_menus as $parent_values){
			if($parent_values['post_title'] == 'Explore')
			{
				$has_dropdown='has-dropdown explore_menu';
				$has_link='javascript:void(0)';
			} else
			{
				$has_dropdown='';
				$has_link=$parent_values['url'];
			}
			
		
	?>
	    
	      <li class="<?php echo $has_dropdown; ?> ">
		  <?php if($parent_values['menu_item_parent'] == 0 ){ ?>
		  <a href="<?php echo $has_link; ?>" class="menu-parents remove_menu"><?php echo $parent_values['post_title'];?> <img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
			<?php } ?>
	        <ul class="dropdown-menu mega-menu " style="display: none;">
	          <li class="mega-menu-column">
	            <div class="megamenu-breadcrumb">
	                <div class="container">
	                    <?php 
						//print_r($parent_values);
					    foreach($parent_valueinner as  $v){
						$explode=explode("__",$v);
						$title=	$explode[0];	
						 
							
						
						if($title == 'Squadron Magazine')
						{
							$cssclass = 'taxonomy-button activeclass';
							$title_link='javascript:void(0)';
							
						} else {
							$cssclass = '';
							$title_link=$explode[1];
						}						
					    ?>
	                      <a  href="<?php echo $title_link; ?>" class=" <?php echo $cssclass;?>"><?=$title?><img src="/wp-content/uploads/2018/02/down-chevron-1.svg" class="chevron-down"></a>
					  <?php 
						} ?>
	                </div>
	            </div>

	             <?php 
				// print_r($parent_value);
				foreach($mega_menus as $parent_value){
				if($parent_value['cpt_name'] == 'squadron_magazine'){
				?>
	                <div class="mega-dropdown-menus squan_magazi" style="display: none;">
	                    <div class="container">
	                        <h2>LATEST EDITIONS</h2>
	                        <div class="separator"></div>
							<div class="row">
							<?php foreach($mainALL as $k => $v_main){ ?>
	                            <div class="bike-previews">
	                                <div class="bike-pre">
	                                    <a target="_blank" href="<?php echo $v_main['link'];?>"><div class="image-holder">  
	                                    	<img class="img-responsive" src="<?php echo $v_main['img'];?>"/>
	                                    </div>
	                                    <!--<div class="month_yr">-->
	                                        <?php echo $v_main['month'];?>
	                                        <!--</div>-->
	                                        </a>
	                                </div>
	                            </div>
							<?php } ?>
	                        </div>
	                    </div>
	                </div> 
	              <?php 
				}    }  ?>

	          </li>
	        </ul>
	      </li>
		<?php } ?>
	</ul>
	<script>
	jQuery(document).ready(function()
	{
		jQuery(".explore_menu").each(function(){
			
			var parent_div = jQuery(this).find('a.remove_menu').html();
			console.log(parent_div);
			if(parent_div)
			{
				
			} else 
			{
				jQuery(this).remove();
			}
		});
		
		var current = location.pathname;
		console.log(current);
		if(current != '/') {
		$('.exploreMenu li a').each(function(){
			var $this = $(this);
			// if the current path is like this link, make it active
			if($this.attr('href').indexOf(current) !== -1){
				$this.addClass('active');
			}
			else
			{
				
			}
		});
		}

	
	
	
	jQuery('.activeclass').click(function()
	{
		
		jQuery(".dropdown-menu.mega-menu .squan_magazi").toggle();
		
		if (jQuery('.custom_show_arrow .squan_magazi').is(':visible')) {
			jQuery(this).addClass('activesub');
		} else{
			jQuery(this).removeClass('activesub');
		}
		
	
	});
	
	$('.explore_menu .menu-parents').click(function()
	{
		$(".PreviousModels").hide();
		$(".SpitfireSeries").hide();
		$(".SpitfireSeries").removeClass('active');
		$(".PreviousModels").removeClass('active');
		$(".bike_menus .menu-parent").removeClass('active');
		$(".bike_menus ul.bike_menu").hide();
		$(this).parent('.explore_menu').find(".dropdown-menu.mega-menu").toggle();
		if ($('.explore_menu .dropdown-menu.mega-menu').is(':visible')) {
			$("body").addClass('overlay');
			$(this).parent('li.explore_menu').addClass('custom_show_arrow');
				
		} else {
			$("body").removeClass('overlay');
			$(this).parent('li.explore_menu').removeClass('custom_show_arrow');
			
		}
		
	});
	
	jQuery('.menu-parent').click(function()
	{
		jQuery(".explore_menu .dropdown-menu.mega-menu").hide();
		jQuery(".explore_menu").removeClass('custom_show_arrow');
		
	});
	});
	</script>
	
  <?php
	
}

/* Post Filter */

function cs_filters(){
$terms = $_POST['category'];
$query = new WP_Query( array(
'post_type'=>'post',
'cat' => $terms,
'posts_per_page' => -1,
) ); ?>
<?php if ( $query->have_posts() ) : 
 echo '<div class="row">';
	while($query->have_posts()) : $query->the_post(); ?>
        <article class="article-card blog-content">
        <div class="image_container">
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
            <?php if($thumb): ?>
            <a href="<?php the_permalink(); ?>"><span class="blog-image" style="background-image:url('<?php echo $thumb['0'];?>')"></span></a>
            <?php endif;?>
            <div class="article-content">
                <span class="date"><?php echo get_the_date( 'm.d.y' ); ?></span>
                <h3><a href="<?php the_permalink(); ?>" class="blog-link"><?php the_title(); ?></a></h3>
                <div class="post-content">
                    <a href="<?php the_permalink(); ?>" class="more-link">read more</a>
                </div>
            </div>
        </div>
    </article>
	<?php endwhile; wp_reset_postdata(); ?>
</div>
<?php echo '<div class="pagination">';
	$big = 999999999; // need an unlikely integer
	echo paginate_links( array(
	'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
	) );
	echo '</div>' ?>
<?php endif; // reset the query ?>
<?php die(); }
add_action('wp_ajax_customfilter', 'cs_filters');
add_action('wp_ajax_nopriv_customfilter', 'cs_filters');


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
 
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	unset($fields['shipping']['shipping_company']);
	 
	return $fields;
}


function jeherve_remove_state_field( $fields ) {
	unset( $fields['state'] );
	return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'jeherve_remove_state_field' );

function pn_get_attachment_id_from_url( $attachment_url = '' ) {
 
	global $wpdb;
	$attachment_id = false;
 
	// If there is no url, return.
	if ( '' == $attachment_url )
		return;
 
	// Get the upload directory paths
	$upload_dir_paths = wp_upload_dir();
 
	// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
	if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
 
		// If this is the URL of an auto-generated thumbnail, get the URL of the original image
		$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
 
		// Remove the upload path base directory from the attachment URL
		$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
 
		// Finally, run a custom database query to get the attachment ID from the modified attachment URL
		$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
 
	}
 
	return $attachment_id;
}

// Login page custumization

function my_custom_login() {
echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
echo '<script  src="' . get_bloginfo('stylesheet_directory') . '/login/customadmin.js" /></script>';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return get_bloginfo();
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

add_filter( 'lostpassword_url',  'wdm_lostpassword_url', 10, 0 );
function wdm_lostpassword_url() {
    return site_url('/ccm-login?action=lostpassword');
}


add_action('after_setup_theme','my_add_role_function');
function my_add_role_function(){
    $roles_set = get_option('my_roles_are_set');
    if(!$roles_set){
        add_role('club_member', 'Club Member', array(
            'read' => true,
            'edit_posts' => true,
            'delete_posts' => true,
            'upload_files' => true 
        ));
        update_option('my_roles_are_set',true);
    }
}


if( is_user_logged_in () &&  !is_admin() ){
global $wp;
$curr_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$edit_billing_path = __('/my-account/edit-address/billing', 'woocommerce');


	$targ_url = home_url($edit_billing_path);

	if ( !strstr($curr_url, $targ_url) ) {
			$user_id = get_current_user_id ();
			$billing_city = get_user_meta ($user_id, 'billing_postcode', true);
			if ( empty( $billing_city ) ) {
					wp_redirect($targ_url);
			} 
	}
}


function rohil_login_redirect_based_on_roles($user_login, $user) {

    if( in_array( 'club_member',$user->roles ) ){
        exit( wp_redirect('/club-ccm/' ) );
    }
    if( in_array( 'administrator',$user->roles ) ){
        exit( wp_redirect('/wp-admin/' ) );
    }
}

add_action( 'wp_login', 'rohil_login_redirect_based_on_roles', 10, 2);

 
add_filter( 'woocommerce_account_menu_items', 'bbloomer_remove_address_my_account', 999 );
  
function bbloomer_remove_address_my_account( $items ) {
unset($items['edit-address']);
return $items;
}
 
// -------------------------------
// 2. Second, print the ex tab content into an existing tab (edit-account in this case)
 
add_action( 'woocommerce_account_edit-account_endpoint', 'woocommerce_account_edit_address' );




if(is_user_logged_in ()){
    // Queried URL
    $curr_url = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    // localisable "Edit billing information" path
    $edit_billing_path = __('/my-account/edit-address/billing', 'woocommerce');
    // Target URL
    $targ_url = home_url($edit_billing_path);

    if ( !strstr($curr_url, $targ_url) ) {
        $user_id = get_current_user_id ();
        $billing_country = get_user_meta ($user_id, 'billing_country', true);
        if ( empty( $billing_country ) ) {
            wp_redirect( $targ_url );
        }
    }
}

 
add_action( 'init', 'codex_story_init' );

function codex_story_init() {
	$labels = array(
		'name'               => _x( 'Stories', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Story', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Stories', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Story', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Story', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Story', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Story', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Story', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Story', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Stories', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Stories', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Stories:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Stories found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Stories found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Story' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'Story', $args );
}

add_action('wp_ajax_stories_post', 'stories_post' ); 
add_action('wp_ajax_nopriv_stories_post', 'stories_post' ); 

function stories_post()
{
    
    $stories_title = $_POST['stories_title'];
    $story_file = $_POST['story_file'];
    $story_content = $_POST['story_content'];
    $gallery_files  = $_POST['gallery_files'];
   echo  $story_ids = $_POST['story_ids'];
    
    if($story_ids == ''){
        $post_id = wp_insert_post(array(
    		  'post_title'=> $stories_title, 
    		  'post_type'=>'story', 
    		  'post_status' => 'publish', 
    		  'post_content' => $story_content
    	));
    } else 
    {
        echo $post_id = $story_ids;
        $my_post = array(
              'ID'           => $post_id,
              'post_title'   => $stories_title,
              'post_content' => $story_content,
          );
        wp_update_post( $my_post );
    }
	
	if($post_id){
	    
     	require_once( ABSPATH . 'wp-admin/includes/image.php' );
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
		require_once( ABSPATH . 'wp-admin/includes/media.php' );
		
		$files = $_FILES['story_file'];
		if($files['name'] != '')
		{
		    $file_set = array(
                'name'     => $files['name'],
                'type'     => $files['type'],
                'tmp_name' => $files['tmp_name'],
                'error'    => $files['error'],
                'size'     => $files['size']
            );

            $upload_overridess = array( 'test_form' => false );
            $uploads = wp_handle_upload($file_set, $upload_overridess);

            $filename_fe = $uploads['file'];
            $parent_post_ids = $post_id;
            $filetypes = wp_check_filetype( basename( $filename_fe ), null );
            $wp_upload_dirs = wp_upload_dir();
            $attachments = array(
                'guid'           => $wp_upload_dirs['url'] . '/' . basename( $filename_fe ), 
                'post_mime_type' => $filetypes['type'],
                'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename_fe ) ),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );

            $attach_ids = wp_insert_attachment( $attachments, $filename_fe, $parent_post_ids );
			
			require_once( ABSPATH . 'wp-admin/includes/image.php' );
             $attach_datas = wp_generate_attachment_metadata( $attach_ids, $filename_fe );
            wp_update_attachment_metadata( $attach_ids, $attach_datas );
            set_post_thumbnail( $post_id , $attach_ids );
		    
		
		}
		
	
		
		
		$files_photo = $_FILES['gallery_files'];
	//	print_r($files_photo);
		if(!empty($files_photo)){
    	    $count = 0;
            $galleryImages = array();
    	    
            foreach ($files_photo['name'] as $count => $value) {
    
                if ($files_photo['name'][$count]) {
    
                    $file = array(
                        'name'     => $files_photo['name'][$count],
                        'type'     => $files_photo['type'][$count],
                        'tmp_name' => $files_photo['tmp_name'][$count],
                        'error'    => $files_photo['error'][$count],
                        'size'     => $files_photo['size'][$count]
                    );
    
                    $upload_overrides = array( 'test_form' => false );
                    $upload = wp_handle_upload($file, $upload_overrides);
    
                    $filename = $upload['file'];
                    $parent_post_id = $post_id;
                    $filetype = wp_check_filetype( basename( $filename ), null );
                    $wp_upload_dir = wp_upload_dir();
                    $attachment = array(
                        'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                        'post_mime_type' => $filetype['type'],
                        'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                        'post_content'   => '',
                        'post_status'    => 'inherit'
                    );
    
                    $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );
    				
    				array_push($galleryImages, $attach_id);
    				require_once( ABSPATH . 'wp-admin/includes/image.php' );
                     $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                    wp_update_attachment_metadata( $attach_id, $attach_data );
                   
    			   
                }
    
                $count++;
    		} 
    		
    	
    		
        	$repeater_field = 'stories_gallery_section';
            $repeater_key = 'field_5d95745a95d6d';
            $sub_field = 'stories_gallery';
            $sub_field_key = 'field_5d95747d95d6e';
            
            $counts = count($galleryImages);
            if ($counts) {
              // the db value stored in the db for a repeater is
              // the number if rows in the repeater
              add_post_meta($post_id, $repeater_field, $counts, true);
              add_post_meta($post_id, '_'.$repeater_field, $repeater_key, true);
              for ($i=0; $i<$counts; $i++) {
               
                $sub_field_name = $repeater_field.'_'.$i.'_'.$sub_field;
                add_post_meta($post_id, $sub_field_name, $galleryImages[$i], false);
                add_post_meta($post_id, '_'.$sub_field_name, $sub_field_key, false);
              }
            }
		}
	
	
	}
    
}

add_action('wp_ajax_delete_story', 'delete_story' ); 
add_action('wp_ajax_nopriv_delete_story', 'delete_story' ); 

function delete_story()
{
    $ID = $_POST['ID'];
   $success=  wp_delete_post($ID);
   if($success)
   {
       echo "Story successfully deleted";
   }
   exit; 
    
}
// set vehicle dynamic dropdown

function ccm_set_vehicle_dropdown ( $tag, $unused ) {
         if ( $tag['name'] == 'vehicle' ) { 
            $bike_info = get_field('bike_information','user_'.get_current_user_id());
            if( !empty( $bike_info) ) {
                 $tag['raw_values'] = '';
                 $tag['labels'] = '';
                 $tag['values'] = '';
                foreach($bike_info as $info) {
                    $bike_model = $info['bike_model'];
                    $bike_regist = $info['bike_registration'];
                    $tag['raw_values'][] = $bike_model .' - '. $bike_regist;
                    $tag['labels'][]= $bike_model.' - '. $bike_regist;
                }
               
                $pipes = new WPCF7_Pipes( $tag['raw_values'] );
                $tag['values'] = $pipes->collect_befores();
                $tag['pipes'] = $pipes;
               
            }
        }
   
        return $tag;
}
add_filter( 'wpcf7_form_tag', 'ccm_set_vehicle_dropdown', 10, 2);

add_action('wp_logout','ccm_redirect_after_logout');
function ccm_redirect_after_logout(){
        $logout_url = site_url().'/ccm-login';
         wp_redirect( $logout_url );
         exit();
}
add_filter( 'woocommerce_catalog_orderby', 'ccm_change_orderby_options', 20 );

function ccm_change_orderby_options( $options ){
    $options['menu_order'] = __('Filter by bike', 'ccm');
    return $options;
}

/*19-11*/
function ccm_theme_get_catalog_ordering_args( $args ) {
  
    $orderby_value = isset( $_GET['orderby'] ) ? woocommerce_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
    if ( isset($_GET['product_type']) && !empty($_GET['product_type']) && $_GET['orderby'] != 'menu_order' ) {
        
      	$args['meta_key'] = 'ccm_product_bike_com';
      	$args['meta_value'] = $_GET['orderby'];
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';

    }
    return $args;
}

add_filter( 'woocommerce_get_catalog_ordering_args', 'ccm_theme_get_catalog_ordering_args' );

add_action( 'woocommerce_product_query', 'ccm_product_query_by_sku' );
function ccm_product_query_by_sku( $q ) {
    $category = get_queried_object();
    
    if( isset($_GET['orderby']) && !empty($_GET['orderby']) &&  !is_product_category() && $_GET['orderby'] != 'menu_order' ) {
        
        $meta_query = $q->get( 'meta_query' );
        $meta_query[] = array(
            'key'       => 'ccm_product_bike_com',
            'value'     => $_GET['orderby'],
            'compare'   => 'LIKE'
        );

        $q->set( 'meta_query', $meta_query );
    }
}
function search_filter_get_posts($query) {
    
    if(  isset($_GET['orderby']) && !empty($_GET['orderby']) && $query->query_vars['post_type'] == 'product' && !is_shop() && $_GET['orderby'] != 'menu_order' ) {
        
        $category = get_queried_object();
        $taxquery = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $category->term_id
            )
        );
        $meta_query = $query->get( 'meta_query' );
            $meta_query[] = array(
                'key'       => 'ccm_product_bike_com',
                'value'     => $_GET['orderby'],
                'compare'   => 'LIKE'
        );

        $query->set( 'meta_query', $meta_query );
        $query->set( 'tax_query', $taxquery );
    }
}
add_action( 'pre_get_posts', 'search_filter_get_posts' );


function ccm_check_orderby_product(){
    
    $category = get_queried_object();
    
    if(  is_product_category() ) {
        $tax_query = array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category->term_id
            ),
        );
    }
    $args = array(
        'post_type'  => 'product',
        'meta_query' => array(
            array(
                'key'     => 'ccm_product_bike_com',
                'value'   => $_GET['orderby'],
                'compare' => 'LIKE',
            ),
        ),
        'tax_query' => $tax_query
    );
    $query = new WP_Query( $args );
    if( empty($query->posts) && isset($_GET['product_type'])) {
        $catalog_orderby_options = apply_filters(
                'woocommerce_catalog_orderby',
                array(
                        'menu_order' => __( 'Default sorting', 'woocommerce' ),
                        'popularity' => __( 'Sort by popularity', 'woocommerce' ),
                        'rating'     => __( 'Sort by average rating', 'woocommerce' ),
                        'date'       => __( 'Sort by latest', 'woocommerce' ),
                        'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
                        'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
                )
        );
        $default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
        $orderby         = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby; // WPCS: sanitization ok, input var ok, CSRF ok.
        $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
		
        return wc_get_template('loop/orderby.php',
                                array(
				'catalog_orderby_options' => $catalog_orderby_options,
				'orderby'                 => $orderby,
				'show_default_orderby'    => $show_default_orderby,
        ));
    }
}
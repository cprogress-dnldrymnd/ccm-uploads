<?php


/*-----------------------------------------------------------------------------------*/
/* Custom Post Type
/*-----------------------------------------------------------------------------------*/

function cp_bikes()
{
    $labels = array(
        'name'               => _x('Motorcycles', 'post type general name'),
        'singular_name'      => _x('Motorcycle', 'post type singular name'),
        'add_new'            => _x('Add New', 'bike'),
        'add_new_item'       => __('Add New bike'),
        'edit_item'          => __('Edit bike'),
        'new_item'           => __('New Motorcycle'),
        'all_items'          => __('All Motorcycle'),
        'view_item'          => __('View Motorcycle'),
        'search_items'       => __('Search Motorcycle'),
        'not_found'          => __('No Motorcycle found'),
        'not_found_in_trash' => __('No Motorcycle found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Motorcycles'
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'hierarchical'  => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'page-attributes'),
        'has_archive'   => true,
    );
    register_post_type('bikes', $args);
}
add_action('init', 'cp_bikes');

function cp_defences()
{
    $labels = array(
        'name'               => _x('Defence', 'post type general name'),
        'singular_name'      => _x('Defence', 'post type singular name'),
        'add_new'            => _x('Add New', 'defence'),
        'add_new_item'       => __('Add New defence'),
        'edit_item'          => __('Edit defence'),
        'new_item'           => __('New defence'),
        'all_items'          => __('All defence'),
        'view_item'          => __('View defence'),
        'search_items'       => __('Search defences'),
        'not_found'          => __('No defence found'),
        'not_found_in_trash' => __('No defence found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Defences'
    );
    $args = array(
        'labels'        => $labels,
        'public'        => true,
        'menu_position' => 6,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive'   => true,
    );
    register_post_type('defences', $args);
}
add_action('init', 'cp_defences');


// create two taxonomies, genres and writers for the post type "book"
function create_project_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x('Bike Types', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Bike Types', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Bike Types', 'textdomain'),
        'all_items'         => __('All Bike Types', 'textdomain'),
        'parent_item'       => __('Parent Bike Type', 'textdomain'),
        'parent_item_colon' => __('Parent Bike Type:', 'textdomain'),
        'edit_item'         => __('Edit Bike Type', 'textdomain'),
        'update_item'       => __('Update Bike Type', 'textdomain'),
        'add_new_item'      => __('Add New Bike Type', 'textdomain'),
        'new_item_name'     => __('New Bike Type Name', 'textdomain'),
        'menu_name'         => __('Bike Type', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'bike-type'),
    );

    register_taxonomy('bike-type', array('bikes'), $args);
}

add_action('init', 'create_project_taxonomies', 0);

/*-----------------------------------------------------------------------------------*/
/* Custom Post Type Event
/*-----------------------------------------------------------------------------------*/

function cp_events()
{
    $labels = array(
        'name'               => _x('Events', 'post type general name'),
        'singular_name'      => _x('Events', 'post type singular name'),
        'add_new'            => _x('Add New', 'Event'),
        'add_new_item'       => __('Add New Event'),
        'edit_item'          => __('Edit Event'),
        'new_item'           => __('New Event'),
        'all_items'          => __('All Events'),
        'view_item'          => __('View Event'),
        'search_items'       => __('Search Events'),
        'not_found'          => __('No bike found'),
        'not_found_in_trash' => __('No bike found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Events'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our articles and article specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive'   => true,
        'menu_icon'     => 'dashicons-calendar-alt',
        'rewrite'       => array('slug' => 'event'),

    );
    register_post_type('events', $args);
}
add_action('init', 'cp_events');


function create_events_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x('Category', 'taxonomy general name', 'textdomain'),
        'singular_name'     => _x('Category', 'taxonomy singular name', 'textdomain'),
        'search_items'      => __('Search Category', 'textdomain'),
        'all_items'         => __('All Category', 'textdomain'),
        'parent_item'       => __('Parent Category', 'textdomain'),
        'parent_item_colon' => __('Parent Category:', 'textdomain'),
        'edit_item'         => __('Edit Category', 'textdomain'),
        'update_item'       => __('Update Category', 'textdomain'),
        'add_new_item'      => __('Add New Category', 'textdomain'),
        'new_item_name'     => __('New Category Name', 'textdomain'),
        'menu_name'         => __('Categories', 'textdomain'),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    );

    register_taxonomy('event-category', array('events'), $args);
}

add_action('init', 'create_events_taxonomies', 0);


add_action('init', 'codex_story_init');

function codex_story_init()
{
    $labels = array(
        'name'               => _x('Stories', 'post type general name', 'your-plugin-textdomain'),
        'singular_name'      => _x('Story', 'post type singular name', 'your-plugin-textdomain'),
        'menu_name'          => _x('Stories', 'admin menu', 'your-plugin-textdomain'),
        'name_admin_bar'     => _x('Story', 'add new on admin bar', 'your-plugin-textdomain'),
        'add_new'            => _x('Add New', 'Story', 'your-plugin-textdomain'),
        'add_new_item'       => __('Add New Story', 'your-plugin-textdomain'),
        'new_item'           => __('New Story', 'your-plugin-textdomain'),
        'edit_item'          => __('Edit Story', 'your-plugin-textdomain'),
        'view_item'          => __('View Story', 'your-plugin-textdomain'),
        'all_items'          => __('All Stories', 'your-plugin-textdomain'),
        'search_items'       => __('Search Stories', 'your-plugin-textdomain'),
        'parent_item_colon'  => __('Parent Stories:', 'your-plugin-textdomain'),
        'not_found'          => __('No Stories found.', 'your-plugin-textdomain'),
        'not_found_in_trash' => __('No Stories found in Trash.', 'your-plugin-textdomain')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'your-plugin-textdomain'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'Story'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'author')
    );

    register_post_type('Story', $args);
}

/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Type Club News
/*-----------------------------------------------------------------------------------*/
function cpt_club_news()
{
    $labels = array(
        'name'                  => _x('Club News', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Club News', 'Post Type Singular Name', 'text_domain'),
        'menu_name'             => __('Club News', 'text_domain'),
        'name_admin_bar'        => __('Club News', 'text_domain'),
        'archives'              => __('Club News Archives', 'text_domain'),
        'attributes'            => __('Club News Item Attributes', 'text_domain'),
        'parent_item_colon'     => __('Club News Parent Item:', 'text_domain'),
        'all_items'             => __('All Items', 'text_domain'),
        'add_new_item'          => __('Add Club News', 'text_domain'),
        'add_new'               => __('Add Club News', 'text_domain'),
        'new_item'              => __('New Club News', 'text_domain'),
        'edit_item'             => __('Edit Club News', 'text_domain'),
        'update_item'           => __('Update Club News', 'text_domain'),
        'view_item'             => __('View Club News', 'text_domain'),
        'view_items'            => __('View Club News', 'text_domain'),
        'search_items'          => __('Search Club News', 'text_domain'),
        'not_found'             => __('Not found', 'text_domain'),
        'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
        'featured_image'        => __('Featured Image', 'text_domain'),
        'set_featured_image'    => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image'    => __('Use as featured image', 'text_domain'),
        'insert_into_item'      => __('Insert into Club News', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list'            => __('Club News list', 'text_domain'),
        'items_list_navigation' => __('Club News list navigation', 'text_domain'),
        'filter_items_list'     => __('Filter Club News list', 'text_domain'),
    );
    $args = array(
        'label'               => __('Club News', 'text_domain'),
        'description'         => __('Club News', 'text_domain'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail', 'revisions'),
        'hierarchical'        => true,
        'public'              => true,
        'rewrite'             => array('slug' => 'clubnews'),
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-info',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );
    register_post_type('club-news', $args);
}
add_action('init', 'cpt_club_news', 0);


add_action('init', 'gp_register_taxonomy_for_object_type');
function gp_register_taxonomy_for_object_type()
{
    register_taxonomy_for_object_type('post_tag', 'club-news');
};

function ct_club_news_tax()
{
    register_taxonomy(
        'club-news-category',
        'club-news',
        array(
            'label'             => __('Categories'),
            'has_archive'       => true,
            'rewrite'           => array('slug' => 'club-news'),
            'hierarchical'      => true,
            'show_admin_column' => true,
        )
    );
}
add_action('init', 'ct_club_news_tax');

// CPT Templates
function cp_templates()
{
    $labels = array(
        'name'               => _x('Templates', 'post type general name'),
        'singular_name'      => _x('Template', 'post type singular name'),
        'add_new'            => _x('Add New', 'bike'),
        'add_new_item'       => __('Add New bike'),
        'edit_item'          => __('Edit bike'),
        'new_item'           => __('New template'),
        'all_items'          => __('All template'),
        'view_item'          => __('View template'),
        'search_items'       => __('Search template'),
        'not_found'          => __('No template found'),
        'not_found_in_trash' => __('No template found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Templates'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our articles and article specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array('title'),
        'has_archive'   => true,
    );
    register_post_type('templates', $args);
}

add_action('init', 'cp_templates');

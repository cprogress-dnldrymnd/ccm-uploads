<?php
function action_widgets_init()
{
	register_sidebar(
		array(
			'name'          => 'Footer Column 1',
			'id'            => 'footer_column_1',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);


	register_sidebar(
		array(
			'name'          => 'Footer Column 2',
			'id'            => 'footer_column_2',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 3',
			'id'            => 'footer_column_3',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Column 4',
			'id'            => 'footer_column_4',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Footer Bottom Left',
			'id'            => 'footer_bottom_left',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Footer Bottom Right',
			'id'            => 'footer_bottom_right',
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
}
add_action('widgets_init', 'action_widgets_init');

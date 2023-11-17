<?php


$args = array(
    'post_type' => 'templates',
    'post__in' => $template
);
$query = new WP_Query( $args );
while ( $query->have_posts() ) {
    $query->the_post();
    page_components($page_component['hide_heading']);
}
wp_reset_postdata();
?>

<div style="display: none">
    <?= $page_component['hide_heading']; ?>
</div>
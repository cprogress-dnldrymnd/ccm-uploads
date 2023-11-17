<?php
get_header();
?>
<main id="page-components" class="page-components page-components-2 <?php _e($class) ?>">
<?php
while ( have_posts() ) {
    the_post();
    page_components();
}
?>
</main>
<?php
get_footer();
?>
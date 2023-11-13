o<?php
get_header(); 
$banner = carbon_get_the_post_meta( 'n_banner' );
$banner_text = carbon_get_the_post_meta( 'n_banner_text' );
$ccm = 'https://www.ccm-motorcycles.com/wp-content/uploads/2019/05/banner.jpg';
$page_name = 'Club News';

$user = wp_get_current_user();
if($user->roles[0] == 'administrator' || $user->roles[0] == 'ccmowner') {
    $user_type = 'owner';
} else {
    $user_type = 'subscriber';
}
?>
<main class="news club-news-main club-main">
    <?php include(locate_template('/ccm-club/banner.php')); ?>
    <?php if(is_user_logged_in()) { ?>
        <section class="heading">   
            <div class="container tight width1116">
                <div class="title-box">
                    <h1 class="title">
                        CLUB NEWS
                    </h1>
                </div>
                <div class="sub-content">
                    <?php the_content() ?>
                </div>
            </div>
        </section>
        <section class="article">
            <div class="container tight width1116">
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

                while ( have_posts() ) {
                    the_post(); ?>
                    <article class="article-card blog-content">
                        <div class="image_container">
                            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <a href="<?php the_permalink(); ?>"><span class="blog-image" style="background-image:url(<?= $thumb[0] ?>)"></span></a>
                            <div class="article-content">
                                <div class="the-content">
                                    <span class="date"><?php echo get_the_date( 'd.m.y' ); ?></span>
                                    <h3><a href="<?php the_permalink(); ?>" class="blog-link"><?php the_title(); ?></a></h3>
                                    <div class="post-content">
                                        <a href="<?php the_permalink(); ?>" class="more-link">read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php } ?>
                <?php

                echo '<div class="pagination">';
                $big = 999999999;
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages
                ) );
                echo '</div>' ?>
            </div>
        </section>
    <?php } ?>
</main>
<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
<?php
/**
    *   Template Name: Blog
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header(); // This fxn gets the header.php file and renders it ?>
<?php
$banner = carbon_get_the_post_meta( 'n_banner' );
$banner_text = carbon_get_the_post_meta( 'n_banner_text' );
?>
<main class="news">
    <section class="sp-banner" style="background-image: url(<?php echo $banner; ?>)">
        <div class="banner-title"></div>
    </section>

    <section class="content">
        <div class="filters">
            <div class="container">
                <?php if( $terms = get_terms( 'category', 'orderby=name' ) ) :
                    echo '<ul id="cat-list" class="news-filter nav">';
                    foreach ( $terms as $term ) :
                        if ( $term->term_id == 1 ) {
                    continue; // skip 'uncategorized'
                }
                echo '<li><a href="javascript:void(0)" data-category="'. $term->term_id .'">' . $term->name . '</a></li>';
            endforeach;
            echo '</ul>';
        endif;
        ?>
    </div>
</div>
<section class="heading">   
    <div class="container tight width1116">
        <div class="title-box">
            <h1 class="title">
                NEWS & UPDATES
            </h1>
            .
        </div>
        <div class="sub-content">

        </div>
    </div>
</section>
<div class="news-content">
    <div class="container tight width1116">
      <div id="post-grid">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 5,
            'paged' => $paged,
        );

        $wp_query = new WP_Query($args);
        echo '<div class="row">';
        while ( have_posts() ) : the_post(); ?>
            <?php 
            $date = get_the_date();
            $title = get_the_title();
            ?>
            <div class="col-md-12">
                <article class="article-card blog-content ">
                    <div class="image_container">
                        <?php
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($wp_query->ID), 'full' );
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
                                            <h3 class="m-n"><?php echo date( 'M', strtotime( $date ) ); ?></h3>
                                            <h2 class="d-n"><?php echo date( 'd', strtotime( $date ) ); ?></h2>
                                            <h3 class="y-n"><?php echo get_the_date('Y') ?></h3>
                                        </div>
                                    </div>
                                    <!--<span class="">Date:<?php echo date( 'd, M, y', strtotime( $date ) ); ?> - <?php echo date( 'd, M, y', strtotime( $end ) ); ?> Time: <?php echo date( 'H:i', strtotime( $date ) ); ?> - <?php echo date( 'H:i', strtotime( $end ) ); ?></span>-->
                                </div>
                                <div class="col-xs-9 pl-0">
                                    <h3><a href="<?php the_permalink(); ?>"><?= $title ?></a></h3>
                                    <!--<h3><a href="<?php the_permalink(); ?>" class="blog-link"><?php echo get_the_title($wp_query->ID); ?></a></h3>          -->
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php endwhile; ?>


    </div>
    <?php 
    echo '<div class="pagination">';
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links( array(
                            'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                            'format' => '?paged=%#%',
                            'current' => max( 1, get_query_var('paged') ),
                            'total' => $wp_query->max_num_pages
                        ) );
                        echo '</div>' ?>
                    </div>
                </div>
            </section>
        </main>
        <?php get_footer(); // This fxn gets the footer.php file and renders it ?>
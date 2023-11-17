<?php
/**
    *   Template Name: Events
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
    <section class="sp-banner " style="background-image: url(<?php echo $banner; ?>)">
        <div class="banner-title"><h2>Events</h2></div>
    </section>
    <section class="content">
        <div class="filters">
            <div class="container">
                <?php if( $terms = get_terms( 'event-type', 'orderby=name'  ) ) :
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
        <div class="news-content">
            <div class="container">
				<div class="events-holder">
					We have lots of great events that we hope to attend later in the year including The Goodwood Festival of Speed, The MCN Festival, Motorcycle Live and much more once the current pandemic has passed. Watch this space for the latest updates
				</div>
              <div id="post-grid">
                <?php
                $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                $args = array(
                'post_type' => 'events',
                'posts_per_page' => 5,
                'paged' => $paged,
                );
                $wp_query = new WP_Query($args);
                echo '<div class="row">';
                    while ( have_posts() ) : the_post(); 
                    $start = carbon_get_the_post_meta( 'date' ); 
                    $end = carbon_get_the_post_meta('expiry_date');
                    ?>
                    <article class="article-card blog-content">
                        <div class="image_container">
                            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
                            <?php if($thumb): ?>
                            <a href="<?php the_permalink(); ?>"><span class="blog-image" style="background-image: url(http://ccmstaging.theprogressteam.co.uk/wp-content/uploads/2019/03/banner.jpg)"></span></a>
                            <?php endif;?>
                            <div class="article-content ">
                                <span class=" date"><?php echo $start; ?></span>
                                <h3><a href="<?php the_permalink(); ?>" class="blog-link"><?php the_title(); ?></a></h3>
                                <div class="post-content">
                                    <a href="<?php the_permalink(); ?>" class="more-link">read more</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    <?php endwhile;
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
            </div>
        </section>
    </main>
    <?php get_footer(); // This fxn gets the footer.php file and renders it ?>
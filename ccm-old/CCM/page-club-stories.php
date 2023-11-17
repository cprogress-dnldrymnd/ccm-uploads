<?php
/**
    *   Template Name: CLUB CCM: Stories
*
    *   This page template has a sidebar built into it,
    *   and can be used as a home page, in which case the title will not show up.
*
*/
get_header();
$user_image= get_avatar( $current_user->ID);
$page_name = 'Stories';

$user = wp_get_current_user();
if($user->roles[0] == 'administrator' || $user->roles[0] == 'ccmowner') {
    $user_type = 'owner';
} else {
    $user_type = 'subscriber';
}
?>
<main class="news careers page-template-page-owners club-main">
    <?php include(locate_template('/ccm-club/banner.php')); ?>
    <?php if(is_user_logged_in()) { ?>
        <section class="heading">   
            <div class="container tight width1116">
                <div class="title-box">
                    <h1 class="title">
                        OWNERS' STORIES
                    </h1>
                </div>
                <div class="sub-content">
                    <?php the_content() ?>
                </div>
            </div>
        </section>
        <section class="owner-stories-sec">
            <div class="container tight width1116">
                <div class="">
                    <div id="stories">
                        <div class="owner-stories">
                            <div class="row">
                                <?php 
                                $latest_story = array(
                                    'posts_per_page' => 1,
                                    'post_type' => 'story',
                                    'meta_query' => array(
                                        array(
                                            'key'     => 'active_story',
                                            'value'   => 'active',
                                            'compare' => 'LIKE',
                                        ),
                                    ),
                                );

                                $s_query = new WP_Query( $latest_story );
                                if ( $s_query->have_posts() ) { 
                                    while ( $s_query->have_posts() ) {
                                        $s_query->the_post(); 

                                        $author = get_field('story_author');
                                        $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($s_query->ID),'full');
                                        $pfx_date = get_the_date( 'Y-M-d', $s_query->ID );
                                        $ex_date=explode('-',$pfx_date);
                                        $active_story = get_field( "active_story" );


                                        ?>
                                        <div class="col-sm-1 pr-0">
                                            <div class="m-d-y-a-name">
                                                <div class="m-d-y">
                                                  <h3 class="m-n"><?php echo $ex_date[1]; ?></h3>
                                                  <h2 class="d-n"><?php echo $ex_date[2]; ?></h2>
                                                  <h3 class="y-n"><?php echo $ex_date[0]; ?></h3>
                                              </div>
                                              <div class="a-name">
                                                <span><?php echo $author; ?></span>
                                            </div>
                                        </div>
                                        <div class="img-author">
                                            <?php echo $user_image; ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-9 pr-0">
                                        <a title="Read more" class="story-tile" href="<?php echo get_the_permalink($the_query->ID);?>"><div class=" bg-os">
                                            <div class="row">
                                                <div class="col-xs-5 pr-0">
                                                    <div class="left-side-o">
                                                        <img src="<?= $thumbnail_url[0] ?>"  alt="">
                                                    </div>
                                                </div>
                                                <div class="col-xs-7">
                                                    <div class="right-side-o">
                                                        <h2><?php echo get_the_title($s_query->ID); ?></h2>
                                                        <p><?php 
                                                        $contents = get_the_content($s_query->ID);
                                                        $trimmed_content = wp_trim_words( $contents, 70, NULL );
                                                        echo $trimmed_content;
                                                        ?> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div></a>
                                    </div>
                                    <?php


                                } } ?>


                                <div class="col-sm-2">
                                    <div class="s-y-s" data-toggle="modal" data-target="#myModal"  data-keyboard="false">
                                        <div class="the-share-button">
                                            <span><i class="fas fa-share-alt-square"></i>SHARE YOUR STORY</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <?php 
                            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;




                            $current_page = get_query_var('paged');
                            $current_page = max( 1, $current_page );

                            $per_page = 10;
                            $offset_start = 1;
                            $offset = ( $current_page - 1 ) * $per_page + $offset_start;

                            $args_story = array(
                                'post_type' => 'story',
                                'posts_per_page' => $per_page,
                                'paged'          => $current_page,
                                'offset'         => $offset,
                                'meta_query' => array(
                                    array(
                                        'key'     => 'active_story',
                                        'value'   => 'active',
                                        'compare' => 'LIKE',
                                    ),
                                ),

                            );
                            $the_query = new WP_Query( $args_story );
                            $total_rows = max( 0, $the_query->found_posts - $offset_start );
                            $total_pages = ceil( $total_rows / $per_page );
                            if ( $the_query->have_posts() ) {
                               $count=1;

                               while ( $the_query->have_posts() ) {
                                   $the_query->the_post();


                                   if($count == 1)
                                   {
                                    echo '<div class="row mb-30 story_section">';
                                }

                                $author = get_field('story_author');
                                $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($the_query->ID),'full');
                                $pfx_date = get_the_date( 'Y-M-d', $the_query->ID );
                                $ex_date=explode('-',$pfx_date);


                                ?>

                                <div class="col-sm-6 col-xs-6">
                                    <div class="row">
                                        <div class="col-sm-2 pr-0">
                                            <div class="m-d-y-a-name">
                                                <div class="m-d-y">
                                                    <h3 class="m-n"><?php echo $ex_date[1]; ?></h3>
                                                    <h2 class="d-n"><?php echo $ex_date[2]; ?></h2>
                                                    <h3 class="y-n"><?php echo $ex_date[0]; ?></h3>
                                                </div>
                                                <div class="a-name">
                                                    <span><?php echo $author; ?></span>
                                                </div>
                                            </div>
                                            <div class="img-author">
                                                <?php echo $user_image; ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-10">
                                            <a title="Read more" class="story-tile" href="<?php echo get_the_permalink($the_query->ID);?>"><div class="o-s">
                                                <div class="row">
                                                    <div class="col-md-7 pr-0">
                                                        <div class="left-side-o">
                                                            <img src="<?= $thumbnail_url[0] ?>" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="right-side-o">
                                                            <h2><?php echo get_the_title($the_query->ID); ?></h2>
                                                            <p><?php 
                                                            $contentss = get_the_content($the_query->ID);
                                                            $trimmed_contents = wp_trim_words( $contentss, 40, NULL );
                                                            echo $trimmed_contents;
                                                            ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></a>
                                        </div>
                                    </div>
                                </div>


                                <?php 

                                $count++;
                                if($count == '3')
                                {
                                    echo '</div>';
                                    $count = 1;
                                } 


                            }  }
                            ?>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pagination-stories">
                                      <div class="pagination">
                                       <?php 
                                       echo paginate_links( array(
                                          'total'   => $total_pages,
                                          'current' => $current_page,
                                      ) );
                                      ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>
  </section>
<?php }   ?>

<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content story-popup">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">YOUR STORY</h2>

          </div>
          <div class="modal-body">
              <?php echo do_shortcode('[contact-form-7 id="2761" title="Stories Form"]');  ?>
          </div>
      </div>
  </div>
</div>

<script>
    function openTab(evt, tabname) {
        console.log(tabname);

        if (tabname == 'Events') {
            jQuery('.careers-sc-one').addClass('event_tab');
        }
        else {
            jQuery('.careers-sc-one').removeClass('event_tab');
        }
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tabname).style.display = "block";
            evt.currentTarget.className += " active";
        }

        /*  var id_form = $('.forum_form .bbp-body ul').attr('id');
            var id_formQues = id_form.split("-");
            $('.forum_form .bbp-forums li a').attr('href','http://ccmstaging.theprogressteam.co.uk/owners-club/?fourms='+id_formQues[2]);

            $('.forum_form .bbp-breadcrumb a').each(function() {
                var a_link=$(this).attr('href');
                var includelink = a_link.includes("forums");
                console.log(includelink);
                if(includelink)
                {
                  $(this).attr('href','http://ccmstaging.theprogressteam.co.uk/owners-club/?fourmAll=1');
                }
            }); */
            jQuery('#myModal').modal({
                show: false,
                keyboard: false,
                backdrop: 'static' 
                
            })  
        </script>

    </main>


    <?php get_footer(); // This fxn gets the footer.php file and renders it ?>
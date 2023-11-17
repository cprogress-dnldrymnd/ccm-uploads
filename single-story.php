<?php 
/**
 *  
 *
 *  This page template has a sidebar built into it, 
 *  and can be used as a home page, in which case the title will not show up.
 *
*/
get_header(); // This fxn gets the header.php file and renders it 


global $wp;
$current_user = wp_get_current_user();
$current_url= home_url( $wp->request );
$user_image= get_avatar( $current_user->ID);
$thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');

$pfx_date = get_the_date( 'Y-M-d', $post->ID );
$ex_date=explode('-',$pfx_date);
$page_name = 'Stories';
$video_embed = get_field('embed_video');
$author = get_field('story_author');
?>


<main class="news careers page-template-page-owners club-main">
    <?php include(locate_template('/ccm-club/banner.php')); ?>
    <?php if(is_user_logged_in()) { ?>

        <section class="content innerpadding story-desc xlarge">
            <div class="timeline-list">
                <div class="row">
                    <div class="col-md-12">
                        <div class="action-edit">
                            <a class="edit_story " data-toggle="modal" data-target="#editstory"><img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/10/001-pencil.png"></a>
                            <a onclick="delete_post(<?= $post->ID; ?>)" class="delete_story "><img src="https://www.ccm-motorcycles.com/wp-content/uploads/2019/10/002-cancel-button.png"></a>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-2">
                        <div class="m-d-y-a-name">
                            <div class="m-d-y">
                                <h3 class="m-n"><?= $ex_date[1]; ?></h3>
                                <h2 class="d-n"><?= $ex_date[2]; ?></h2>
                                <h3 class="y-n"><?= $ex_date[0]; ?></h3>
                            </div>
                        </div>
                        <div class="img-author">
                            <?= $user_image; ?>
                        </div>

                    </div>
                    <div class="col-md-10">
                        <div class="box" style="background-image:url('<?= $thumbnail_url[0] ;?>')">
                            <div class="head-left">
                                <h2>
                                 <?= $post->post_title; ?>
                             </h2>
                             <span class="separator"></span>
                             <span class="name-a">
                                <?= $author;  ?>
                            </span>
                        </div>
                    </div>
                    <p><?= wpautop($post->post_content) ?>.</p>

                    <div class="video">
                        <div class="video-clip">
                            <?= $video_embed ?>
                        </div>
                    </div>
                    <div class="text-center back-to">
                        <a href="<?= site_url('stories') ; ?>" class="btn">Back to Stories</a>
                        <a class="btn" data-toggle="modal" data-target="#myModal"  data-keyboard="false">
                            <i class="fas fa-share-alt-square"></i>SHARE YOUR STORY
                        </a>
                    </div>

                    <div class="success_msg"></div>
                </div>

            </div>
        </div>

    </section>   
    <div class="modal" id="editstory">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Edit Story</h4>
                  <input type="hidden" name="story_ids" value="<?= $post->ID ?>">
                  <input type="hidden" name="story_name" value="<?= $post->post_title; ?>">
                  <input type="hidden" name="story_description" value="<?= $post->post_content; ?>">

              </div>
              <div class="modal-body">
                  <?= do_shortcode('[contact-form-7 id="2761" title="Stories Form"]');  ?>
              </div>
              <div class="modal-footer hidden">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
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
<?php } ?>

</main>


<script>

    jQuery('.edit_story').click(function()
    {
        jQuery('#editstory').find('form').attr('id','story_id');
        var ID = jQuery('input[name="story_ids"]').val();
        var name = jQuery('input[name="story_name"]').val();
        var des = jQuery('input[name="story_description"]').val();
        jQuery('input[name="stories_title"]').val(name);
        jQuery('input[name="story_content"]').val(des);

        var doc = document.getElementById('story_content_ifr').contentWindow.document;
        doc.open();

        doc.write('<p>'+des+'</p>');
        doc.close();
        jQuery('#editstory').find('form').append('<input type="hidden" name="story_ids" value="'+ID+'">');

    });

    function delete_post(id)
    {
        var ajaxurl = '<?= admin_url('admin-ajax.php'); ?>';
        jQuery.ajax({
          url: ajaxurl,
          type: 'POST',
          data: {
            action: 'delete_story',
            ID : id
        },
        success: function(data) {
          jQuery('.success_msg').html(data);
          setTimeout(function(){ 
           window.location.href = "https://www.ccm-motorcycles.com/stories";  }, 500);
      }
  });
    }
    
</script>






<?php get_footer(); // This fxn gets the footer.php file and renders it ?>
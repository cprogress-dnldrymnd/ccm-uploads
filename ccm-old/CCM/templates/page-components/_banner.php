<?php 
$heading = $page_component['heading'];
$logo = $page_component['logo'];
$background = $page_component['background'];
$style = $page_component['style'];
$subheading = $page_component['subheading'];
$button_text = $page_component['button_text'];
$button_link = $page_component['button_link'];
$background_type = $page_component['background_type'];
$embed_id = $page_component['embed_id'];

$mime_type =  get_post_mime_type($background);
if(strpos($mime_type, 'image') !== false) {
    $bg_image = 'style="background-image: url('.wp_get_attachment_url($background).')"';
}

?>


<?php if($style == 'style-2') { ?>
    <section class="hero-banner hero-banner-video hero-banner-new-style <?= $background_type == 'embed' ? 'video-embed' : '' ?>" <?= $bg_image ?> id="<?= $section_id ?>">
        <?php if($background_type == 'embed') { ?>
            <div class="iframe-holder">
                <iframe frameborder="0"height="100%"width="100%"src="https://www.youtube.com/embed/<?= $embed_id ?>?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&rel=0&playlist=<?= $embed_id ?>">
                </iframe>
            </div>
            <?php if(strpos($mime_type, 'video') !== false) {?>
                <video id="video"autoplay muted loop playsinline preload="metadata" src="<?= wp_get_attachment_url($background) ?>">

                </video>
            <?php } else {  ?>
                <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
            <?php } ?>
        <?php } else { ?>
            <?php if(strpos($mime_type, 'video') !== false) {?>
                <video id="video"autoplay muted loop playsinline preload="metadata" src="<?= wp_get_attachment_url($background) ?>">

                </video>
            <?php } else {  ?>
                <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
            <?php } ?>
        <?php } ?>

        <div class="contents cta-style with-overlay">
            <div class="container <?= $container_width ?>">
                <div class="outer">
                    <div class="inner float-left d-flex">
                        <?php if($heading) { ?>
                            <h1> <?= $heading ?> </h1>
                        <?php } ?>
                        <?php if($subheading) { ?>
                            <div class="text-box">
                                <span><?= $subheading ?></span>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if($button_text || $button_text_2) { ?>
                        <div class="inner float-right d-flex button-group">
                            <?php if($button_text) { ?>
                                <a class="pc-btn anchor-modal" data-target="<?= $button_link ?>"><?= do_shortcode($button_text) ?></a>
                            <?php } ?>
                            <?php  
                            if(get_post_type() == 'bikes')  { 
                                echo do_shortcode( '[phone_number class="white desktop-only" dynamic="1"]' );
                            }
                            ?>
                        </div>

                    <?php } ?>



                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="page-banner img cvr ctr v2 <?= $background_type == 'embed' ? 'video-embed' : '' ?>" <?= $bg_image ?> id="<?= $section_id ?>">
        <?php if($background_type == 'embed') { ?>
            <div class="iframe-holder">
                <iframe frameborder="0"height="100%"width="100%"src="https://www.youtube.com/embed/<?= $embed_id ?>?autoplay=1&mute=1&controls=0&showinfo=0&autohide=1&loop=1&rel=0&playlist=<?= $embed_id ?>">
                </iframe>
            </div>
            <?php if(strpos($mime_type, 'video') !== false) {?>
                <video id="video"autoplay muted loop playsinline preload="metadata" src="<?= wp_get_attachment_url($background) ?>">

                </video>
            <?php } else {  ?>
                <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
            <?php } ?>
        <?php } else { ?>
            <?php if(strpos($mime_type, 'video') !== false) {?>
                <video id="video"autoplay muted loop playsinline preload="metadata" src="<?= wp_get_attachment_url($background) ?>">

                </video>
            <?php } else {  ?>
                <img alt="banner" data-src="<?= wp_get_attachment_image_url($background, 'full') ?>" class=" ls-is-cached lazyloaded" src="<?= wp_get_attachment_image_url($background, 'full') ?>">
            <?php } ?>
        <?php } ?>
            <div class="container <?= $container_width ?>">
                <div class="inner">
                    <?php if($heading) { ?>
                        <div class="top heading text-center v2">
                            <span>
                                <?= $heading ?>
                            </span>
                        </div>
                    <?php } ?>

                    <?php if($style == 'style-3') { ?>
                        <div class="bottom heading  v2 text-center">
                            <?php if($subheading) { ?>
                                <span><?= $subheading ?></span>
                            <?php } ?>
                        </div>
                    <?php } else { ?>
                        <?php if($logo) { ?>
                            <div class="bottom v2">
                                <img src="<?= wp_get_attachment_image_url($logo, 'medium') ?>" alt="image">
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <span class="vertical-line"></span>
        </section>
        <?php } ?>
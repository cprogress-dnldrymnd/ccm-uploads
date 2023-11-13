<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="X-UA-Compatible" content="IE=9">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="author" content="">
  <meta name="format-detection" content="telephone=no">
	<meta name="facebook-domain-verification" content="x7s2nf6ay160td6uq7desxzfv9zz2t" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:200,300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="icon" href="assets/images/favicon.ico">
  <title>
   <?php bloginfo('name'); // show the blog name, from settings ?> | 
   <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page ?>
 </title>

 <link rel="profile" href="http://gmpg.org/xfn/11" />
 <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
 <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,500,600" rel="stylesheet">
	<!-- start webpush tracking code --> 
<script type='text/javascript'> var _at = {}; window._at.track = window._at.track || function(){(window._at.track.q = window._at.track.q || []).push(arguments);}; _at.domain = 'www.ccm-motorcycles.com/';_at.owner = 'be2712d5eff8';_at.idSite = '25586';_at.attributes = {};_at.webpushid = 'web.2.aimtell.com';(function() { var u='//s3.amazonaws.com/cdn.aimtell.com/trackpush/'; var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'trackpush.min.js'; s.parentNode.insertBefore(g,s); })();</script>
<!-- end webpush tracking code -->
 <!-- Google Tag Manager -->
 <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
 j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MKB42LM');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
<style>

.product-item-handler{
  padding:20px 0;
}

.mid-section{
  background: #fdfdfd;
  padding: 40px 0;
}

.product-item-handler .related .products .button, .woocommerce ul.products li.product .button{
  background: #ed383f;
  color: #fff;
  font-size: 14px;
  padding: 15px 25px;
}

.woocommerce span.onsale{
  width: 50px;
  height: 50px;
  font-size: 13px;
  box-shadow: 1px 1px 6px #949393;
  background-color: #ed383f;
}

h1{
 border-bottom: solid 2px #222;
}

.woocommerce-loop-product__title{
 font-size:22px!important;
}

.woocommerce ul.products li.product .price{
 font-size: 14px;
 color:#222;
}

h1, h2, h3, h4, h5{
 font-family: "Barlow Semi Condensed Extrabold Italic", "Helvetica Neue Light", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
 color:#222;
}

.product-name-handler{
  font-family: "Barlow Semi Condensed Extrabold Italic", "Helvetica Neue Light", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
  color: #222;
  border-bottom: solid 2px #222;
  padding: 15px;
  margin-bottom: 40px;
  border-radius: 3px;
  margin-top:0;
}

.product-name-handler h1{
  margin:0;
}

.product-item-handler .woocommerce-Price-amount{
  color: #08368e;
  font-size: 22px;
}

.product-item-handler .woocommerce-product-details__short-description p{
  font-size: 16px;
}

.product-item-handler .cart .button{
  background: #ed383f!important;
  font-size: 16px;
  padding: 15px 30px;
  text-transform: uppercase;
}

.product-item-handler .woocommerce .quantity .qty{
  font-size: 16px;
  padding: 0;
  height: 46px;
}

.product-item-handler .flex-control-thumbs{
  margin-top: 20px!important;
  margin-bottom:40px!important;
}

.woocommerce div.product .woocommerce-product-gallery--columns-4 .flex-control-thumbs li:nth-child(4n+1){
  clear:none!important;
}

.product-item-handler .flex-control-thumbs li img{
  margin: 0!important;
  width: 55%!important;
  margin-left: auto!important;
  margin-right: auto!important;
}

.product-item-handler .flex-control-thumbs li{
  width: 18%!important;
  border: solid 1px!important;
  margin: 0 5px!important;
  padding: 5px!important;
  margin-bottom:5px!important;
}

.post-banner{
  background-image: url(/wp-content/uploads/2018/02/news-and-updates-bg-1.png);
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding-top: 60px;
  padding-bottom: 30px;
}

.post-banner h1{
 color: #fff;
 border-bottom: 0;
 position:relative;
}

.post-banner h1:before{
  content:"";
  position:absolute;
  width:1px;
  height:30px;
  background:#fff;
  bottom:-30px;
}

.bike-previews img {
  max-height: 100px;
  margin: 0 auto 10px;
}

.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a {
  color: #000;
}

.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a:hover {
  color: #dc3524;
}

.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a:focus {
  color: #dc3524;
}

.mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a:active {
  color: #dc3524;
}

</style>


  <!--[if lte IE 9]>
        <link href="stylesheets/non-responsive.css" rel="stylesheet" />
      <![endif]-->

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-41122759-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-41122759-1');
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics NEW -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151976546-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-151976546-1');
        </script>
        <meta name="p:domain_verify" content="e81daae2849082514801125ab6971650"/>

        <!--YouTube AdSense Script-->
        <script data-ad-client="ca-pub-2753165670517691" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!--End of YouTube AdSense Script-->
      </head>




      <style type="text/css">
      .mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb p, .mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a {
        padding: 0 20px;
      }
    </style>

    <?php $cat_class = is_product_category() ? 'product-cat-wrap' : ''; ?>
    <?php $cat_class = is_shop() || is_product_category() ? 'product-grid-wrap' : ''; ?>
    <body <?php body_class($cat_class); ?> >

  <!--[if lt IE 9]>
        <div id="browser-notification" class="alert alert-danger">
            <div class="container">
                We are sorry but it looks like your <a href="http://www.whatbrowser.org/intl/en_us/" target=_blank>browser</a> doesn't support our website features. In order to get the full experience please download a new version of <a title="Download Chrome" href="http://www.google.com/chrome/" target=_blank>Chrome</a>, <a title="Download Safari" href="http://www.apple.com/safari/download/" target=_blank>Safari</a>, <a title="Download Firefox" href="http://www.mozilla.com/firefox/" target=_blank>Firefox</a>, or <a title="Download Internet Explorer" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target=_blank>Internet Explorer</a>.
            </div>
        </div>
      <![endif]-->

        <?php 
        $logo = carbon_get_theme_option( 'cv_logo' ); 
        ?>
        <div id="sticky-anchor" style="height: 0px;"></div>
        <header id="ccm-header">
          <nav class="navbar navbar-static-top">
           
            <div class="container-fluid">
              <div class="navbar-header visible-xs visible-sm">
                <div class="flag-holder">
                  
                  <?php echo do_shortcode('[gtranslate]'); ?>
                </div>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo $logo; ?>" class="img-responsive"/></a>
              </div>
              <div id="navbar" class="collapse navbar-collapse">
                <div class="row">
                  
                 <div class="col-md-7 mega-menu-col" >
                  <a class="navbar-brand hidden-xs hidden-sm" href="http://www.ccm-motorcycles.com"><img src="http://www.ccm-motorcycles.com/wp-content/uploads/2018/02/logo.png" class="img-responsive"></a>
                  <?php do_shortcode('[mega_nav nav_name="left"]'); ?>
                  <?php do_shortcode('[mega_nav_left nav_name="left_menu"]'); ?>
                  <?php
                        // wp_nav_menu( array(
                            // 'menu'              => 'left-main',
                            // 'theme_location'    => 'left-main',
                            // 'depth'             => 2,
                            // 'container'         => false,
                            // 'menu_class'        => 'nav navbar-nav nav-menu-handler',
                            // 'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            // 'walker'            => new WP_Bootstrap_Navwalker())
                         // );
                  ?>
                </div>
                
                <div class="col-md-5 f-d" >
                  <?php
                  wp_nav_menu( array(
                    'menu'              => 'right',
                    'theme_location'    => 'right',
                    'depth'             => 2,
                    'container'         => false,
                    'menu_class'        => 'nav navbar-nav nav-menu-handler',
                    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'            => new WP_Bootstrap_Navwalker())
                );
                ?>
                <div class="flags-desktop">
                  <div class="op1">
                   
                    <?php echo do_shortcode('[gtranslate]'); ?>
                  </div>
                </div>
                <div class="club-ccm-menu">
                  <a href="https://www.ccm-motorcycles.com/club-ccm/">CLUB CCM</a>
                </div>
              </div>
            </div>
          </div> <!--/.nav-collapse -->
        </div>
      </nav>
    </header>
    <?php if( is_shop() || is_product_category() ) {
      $banner = carbon_get_the_post_meta( 'sp_banner' );
      if( is_product_category() ) {
        $term = get_queried_object();
        $banner_array = get_field('ccm_category_banner_image',$term);
        $banner = $banner_array['url'];
        
      }
      $banner_src = !empty($banner) ? $banner : get_template_directory_uri().'/app/assets/images/accessories_banner.png';
      ?>
      <main class="news careers fourm_header accessories-banner">
        <section class="sp-banner" style="background-image: url('<?php echo $banner_src; ?>')">
         <div class="container">
          <h2>
            <?php if( is_shop() ) { 
              echo 'Accessories';
            } else { 
              the_title(); }
            ?></h2>
          </div>
        </section>
        <nav class="navbar">
          <div class="container">
            <?php 
            wp_nav_menu( array(
              'menu'              => 'shop-menu',
              'depth'             => 2,
              'container'         => false,
              'menu_class'        => 'nav navbar-nav'
            )
          );
          ?>
        </div>
      </nav>
    </main>
  <?php } ?>

  <?php
  if(is_bbpress()){
    $pagename = get_query_var('pagename');  

    $current_user = wp_get_current_user();
    $username= $current_user->user_firstname ;
    $logouturl=wp_logout_url();
    $user_content="<h3>Owners' Club</h3>
    <span>Welcome back, ".$username. "</span><span class='sign_outbanner' style='float:right;'><span class='notYou'>Not you?</span> <a href=" .$logouturl.">Sign Out</a></span>";

    if(is_user_logged_in()) {
     $content_user = $user_content;
     $bannerContent = 'bannerContenttext';
   }
   else 
   {
     $content_user= 'test';
     $bannerContent = '';
   }


   ?>


   <main class="news careers  page-template-page-owners">
     <section class="sp-banner" style="background-image: url('http://ccmstaging.theprogressteam.co.uk/wp-content/uploads/2019/03/banner.jpg')">
      <div class="banner-title">
       <div class="banner_content <?php echo $bannerContent; ?>"><?php echo $content_user; ?></div>
     </div>
   </section>
   <?php if(!is_user_logged_in()) { ?>
     <div class="bottom_banner"></div>
   <?php } ?>
   
   <?php if(is_user_logged_in()) { ?>
    <div class="tabing_btn">
     <div class="container-fluid">
       <div class="tab row">
         <button class="tablinks" onclick="location.href='/club-ccm';">Overview</button>
         <button class="tablinks" onclick="location.href='/events';">Events</button>
         <button class="tablinks" onclick="location.href='/book-a-service';">Book A Service</button>
         <button class="tablinks  active" onclick="location.href='/forum';">Forum</button>
         <button class="tablinks" onclick="location.href='/stories';">Stories</button>
       </div>
     </div>
   </div>
 <?php	} ?>
</main>
<?php } ?>

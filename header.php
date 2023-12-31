<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=9">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="">
    <meta name="format-detection" content="telephone=no">
    <meta name="facebook-domain-verification" content="x7s2nf6ay160td6uq7desxzfv9zz2t" />

    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:200,300,400,500,600,700,800,900"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/d6cae1a8f6.js" crossorigin="anonymous"></script>
    <title>
        <?php bloginfo('name'); // show the blog name, from settings 
        ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page 
        ?>
    </title>

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Homemade+Apple" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:400,500,600" rel="stylesheet">
    <meta name="p:domain_verify" content="86cca4d34bdeaa262ef2ab86ce24dee9" />
    <!-- Facebook Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '265318043901425');
        fbq('track', 'PageView');
    </script>
    <!-- start webpush tracking code -->
    <script type='text/javascript'>
        var _at = {};
        window._at.track = window._at.track || function () {
            (window._at.track.q = window._at.track.q || []).push(arguments);
        };
        _at.domain = 'www.ccm-motorcycles.com/';
        _at.owner = 'be2712d5eff8';
        _at.idSite = '25586';
        _at.attributes = {};
        _at.webpushid = 'web.2.aimtell.com';
        (function () {
            var u = '//s3.amazonaws.com/cdn.aimtell.com/trackpush/';
            var d = document,
                g = d.createElement('script'),
                s = d.getElementsByTagName('script')[0];
            g.type = 'text/javascript';
            g.async = true;
            g.defer = true;
            g.src = u + 'trackpush.min.js';
            s.parentNode.insertBefore(g, s);
        })();
    </script>
    <!-- end webpush tracking code -->
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=265318043901425&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Google Tag Manager -->

    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start':

                    new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],

                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =

                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);

        })(window, document, 'script', 'dataLayer', 'GTM-MGZQQRX');
    </script>

    <!-- End Google Tag Manager -->
    <!--Start of Tawk.to Script-->
    <!--<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e2afd898e78b86ed8aae8f0/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>-->
    <!--End of Tawk.to Script-->
    <?php wp_head(); ?>

    <?php if (get_the_ID() == 2) { ?>
        <style>
            @keyframes bounce {

                0%,
                20%,
                50%,
                80%,
                100% {
                    -ms-transform: translateY(0);
                    -moz-transform: translateY(0);
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                }

                40% {
                    -ms-transform: translateY(-30px);
                    -moz-transform: translateY(-30px);
                    -webkit-transform: translateY(-30px);
                    transform: translateY(-30px);
                }

                60% {
                    -ms-transform: translateY(-15px);
                    -moz-transform: translateY(-15px);
                    -webkit-transform: translateY(-15px);
                    transform: translateY(-15px);
                }
            }
        </style>
    <?php } ?>
    <style>
        .woocommerce form .form-row select.input-text {
            border: 1px solid #ECECEC;
            background-color: #ECECEC;
            height: 50px;
        }

        .product-item-handler {
            padding: 20px 0;
        }

        .mid-section {
            background: #fdfdfd;
            padding: 40px 0;
        }

        .product-item-handler .related .products .button,
        .woocommerce ul.products li.product .button {
            background: #ed383f;
            color: #fff;
            font-size: 14px;
            padding: 15px 25px;
        }

        .woocommerce span.onsale {
            width: 50px;
            height: 50px;
            font-size: 13px;
            box-shadow: 1px 1px 6px #949393;
            background-color: #ed383f;
        }

        h1 {
            border-bottom: solid 2px #222;
        }

        .woocommerce-loop-product__title {
            font-size: 22px !important;
        }

        .woocommerce ul.products li.product .price {
            font-size: 14px;
            color: #222;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Barlow Semi Condensed Extrabold Italic", "Helvetica Neue Light", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
            color: #222;
        }

        .product-name-handler {
            font-family: "Barlow Semi Condensed Extrabold Italic", "Helvetica Neue Light", "Helvetica Neue", "Helvetica", "Arial", sans-serif;
            color: #222;
            border-bottom: solid 2px #222;
            padding: 15px;
            margin-bottom: 40px;
            border-radius: 3px;
            margin-top: 0;
        }

        .product-name-handler h1 {
            margin: 0;
        }

        .product-item-handler .woocommerce-Price-amount {
            color: #08368e;
            font-size: 22px;
        }

        .product-item-handler .woocommerce-product-details__short-description p {
            font-size: 16px;
        }

        .product-item-handler .cart .button {
            background: #ed383f !important;
            font-size: 16px;
            padding: 15px 30px;
            text-transform: uppercase;
        }

        .product-item-handler .woocommerce .quantity .qty {
            font-size: 16px;
            padding: 0;
            height: 46px;
        }

        .product-item-handler .flex-control-thumbs {
            margin-top: 20px !important;
            margin-bottom: 40px !important;
        }

        .woocommerce div.product .woocommerce-product-gallery--columns-4 .flex-control-thumbs li:nth-child(4n+1) {
            clear: none !important;
        }

        .product-item-handler .flex-control-thumbs li img {
            margin: 0 !important;
            width: 55% !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .product-item-handler .flex-control-thumbs li {
            width: 18% !important;
            border: solid 1px !important;
            margin: 0 5px !important;
            padding: 5px !important;
            margin-bottom: 5px !important;
        }

        .post-banner {
            background-image: url(/wp-content/uploads/2018/02/news-and-updates-bg-1.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 60px;
            padding-bottom: 30px;
        }

        .post-banner h1 {
            color: #fff;
            border-bottom: 0;
            position: relative;
        }

        .post-banner h1:before {
            content: "";
            position: absolute;
            width: 1px;
            height: 30px;
            background: #fff;
            bottom: -30px;
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

        .mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb p,
        .mega-menu-col .navbar-nav li .mega-menu .megamenu-breadcrumb a {
            padding: 0 20px;
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
    <meta name="p:domain_verify" content="e81daae2849082514801125ab6971650" />
    <!--YouTube AdSense Script-->
    <script data-ad-client="ca-pub-2753165670517691" async
        src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!--End of YouTube AdSense Script-->
</head>
<?php $cat_class = is_product_category() ? 'product-cat-wrap' : ''; ?>
<?php $cat_class = is_shop() || is_product_category() ? 'product-grid-wrap' : ''; ?>
<?php $user = wp_get_current_user(); ?>
<?php
$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
$product_term = '';
if ($term) {
    $product_term = 'product_term="' . $term->slug . '"';
}
?>
<?php if (in_array('ccm_owner', (array) $user->roles)) { ?>
    <?php $ownership = 'owner' ?>
<?php } ?>

<?php
$post_type = get_post_type();
$product_cat_class = '';
if ($post_type == 'product') {
    $product_cat = get_the_terms(get_the_ID(), 'product_cat');
    foreach ($product_cat as $cat) {
        $product_cat_class .= ' ' . strtolower($cat->slug) . '-cat';
    }
}
?>
<?php
$header_buttons = carbon_get_the_post_meta('header_buttons');
$template = get_page_template_slug();
?>

<body <?php body_class($cat_class . $product_cat_class); ?> ownership="
    <?php _e($ownership) ?>" <?= $product_term ?>>
    <div class="overlay"></div>

    <!--[if lt IE 9]>
        <div id="browser-notification" class="alert alert-danger">
            <div class="container">
                We are sorry but it looks like your <a href="http://www.whatbrowser.org/intl/en_us/" target=_blank>browser</a> doesn't support our website features. In order to get the full experience please download a new version of <a title="Download Chrome" href="http://www.google.com/chrome/" target=_blank>Chrome</a>, <a title="Download Safari" href="http://www.apple.com/safari/download/" target=_blank>Safari</a>, <a title="Download Firefox" href="http://www.mozilla.com/firefox/" target=_blank>Firefox</a>, or <a title="Download Internet Explorer" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target=_blank>Internet Explorer</a>.
            </div>
        </div>
    <![endif]-->

    <?php
    $logo = carbon_get_theme_option('cv_logo');
    if ($template != 'templates/page-tablet.php') {
        ?>
        <header id="ccm-motors-header" class="bt-5">
            <div class="container-fluid container-fluid-wide desktop-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="row column-holder align-items-center">
                            <div class="col-auto logo-box">
                                <a href="<?= get_site_url() ?>">
                                    <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-new-logo.svg"
                                        alt="CCM-Logo">
                                </a>
                            </div>
                            <div class="col-auto nav-box">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu'        => 'Left Menu - New',
                                        'depth'       => 3,
                                        'container'   => false,
                                        'menu_class'  => 'nav navbar-nav nav-menu-handler',
                                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'      => new WP_Bootstrap_Navwalker()
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="column-holder">
                            <div class="nav-box">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu'        => 'Right Menu - New',
                                        'depth'       => 3,
                                        'container'   => false,
                                        'menu_class'  => 'nav navbar-nav nav-menu-handler',
                                        'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                                        'walker'      => new WP_Bootstrap_Navwalker()
                                    )
                                );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-header">
                <div class="container-fluid g-0">
                    <div class="row g-0 justify-content-between">
                        <div class="col-auto col-side col-side-minicart">
                            <div class="mini-cart-mobile">
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.112" height="18.85"
                                    viewBox="0 0 23.112 18.85">
                                    <g id="cart" transform="translate(0.85 0.85)">
                                        <path id="Path_1" data-name="Path 1"
                                            d="M2.832,4.387h.6A2.275,2.275,0,0,1,5.61,5.722l3.573,9.624a2.275,2.275,0,0,0,2.182,1.335h8.121a2.3,2.3,0,0,0,2.148-1.252l2.378-5.49c.8-1.848-.852-3.8-3.222-3.8H11.962"
                                            transform="translate(-2.832 -4.387)" fill="rgba(0,0,0,0)" stroke="#fff"
                                            stroke-linecap="round" stroke-width="1.7" />
                                        <circle id="Ellipse_1" data-name="Ellipse 1" cx="1.712" cy="1.712" r="1.712"
                                            transform="translate(6.847 14.576)" fill="#fff" />
                                        <circle id="Ellipse_2" data-name="Ellipse 2" cx="1.712" cy="1.712" r="1.712"
                                            transform="translate(14.836 14.576)" fill="#fff" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="col logo-box text-center">
                            <a href="<?= get_site_url() ?>">
                                <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-new-logo.svg"
                                    alt="CCM-Logo">
                            </a>
                        </div>
                        <div class="col-auto col-side col-side-toggle">
                            <div class="mobile-menu-toggle">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <div class="mobile-header-canvas" id="mobile-header-canvas">

        </div>
        <div class="widget_shopping_cart_content display-none">
            <?php woocommerce_mini_cart(); ?>
        </div>
    <?php } ?>

    <?php if (is_shop() || is_product_category()) {
        $banner = carbon_get_the_post_meta('sp_banner');
        if (is_product_category()) {
            $term = get_queried_object();
            $banner_array = get_field('ccm_category_banner_image', $term);
            $banner = $banner_array['url'];
        }
        $banner_src = !empty($banner) ? $banner : get_template_directory_uri() . '/app/assets/images/accessories_banner.png';
        ?>
        <main class="news careers fourm_header accessories-banner">
            <section class="sp-banner" style="background-image: url('<?php echo $banner_src; ?>')">
                <div class="container">
                    <h2>
                        <?php if (is_shop()) {
                            echo 'Accessories';
                        }
                        else {
                            the_title();
                        }
                        ?></h2>
                </div>
            </section>
            <nav class="navbar">
                <div class="container">
                    <?php
                    wp_nav_menu(
                        array(
                            'menu'       => 'shop-menu',
                            'depth'      => 2,
                            'container'  => false,
                            'menu_class' => 'nav navbar-nav'
                        )
                    );
                    ?>
                </div>
            </nav>
        </main>
    <?php } ?>

    <?php
    if (is_bbpress()) {
        $pagename = get_query_var('pagename');
        $current_user = wp_get_current_user();
        $username = $current_user->user_firstname;
        $logouturl = wp_logout_url();
        $user_content = "<h3>Owners' Club</h3>
	<span>Welcome back, " . $username . "</span><span class='sign_outbanner' style='float:right;'><span class='notYou'>Not you?</span> <a href=" . $logouturl . ">Sign Out</a></span>";

        if (is_user_logged_in()) {
            $content_user = $user_content;
            $bannerContent = 'bannerContenttext';
        }
        else {
            $content_user = '';
            $bannerContent = '';
        }

        ?>
        <main class="news careers page-template-page-owners club-main">
            <?php include(locate_template('/ccm-club/banner.php')); ?>
        </main>
    <?php } ?>

    <?php

    // Update user role when visit my-account page
    function update_user_role()
    {
        $userid = get_current_user_id();
        $user = new WP_User($userid);
        $user_role = get_field('do_you_own_a_ccm_motorcycle', 'user_' . $userid);
        if ($user_role == "Yes, I'm a CCM owner!") {
            if (!current_user_can('ccm_owner')) {
                $user->add_role('ccm_owner');
            }
            $user->remove_role('subscriber');
        }
        else {
            if (!current_user_can('subscriber')) {
                $user->add_role('subscriber');
            }
            $user->remove_role('ccm_owner');
        }
    }


    if (is_page(305)) {
        update_user_role();
    }

    ?>
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
    <!-- <script src="https://kit.fontawesome.com/d6cae1a8f6.js" crossorigin="anonymous"></script> -->
    <title>
        <?php bloginfo('name'); // show the blog name, from settings 
        ?> |
        <?php is_front_page() ? bloginfo('description') : wp_title(''); // if we're on the home page, show the description, from the site's settings - otherwise, show the title of the post or page 
        ?>
    </title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <meta name="p:domain_verify" content="86cca4d34bdeaa262ef2ab86ce24dee9" />

    <?php wp_head(); ?>
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
    <script data-ad-client="ca-pub-2753165670517691" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
        <div id="sticky-anchor" style="height: 0px;"></div>

        <header id="ccm-motors-header" class="bt-5">
            <div class="container-fluid container-fluid-wide desktop-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="row column-holder align-items-center">
                            <div class="col-auto logo-box">
                                <a href="<?= get_site_url() ?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="135.814" height="21" viewBox="0 0 135.814 21">
                                        <g id="logo" transform="translate(-102.697 -62.631)">
                                            <g id="Group_41" data-name="Group 41" transform="translate(102.697 62.631)">
                                                <path id="Path_16" data-name="Path 16" d="M631.595,67.186c.061,0,.143-.151.194-.24q1.139-1.982,2.273-3.966c.039-.068.083-.133.118-.2a.239.239,0,0,1,.231-.14h9.667c.307,0,.317.012.317.335q0,10.156,0,20.313c0,.049,0,.1,0,.148,0,.12-.051.186-.167.189-.066,0-.132,0-.2,0H630.547c-.333,0-.334,0-.334-.341q0-1.96,0-3.92c0-.105.012-.294-.026-.309-.09-.011-.15.115-.193.193q-.617,1.116-1.228,2.236c-.357.651-.717,1.3-1.072,1.954a.31.31,0,0,1-.321.189c-.1-.009-.207,0-.311,0H613.8c-.276,0-.285-.011-.285-.3q0-1.975,0-3.95c0-.106.013-.323-.024-.339-.074-.031-.145.13-.189.209q-1,1.825-2,3.652c-.108.2-.221.391-.327.589a.234.234,0,0,1-.229.141c-.056,0-.113,0-.169,0h-4.127c-.359,0-.369-.015-.189-.349q.87-1.614,1.744-3.225,1.045-1.936,2.086-3.874c.488-.9.981-1.8,1.468-2.707.645-1.2,1.285-2.395,1.931-3.59.6-1.11,1.205-2.215,1.805-3.325.646-1.2,1.293-2.39,1.928-3.592a.528.528,0,0,1,.532-.332q6.572.014,13.144.007c.057,0,.113,0,.169,0,.274,0,.274.016.288.3.039.827.108,1.654.123,2.481.009.494.014.824.039,1.342C631.527,66.864,631.542,67.17,631.595,67.186Z" transform="translate(-536.368 -62.631)" fill="#fff" />
                                                <path id="Path_17" data-name="Path 17" d="M117.93,83.659c-4.278,0-8.556-.009-12.834.006a2.524,2.524,0,0,1-2.357-2.014,2.173,2.173,0,0,1,.27-1.539c.861-1.511,1.71-3.029,2.564-4.543.446-.792.9-1.581,1.341-2.373q1.6-2.835,3.188-5.672c.354-.63.711-1.259,1.059-1.893a4.9,4.9,0,0,1,1.178-1.422,6.822,6.822,0,0,1,2.683-1.4,4.234,4.234,0,0,1,1.061-.135q11.831,0,23.662.009a7.431,7.431,0,0,1,2.5.4,2.876,2.876,0,0,1,1.355.875,2.064,2.064,0,0,1,.418,1.548,7.183,7.183,0,0,1-1,2.717c-.39.734-.775,1.471-1.16,2.208s-.776,1.493-1.167,2.238c-.277.528-.565,1.05-.835,1.583a.347.347,0,0,1-.36.211q-7.293-.006-14.587,0c-.293,0-.323-.052-.18-.318q1.058-1.961,2.119-3.921.62-1.148,1.238-2.3a1.532,1.532,0,0,0,.109-.273.7.7,0,0,0-.4-.936,1.639,1.639,0,0,0-1.621.162,3.084,3.084,0,0,0-.9,1.049c-1.189,2.043-2.365,4.093-3.547,6.14q-1.143,1.979-2.291,3.955a2.669,2.669,0,0,0-.309.729.552.552,0,0,0,.387.711,2.156,2.156,0,0,0,.73.046,3.27,3.27,0,0,0,.971-.166,2.092,2.092,0,0,0,1.139-.921c.339-.547.653-1.112.95-1.685a.6.6,0,0,1,.613-.385q7.053.017,14.107.01c.116,0,.3-.029.342.057s-.06.233-.12.339c-.522.917-1.04,1.836-1.57,2.748a11.28,11.28,0,0,1-1.86,2.453,5.789,5.789,0,0,1-3.285,1.648,6.012,6.012,0,0,1-.843.062Q124.305,83.654,117.93,83.659Z" transform="translate(-102.697 -62.665)" fill="#fff" />
                                                <path id="Path_18" data-name="Path 18" d="M375.013,83.657q-6.431,0-12.862,0a2.465,2.465,0,0,1-2.291-1.936,2.18,2.18,0,0,1,.256-1.623c.625-1.047,1.206-2.123,1.805-3.188q.74-1.316,1.48-2.632,1.736-3.094,3.47-6.188.724-1.291,1.447-2.583a4.787,4.787,0,0,1,1.2-1.367,6.641,6.641,0,0,1,2.648-1.35,4.363,4.363,0,0,1,1.006-.126q11.83,0,23.66.009a7.4,7.4,0,0,1,2.634.448,2.844,2.844,0,0,1,1.128.711,1.9,1.9,0,0,1,.514,1.3,4.9,4.9,0,0,1-.628,2.372c-.384.749-.777,1.493-1.168,2.238q-.866,1.65-1.734,3.3c-.2.372-.4.74-.577,1.122a.438.438,0,0,1-.464.289c-2.469-.008-4.938-.005-7.406-.005h-7.1c-.363,0-.368,0-.189-.337q.774-1.449,1.555-2.894.862-1.6,1.724-3.2a2.319,2.319,0,0,0,.163-.378.718.718,0,0,0-.434-.954,1.679,1.679,0,0,0-1.837.393,5.168,5.168,0,0,0-.868,1.2q-1.908,3.3-3.81,6.6-.924,1.6-1.856,3.191a2.3,2.3,0,0,0-.263.654.548.548,0,0,0,.424.736,2.326,2.326,0,0,0,.787.034,3.6,3.6,0,0,0,.886-.17,2.017,2.017,0,0,0,1.1-.884c.312-.494.6-1.006.88-1.521.308-.565.3-.57.9-.57h14.049c.27,0,.291.033.151.282-.368.657-.751,1.3-1.113,1.964a20.506,20.506,0,0,1-1.163,1.9,7.713,7.713,0,0,1-2.563,2.456,5.7,5.7,0,0,1-2.151.669,10.874,10.874,0,0,1-1.184.038Q381.119,83.659,375.013,83.657Z" transform="translate(-324.168 -62.663)" fill="#fff" />
                                            </g>
                                            <path id="Path_19" data-name="Path 19" d="M1001.93,73.814c-.036.02-.036.053.085.055.173,0,.3,0,.409,0h5c.864,0,1.728,0,2.592,0a.387.387,0,0,0,.417-.235c.025-.056.063-.106.092-.161.46-.853.924-1.7,1.378-2.561a1.238,1.238,0,0,0-.07-1.4c-.124-.172-.159-.187-.357-.1s-.369.174-.554.259q-2.2,1-4.393,2.006-2.1.961-4.193,1.928C1002.248,73.662,1002.124,73.7,1001.93,73.814Z" transform="translate(-773.576 -5.803)" fill="#fff" />
                                            <path id="Path_20" data-name="Path 20" d="M889.466,73.479v1.836q0,4.123,0,8.246c0,.365,0,.366.352.367h1.617c.386,0,.773,0,1.159,0,.2,0,.222-.028.233-.235,0-.052,0-.1,0-.156q0-3.3,0-6.6c0-.433,0-.433.412-.433h15.19c.092,0,.133-.005.239-.005a.448.448,0,0,0,.407-.2c.345-.622.7-1.242,1.041-1.864q1.027-1.853,2.05-3.709c.071-.13.22-.324.149-.411-.045-.086-.264-.058-.4-.058q-9.3,0-18.606,0c-.081,0-.163,0-.244,0-.189-.013-.224-.051-.235-.246,0-.052,0-.1,0-.156q0-3.189,0-6.379c0-.062,0-.125,0-.187-.01-.219-.029-.238-.255-.247-.061,0-.122,0-.183,0h-2.5c-.422,0-.422,0-.422.421Z" transform="translate(-676.717 -0.35)" fill="#fff" />
                                            <path id="Path_21" data-name="Path 21" d="M930.008,177.972H927.02c-.268-.006-.278-.016-.285-.276,0-.031,0-.062,0-.093q0-2.535,0-5.07c0-.01,0-.021,0-.031-.012-.345.02-.353.312-.194,1.191.65,2.383,1.3,3.572,1.95,1.385.762,2.766,1.531,4.15,2.294.3.167.612.327.917.49.045.024.091.046.135.072.061.036.138.067.141.149,0,.112-.11.131-.18.155a11.1,11.1,0,0,1-1.942.461,11.393,11.393,0,0,1-1.822.094C931.349,177.969,930.679,177.972,930.008,177.972Z" transform="translate(-708.819 -94.389)" fill="#fff" />
                                            <path id="Path_22" data-name="Path 22" d="M937.518,63.189c-.41.249-.855.425-1.285.632-.716.344-1.44.673-2.16,1.009q-1.177.548-2.353,1.1-1.038.486-2.074.976-1.327.625-2.654,1.251c-.186.087-.236.054-.249-.149,0-.041,0-.083,0-.124q0-2.224,0-4.448c0-.326,0-.328.323-.329h10.122c.107,0,.256,0,.363.005C937.608,63.112,937.638,63.122,937.518,63.189Z" transform="translate(-708.827 -0.407)" fill="#fff" />
                                            <path id="Path_23" data-name="Path 23" d="M954.879,62.954c0,.034-.242.166-.331.209-.723.354-1.449.7-2.172,1.055q-2.018.987-4.035,1.979-1.208.592-2.417,1.18c-.6.293-1.212.582-1.818.873a.594.594,0,0,1-.262.069l-2.956,0c-.037,0-.181,0-.161-.052-.016-.051.153-.114.221-.146q1.49-.709,2.981-1.416c.671-.32,1.339-.646,2.01-.967Q947.469,65,949,64.275c.707-.339,1.413-.682,2.119-1.023.183-.089.367-.176.552-.261a.7.7,0,0,1,.3-.061h2.682C954.7,62.93,954.879,62.919,954.879,62.954Z" transform="translate(-720.872 -0.256)" fill="#fff" />
                                            <path id="Path_24" data-name="Path 24" d="M971.226,173.46c-.123-.081.2-.071.282-.071.781,0,1.563,0,2.344,0a.979.979,0,0,1,.464.128q1.075.551,2.151,1.1c.236.119.481.221.716.342.2.1.2.133.091.333-.125.225-.254.448-.378.674-.168.307-.188.315-.491.161l-3.84-1.956q-.531-.271-1.063-.54C971.412,173.577,971.325,173.523,971.226,173.46Z" transform="translate(-747.121 -95.403)" fill="#fff" />
                                            <path id="Path_25" data-name="Path 25" d="M1005.095,171.635c-.008-.039.2-.036.264-.036.67,0,1.339,0,2.009,0a1.494,1.494,0,0,1,.152,0c.075.008.116.052.078.125-.145.273-.291.545-.446.812-.076.131-.189.085-.294.031l-1.007-.513-.571-.292C1005.226,171.739,1005.095,171.669,1005.095,171.635Z" transform="translate(-776.319 -93.863)" fill="#fff" />
                                        </g>
                                    </svg>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="23.112" height="18.85" viewBox="0 0 23.112 18.85">
                                    <g id="cart" transform="translate(0.85 0.85)">
                                        <path id="Path_1" data-name="Path 1" d="M2.832,4.387h.6A2.275,2.275,0,0,1,5.61,5.722l3.573,9.624a2.275,2.275,0,0,0,2.182,1.335h8.121a2.3,2.3,0,0,0,2.148-1.252l2.378-5.49c.8-1.848-.852-3.8-3.222-3.8H11.962" transform="translate(-2.832 -4.387)" fill="rgba(0,0,0,0)" stroke="#fff" stroke-linecap="round" stroke-width="1.7" />
                                        <circle id="Ellipse_1" data-name="Ellipse 1" cx="1.712" cy="1.712" r="1.712" transform="translate(6.847 14.576)" fill="#fff" />
                                        <circle id="Ellipse_2" data-name="Ellipse 2" cx="1.712" cy="1.712" r="1.712" transform="translate(14.836 14.576)" fill="#fff" />
                                    </g>
                                </svg>
                            </div>
                        </div>
                        <div class="col logo-box text-center">
                            <a href="<?= get_site_url() ?>">
                                <img src="https://ccm.theprogressteam.com/wp-content/uploads/2020/11/ccm-new-logo.svg" alt="CCM-Logo">
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
    <?php if (!is_front_page()) { ?>

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
                            } else {
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
            } else {
                $content_user = '';
                $bannerContent = '';
            }

        ?>
            <main class="news careers page-template-page-owners club-main">
                <?php include(locate_template('/ccm-club/banner.php')); ?>
            </main>
        <?php } ?>
    <?php } ?>

    <?php
    if (is_page(305)) {
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
            } else {
                if (!current_user_can('subscriber')) {
                    $user->add_role('subscriber');
                }
                $user->remove_role('ccm_owner');
            }
        }
        update_user_role();
    }

    ?>
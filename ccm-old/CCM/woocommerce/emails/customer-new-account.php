<?php

/**

 * Customer new account email

 *

 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.

 *

 * HOWEVER, on occasion WooCommerce will need to update template files and you

 * (the theme developer) will need to copy the new files to your theme to

 * maintain compatibility. We try to do this as little as possible, but it does

 * happen. When this occurs the version of the template file will be bumped and

 * the readme will list any important changes.

 *

 * @see https://docs.woocommerce.com/document/template-structure/

 * @package WooCommerce/Templates/Emails

 * @version 3.7.0

 */



defined( 'ABSPATH' ) || exit;

?>

<style>
	img.CToWUd {
		display: none !important;
	}
	table {

		background-color: #fff !important;

	}

	table h1 {

		background-color: #000 !important;

		text-align: center;

		padding: 20px !important;

	}

	table > tbody > tr > td > table > tbody > tr:first-child > td {

		background-color: #000;

	}

</style>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>



<?php /* translators: %s: Customer username */ ?>
<?php 
$user = get_user_by('login', $user_login);
?>
<p><img style="max-width: 200px !important; margin: auto !important; display: block !important;" src="https://www.ccm-motorcycles.com/wp-content/uploads/2018/07/CCM-Logo-Small-File.jpg" alt=""></p>
<p><?php printf( esc_html__( 'Hi, '. $user->first_name, 'woocommerce' ), esc_html( $user_login ) ); ?></p>

<?php /* translators: %1$s: Site title, %2$s: Username, %3$s: My account link */ ?>

<p><?php printf( esc_html__( 'Thank you for registering to Club CCM!. Your username is %2$s. You can access your account area to view orders, change your password, and more at: %3$s', 'woocommerce' ), esc_html( $blogname ), '<strong>' . esc_html( $user_login ) . '</strong>', make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>



<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

	<?php /* translators: %s: Auto generated password */ ?>

	<p><?php printf( esc_html__( 'Your password has been automatically generated: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>

<?php endif; ?>

<p>For your convenience, here's a direct link to your new <strong>exclusive</strong> members' area: <a href="https://www.ccm-motorcycles.com/club-news">Club CCM</a>. </p>

<p>
	We really do value your support in buying a great British motorcycle from the passionate team at CCM, as without you none of this would be possible.
</p>

<p>We hope you enjoy the site and we’d love to hear your feedback to help us shape what we do.</p>

<?php

/**

 * Show user-defined additional content - this is set in each email's settings.

 */

if ( $additional_content ) {

	echo wp_kses_post( wpautop( wptexturize( $additional_content ) ) );

}



do_action( 'woocommerce_email_footer', $email );


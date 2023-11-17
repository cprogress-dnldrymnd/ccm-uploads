jQuery(document).ready(function() {
	jQuery('.acf-field-5d10995760714').remove();
	ccm_login();
	display_name();
	ownership();
	get_param();
	register_success();
	login_success();
	lost_pass();
	email();
});


function ownership() {
	var $ownership = jQuery('input[name="ownership"]');
	$do_you_own = jQuery('.do-you-own ul li label');
	$do_you_own_selected = jQuery('.do-you-own ul li label.selected input').val();
	if($do_you_own_selected == "Yes, I'm a CCM owner!") {
		$do_you_own_selected_val = 'yes';
	} else {
		$do_you_own_selected_val = 'no';
	}
	$ownership.val($do_you_own_selected_val);
	$do_you_own.click(function(event) {
		$val = jQuery(this).find('input').val();
		if($val == "Yes, I'm a CCM owner!") {
			$the_val = 'yes';
		} else {
			$the_val = 'no';
		}

		$ownership.val($the_val);
	});
}
function lost_pass() {
	$lost_pass = jQuery('#nav a:last-child');
	$lost_pass.insertAfter('#wp-submit');
}
var getUrlParameter = function getUrlParameter(sParam) {
	var sPageURL = window.location.search.substring(1),
	sURLVariables = sPageURL.split('&'),
	sParameterName,
	i;

	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');

		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
		}
	}
};
function login_success() {
	jQuery("#loginform").submit(function(event) {
		$email = jQuery('input[name="user_email"]').val();
		$password = jQuery('input[name="password"]').val();
		sessionStorage.setItem("email", '');
		sessionStorage.setItem("password", '');
	});
}
function register_success() {
	jQuery("#registerform").submit(function(event) {
		$email = jQuery('input[name="user_email"]').val();
		$password = jQuery('input[name="password"]').val();
		sessionStorage.setItem("email", $email);
		sessionStorage.setItem("password", $password);
	});
}
function get_param() {
	$success_message = jQuery('<div class="success-message"><p>Sucessfully registered.</p></div>');
	$action = getUrlParameter('action');
	if($action == 'success') {
		$success_message.insertBefore('.my-account-btn');
		$email = sessionStorage.getItem("email");
		$password = sessionStorage.getItem("password");
		jQuery('input[name="log"]').val($email);
		jQuery('input[name="pwd"]').val($password);
		jQuery('input[name="wp-submit"]').click();
	}
}
function ownershipx() {
	$ownership = jQuery("input[name='ownership']:checked").val();
	$bike_div = jQuery('div[data-name="bike_information"]');
	$is_owner_xx = jQuery('.is_owner_xx');
	if($ownership == 'notOwner') {
		$bike_div.addClass('hide-div');
	} else {
		$bike_div.removeClass('hide-div');
	}

	$is_owner_xx.find('label').click(function(event) {
		setTimeout(function() {
			$ownership = jQuery("input[name='ownership']:checked").val()
			console.log($ownership);
			if($ownership == 'notOwner') {
				$bike_div.addClass('hide-div');
			} else {
				$bike_div.removeClass('hide-div');
			}
		}, 200);
	});
}
function display_name() {
	$the_display_name = jQuery('.the-display-name');
	$the_email = jQuery('.the-email');
	jQuery('#registerform >p:first-child').addClass('username');
	jQuery('#registerform >p:nth-child(2)').addClass('email');
	$username = jQuery('.username');
	$email = jQuery('.email');
	$email.appendTo($email);
	$username.appendTo($the_display_name);
	$username.find('label').html('Display name<span>*</span>')
	$username.find('input').removeAttr('placeholder');
}


function ccm_login() {
	$btns_ccmlogin = jQuery('<div class="my-account-btn"> <div class="login-ac2 active" data="the-login"><h2><a href="/ccm-login">LOGIN</a></h2></div> <div class="register-ac2" data="the-register"><h2><a href="/ccm-login/?action=register">REGISTER</a></h2></div> </div>')
	$btns_ccmlogin.insertBefore('.login form');
	$acf_user_register_fields = jQuery('.acf-user-register-fields');
	$acf_user_register_fields.insertAfter('.ownership');
	$login_btn = jQuery('.login-ac2');
	$register_btn = jQuery('.register-ac2');


	$form  = jQuery('#login form');
	if($form.attr('name') == 'registerform') {
		$login_btn.removeClass('active');
		$register_btn.addClass('active');
		sessionStorage.setItem("active", "the-register");
		console.log(sessionStorage.getItem("active"));
	} else if($form.attr('name') == 'loginform') {
		$register_btn.removeClass('active');
		$login_btn.addClass('active');
		sessionStorage.setItem("active", "the-login");
		console.log(sessionStorage.getItem("active"));
	}

	jQuery('input[name="log"]').removeAttr('placeholder');
	jQuery('input[name="pwd"]').removeAttr('placeholder');
}

function email() {
	$spanreq = jQuery('<span class="required"> *</span>');
	$email = jQuery('p.email');
	$email.find('label').text('Email address');
	$spanreq.appendTo($email.find('label'));
	$the_email = jQuery('.the-email');
	$email.appendTo($the_email);
}
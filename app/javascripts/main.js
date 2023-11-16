var fixWidthHistory = function () {
	if ($('.page-template-page-ccmracing-php').length > 0) {
		//$('.timeline-list-wrap .box-item').each(function(){

		var w = $('.timeline-list').width();
		var x = $('.timeline-list-wrap .box-item').length
		var y = w / x;
		var z = w + 'px';
		$('.timeline-list-wrap .box-item').css('width', z);
	}
};

setInterval(function () {
	fixWidthHistory();
}, 100);

$(document).ready(function () {
	$('.scroll').on('click', function (event) {
		event.preventDefault();
		var target = $(this).attr('href');
		if ($(target).length > 0) {
			$('html, body').animate({
				scrollTop: $(target).offset().top - 55
			}, 1500);
		}
	});

	if ($(".gallery#bike-gallery .images").length) {
		$(".gallery#bike-gallery .images").justifiedGallery({
			rowHeight: 250,
			margins: 0,
			lastRow: 'justify',
			captions: true
		});
	}

	if ($("#news-slider").length) {
		$('#news-slider').owlCarousel({
			loop: true,
			items: 1,
			dotsContainer: '#customDots',
		})
	}

	if ($("#bike-slider").length) {
		$('#bike-slider').owlCarousel({
			loop: true,
			items: 1,
			stagePadding: 100,
			dots: false,
			nav: true,
			navText: ["<span class='prev'></span>", "<span class='next'></span>"],
			// breakpoint from 0 up
			responsive: {
				0: {
					stagePadding: 25,
					items: 1,
				},
				// breakpoint from 767 up
				767: {
					items: 1,
					stagePadding: 50,
				},
				// breakpoint from 1023 up
				1023: {
					items: 1,
					stagePadding: 75,
				},
				// breakpoint from 1365 up
				1365: {
					items: 1,
					stagePadding: 100,
				}
			}
			// dotsContainer: '#customDots',
		});
	}

	if ($("#banner-slider").length) {
		$('#banner-slider').owlCarousel({
			items: 1,
			autoplay: true,
			autoplayTimeout: 4000,
			autoplayHoverPause: false,
			dotClass: 'owl-dot',
			dotsClass: 'owl-dots',
			dots: true,
		})
	}

	if ($("#c-img-slider").length) {
		$('#c-img-slider').owlCarousel({
			items: 4,
			autoplay: true,
			autoplayTimeout: 2000,
			autoplayHoverPause: false,
			loop: true,
			responsive: {
				// breakpoint from 0 up
				0: {
					items: 1,
				},
				768: {
					items: 2,
				},
				992: {
					items: 3,
				},
				1200: {
					items: 4,
				}
			}
		})
	}

	$.fn.equalHeights = function () {
		var max_height = 0;
		$(this).each(function () {
			max_height = Math.max($(this).height(), max_height);
		});
		$(this).each(function () {
			$(this).height(max_height);
		});
	};
	$('.match-height').equalHeights();

	$('.spec-title').text($('.specs .card ul li.active').text());

	$('.specs .card ul li').on('click', function () {
		var active = $(this).text();
		$('.spec-title').text(active);
	})

	$(".has-dropdown .menu-parent").click(function () {
		$(this).toggleClass('active');

		var dropdownMenu = $(this).siblings('.dropdown-menu');
		var breadCrumb = $(this).siblings('.dropdown-menu').find('.megamenu-breadcrumb');

		if ($(this).hasClass('active')) {
			dropdownMenu.fadeIn('fast');
			$('body').addClass('overlay');
			$('html').addClass('overlay');
		} else {
			dropdownMenu.fadeOut('fast');
			$('body').removeClass('overlay');
			$('html').removeClass('overlay');

		}

		if (breadCrumb.hasClass('active')) {
			breadCrumb.removeClass('active');
			breadCrumb.siblings('.container').fadeOut('fast');
		}

		if ($('.menu-item-has-children').hasClass('open')) {
			$('.menu-item-has-children .dropdown-menu').fadeOut('fast');
			$('.menu-item-has-children').removeClass('open');
			// $('body').removeClass('overlay');
		}
	});

	/*$('.nav.navbar-nav.nav-menu-handler li.menu-item-has-children > a').on('click', function(e) {
		e.preventDefault();

		$('body').addClass('overlay');

		if($(this).parent().hasClass('open')) {
			$('body').removeClass('overlay');
			$(this).siblings('.dropdown-menu').fadeOut('fast');
		} else {
			$('body').addClass('overlay');
			$(this).siblings('.dropdown-menu').fadeIn('fast');
		}

		var menu = $('.nav.navbar-nav.nav-menu-handler').children('.open');
		if(menu.length > 0) {
			console.log('open');
			menu.children('li.menu-item-has-children .dropdown-menu').fadeOut('fast');
		}
	})*/

	// $('#menu-right li.menu-item-has-children a').on('click', function(e) {
	// e.preventDefault();
	// $('body').addClass('overlay');
	// $(this).siblings('.dropdown-menu').fadeIn('fast');

	// if($(this).parent().hasClass('open')) {
	// 	$('body').removeClass('overlay');
	// 	$(this).siblings('.dropdown-menu').fadeOut('fast');
	// }
	// })

	$('html').click(function () {
		if ($(".has-dropdown .menu-parent").hasClass('active')) {
			$('ul.dropdown-menu.mega-menu').css('display', 'none');
			$('body, html').removeClass('overlay');
			$(".has-dropdown .menu-parent").removeClass('active');
		}
		if ($(".dropdown-toggle").parent().hasClass('open')) {
			$('ul.dropdown-menu').css('display', 'none');
			$('body, html').removeClass('overlay');
			$(".dropdown-toggle").parent().hasClass('open');
		}
	});

	$('.has-dropdown', 'ul.nav.navbar-nav.nav-menu-handler', 'ul.dropdown-menu.mega-menu', '.menu-item-has-children .a').click(function (event) {
		event.stopPropagation();
	});

	$(".taxonomy-button").click(function () {
		$('.mega-dropdown-menu.active').hide();
		$('.mega-dropdown-menu.active').removeClass('active');
		$('.' + $(this).data('menu-name')).addClass('active').show();
	});
	// $(".has-dropdown .megamenu-breadcrumb").click( function() {
	// 	$(this).toggleClass('active');

	// 	var dropdownMenu = $(this).siblings('.mega-dropdown-menu');

	// 	if ($(this).hasClass('active')) {
	// 		dropdownMenu.fadeIn('fast');
	// 	} else {
	// 		dropdownMenu.fadeOut('fast');
	// 	}
	// });

	var test = $('.mid-section #content .title').text();
	$('.mid-section #content').addClass(test)

	$(window).bind('scroll', function () {
		var div_top = $('#sticky-anchor').offset().top;
		var window_top = $(window).scrollTop();

		if (window_top > div_top) {
			$('#ccm-header').addClass('fixed');
			$('#sticky-anchor').height($('#ccm-header').outerHeight());
			$('#prod-top').addClass('fixed');
		} else {
			$('#ccm-header').removeClass('fixed');
			$('#sticky-anchor').height(0);
			$('#prod-top').removeClass('fixed');
		}
	});

	//Ajax Filter
	$('#cat-list.news-filter li a').on('click', function (e) {
		e.preventDefault();
		var categoryfilter = $(this).data('category');
		var ajaxURL = $(this).data('ajax');
		$.ajax({
			url: myAjax.ajaxurl,
			data: {
				action: 'customfilter', //PHP function to handle AJAX request
				category: categoryfilter,
			},
			type: 'POST',
			beforeSend: function (xhr) {
				$('#loader').fadeIn();
			},
			success: function (data) {
				$('#post-grid').html(data);
				$('#loader').fadeOut();
			}
		});
		return false;
	});

	$("#ship-to-different-address-checkbox").on('click', function () {
		$('.shipping_address').slideToggle();
	});
	$("#Enquiry-Form-button").click(function () {
		$(".Enquiry-Form-mn").toggleClass("open");
		if ($('.Enquiry-Form-mn.onetime-popup.open').length > 0) { $('.Enquiry-Form-mn').removeClass("open") }
		if ($('.Enquiry-Form-mn.onetime-popup').length > 0) { $('.Enquiry-Form-mn').removeClass("onetime-popup") }

	});

	$(".Enquiry-Form-button").click(function () {
		$(".Enquiry-Form-mn").toggleClass("open");
		if ($('.Enquiry-Form-mn.onetime-popup.open').length > 0) { $('.Enquiry-Form-mn').removeClass("open") }
		if ($('.Enquiry-Form-mn.onetime-popup').length > 0) { $('.Enquiry-Form-mn').removeClass("onetime-popup") }

	});



});
$(document).ready(function (e) {
	// 	 	var removepopup = setTimeout(function(){ if ($('.Enquiry-Form-mn.onetime-popup').length > 0) { $('.Enquiry-Form-mn').removeClass("onetime-popup");} }, 5000)
	// 		$(".Enquiry-Form-mn input").focus(function(){
	// 		  clearTimeout(removepopup);
	// 		});
	setTimeout(function () {
		/*if(Cookies.get('popState') != 'shown'){
			$('.Enquiry-Form-mn').addClass("onetime-popup");
			Cookies.set('popState', 'shown');
		}*/
	}, 5000);

	jQuery('#videoplay').on('click', function () {
		var myAudio = document.getElementById("vid");
		return myAudio.paused ? myAudio.play() : myAudio.pause();
	});

	login();
	moveRegisterItems();
	imageRegisterFileSelect();
	/*registerPasswordValidate();*/

});

function checkValidationForm() {
	alert("he re");
	return false;

}


function login() {
	$menu = jQuery('<div class="my-account-login"><div id="login-ac">LOGIN</div><div id="register-ac">REGISTER</div></div<');
}

function moveRegisterItems() {
	$('#reg_email').parent().addClass('email_xx');
	$('#reg_password').parent().addClass('password_xx');

	$('.email_xx').insertBefore('.display_name_xx');
	$('.password_xx').insertAfter('.display_name_xx');
}

function imageRegisterFileSelect() {
	$('#removeFileSelect').click(function (event) {
		$('#fileSelect').val("");
		$('#fileSelectImage').remove();
		$('#fileSelectImageContainer').append('<img style="max-width: 200px;display:none;" id="fileSelectImage" src="" />');

	});

	$("#fileSelect").change(function () {
		readURL(this);
	});

}

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#fileSelectImage').attr('src', e.target.result);
			$('#fileSelectImage').css('display', 'block');;
		}
		reader.readAsDataURL(input.files[0]); // convert to base64 string
	}
}

/*main2*/
jQuery(window).on('resize', function () {
	shopmenu();
});

function bike_navigation() {
	if (jQuery('.bike-navigation').length > 0) {
		$bike_nav_height = jQuery('.bike-navigation .inner').outerHeight();
		jQuery('.bike-navigation').css('height', $bike_nav_height + 'px');
		var stickyTop = jQuery('.bike-navigation').offset().top;
		jQuery(window).scroll(function () {
			var windowTop = jQuery(window).scrollTop();

			if (stickyTop < windowTop) {
				jQuery('.bike-navigation').addClass('fixed')
			} else {
				jQuery('.bike-navigation').removeClass('fixed')
			}
		});
	}
}
function bike_specs() {
	var t = 0; // the height of the highest element (after the function runs)
	var t_elem;  // the highest element (after the function runs)
	jQuery(".specs-list").each(function () {
		$this = $(this);
		if ($this.outerHeight() > t) {
			t_elem = this;
			t = $this.outerHeight();
		}
	});

	jQuery('.specs-holder').css('height', t + 'px');
}

function header() {

	jQuery('.mini-cart a, .col-side-minicart').click(function (e) {
		jQuery('body').toggleClass('show-minicart');
		jQuery('.overlay').toggleClass('show-overlay');
		e.preventDefault();
	});

	jQuery(document).on("click", '.close-mini-cart', function (event) {
		jQuery('body').removeClass('show-minicart');
		jQuery('.overlay').removeClass('show-overlay');
		jQuery('.dropdown-menu').removeClass('show-dropdown');
	});


	jQuery(".overlay").hover(
		function () {
			jQuery('.overlay').removeClass('show-overlay');
			jQuery('.dropdown-menu').removeClass('show-dropdown');
			jQuery('body').removeClass('show-minicart');
		}, function () {
		}
	);


	jQuery('.dropdown-toggle').click(function (e) {
		jQuery('.dropdown-toggle').not(this).each(function () {
			jQuery(this).next().removeClass('show-dropdown');
		});
		jQuery('.overlay').removeClass('show-minicart');
		jQuery(this).next().toggleClass('show-dropdown');
		jQuery('.overlay').toggleClass('show-overlay');
		e.preventDefault();
	});
	if (window.innerWidth < 992) {
		jQuery('body').addClass('mini-cart')
		jQuery('.nav-box').removeClass('col-auto').appendTo('.mobile-header-canvas');

		jQuery('.col-side-toggle').click(function (e) {
			jQuery('body').toggleClass('mobile-header-active');
			e.preventDefault();
		});
	}

	if (window.innerWidth > 991) {
		jQuery('.widget_shopping_cart_content').appendTo('.mini-cart').removeClass('display-none');
	}

	var lastScrollTop = 0;
	jQuery(window).scroll(function (event) {
		var st = jQuery(this).scrollTop();
		if (st > lastScrollTop) {
			jQuery('body').addClass('hide-header');
		} else {
			jQuery('body').removeClass('hide-header');
		}
		lastScrollTop = st;
	});


}
jQuery(document).ready(function () {
	utm_parameters();
	bike_navigation();
	bike_specs();
	header();

	$("#wpcf7-f5677-o1 form").submit(function (e) {
		e.preventDefault();
		jQuery(this).find('.wpcf7-submit').attr('disabled', 'disabled');
	});

	$('.ct-arrow .the-arrow').click(function (event) {
		$('html,body').animate({
			scrollTop: $('#news').offset().top - 72
		}, 'slow');
	});

	$woocommerce_account = $('body.woocommerce-account');
	if (!$woocommerce_account.hasClass('logged-in')) {
		$woocommerce_account.addClass('not-log');
	}
	$btns = $('<div class="my-account-btn"> <div class="login-ac active" data="the-login"><h2>LOGIN</h2></div> <div class="register-ac" data="the-register"><h2>REGISTER</h2></div> </div>')
	$btns.prependTo('.woocommerce-account .the-content .woocommerce #customer_login');
	$login = $('.u-column1');
	$register = $('.u-column2');
	$login.addClass('the-login');
	$register.addClass('the-register hide-div');

	$login_btn = $('.login-ac');
	$register_btn = $('.register-ac');
	$login_btn.click(function (event) {
		$register_btn.removeClass('active');
		$login_btn.addClass('active');
		$login.removeClass('hide-div');
		$register.addClass('hide-div');
		sessionStorage.setItem("active", "the-login");
	});
	$register_btn.click(function (event) {
		$login_btn.removeClass('active');
		$register_btn.addClass('active');
		$login.addClass('hide-div');
		$register.removeClass('hide-div');
		sessionStorage.setItem("active", "the-register");
	});

	if (sessionStorage.getItem("active") == 'the-register') {
		$login_btn.removeClass('active');
		$register_btn.addClass('active');
		$login.addClass('hide-div');
		$register.removeClass('hide-div');
		sessionStorage.setItem("active", "the-register");
	} else {
		$register_btn.removeClass('active');
		$login_btn.addClass('active');
		$login.removeClass('hide-div');
		$register.addClass('hide-div');
		sessionStorage.setItem("active", "the-login");
	}

	$register__submit = jQuery('.woocommerce-form-register__submit');
	$register__submit.click(function (event) {
		sessionStorage.setItem("register_click", "clicked");
	});



	if (!sessionStorage.getItem('register_click') && !jQuery('body').hasClass('logged-in')) {
		jQuery('.acf-field-5d10995760714 .acf-image-uploader').removeClass('has-value');
		jQuery('.acf-field-5d10995760714 .acf-image-uploader img[data-name="image"]').attr('src', '')
		jQuery('.acf-field-5ced50e8d2411 tbody .acf-row:not(:last-child)').remove();
		jQuery('label.selected').each(function (index, el) {
			jQuery(this).removeClass('selected');
			jQuery(this).find('input').removeAttr('checked');
		});
	}

	jQuery('.acf-field-5d10995760714').remove();
	//wishlist_discount();
	ownership();
	event_registration_email();
	wishlist_clone();
	services();
	mailSent();
	selectChangeValue();
	register_function();
	checkout_order_received();
	my_account();
	forum_topic();
	service_type_buy_now();
	enquire_select();
	cf_form();
	ajax();
	ex_display_bikes();
	owl_carousels();
	page_components();
	matchheight();
	shopmenu();
	show_cat();
	aos();
	swiper_slider();
	//bike_bullets();
});

function utm_parameters() {
	//?utm_campaign=utm_campaign_val&utm_source=utm_source_val&utm_medium=utm_medium_val&utm_term=utm_term_val&utm_content=utm_content_val&gclid=gclid_val

	var $url_parameters_arr = [];
	$utm_campaign = getUrlParameter('utm_campaign');
	$utm_source = getUrlParameter('utm_source');
	$utm_medium = getUrlParameter('utm_medium');
	$utm_term = getUrlParameter('utm_term');
	$utm_content = getUrlParameter('utm_content');
	$gclid = getUrlParameter('gclid');
	if ($utm_campaign) {
		$url_parameters_arr.push('utm_campaign=' + $utm_campaign);
	}
	if ($utm_source) {
		$url_parameters_arr.push('utm_source=' + $utm_source);
	}
	if ($utm_medium) {
		$url_parameters_arr.push('utm_medium=' + $utm_medium);
	}
	if ($utm_term) {
		$url_parameters_arr.push('utm_term=' + $utm_term);
	}
	if ($utm_content) {
		$url_parameters_arr.push('utm_content=' + $utm_content);
	}
	if ($gclid) {
		$url_parameters_arr.push('gclid=' + $gclid);
	}

	var $url_parameters = '';
	$url_parameters_arr.forEach(function callback(value, index) {
		if (index == 0) {
			$url_parameters = $url_parameters.concat('?', value);
		} else {
			$url_parameters = $url_parameters.concat('&', value);
		}

	});

	if ($url_parameters) {
		jQuery('a').each(function (index, el) {
			var $href = jQuery(this).attr('href');
			if (($href) && ($href.startsWith('https://www.ccm-motorcycles.com') || $href.startsWith('/')) && !$href.startsWith('https://www.ccm-motorcycles.com/wp-content/')) {
				jQuery(this).attr('href', $href.concat($url_parameters));
			}
		});
	}
	console.log($url_parameters);

}
function bike_bullets() {
	jQuery('.drag_element .point_style').each(function (index, el) {
		$html = jQuery(this).attr('data-html');
		jQuery('<span class="hover">' + $html + '</span>').appendTo(jQuery(this));
	});
}
function aos() {
	if (jQuery('body').hasClass('body-page-components')) {
		AOS.init({
			once: true
		});
	}
}
function owl_carousels() {
	if (jQuery('.ex-bike-display-owl').length != 0) {
		jQuery('.ex-bike-display-owl').owlCarousel({
			loop: true,
			autoplay: false,
			autoplaySpeed: 2000,
			autoplayHoverPause: false,
			mouseDrag: true,
			nav: true,
			navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
			margin: 0,
			dots: false,
			items: 1
		});
	}


	if (jQuery('.hero-carousel').length != 0) {

		var $hero_carousel = jQuery('.hero-carousel');

		$hero_carousel.on('initialized.owl.carousel', function (event) {
			$hero_carousel.find('.owl-item.active .item .right-side').css('margin-left', '-105px');
			$hero_carousel.find('.fake-owl-navs').click(function (event) {
				$hero_carousel.find(jQuery(this).attr('target')).click();
			});
		});


		$hero_carousel.on('translated.owl.carousel', function (event) {
			$hero_carousel.find('.owl-item.active .item .right-side').css('margin-left', '-105px');
			$hero_carousel.find('.owl-item:not(.active) .item .right-side').css('margin-left', 0);
		});


		$hero_carousel.owlCarousel({
			loop: true,
			stagePadding: 0,
			margin: 0,
			nav: true,
			dots: false,
			singleItem: true,
			autoplay: true,
			autoplayTimeout: 6000,
			autoplaySpeed: 1200,
			navSpeed: 1200,
			items: 1
		});
	}

}

function swiper_slider() {
	if (jQuery('body').hasClass('body-page-components')) {

		var swiperHome = new Swiper(".mySwiper-Home", {
			slidesPerView: 2,
			loop: true,
			centeredSlides: true,
			parallax: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
				type: 'bullets',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			breakpoints: {

				0: {
					slidesPerView: 1,
					spaceBetween: 10
				},

				481: {
					slidesPerView: 2,
					spaceBetween: 20,
				},

				768: {
					spaceBetween: 30,
				},


				992: {
					spaceBetween: 40,
				},

				1024: {
					spaceBetween: 50,
				},


			}
		});

		var mySwiperThumbs = new Swiper(".mySwiperThumbs-Current", {
			loop: true,
			spaceBetween: 0,
			slidesPerView: 6,
			watchSlidesProgress: true,
		});


		var mySwiper_Header = new Swiper(".mySwiper-Header-Current", {
			slidesPerView: 2,
			loop: true,
			centeredSlides: true,
			parallax: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
				type: 'bullets',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			breakpoints: {

				0: {
					slidesPerView: 1,
					spaceBetween: 10
				},

				481: {
					slidesPerView: 2,
					spaceBetween: 20,
				},

				768: {
					spaceBetween: 30,
				},


				992: {
					spaceBetween: 40,
				},

				1024: {
					spaceBetween: 50,
				},
			},
			thumbs: {
				swiper: mySwiperThumbs,
			},



		});


		var mySwiperThumbs = new Swiper(".mySwiperThumbs-Previous", {
			loop: true,
			spaceBetween: 0,
			slidesPerView: 6,
			watchSlidesProgress: true,
		});


		var mySwiper_Header = new Swiper(".mySwiper-Header-Previous", {
			slidesPerView: 2,
			loop: true,
			centeredSlides: true,
			parallax: true,
			pagination: {
				el: ".swiper-pagination",
				clickable: true,
				type: 'bullets',
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
			breakpoints: {

				0: {
					slidesPerView: 1,
					spaceBetween: 10
				},

				481: {
					slidesPerView: 2,
					spaceBetween: 20,
				},

				768: {
					spaceBetween: 30,
				},


				992: {
					spaceBetween: 40,
				},

				1024: {
					spaceBetween: 50,
				},
			},
			thumbs: {
				swiper: mySwiperThumbs,
			},

		});
	}
}

function ex_display_bikes() {
	jQuery("#ex-display-order").change(function (e) {
		e.preventDefault();
		jQuery(this).submit();
	});
}

function ajax() {
	jQuery("#resource-hub-form").change(function (e) {
		e.preventDefault();
		var bike_id = jQuery("#bike_id").val();
		var resource_type = jQuery("#resource_type").val();
		$loading = jQuery('<div class="loading"> <i class="fas fa-spinner rotating"> </div>');
		jQuery('#resource-hub-form').addClass('searching');

		jQuery('#results .row').html($loading);
		jQuery.ajax({
			type: "POST",
			url: "/wp-admin/admin-ajax.php",
			data: {
				action: 'research_hub',
				bike_id: bike_id,
				resource_type: resource_type,
			},
			success: function (response) {
				jQuery('#results .row').html(response);
				jQuery('#resource-hub-form').removeClass('searching');
			}
		});
	});
}
function wishlist_discount() {
	$ownership = jQuery('body').attr('ownership');
	$wishlist_item = jQuery('.tinvwl-theme-style .tinvwl-table-manage-list .wishlist_item');
	setTimeout(function () {
		if ($ownership == 'owner') {
			$wishlist_item.each(function (index, el) {
				$this = jQuery(this);
				$price = $this.find('.product-price');
				var $price_span = $this.find('.product-price .woocommerce-Price-amount').text();
				$price.addClass('discounted');
				var $the_price = $price_span.replace("£", "").replace(',', '');
				var $the_discounted_price = parseFloat($the_price) * .1;

				$final_dicounted_price = $the_price - $the_discounted_price;
				$discounted_price = jQuery('<span class="discounted_price">£' + $final_dicounted_price.toFixed(2) + '</span>');
				$discounted_price.insertAfter($this.find('.product-price .woocommerce-Price-amount'));
			});
		}
	}, 300);
}


function ownership() {
	setTimeout(function () {
		var $ownership = jQuery('input[name="ownership"]');
		$do_you_own = jQuery('.do-you-own ul li label');
		$do_you_own_selected = jQuery('.do-you-own ul li label.selected input').val();
		if ($do_you_own_selected == "Yes, I'm a CCM owner!") {
			$do_you_own_selected_val = 'yes';
			jQuery('.bike-list-wrapper').removeClass('acf-hidden');
		} else {
			$do_you_own_selected_val = 'no';
		}

		$ownership.attr('value', $do_you_own_selected_val);
		$do_you_own.click(function (event) {
			$val = jQuery(this).find('input').val();
			if ($val == "Yes, I'm a CCM owner!") {
				$the_val = 'yes';
			} else {
				$the_val = 'no';
			}
			$ownership.attr('value', $the_val);

			console.log($the_val);

		});
	}, 500);

}

function event_registration_email() {
	$event_register = jQuery('#event-register');
	$event_cf7 = jQuery('input[name="event-cf7"]');
	$first_name_cf7 = jQuery('input[name="first-name-cf7"]');
	$last_name_cf7 = jQuery('input[name="last-name-cf7"]');
	$email_cf7 = jQuery('input[name="email-cf7"]');
	$phone_cf7 = jQuery('input[name="phone-cf7"]');
	$reg_status_cf7 = jQuery('input[name="reg-status-cf7"]');
	$subject_cf7 = jQuery('input[name="subject-cf7"]');
	$postcode_cf7 = jQuery('input[name="postcode-cf7"]');

	$event_register.submit(function (event) {
		$first_name_val = jQuery('input[name="first_name"]').val();
		$last_name_val = jQuery('input[name="last_name"]').val();
		$email_val = jQuery('input[name="email"]').val();
		$phone_val = jQuery('input[name="phone"]').val();
		$event_name_val = jQuery('input[name="event_name"]').val();
		$subject = jQuery('input[name="subject"]').val();
		$postcode_val = jQuery('input[name="postcode"]').val();
		$reg_status_val = jQuery('input[name="reg_status"]').val();

		$wpcf7_submit = jQuery('.wpcf7-submit');
		$event_cf7.val($event_name_val);
		$first_name_cf7.val($first_name_val);
		$last_name_cf7.val($last_name_val);
		$email_cf7.val($email_val);
		$phone_cf7.val($phone_val);
		$subject_cf7.val($subject);
		$reg_status_cf7.val($reg_status_val);
		$postcode_cf7.val($postcode_val);
		$wpcf7_submit.click();

	});
}



function wishlist_clone() {
	$wishlist_page = jQuery('.wishlist-page');
	$wishlist_page.clone().insertBefore('.social-buttons');
}

function services() {
	$service = jQuery('.service');
	$service_name = jQuery('.service .services .name');
	$service.each(function (index, el) {
		jQuery(this).find('.name').click(function (event) {
			$name = jQuery(this);
			$table = jQuery(this).next();
			$scrolltop = jQuery(this).parent().offset().top;
			if ($table.hasClass('hide-table')) {
				setTimeout(function () {
					jQuery('.service .table-con').addClass('hide-table');
					jQuery('.service .name').removeClass('active');
				}, 100);
			}
			setTimeout(function () {
				if ($table.hasClass('hide-table')) {
					jQuery(window).scrollTop($scrolltop - 72);
				}
			}, 200);
			setTimeout(function () {
				if ($table.hasClass('hide-table')) {
					$name.addClass('active');
					$table.removeClass('hide-table');
				} else {
					$table.addClass('hide-table');
					$name.removeClass('active');
				}

			}, 500);
		});
	});
}

function enquire_select() {
	jQuery('select[name="where-did-you-find-us"] option:first-child').text('Where did you find out about us?*');
}

function selectChangeValue() {
	$('.price ').val('‎£139.00');
	$('.price ').attr('disabled', 'disabled');
	$('.service_location').on('change', function () {
		var $value = $('.service_select ').children("option:selected").val();
		var $location = $('option:selected', this).attr('value');
		select_service($value, $location);
	});
	$('.service_select').on('change', function () {
		var $location = $('.service_location ').children("option:selected").val();
		var $value = $('option:selected', this).attr('value');
		select_service($value, $location);
	});
}

function mailSent() {
	document.addEventListener('wpcf7mailsent', function (event) {

		if ('4098' == event.detail.contactFormId) {
			setTimeout(function () {
				window.open(jQuery('.service-link').attr('href'), '_blank');
				return false;
			}, 500);
		} else if ('11559' == event.detail.contactFormId) {
			setTimeout(function () {
				window.open(jQuery('.service-link').attr('href'), '_blank');
				return false;
			}, 500);
		} else if ('3989' == event.detail.contactFormId) {
			setTimeout(function () {
				window.location.href = 'http://ccm-motorcycles.com/wishlist/thank-you';
			}, 200);
		} else if ('4135' == event.detail.contactFormId) {
			if (window.history.replaceState) {
				window.history.replaceState(null, null, window.location.href);
			}
		}
	}, false);
}


function register_function() {
	jQuery('input#reg_password').keyup(function (event) {
		setTimeout(function () {
			jQuery('.woocommerce-form-register__submit').removeAttr('disabled');
			jQuery('.woocommerce-form-register__submit').removeClass('disabled');
		}, 100);
	});

	jQuery('input#reg_confirm_password').keyup(function (event) {
		setTimeout(function () {
			jQuery('.woocommerce-form-register__submit').removeAttr('disabled');
			jQuery('.woocommerce-form-register__submit').removeClass('disabled');
		}, 100);
	});

	jQuery('.acf-field-5ced50e8d2411').addClass('acf-hidden');
}


function checkout_order_received() {
	$button = jQuery('<a class="button wc-backward" href="https://www.ccm-motorcycles.com/club-news">Back to CLUB CCM</a>');
	$order_print = jQuery('.order-print');
	$button.appendTo($order_print);


	$order_details = jQuery('ul.order_details');
	$add_message = jQuery('<p>If your order includes a service, a member of our servicing team will be in touch soon to get you booked in.</p>');
	$add_message.insertAfter($order_details);

}

function my_account() {
	$user_type_orig_field = jQuery('div[data-name="do_you_own_a_ccm_motorcycle"] label');
	$user_type_orig = jQuery('input[name="acf[field_5eb16b9ef7297]"]:checked').val();
	$user_type = jQuery('input[name="user_type"]').val($user_type_orig);
	$user_type_orig_field.click(function (event) {
		$val = jQuery(this).find('input').val();
		$user_type = jQuery('input[name="user_type"]').val($val);
	});


	$submit_button = jQuery('button[name="save_account_details"]');


	$num = sessionStorage.getItem("num");

	sessionStorage.setItem("num", 1);
	$submit_button.click(function (event) {
		$user_type_val = $user_type.val();
		if ($num == 1) {
			if ($user_type_val == "Yes, I'm a CCM owner!" && $user_type_orig == "No, I'm just an enthusiast!") {
				jQuery("#wpcf7-f4832-p305-o1 form").submit();
			}
		}
		$num++;
	});
}


function forum_topic() {
	$loop_item = jQuery('.bbp-body div[class*="loop-item-"]');
	$loop_item.each(function (index, el) {
		$this = jQuery(this);
		$br = $this.find('br');
		$br.each(function (index, el) {
			$this = jQuery(this);
			$br_clone = $this.clone();
			$br_clone.insertAfter($this);
		});
	});
}

function service_type_buy_now() {
	$buy_now = jQuery('.buy-now span');
	$buy_now.click(function (event) {
		jQuery(window).scrollTop(465);
		$book_a_service = jQuery('.nav-pills li a[href="#book-a-service"]');
		$select_val = jQuery(this).attr('select-val');
		$location_val = jQuery(this).attr('location-val');

		select_service($select_val, $location_val);
		$service_types = jQuery('select[name="service_types"]');
		$service_location = jQuery('select[name="service_location"]');

		$service_types.val($select_val);
		$service_location.val($location_val);
		$book_a_service.click();
	});
}

function select_service($value, $location) {
	if ($value == "CCM Spitfire First Service") {
		if ($location == 'CCM Factory') {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4185");
			$('.service-link').text($value);
			$('.price ').val('‎£199.00');
			$('.the-price span ').text('‎£199.00');
			$('.the-location span ').text('CCM Factory');
		} else {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4184");
			$('.service-link').text($value);
			$('.price ').val('‎£329.00');
			$('.the-price span ').text('‎£329.00');
			$('.the-location span ').text('Home address');
		}
		$('.the-service span ').text($value);
	} else if ($value == "Annual") {
		if ($location == 'CCM Factory') {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4187");
			$('.service-link').text($value);
			$('.price ').val('‎£239.00');
			$('.the-price span ').text('‎£239.00');
			$('.the-location span ').text('CCM Factory');
		} else {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4186");
			$('.service-link').text($value);
			$('.price ').val('‎£369.00');
			$('.the-price span ').text('‎£369.00');
			$('.the-location span ').text('Home address');
		}
		$('.the-service span ').text($value);
	} else if ($value == "4000 Mile") {
		if ($location == 'CCM Factory') {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4189");
			$('.service-link').text($value);
			$('.price ').val('‎£329.00');
			$('.the-price span ').text('‎£329.00');
			$('.the-location span ').text('CCM Factory');
		} else {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4188");
			$('.service-link').text($value);
			$('.price ').val('‎£459.00');
			$('.the-price span ').text('‎£459.00');
			$('.the-location span ').text('Home address');
		}
		$('.the-service span ').text($value);
	} else if ($value == "7500 Mile") {
		if ($location == 'CCM Factory') {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4193");
			$('.service-link').text($value);
			$('.price ').val('‎£409.00');
			$('.the-price span ').text('‎£409.00');
			$('.the-location span ').text('CCM Factory');
		} else {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4192");
			$('.service-link').text($value);
			$('.price ').val('‎£579.00');
			$('.the-price span ').text('‎£579.00');
			$('.the-location span ').text('Home address');
		}
		$('.the-service span ').text($value);
	} else if ($value == "3 YEARS SERVICE PACK") {
		if ($location == 'CCM Factory') {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4198");
			$('.service-link').text($value);
			$('.price ').val('‎£699.00');
			$('.the-price span ').text('‎£699.00');
			$('.the-location span').text('CCM Factory');
		} else {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4199");
			$('.service-link').text($value);
			$('.price ').val('‎£1079.00');
			$('.the-price span ').text('‎£1079.00');
			$('.the-location span ').text('Home address');
		}
		$('.the-service span ').text($value);
	} else if ($value == "1Yr Extended Factory Supported Warranty") {
		$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4194");
		$('.service-link').text($value);
		$('.price ').val('‎£699.00');
		$('.the-price span ').text('‎£699.00');
		$('.the-location span ').text('CCM Factory');
		$('.the-service span ').text($value);
	} else if ($value == "CCM Service Pack & 1Yr Extended Warranty Offer*") {
		if ($location == 'CCM Factory') {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4197");
			$('.service-link').text($value);
			$('.price ').val('‎£1,078.00');
			$('.the-price span ').text('‎£1,078.00');
			$('.the-location span ').text('CCM Factory');
		} else {
			$('.service-link').prop('href', "https://www.ccm-motorcycles.com//cart/?add-to-cart=4196");
			$('.service-link').text($value);
			$('.price ').val('‎£1439.00');
			$('.the-price span ').text('‎£1439.00');
			$('.the-location span ').text('Home address');
		}
		$('.the-service span ').text($value);
	}
	if ($value == "1Yr Extended Factory Supported Warranty") {
		$('select[name="service_location"] option:nth-child(2)').css('display', 'none');
	} else {
		$('select[name="service_location"] option:nth-child(2)').css('display', 'initial');
	}
}

function cf_form() {
	$how_did_you = jQuery('#how-did-you');
	$please_specify = jQuery('#please-specify');
	$how_did_you.change(function (event) {
		$val = jQuery(this).val();
		if ($val == 'Other') {
			$please_specify.removeClass('dist-none');
		} else {
			$please_specify.addClass('dist-none');
		}
	});
}


function page_components() {
	if (jQuery('#fading-owl').length != 0) {
		jQuery('#fading-owl').owlCarousel({
			loop: true,
			autoplay: true,
			autoplayHoverPause: false,
			mouseDrag: false,
			animateOut: 'fadeOut',
			nav: false,
			margin: 0,
			dots: false,
			items: 1
		});
	}

	if (jQuery('.banner-slider-carousel').length != 0) {
		jQuery('.banner-slider-carousel').owlCarousel({
			loop: true,
			autoplay: true,
			autoplaySpeed: 500,
			autoplayTimeout: 5000,
			autoplayHoverPause: false,
			mouseDrag: false,
			nav: true,
			navText: ['', ''],
			margin: 0,
			dots: false,
			items: 1
		});
	}
	$technical_specifications_js = jQuery('.technical-specifications-js');

	$technical_specifications_js.each(function (index, el) {
		var $this = jQuery(this);
		$this.find('.btn-expand .parent').click(function (event) {
			console.log('test');
			$this.find('.specs .the-specs.open').addClass('expand-specs');
			$this.find('.btn-expand').addClass('dist-none');
			$this.find('.btn-collapse').removeClass('dist-none');
		});
		$this.find('.btn-collapse .parent').click(function (event) {
			$this.find('.specs .the-specs.open').removeClass('expand-specs');
			$this.find('.btn-expand').removeClass('dist-none');
			$this.find('.btn-collapse').addClass('dist-none');
		});
		$this.find('.toggle span').click(function (event) {
			var $clicked_span = jQuery(this);
			var $clicked = jQuery(this).attr('data-target');
			$this.find('.btn-expand').removeClass('dist-none');
			$this.find('.btn-collapse').addClass('dist-none');
			setTimeout(function () {
				$this.find('.toggle span').removeClass('active')
				$this.find('.specs .the-specs').removeClass('open expand-specs');
			}, 100);
			setTimeout(function () {
				$clicked_span.addClass('active');
				jQuery($clicked).addClass('open');
			}, 300);
		});
	});
	$technical_specifications = jQuery('.technical-specifications:not(.technical-specifications-js)');



	$technical_specifications.find('.expand span').click(function (event) {
		$technical_specifications.find('.specs .the-specs.open').addClass('expand-specs');
	});

	$technical_specifications.find('.toggle span').click(function (event) {
		$clicked_span = jQuery(this);
		$clicked = jQuery(this).attr('data-target');
		if ($clicked != '.engine') {
			$technical_specifications.find('.expand').addClass('dist-none');
		} else {
			$technical_specifications.find('.expand').removeClass('dist-none');
		}
		setTimeout(function () {
			$technical_specifications.find('.toggle span').removeClass('active')
			$technical_specifications.find('.specs .the-specs').removeClass('open expand-specs');
		}, 100);
		setTimeout(function () {
			$clicked_span.addClass('active');
			jQuery($clicked).addClass('open');
			$technical_specifications.find('.expand span').removeClass('dist-none');
		}, 300);
	});

	$anchor_modal = jQuery('.anchor-modal:not(.phone-number)');
	$anchor_modal.click(function (event) {
		$data_target = jQuery(this).attr('data-target');
		jQuery($data_target).addClass('open');
		jQuery('html').addClass('overflow-hidden');
	});
	$exit_modal = jQuery('.exit-modal');
	$exit_modal.click(function (event) {
		$data_target = jQuery(this).attr('data-target');
		jQuery($data_target).removeClass('open');
		jQuery('html').removeClass('overflow-hidden');
	});

	$pulsing_circle = jQuery('.the-bike .pulsing-circle');
	$pulsing_circle.click(function (event) {
		$data_target = jQuery(this).attr('data-target');
		setTimeout(function () {
			jQuery('.mobile-text.target span').removeClass('open');
		}, 100);
		setTimeout(function () {
			jQuery($data_target).addClass('open');
		}, 300);
	});

	jQuery('input[name="page-submitted"]').val(jQuery('#enquire-now-modal').attr('page'));

	jQuery('#wpcf7-f5845-o1 .btn-box .circle').click(function (event) {
		jQuery('#wpcf7-f5845-o1 .btn-box input[type="submit"]').click();
	});

	document.addEventListener('wpcf7mailsent', function (event) {
		if ('5845' == event.detail.contactFormId) {
			setTimeout(function () {
				jQuery('#enquire-now-modal').removeClass('open');
				jQuery('html').removeClass('overflow-hidden');
			}, 3000);

		}
	}, false);

	setTimeout(function () {
		jQuery('.page-template-page-blackout-vip').addClass('opacity-1');
		jQuery('.page-template-page-blackout').addClass('opacity-1');
	}, 500);
}

function matchheight() {
	jQuery('.mh').matchHeight();
}





function shopmenu() {
	$innerWidth = window.innerWidth;
	$cat = jQuery('<span class="show-cat"> Categories </span>');
	$show_cat = jQuery('.show-cat');
	$menu = jQuery('body.woocommerce section.sp-banner h2');
	if ($innerWidth < 992) {
		if ($show_cat.length == 0) {
			$cat.appendTo($menu);
		}
	} else {
		$show_cat.remove();
	}
}


function show_cat() {
	$nav = jQuery('.accessories-banner > .navbar');
	jQuery('.show-cat').click(function (event) {
		if ($nav.hasClass('open')) {
			$nav.removeClass('open');
		} else {
			$nav.addClass('open');
		}
	});
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
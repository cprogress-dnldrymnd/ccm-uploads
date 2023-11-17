var fixWidthHistory = function(){
	if ($('.page-template-page-ccmracing-php').length > 0) { 
	    //$('.timeline-list-wrap .box-item').each(function(){
	    	
	 	var w = $('.timeline-list').width();
	    var x = $('.timeline-list-wrap .box-item').length
	    var y = w / x;
	    var z = w + 'px';
	    $('.timeline-list-wrap .box-item').css('width', z);
	}
};

setInterval(function(){
	fixWidthHistory();
}, 100);

$(document).ready(function() {
	
	$(".gallery#bike-gallery .images").justifiedGallery({
		rowHeight: 250,
		margins: 0,
		lastRow: 'justify',
		captions: true
	});
	$('#news-slider').owlCarousel({
		loop:true,
		items: 1,
		dotsContainer: '#customDots',
	})
	
	$('#bike-slider').owlCarousel({
		loop:true,
		items: 1,
		stagePadding: 100,
		dots: false,
		nav: true,
		navText : ["<span class='prev'></span>","<span class='next'></span>"],
		// breakpoint from 0 up
		responsive : {
			0 : {
				stagePadding: 25,
				items: 1,
			},
			// breakpoint from 767 up
			767 : {
				items: 1,
				stagePadding: 50,
			},
			// breakpoint from 1023 up
			1023 : {
				items: 1,
				stagePadding: 75,
			},
			// breakpoint from 1365 up
			1365 : {
				items: 1,
				stagePadding: 100,
			}
		}
		// dotsContainer: '#customDots',
	})

	$('#banner-slider').owlCarousel({
		items: 1,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:false,
		dotClass: 'owl-dot',
		dotsClass: 'owl-dots',
		dots: true,
	})

	$('#c-img-slider').owlCarousel({
		items: 4,
		autoplay:true,
		autoplayTimeout:2000,
		autoplayHoverPause:false,
		loop: true,
		responsive : {
		    // breakpoint from 0 up
		    0 : {
		       items: 1,
		    },
		    768 : {
		        items: 2,
		    },
		    992 : {
		    	items: 3,
		    },
		    1200 : {
		    	items: 4,
		    }
		}
	})
	
	$.fn.equalHeights = function() {
		var max_height = 0;
		$(this).each(function() {
			max_height = Math.max($(this).height(), max_height);
		});
		$(this).each(function() {
			$(this).height(max_height);
		});
	};
	$('.match-height').equalHeights();
	
	$('.spec-title').text($('.specs .card ul li.active').text());

	$('.specs .card ul li').on('click', function(){
		var active = $(this).text();
		$('.spec-title').text(active);
	})	

	$(".has-dropdown .menu-parent").click( function() {
		$(this).toggleClass('active');

		var dropdownMenu = $(this).siblings('.dropdown-menu');
		var breadCrumb = $(this).siblings('.dropdown-menu').find('.megamenu-breadcrumb');

		if ($(this).hasClass('active')) {
			dropdownMenu.fadeIn('fast');
			$('body').addClass('overlay');
		} else {
			dropdownMenu.fadeOut('fast');
			$('body').removeClass('overlay');
		}

		if (breadCrumb.hasClass('active')) {
			breadCrumb.removeClass('active');
			breadCrumb.siblings('.container').fadeOut('fast');
		}

		if($('.menu-item-has-children').hasClass('open')) {
			$('.menu-item-has-children .dropdown-menu').fadeOut('fast');
			$('.menu-item-has-children').removeClass('open');
			// $('body').removeClass('overlay');
		}
	});

	$('.nav.navbar-nav.nav-menu-handler li.menu-item-has-children > a').on('click', function(e) {
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
 	})

 	// $('#menu-right li.menu-item-has-children a').on('click', function(e) {
		// e.preventDefault();
		// $('body').addClass('overlay');
		// $(this).siblings('.dropdown-menu').fadeIn('fast');

		// if($(this).parent().hasClass('open')) {
		// 	$('body').removeClass('overlay');
		// 	$(this).siblings('.dropdown-menu').fadeOut('fast');
		// }
 	// })

	$('html').click(function() {
		if($(".has-dropdown .menu-parent").hasClass('active')) {
			$('ul.dropdown-menu.mega-menu').css('display', 'none');
			$('body').removeClass('overlay');
			$(".has-dropdown .menu-parent").removeClass('active');
		}
		if($(".dropdown-toggle").parent().hasClass('open')) {
			$('ul.dropdown-menu').css('display', 'none');
			$('body').removeClass('overlay');
			$(".dropdown-toggle").parent().hasClass('open');
		}
	});

	$('.has-dropdown', 'ul.nav.navbar-nav.nav-menu-handler', 'ul.dropdown-menu.mega-menu', '.menu-item-has-children .a').click(function(event){
    	event.stopPropagation();
	});

	$(".taxonomy-button").click( function() {
		$('.mega-dropdown-menu.active').hide();
		$('.mega-dropdown-menu.active').removeClass('active');
		$('.'+$(this).data('menu-name')).addClass('active').show();
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
    $('#cat-list.news-filter li a').on('click', function(e) {
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
            beforeSend: function(xhr) {
                $('#loader').fadeIn();
            },
            success: function(data) {
                $('#post-grid').html(data);
                $('#loader').fadeOut();
            }
        });
        return false;
    });

    $("#ship-to-different-address-checkbox").on('click', function(){
    	$('.shipping_address').slideToggle();
    });
    $("#Enquiry-Form-button").click(function(){
      $(".Enquiry-Form-mn").toggleClass("open");
      if ($('.Enquiry-Form-mn.onetime-popup.open').length > 0) { $('.Enquiry-Form-mn').removeClass("open")}
      if ($('.Enquiry-Form-mn.onetime-popup').length > 0) { $('.Enquiry-Form-mn').removeClass("onetime-popup")}
      
    });
    
    
    
});
$(document).ready(function(e){
// 	 	var removepopup = setTimeout(function(){ if ($('.Enquiry-Form-mn.onetime-popup').length > 0) { $('.Enquiry-Form-mn').removeClass("onetime-popup");} }, 5000)
// 		$(".Enquiry-Form-mn input").focus(function(){
// 		  clearTimeout(removepopup);
// 		});
setTimeout(function(){
    if(Cookies.get('popState') != 'shown'){
        $('.Enquiry-Form-mn').addClass("onetime-popup");
        Cookies.set('popState', 'shown');
    }}, 5000);
	});
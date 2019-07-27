;(function () {
	
	'use strict';



	// iPad and iPod detection	
	var isiPad = function(){
		return (navigator.platform.indexOf("iPad") != -1);
	};

	var isiPhone = function(){
	    return (
			(navigator.platform.indexOf("iPhone") != -1) || 
			(navigator.platform.indexOf("iPod") != -1)
	    );
	};


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};

	var burgerMenu = function() {

		$('.js-colorlib-nav-toggle').on('click', function(event) {
			event.preventDefault();
			var $this = $(this);
			if( $('body').hasClass('menu-show') ) {
				$('body').removeClass('menu-show');
				$('#colorlib-main-nav > .js-colorlib-nav-toggle').removeClass('show');
			} else {
				$('body').addClass('menu-show');
				setTimeout(function(){
					$('#colorlib-main-nav > .js-colorlib-nav-toggle').addClass('show');
				}, 900);
			}
		})
	};

	// Animations

	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated');
							} else {
								el.addClass('fadeInUp animated');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};

	var counterWayPoint = function() {
		if ($('#colorlib-counter').length > 0 ) {
			$('#colorlib-counter').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);					
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

	// Owl Carousel
	var owlCarouselFeatureSlide = function() {
		
		var owl2 = $('.owl-carousel');
		owl2.owlCarousel({
			animateOut: 'fadeOut',
		   animateIn: 'fadeIn',
		   autoplay: true,
		   loop:true,
		   margin:0,
		   nav:false,
		   dots: false,
		   autoHeight: true,
		   items: 1,
		   navText: [
		      "<i class='icon-arrow-left3 owl-direction'></i>",
		      "<i class='icon-arrow-right3 owl-direction'></i>"
	     	]
		});
		var owl = $('.owl-carousel1');
		owl.owlCarousel({
			animateOut: 'fadeOut',
		   animateIn: 'fadeIn',
		   autoplay: false,
		   loop:true,
		   margin:0,
		   nav:true,
		   dots: false,
		   autoHeight: true,
		   responsive:{
		      0:{
		         items:1
		      },
		      600:{
		         items:1
		      },
		      1000:{
		         items:1
		      }
		   },
		   navText: [
		      "<i class='fas fa-arrow-left'></i>",
		      "<i class='fas fa-arrow-right'></i>"
	     	]
		});
			var owl = $('.destination-slider');
			owl.owlCarousel({
			  margin: 10,
			  nav: true,
			  loop: true,
			  dots: false,
			  responsive: {
				0: {
				  items: 1
				},
				600: {
				  items: 2
				},
				1000: {
				  items: 3
				}
			  }
			});
		
	};

	


	// Document on load.
	$(function(){
		fullHeight();
		burgerMenu();
		counterWayPoint();
		contentWayPoint();
		owlCarouselFeatureSlide();
	});


}());


(function($) {
	$.fn.menumaker = function(options) {  
	 var cssmenu = $(this), settings = $.extend({
	   format: "dropdown",
	   sticky: false
	 }, options);
	 return this.each(function() {
	   $(this).find(".button").on('click', function(){
		 $(this).toggleClass('menu-opened');
		 var mainmenu = $(this).next('ul');
		 if (mainmenu.hasClass('open')) { 
		   mainmenu.slideToggle().removeClass('open');
		 }
		 else {
		   mainmenu.slideToggle().addClass('open');
		   if (settings.format === "dropdown") {
			 mainmenu.find('ul').show();
		   }
		 }
	   });
	   cssmenu.find('li ul').parent().addClass('has-sub');
	multiTg = function() {
		 cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
		 cssmenu.find('.submenu-button').on('click', function() {
		   $(this).toggleClass('submenu-opened');
		   if ($(this).siblings('ul').hasClass('open')) {
			 $(this).siblings('ul').removeClass('open').slideToggle();
		   }
		   else {
			 $(this).siblings('ul').addClass('open').slideToggle();
		   }
		 });
	   };
	   if (settings.format === 'multitoggle') multiTg();
	   else cssmenu.addClass('dropdown');
	   if (settings.sticky === true) cssmenu.css('position', 'fixed');
	resizeFix = function() {
	  var mediasize = 1000;
		 if ($( window ).width() > mediasize) {
		   cssmenu.find('ul').show();
		 }
		 if ($(window).width() <= mediasize) {
		   cssmenu.find('ul').hide().removeClass('open');
		 }
	   };
	   resizeFix();
	   return $(window).on('resize', resizeFix);
	 });
	  };
	})(jQuery);
	
	(function($){
	$(document).ready(function(){
	$("#cssmenu").menumaker({
	   format: "multitoggle"
	});
	});
	})(jQuery);
	
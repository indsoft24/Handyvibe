;(function () {
	
	'use strict';

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#fh5co-offcanvas, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
	    
	    	
	    }
		});

	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="fh5co-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>');
		
		// Create mobile menu structure
		var mobileMenuHTML = `
			<div class="mobile-menu-header">
				<h3>Menu</h3>
			</div>
			<div class="mobile-menu-content">
				<ul class="mobile-menu-list"></ul>
			</div>
		`;
		
		$('#fh5co-offcanvas').html(mobileMenuHTML);
		
		// Clone and organize menu items
		var clone1 = $('.menu-1 > ul').clone();
		var clone2 = $('.menu-2 > ul').clone();
		
		// Combine and clean up menu items
		var allMenuItems = clone1.add(clone2.find('li'));
		var mainMenuItems = [];
		var searchItem = null;
		var cartItem = null;
		var loginItem = null;
		
		allMenuItems.each(function() {
			var $item = $(this);
			$item.removeClass('has-dropdown');
			$item.addClass('mobile-menu-item');
			
			// Add proper classes for styling
			if ($item.hasClass('search')) {
				$item.addClass('mobile-search-item');
				searchItem = $item;
			} else if ($item.hasClass('shopping-cart')) {
				$item.addClass('mobile-cart-item');
				cartItem = $item;
			} else if ($item.hasClass('login-btn-wrapper')) {
				loginItem = $item;
			} else if ($item.find('ul').length > 0) {
				$item.addClass('offcanvas-has-dropdown');
				mainMenuItems.push($item);
			} else {
				mainMenuItems.push($item);
			}
		});
		
		// Append items in correct order
		var $menuList = $('#fh5co-offcanvas .mobile-menu-list');
		
		// Add main navigation items
		mainMenuItems.forEach(function(item) {
			$menuList.append(item);
		});
		
		// Add search section
		if (searchItem) {
			$menuList.append(searchItem);
		}
		
		// Create bottom row container for cart and login
		if (cartItem || loginItem) {
			var $bottomRow = $('<div class="mobile-menu-bottom"></div>');
			
			if (cartItem) {
				$bottomRow.append(cartItem);
			}
			if (loginItem) {
				$bottomRow.append(loginItem);
			}
			
			$menuList.append($bottomRow);
		}

		// Add dropdown arrows to items that have dropdowns
		$('#fh5co-offcanvas .offcanvas-has-dropdown > a').each(function() {
			var $this = $(this);
			// Remove any existing arrows first
			$this.find('.dropdown-arrow').remove();
			
			// Add dropdown arrow
			$this.append('<i class="dropdown-arrow icon-arrow-down"></i>');
		});

		// Enhanced click dropdown menu on mobile
		$('#fh5co-offcanvas').on('click', '.offcanvas-has-dropdown > a', function(e){
			e.preventDefault();
			e.stopPropagation(); // Prevent event bubbling
			e.stopImmediatePropagation(); // Stop all event handlers
			
			var $this = $(this).parent();
			var $arrow = $(this).find('.dropdown-arrow');
			
			if ($this.hasClass('active')) {
				$this.removeClass('active').find('ul').slideUp(300);
				$arrow.removeClass('icon-arrow-up').addClass('icon-arrow-down');
			} else {
				$('.offcanvas-has-dropdown.active').removeClass('active').find('ul').slideUp(300);
				$('.offcanvas-has-dropdown.active > a .dropdown-arrow').removeClass('icon-arrow-up').addClass('icon-arrow-down');
				$this.addClass('active').find('ul').slideDown(300);
				$arrow.removeClass('icon-arrow-down').addClass('icon-arrow-up');
			}
		});

		// Add smooth animations and professional touches
		$('#fh5co-offcanvas').on('click', 'ul li a:not(.offcanvas-has-dropdown > a)', function(){
			// Add ripple effect only for non-dropdown links
			var $this = $(this);
			var ripple = $('<span class="ripple"></span>');
			$this.append(ripple);
			
			setTimeout(function(){
				ripple.remove();
			}, 600);
		});

		// Enhanced search functionality
		$('#fh5co-offcanvas .search input').on('focus', function(){
			$(this).parent().addClass('focused');
		}).on('blur', function(){
			$(this).parent().removeClass('focused');
		});

		// Add loading state for search
		$('#fh5co-offcanvas .search button').on('click', function(e){
			e.preventDefault();
			var $btn = $(this);
			var $input = $btn.siblings('input');
			
			if ($input.val().trim()) {
				$btn.html('<i class="icon-spinner2"></i>');
				$btn.prop('disabled', true);
				
				// Simulate search (replace with actual search logic)
				setTimeout(function(){
					$btn.html('<i class="icon-search"></i>');
					$btn.prop('disabled', false);
					$input.val('');
				}, 1500);
			}
		});

		$(window).resize(function(){
			if ( $('body').hasClass('offcanvas') ) {
    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
	    	}
		});
	};


	var burgerMenu = function() {

		// Function to close menu
		function closeMenu() {
			$('body').removeClass('overflow offcanvas');
			$('.js-fh5co-nav-toggle').removeClass('active');
			$('#fh5co-offcanvas ul li').removeClass('animate-in');
			$('.offcanvas-has-dropdown.active').removeClass('active').find('ul').slideUp(200);
			
			// Ensure menu is hidden after closing
			setTimeout(function() {
				$('#fh5co-offcanvas').css('display', 'none');
			}, 400); // Wait for transition to complete
		}

		// Function to open menu
		function openMenu() {
			$('body').addClass('overflow offcanvas');
			$('.js-fh5co-nav-toggle').addClass('active');
			
			// Show menu immediately
			$('#fh5co-offcanvas').css('display', 'block');
			
			// Animate menu items
			setTimeout(function(){
				$('#fh5co-offcanvas ul li').addClass('animate-in');
			}, 100);
		}

		// Toggle menu on hamburger button click
		$('body').on('click', '.js-fh5co-nav-toggle', function(event){
			event.preventDefault();
			event.stopPropagation();

			if ( $('body').hasClass('overflow offcanvas') ) {
				closeMenu();
			} else {
				openMenu();
			}
		});

		// Close menu when clicking outside
		$(document).on('click', function(e) {
			if ($('body').hasClass('offcanvas')) {
				if (!$(e.target).closest('#fh5co-offcanvas').length && 
					!$(e.target).closest('.js-fh5co-nav-toggle').length) {
					closeMenu();
				}
			}
		});

		// Close menu on escape key
		$(document).on('keydown', function(e) {
			if (e.keyCode === 27 && $('body').hasClass('offcanvas')) { // ESC key
				closeMenu();
			}
		});

		// Close menu when clicking on menu links (optional)
		$('#fh5co-offcanvas').on('click', 'a:not(.offcanvas-has-dropdown > a):not(.offcanvas-has-dropdown ul li a)', function(e) {
			// Only close if it's not a dropdown toggle or dropdown item
			e.stopPropagation();
			
			if (!$(this).parent().hasClass('offcanvas-has-dropdown') && 
				!$(this).closest('.offcanvas-has-dropdown').length) {
				setTimeout(function() {
					closeMenu();
				}, 300);
			}
		});

		// Prevent menu from closing when clicking inside it
		$('#fh5co-offcanvas').on('click', function(e) {
			e.stopPropagation();
		});

		// Prevent dropdown clicks from closing menu
		$('#fh5co-offcanvas').on('click', '.offcanvas-has-dropdown', function(e) {
			e.stopPropagation();
		});

		// Prevent dropdown submenu clicks from closing menu
		$('#fh5co-offcanvas').on('click', '.offcanvas-has-dropdown ul li a', function(e) {
			e.stopPropagation();
		});

		// Debug function (remove in production)
		window.debugMenu = function() {
			console.log('Menu state:', $('body').hasClass('offcanvas'));
			console.log('Toggle state:', $('.js-fh5co-nav-toggle').hasClass('active'));
			console.log('Menu visible:', $('#fh5co-offcanvas').is(':visible'));
		};
	};



	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};


	var dropdown = function() {

		$('.has-dropdown').mouseenter(function(){

			var $this = $(this);
			$this
				.find('.dropdown')
				.css('display', 'block')
				.addClass('animated-fast fadeInUpMenu');

		}).mouseleave(function(){
			var $this = $(this);

			$this
				.find('.dropdown')
				.css('display', 'none')
				.removeClass('animated-fast fadeInUpMenu');
		});

	};


	var tabs = function() {

		// Auto adjust height
		$('.fh5co-tab-content-wrap').css('height', 0);
		var autoHeight = function() {

			setTimeout(function(){

				var tabContentWrap = $('.fh5co-tab-content-wrap'),
					tabHeight = $('.fh5co-tab-nav').outerHeight(),
					formActiveHeight = $('.tab-content.active').outerHeight(),
					totalHeight = parseInt(tabHeight + formActiveHeight + 90);

					tabContentWrap.css('height', totalHeight );

				$(window).resize(function(){
					var tabContentWrap = $('.fh5co-tab-content-wrap'),
						tabHeight = $('.fh5co-tab-nav').outerHeight(),
						formActiveHeight = $('.tab-content.active').outerHeight(),
						totalHeight = parseInt(tabHeight + formActiveHeight + 90);

						tabContentWrap.css('height', totalHeight );
				});

			}, 100);
			
		};

		autoHeight();


		// Click tab menu
		$('.fh5co-tab-nav a').on('click', function(event){
			
			var $this = $(this),
				tab = $this.data('tab');

			$('.tab-content')
				.addClass('animated-fast fadeOutDown');

			$('.fh5co-tab-nav li').removeClass('active');
			
			$this
				.closest('li')
					.addClass('active')

			$this
				.closest('.fh5co-tabs')
					.find('.tab-content[data-tab-content="'+tab+'"]')
					.removeClass('animated-fast fadeOutDown')
					.addClass('animated-fast active fadeIn');


			autoHeight();
			event.preventDefault();

		}); 
	};

	var goToTop = function() {

		$('.js-gotop').on('click', function(event){
			
			event.preventDefault();

			$('html, body').animate({
				scrollTop: $('html').offset().top
			}, 500, 'easeInOutExpo');
			
			return false;
		});

		$(window).scroll(function(){

			var $win = $(window);
			if ($win.scrollTop() > 200) {
				$('.js-top').addClass('active');
			} else {
				$('.js-top').removeClass('active');
			}

		});
	
	};


	// Loading page
	var loaderPage = function() {
		$(".fh5co-loader").fadeOut("slow");
	};

	var counter = function() {
		$('.js-counter').countTo({
			 formatter: function (value, options) {
	      return value.toFixed(options.decimals);
	    },
		});
	};

	var counterWayPoint = function() {
		if ($('#fh5co-counter').length > 0 ) {
			$('#fh5co-counter').waypoint( function( direction ) {
										
				if( direction === 'down' && !$(this.element).hasClass('animated') ) {
					setTimeout( counter , 400);					
					$(this.element).addClass('animated');
				}
			} , { offset: '90%' } );
		}
	};

	var sliderMain = function() {
		
	  	$('#fh5co-hero .flexslider').flexslider({
			animation: "fade",
			slideshowSpeed: 5000,
			directionNav: true,
			start: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			},
			before: function(){
				setTimeout(function(){
					$('.slider-text').removeClass('animated fadeInUp');
					$('.flex-active-slide').find('.slider-text').addClass('animated fadeInUp');
				}, 500);
			}

	  	});

	  	$('#fh5co-hero .flexslider .slides > li').css('height', $(window).height());	
	  	$(window).resize(function(){
	  		$('#fh5co-hero .flexslider .slides > li').css('height', $(window).height());	
	  	});

	};

	var testimonialCarousel = function(){
		
		var owl = $('.owl-carousel-fullwidth');
		owl.owlCarousel({
			items: 1,
			loop: true,
			margin: 0,
			nav: false,
			dots: true,
			smartSpeed: 800,
			autoHeight: true
		});

	};

	
	$(function(){
		mobileMenuOutsideClick();
		offcanvasMenu();
		burgerMenu();
		contentWayPoint();
		dropdown();
		tabs();
		goToTop();
		loaderPage();
		counterWayPoint();
		sliderMain();
		testimonialCarousel();
	});


}());
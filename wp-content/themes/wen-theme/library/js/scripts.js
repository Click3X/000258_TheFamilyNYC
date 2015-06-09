/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y };
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
*/

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
*/
function loadGravatars() {
	// set the viewport using the function above
	viewport = updateViewportDimensions();
	// if the viewport is tablet or larger, we load in the gravatars
	if (viewport.width >= 768) {
	jQuery('.comment img[data-gravatar]').each(function(){
		jQuery(this).attr('src',jQuery(this).attr('data-gravatar'));
	});
	}
}

// MOBILE
var mobile = false;
// CHECK FOR MOBILE DEVICE
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		mobile = true;
}

console.log('This is mobile: ' + mobile);
// IF MOBILE - ADD CLASS
if(mobile) {
	jQuery('body').addClass('mobile');
}
// END MOBILE CHECL


jQuery(document).ready(function($) {
	
	// DISABLE HOVER ON SCROLL FOR SMOOTHER PERFORMANCE
	var body = document.body,
	timer;

	window.addEventListener('scroll', function() {
			clearTimeout(timer);

			if(! $('body').hasClass('disable-hover')) {
					$('body').addClass('disable-hover');
			}

			timer = setTimeout(function(){
					$('body').removeClass('disable-hover');
			}, 90);
	}, false);
	// END DISABLE HOVER


	// MENUS
	// MAIN MENU
	$('#hamburger, #menu-close').click(toggleOverlay);
	// WORK
	$('#work-menu-link').click(toggleWorkOverlay);
	// CLOSE MENU
	$('#work-menu-close').click(closeWorkOverlay);

	// HIGHLIGHT SELECTED MENU ITEM
	var url = window.location;
	$('a[href="'+url+'"]').parent('#menu-main-menu>li').addClass('main-menu-selected');

	if ($('body').attr('id') != "home" ) {
		$('body').addClass('non-home-header');
	}

	// TOGGLE MAIN MENU
	function toggleOverlay() {
		$('#mobile-menu').toggleClass('menu-open');
		if ($('#mobile-menu').hasClass('menu-open')) {
			$('html,body').addClass('noScroll');
		} else {
			$('html,body').removeClass('noScroll');
		}
	}

	// TOGGLE WORK MENU
	function toggleWorkOverlay() {
		$('#work-menu').toggleClass('menu-open');
		if ($('#work-menu').hasClass('menu-open')) {
			$('html,body').addClass('noScroll');
		} else {
			$('html,body').removeClass('noScroll');
		}
	}

	// CLOSE MENU 
	function closeWorkOverlay() {
		console.log('I have been clicked!');
		$('.menu-open').toggleClass('menu-open');
		$('html,body').removeClass('noScroll');
	}
	// END MENUS


	// HTML VIDEO CONTROLS
	// SHOW CONTROLS ON HOVER
	$("video").hover(function(event) {
		if(event.type === "mouseenter") {
				$(this).attr("controls", "");
		} else if(event.type === "mouseleave") {
				$(this).removeAttr("controls");
		}
	});
	// END HTML VIDEO CONTROLS


	// SLIDERS
	var newsSwiper = new Swiper('#news-container', {
		nextButton: '#news-container .arrow-left',
		prevButton: '#news-container .arrow-right',
		paginationClickable: true,
		spaceBetween: 0,
		// autoplay: 2500,
		autoplayDisableOnInteraction: false,
		loop: true
	});

	var teaMemberSwiper = new Swiper('#team-member-list-container', {
		nextButton: '#team-member-list-container .arrow-left',
		prevButton: '#team-member-list-container .arrow-right',
		paginationClickable: true,
		spaceBetween: 0,
		autoplay: 2500,
		autoplayDisableOnInteraction: false,
		loop: true
	});

	var familyMemSwiper = new Swiper('#family-member-list-container', {
		nextButton: '#family-member-list-container .arrow-left',
		prevButton: '#family-member-list-container .arrow-right',
		paginationClickable: true,
		spaceBetween: 0,
		slidesPerView: 'auto',
		autoplayDisableOnInteraction: false
	});
	// END SLIDERS

	

}); 
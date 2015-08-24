// PARALLAX TRIANGLE
jQuery(document).ready(function($) {

	if(!mobile) {
		console.log('Het from parallax tri');

		// GET ELEMENTS AND MAKE ARRAY
		var goldWrap = $('#gold-wrap'),
			greenWrap = $('#green-wrap'),
			stripeWrap = $('#stripe-wrap'),
			familyLogoHolder = $('#family-logo-holder'),
			wraps = [goldWrap, greenWrap, stripeWrap];

		var wHeight = $(window).height(),
			wWidth = $(window).width();

		var halfPadding = greenWrap.css('paddingBottom').slice(0,-2);
			halfPadding = (Number(halfPadding)/2) * -1 + 56;

		var paraContainer = $('#post-6-1'),
			paraHeightLimit = paraContainer.height();

		console.log('This is paraContainer', paraContainer);
		console.log('This is paraHeightLimit', paraHeightLimit);



		// makes the parallax elements
		function parallaxIt() {
		  // create variables
		  var $fwindow = $(window);
		  var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

		  greenWrap.css({
		 		'position':'fixed',
		 		'top':halfPadding
		 	});

		 familyLogoHolder.css({
		 		'position':'fixed',
		 		'top':0
		 });

		 goldWrap.css({
		 	'top':56
		 });


		  // on window scroll event
		  // $fwindow.on('scroll resize', function() {
		  //   scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		  //   paraHeightLimit = paraContainer.height();
		  // }); 

		  // for each of content parallax element
		  $('[data-type="content"]').each(function (index, e) {
		    var $contentObj = $(this);
		    var fgOffset = parseInt($contentObj.offset().top);
		    var yPos;
		    var speed = ($contentObj.data('speed') || 1 );
		    var transformVal;

		    console.log('This is contentObj: ');
		    console.dir($contentObj);
		    if( ($contentObj.attr('id') != "gold-wrap") && ($contentObj.attr('id') != "family-logo-holder") ) {
		    	var halfPadding = greenWrap.css('paddingBottom').slice(0,-2);
				halfPadding = (Number(halfPadding)/2) * -1 + 56;
				$contentObj.css('top',halfPadding);
		    }

		    var moveEl; 

		    if ( $contentObj.attr('id') == "family-logo" ) {
		    	moveEl = function() {
		    		if(scrollTop < (paraHeightLimit * 1.1) ) {
		    			yPos = fgOffset - scrollTop / speed; 
		    		} else {
		    			return false;
		    		}
		    	}
		    } else {
		    	moveEl = function() {
		    		if(scrollTop < (paraHeightLimit * 1.1) ) {
		    			yPos = scrollTop / speed; 
		    		} else {
		    			return false;
		    		}
		    	}
		    }

		    $fwindow.on('scroll resize', function (){
		    	scrollTop = window.pageYOffset || document.documentElement.scrollTop;
		    	paraHeightLimit = paraContainer.height();
		      	moveEl();
		      	transformVal = 'translate3d(0px,' + yPos + 'px,0px)';
				$contentObj.css('transform', transformVal);
		    });
		  });

		  // triggers winodw scroll for refresh
		  $fwindow.trigger('scroll');
		};

		if(wWidth > 480) {
			parallaxIt();
		}

		// $(window).on('resize', function() {
		// 	if(wWidth > 480) {
		// 		parallaxIt();		
		// 	}
		// })
	}
}); 
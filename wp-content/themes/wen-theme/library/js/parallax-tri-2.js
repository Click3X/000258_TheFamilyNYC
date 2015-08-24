// PARALLAX TRIANGLE
jQuery(document).ready(function($) {
	console.log('Het from parallax tri');


	var triPanels = $('.tri-outer-wrap');

	var num = triPanels.length;
	var count=0;
	var blurmod = 2;
	var scalemod = 1.5;
	var opacitymod = 0.5;
	var scrollmod = 1.5;

	var triHeader = $('#triangle-header');
	var triWrapper = $('#tri-logo-wrapper');

	var blobs = [];

	$.each(triPanels, function() {
		blobs.push(this);
	});

	
	console.log('This is your blobs');
	console.dir(blobs);

	function blob(count) {
		console.log('This is coords: ' + coords[count][2]/1400 );
		this.posZ = getRandomInt(1, 150) - 100;
		this.element = $('<div/>', { 'class':'tri '+ coords[count][4] + ' ' + coords[count][5] });
		this.element.css('left', (coords[count][2]/1400) * 100 + '%');
		this.startTop = (coords[count][3]/800) * 100;
		this.element.css({
			'top': this.startTop + '%',
			'width':(coords[count][0]/1400) * 100 + '%',
			'padding-bottom':(coords[count][1]/1400) * 1.4028 * 100 + '%',
			'height':0
		});
		this.element.appendTo(triHeader);
	}

	var transformVal;
	var wHeight = $(window).height();
	var wWidth = $(window).width();

	blob.prototype.updateTop = function() {
		console.log('This is from updateTop:');
		console.dir(this);
		// transformVal = 'translate3d(0px,' + (scrollTopPercent / 100 * (this.posZ) / 100 * scrollmod * wHeight).toFixed(0) + 'px,0px)';
		// this.element.css('transform', transformVal);
	};

	function getScreenSize() {
		wHeight = $(window).height();
		wWidth = $(window).width();
	}
	$(window).resize(getScreenSize);

	
	var scrollTopPercent = 0;
	var oldScrollTop = 0;
	var index, len;

	function doRenderTick() {
		// console.log('This is $(window).scrollTop():' + $(window).scrollTop());
		scrollTopPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height()) * 2 - 100;
		for (index = 0, len = blobs.length; index < len; ++index) {
			blobs[index].updateTop();
		}
	}


	function checkScroll() {
		requestAnimationFrame(checkScroll);
		if(count < num) {
			blobs.push(new blob(count));
			blobs[count].updateTop();
			count++;
		}
		if(oldScrollTop == 0) {
			oldScrollTop = $(window).scrollTop();
	  		doRenderTick();
		}
		if (oldScrollTop == $(window).scrollTop() ) {
			return;
		}
	  oldScrollTop = $(window).scrollTop();
	  doRenderTick();
	}
	checkScroll();


	function getRandomInt(min, max) {
	  return Math.floor(Math.random() * (max - min + 1)) + min;
	}
}); 
// PARALLAX TRIANGLE
jQuery(document).ready(function($) {
	console.log('Het from parallax tri');

	var colors = ["gold-foil","green-tri","stripe-tri"];
	var coords = [
		[992, 250],
		[284, -30],
		[49, 324],
		[830, -20],
		[354, 444],
		[265, 323],
		[197, 718],
		[1311, 206],
		[-22, 660],
		[1123, 822],
		[228, 43],
		[1344, 810],
		[225, 722],
		[1207, 573],
		[1098, 39],
		[1289, 535],
		[64, 908],
		[960, 615]
	]
	// var num = 100;
	var num = 36;
	var count=0;
	var blurmod = 2;
	var scalemod = 1.5;
	var opacitymod = 0.5;
	var scrollmod = 1.5;

	var triHeader = $('#triangle-header');
	var triWrapper = $('#tri-logo-wrapper');

	var blobs = [];

	function blob() {
		this.posZ = getRandomInt(1, 150) - 100;
		this.element = $('<div/>', { 'class':'tri'});
		this.element.addClass(colors[Math.floor(Math.random() * colors.length)]); //random bg color
		this.element.css('z-index', this.posZ);
		this.element.css('left', getRandomInt(0,120)-10 + '%');
		this.startTop = getRandomInt(0,120)-10;
		this.element.css('top', this.startTop + '%');
		//this.element.css('-webkit-filter', 'blur(' + (Math.abs(this.posZ) / 100 * blurmod) + 'px)').css('filter', 'blur(' + (Math.abs(this.posZ) / 100 * blurmod) + 'px)');
		if (this.posZ > 0)
			this.scale = (1 + scalemod * this.posZ / 100);
		else
			this.scale = (1 / (1 + (scalemod * this.posZ / -100)));
		this.element.css('opacity', (1 - opacitymod * Math.abs(this.posZ) / 100))
		this.element.appendTo(triHeader);
	}

	var transformVal;
	var wHeight = $(window).height();
	var wWidth = $(window).width();

	blob.prototype.updateTop = function() {
		transformVal = 'scale(' + this.scale + ') translate3d(0px,' + (scrollTopPercent / 100 * (this.posZ) / 100 * scrollmod * wHeight).toFixed(0) + 'px,0px)';
		this.element.css('transform', transformVal);
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
		console.log('This is $(window).scrollTop():' + $(window).scrollTop());
		scrollTopPercent = 100 * $(window).scrollTop() / ($(document).height() - $(window).height()) * 2 - 100;
		for (index = 0, len = blobs.length; index < len; ++index) {
			blobs[index].updateTop();
		}
	}


	function checkScroll() {
		requestAnimationFrame(checkScroll);
		if(count < num) {
			blobs.push(new blob());
			blobs[count].updateTop();
			count++;
		}
		if(oldScrollTop == 0) {

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
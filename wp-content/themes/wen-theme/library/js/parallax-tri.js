// PARALLAX TRIANGLE
jQuery(document).ready(function($) {
	console.log('Het from parallax tri');

	var colors = ["gold-foil","green-tri","stripe-tri"];
	// W, H, X, Y, color, up
	var coords = [
		[207, 168, 1160, 250, "gold-foil", "left"],
		[222, 184, 284, 0, "stripe-tri", "left"],
		[162, 139, 188, 324, "stripe-tri", "half"],
		[136, 110, 830, -20, "gold-foil", "reflect"],
		[107, 88, 345, 444, "stripe-tri", "reflect half"],
		[167, 135, 265, 490, "gold-foil", "reflect right"],
		[109, 90, 306, 808, "stripe-tri", "reflect left"],
		[82, 124, 1311, 288, "green-tri", "up"],
		[82, 124, 102, 660, "green-tri", "down"],
		[55, 83, 1206, 822, "green-tri", "down"],
		[73, 110, 228, 43, "green-tri", "right"],
		[126, 102, 1385, 710, "gold-foil", "left"],
		[111, 90, 225, 722, "gold-foil", ""],
		[133, 110, 1207, 573, "stripe-tri", "right"],
		[133, 110, 1098, 38, "stripe-tri", "right"],
		[73, 110, 1289, 535, "green-tri", "left"],
		[83, 69, 64, 908, "stripe-tri", "right"],
		[111, 91, 1071, 706, "stripe-tri", "reflect left"]
	];


	// ADD TWICE AS MANY COORDS
	$.each(coords, function(i, elem) {
		console.log(coords[i][0], coords[i][1]);

		// coords.push( [ coords[i][2], coords[i][3] + 300 ] );
		coords.push( [ coords[i][0], coords[i][1], coords[i][2], coords[i][3] + 700 , coords[i][4], coords[i][5] ] );
	});

	// CHECK COORDS
	console.log('These are your coords: ' + coords);
	console.log(coords.length);
	console.dir(coords);


	// var num = 100;
	var num = 36;
	// var num = 18;
	var count=0;
	var blurmod = 2;
	var scalemod = 1.5;
	var opacitymod = 0.5;
	var scrollmod = 1.5;

	var triHeader = $('#triangle-header');
	var triWrapper = $('#tri-logo-wrapper');

	var blobs = [];

	function blob(count) {
		console.log('This is coords: ' + coords[count][2]/1400 );

		this.posZ = getRandomInt(1, 150) - 100;
		// this.element = $('<div/>', { 'class':'tri'});
		this.element = $('<div/>', { 'class':'tri '+ coords[count][4] + ' ' + coords[count][5] });
		// this.element.addClass(colors[Math.floor(Math.random() * colors.length)]); //random bg color
		// this.element.css('z-index', this.posZ);
		// this.element.css('left', getRandomInt(0,120)-10 + '%');
		// this.element.css('left', (coords[Math.floor(Math.random() * coords.length)][0]/1400) * 100 + '%');
		this.element.css('left', (coords[count][2]/1400) * 100 + '%');
		// this.startTop = getRandomInt(0,120)-10;
		// this.startTop = (coords[Math.floor(Math.random() * coords.length)][1]/700) * 100;
		this.startTop = (coords[count][3]/800) * 100;
		this.element.css({
			'top': this.startTop + '%',
			'width':(coords[count][0]/1400) * 100 + '%',
			'padding-bottom':(coords[count][1]/1400) * 1.4028 * 100 + '%',
			'height':0
		});
		// if (this.posZ > 0)
		// 	this.scale = (1 + scalemod * this.posZ / 100);
		// else
		// 	this.scale = (1 / (1 + (scalemod * this.posZ / -100)));
		// this.element.css('opacity', (1 - opacitymod * Math.abs(this.posZ) / 100));
		this.element.appendTo(triHeader);
	}

	var transformVal;
	var wHeight = $(window).height();
	var wWidth = $(window).width();

	blob.prototype.updateTop = function() {
		transformVal = 'translate3d(0px,' + (scrollTopPercent / 100 * (this.posZ) / 100 * scrollmod * wHeight).toFixed(0) + 'px,0px)';
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
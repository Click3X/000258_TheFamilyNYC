// shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
  return  window.requestAnimationFrame       ||
          window.webkitRequestAnimationFrame ||
          window.mozRequestAnimationFrame    ||
          window.oRequestAnimationFrame      ||
          window.msRequestAnimationFrame     ||
          function( callback ){
            window.setTimeout(callback, 1000 / 60);
          };
})();

(function(win, d) {

  var $ = d.querySelector.bind(d);

  var paraGold = $('#para-gold');
  var paraGreen = $('#para-green');
  var paraStripe = $('#para-stipe');
  var logoWrapper = $('#logo-wrapper');

  // var teamContainer = document.getElementById('team-members-container');
  var teamContainer = document.getElementById('team-members-container');
  console.log('Thsi is teamContainer: ' + teamContainer);
  console.dir(teamContainer);
  var offTop = teamContainer.offsetTop;
  console.log('Thsi is offTop: ' + offTop);


  var ticking = false;
  var lastScrollY = 0;

  function onResize () {
    updateElements(win.pageYOffset);
  }

  function onScroll (evt) {

    if(!ticking) {
      ticking = true;
      requestAnimFrame(updateElements);
      lastScrollY = win.pageYOffset;
    }
  }

  function updateElements () {

    var relativeY = lastScrollY / offTop;

    prefix(paraGold.style, "Transform", "translate3d(0," +
      pos(104, -1400, relativeY, 0) + 'px, 0)');

    prefix(paraStripe.style, "Transform", "translate3d(0," +
      pos(0, 600, relativeY, 0) + 'px, 0)');

    prefix(paraGreen.style, "Transform", "translate3d(0," +
      pos(-50, -400, relativeY, 0) + 'px, 0)');

    prefix(logoWrapper.style, "Transform", "translate3d(0," +
      pos(0, 500, relativeY, 0) + 'px, 0)');
    

    ticking = false;
  }

  function pos(base, range, relY, offset) {
    return base + limit(0, 1, relY - offset) * range;
  }

  function prefix(obj, prop, value) {
    var prefs = ['webkit', 'Moz', 'o', 'ms'];
    for (var pref in prefs) {
      obj[prefs[pref] + prop] = value;
    }
  }

  function limit(min, max, value) {
    return Math.max(min, Math.min(max, value));
  }

  (function() {

    updateElements(win.pageYOffset);

    // paraGold.classList.add('force-show');
    // paraGreen.classList.add('force-show');
    // logoWrapper.classList.add('force-show');
  
  })();

  win.addEventListener('resize', onResize, false);
  win.addEventListener('scroll', onScroll, false);

})(window, document);
var clickLatLong = new google.maps.LatLng(40.741185, -73.993093),
    map,
    mapOptions,
    marker,
    dumboMarker;

function initialize() {

    mapOptions = {
        zoom: 15,
        zoomControl: true,
        scaleControl: false,
        scrollwheel: false,
        disableDoubleClickZoom: true,
        center: clickLatLong,
        disableDefaultUI: true,
        styles: [
            {"stylers":[
                {"hue":"#ff1a00"},
                {"invert_lightness":true},
                {"saturation":-100},
                {"lightness":33},
                {"gamma":0.5}
                ]
            },
            {"featureType":"water",
            "elementType":"geometry",
            "stylers":[
                {"color":"#2D333C"}
                ]
            },
            {
                "featureType": "road.arterial",
                "stylers": [
                  { "visibility": "on" },
                  { "color": "#000000" }
                ]
              },
              {
                "featureType": "road.local",
                "stylers": [
                  { "color": "#000000" },
                  { "visibility": "on" }
                ]
              }
        ]
    };

    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

    marker = new google.maps.Marker({
        position: clickLatLong,
        map: map
    });

    // dumboMarker = new google.maps.Marker({
    //     // position: dumboLatLong,
    //     map: map
    // });

}

google.maps.event.addDomListener(window, "load", initialize);
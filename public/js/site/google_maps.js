 // Map Initial Location
 var initLatitude = 37.09024;
 var initLongitude = -95.71289;

 // Map Extended Settings
 var mapSettings = {
     controls: {
         draggable: (($.browser.mobile) ? false : true),
         panControl: true,
         zoomControl: true,
         mapTypeControl: true,
         scaleControl: true,
         streetViewControl: true,
         overviewMapControl: true
     },
     scrollwheel: false,
     latitude: initLatitude,
     longitude: initLongitude,
     zoom: 5
 };

 var map = $('#googlemaps').gMap(mapSettings),
     mapRef = $('#googlemaps').data('gMap.reference');

 // Map Center At
 var mapCenterAt = function(options, e) {
     e.preventDefault();
     $('#googlemaps').gMap("centerAt", options);
 }

 // Styles from https://snazzymaps.com/
 var styles = [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": 0.2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }];

 var styledMap = new google.maps.StyledMapType(styles, {
     name: 'Styled Map'
 });

 //  mapRef.mapTypes.set('map_style', styledMap);
 //  mapRef.setMapTypeId('map_style');
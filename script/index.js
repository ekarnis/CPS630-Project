function initMap() {
  var origin_place_id = null;
  var destination_place_id = null;
  var travel_mode = google.maps.TravelMode.WALKING;
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    streetViewControl: false,
    center: {	lat: 43.6664,lng: -79.3624},
    zoom: 12,
     styles: [
    {
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "saturation": -100
            },
            {
                "gamma": 0.54
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "stylers": [
            {
                "color": "#4d4946"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "labels.text",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#ffffff"
            }
        ]
    },
    {
        "featureType": "transit.line",
        "elementType": "geometry",
        "stylers": [
            {
                "gamma": 0.48
            }
        ]
    },
    {
        "featureType": "transit.station",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "gamma": 7.18
            }
        ]
    }
]
  });
  var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
  directionsDisplay.setMap(map);

  var origin_input = document.getElementById('origin-input');

  var origin_autocomplete = new google.maps.places.Autocomplete(origin_input);
  origin_autocomplete.bindTo('bounds', map);

  var institution_markers = [];
  populateinstitutions();

  function expandViewportToFitPlace(map, place) {
    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }
  }

  origin_autocomplete.addListener('place_changed', function() {
    var place = origin_autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
    expandViewportToFitPlace(map, place);

    // If the place has a geometry, store its place ID and route if we have
    // the other place ID
    origin_place_id = place.place_id;
  });

function add_institution_marker(lat, lon, title, url){
   var marker = new google.maps.Marker({
    position: new google.maps.LatLng(lat, lon),
    map: map,
    title: title,
    icon: 'https://maps.google.com/mapfiles/ms/icons/blue-dot.png',
    url: url,
  });
  google.maps.event.addListener(marker, 'click', function() {
    window.location.href = this.url;
  });

  institution_markers.push(marker);
}

function populateinstitutions(){
	var institution_list = [];
		//Hardcoded until we can add the geolocations of institutions via SQL
		institution_list.push({
			lat: 43.6577,
			lon: -79.3788,
			title: "Ryerson University",
      url: 'inventory.php'
		});
		institution_list.push({
			lat: 43.9453,
			lon: -78.9314,
			title: "University of Ontario Institute of Technology",
      url: 'inventory.php'
		});
		institution_list.push({
			lat: 43.6629,
			lon: -79.3957,
			title: "University of Toronto",
      url: 'inventory.php'
		});
		institution_list.push({
			lat: 44.4120,
			lon: -79.6678,
			title: "Georgian College",
      url: 'inventory.php'
		});
		institution_list.push({
			lat: 43.6761,
			lon: -79.4105,
			title: "George Brown",
      url: 'inventory.php'
		});
		institution_list.push({
			lat: 43.6530,
			lon: -79.3914,
			title: "OCAD University",
      url: 'inventory.php'
		});
    institution_list.push({
			lat: 43.8353,
			lon: -79.6298,
			title: "Meadowvale Theatre",
      url: 'inventory.php'
		});
    institution_list.push({
			lat: 43.6958,
			lon: -79.4137,
			title: "York University Glendon Campus",
      url: 'inventory.php'
		});
    institution_list.push({
			lat: 43.7765,
			lon: -79.8856,
			title: "Centennial College",
      url: 'inventory.php'
		});

	for(count = 0; count < institution_list.length; count++){    
    add_institution_marker(institution_list[count].lat, institution_list[count].lon, institution_list[count].title, institution_list[count].url);
  }
}
}

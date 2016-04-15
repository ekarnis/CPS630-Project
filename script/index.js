function initMap() {
  var origin_place_id = null;
  var destination_place_id = null;
  var travel_mode = google.maps.TravelMode.WALKING;
  var map = new google.maps.Map(document.getElementById('map'), {
    mapTypeControl: false,
    streetViewControl: false,
    center: {	lat: 43.6532,lng: -79.3832},
    zoom: 13
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
			lat: 43.6629,
			lon: -79.3957,
			title: "University of Toronto",
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

	for(count = 0; count < institution_list.length; count++){    add_institution_marker(institution_list[count].lat, institution_list[count].lon, institution_list[count].title, institution_list[count].url);
  }
}
}

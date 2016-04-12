(function(){
	Number.prototype.toRad = function() {
	   return this * Math.PI / 180;
	}

	var currentLocation = {
		lat: 43.6532,
		lon: -79.3832
	}

	//Map Object
	var map;
	var markers = [];

	function superduperformulafordistance(point1, point2){
		function toRad(x) {
		return x * Math.PI / 180;
		}

		var lat2 = point2.lat;
		var lon2 = point2.lon;
		var lat1 = point1.lat;
		var lon1 = point2.lon;

		var R = 6371; // km

		var x1 = lat2 - lat1;
		var dLat = toRad(x1);
		var x2 = lon2 - lon1;
		var dLon = toRad(x2)
		var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
		Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
		Math.sin(dLon / 2) * Math.sin(dLon / 2);
		var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
		var d = R * c;

		return (d).toFixed(2);
	}

	function geocodeLatLng(latLng) {
		var geocoder = new google.maps.Geocoder;

		  var latlng = {lat: parseFloat(latLng.lat), lng: parseFloat(latLng.lon)};

		  geocoder.geocode({'location': latlng}, function(results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
			  if (results[1]) {
//				return results[1].formatted_address;

				var table = "<table class='distance-table'><tr>";
				table += "<th style='width: 50%;'>Location</th>";
				table += "<th style='width: 50%;'>Distance (KM)</th>";
				table += "</tr><tr>";
				table += "<td>" + results[1].formatted_address +  "</td>"
				table += "<td>" + latLng.distance +  "</td>"
				table += "</tr>";
				table += "</table>";

				$("#append-to-div").append(table);

			  } else {
				window.alert('No results found');
			  }
			} else {
			  window.alert('Geocoder failed due to: ' + status);
			}
	  });
	}

	function parseTextFile(text){
		var lines;
		var locations = [];

		lines = text.split(/\n/);

		for(var i = 0; i< lines.length; i++){
			try{
				var temp = lines[i].split(",");

				locations.push({
					lat: temp[0].trim(),
					lon: temp[1].trim(),
					distance: superduperformulafordistance(currentLocation, { lat: temp[0].trim(), lon: temp[1].trim()}),
				});

				addMarker(temp[0].trim(), temp[1].trim(), "");
			}
			catch(e){
				continue;
			}
		}


		for(var x = 0; x < locations.length; x++)
		{
			geocodeLatLng(locations[x]);


		}

		$("#error-div").text("parsed");
		map.setZoom(3);

		console.log(locations);

		return locations;
	}

	function addMarker(lat, lon, title){
		 var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lon),
			map: map,
			title: title
		});

		markers.push(marker);
	}

	$(document).ready(function(){
		//Get GEOLOCATION POSITION
		if (navigator.geolocation)
		{
			navigator.geolocation.getCurrentPosition(function (position) {
				//Save Coordinates
				currentLocation.lat = position.coords.latitude;
				currentLocation.lon = position.coords.longitude;

				//Move Map to new center
				map.panTo(new google.maps.LatLng(currentLocation.lat, currentLocation.lon));
				map.setZoom(16);
			});
		}
		else
		{
			$("#error-div").text("Geolocation is not supported by this browser.");
		}

		//Initialize World Map
		function initialize() {
			var latlng = new google.maps.LatLng(currentLocation.lat, currentLocation.lon);

			var myOptions = {
				zoom: 8,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("map"), myOptions);

			addMarker(currentLocation.lat, currentLocation.lon, "Your Location! Cool :)");
		}

		google.maps.event.addDomListener(window, "load", initialize);
	});


	$(document).on("focus", "#textbox", function(){
		//Clear Formatted Div
		$("#append-to-div").html("");

		//Delete all markers
	    for (var i = 0; i < markers.length; i++) {
			markers[i].setMap(null);
		}

		markers = [];

		//Add default marker
		addMarker(currentLocation.lat, currentLocation.lon, "");
		map.panTo(new google.maps.LatLng(currentLocation.lat, currentLocation.lon));

		map.setZoom(16);

		$("#error-div").text("");
	});

	$(document).on("change blur", "#textbox", function(){
		var results = parseTextFile($(this).val());

		for(var i = 0; i< results.lengt; i++){
			superduperformulafordistance(currentLocation, results[i]);
		}
	});
})();

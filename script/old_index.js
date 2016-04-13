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
	var institution_markers = [];
	var table_count = 0;

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

	function parseTextFile(text) {
		var geocoder = new google.maps.Geocoder;

		//  var latlng = {lat: parseFloat(latLng.lat), lng: parseFloat(latLng.lon)};

		  geocoder.geocode({'address': text}, function(results, status) {
			if (status === google.maps.GeocoderStatus.OK) {
			  if (results[1] && table_count == 0) {
//				return results[1].formatted_address;

				var table = "<table class='distance-table'><tr>";
				table += "<th style='width: 50%;'>Location</th>";
				table += "<th style='width: 50%;'>Distance (KM)</th>";
				table += "</tr><tr>";
				table += "<td>" + results[1].formatted_address +  "</td>"
				//table += "<td>" + latLng.distance +  "</td>"
				table += "</tr>";
				table += "</table>";

				$("#append-to-div").append(table);

				table_count++;

			} else if (!results[1]) {
				window.alert('No results found');
			  }
			} else {
			  window.alert('Geocoder failed due to: ' + status);
			}
	  });
	}
/*
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

		for(var x = 0; x < locations.length; x++){
			geocodeLatLng(locations[x]);
		}

		$("#error-div").text("parsed");
		map.setZoom(3);

		console.log(locations);

		return locations;
	}*/

	function addMarker(lat, lon, title){
		 var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lon),
			map: map,
			title: title,
		});

		markers.push(marker);
	}

	function add_institution_marker(lat, lon, title){
		 var marker = new google.maps.Marker({
			position: new google.maps.LatLng(lat, lon),
			map: map,
			title: title,
			icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
		});

		institution_markers.push(marker);
	}

	function populateinstitutions(){
		var institution_list = [];
			//Hardcoded until we can add the geolocations of institutions via SQL
			institution_list.push({
				lat: 43.6577,
				lon: -79.3788,
				title: "Ryerson University"
			});
			institution_list.push({
				lat: 43.6629,
				lon: -79.3957,
				title: "University of Toronto"
			});
			institution_list.push({
				lat: 43.6629,
				lon: -79.3957,
				title: "University of Toronto"
			});
			institution_list.push({
				lat: 44.4120,
				lon: -79.6678,
				title: "Georgian College"
			});
			institution_list.push({
				lat: 43.6761,
				lon: -79.4105,
				title: "George Brown"
			});
			institution_list.push({
				lat: 43.6530,
				lon: -79.3914,
				title: "OCAD University"
			});

		for(count = 0; count < institution_list.length; count++) add_institution_marker(institution_list[count].lat, institution_list[count].lon, institution_list[count].title);
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

			addMarker(currentLocation.lat, currentLocation.lon, "Your Location");
			populateinstitutions();
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

		for(var i = 0; i< results.length; i++){
			superduperformulafordistance(currentLocation, results[i]);
		}
	});
})();

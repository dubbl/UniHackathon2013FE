var map;
var markersArray = [];
var lat=47.743229095729724;
var lng=9.101486206054688;

function initialize() {
	errorFunction();
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
	} else {
		errorFunction();
	}

	google.maps.event.addListener(map, 'click', function(event) {
		// place a marker
		placeMarker(event.latLng);

		document.getElementById("lat").value = event.latLng.lat();
		document.getElementById("lng").value = event.latLng.lng();
	});
}
function errorFunction() {
	var mapOptions = {
		center: new google.maps.LatLng(lat, lng),
		zoom: 6
	};
	map = new google.maps.Map(document.getElementById("map"),mapOptions);
}
function successFunction(position) {
    lat = position.coords.latitude;
    lng = position.coords.longitude;
	if (document.getElementById("lat") != null) {
		document.getElementById("lat").value = lat;
		document.getElementById("lng").value = lng;
	} else {
		nearby_events();
	}
	var mapOptions = {
		center: new google.maps.LatLng(lat, lng),
		zoom: 14
	};
	map = new google.maps.Map(document.getElementById("map"),mapOptions);
	
	placeMarker(new google.maps.LatLng(lat, lng));
}

function placeMarker(location) {
            

            var marker = new google.maps.Marker({
                position: location, 
                map: map
            });

            // add marker in markers array
			deleteOverlays();
            markersArray.push(marker);

            //map.setCenter(location);
        }

        // Deletes all markers in the array by removing references to them
        function deleteOverlays() {
            if (markersArray) {
                for (i in markersArray) {
                    markersArray[i].setMap(null);
                }
            markersArray.length = 0;
            }
        }
google.maps.event.addDomListener(window, 'load', initialize);
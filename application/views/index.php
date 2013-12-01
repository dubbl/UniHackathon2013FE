<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header">
            <h1>Studyspots</h1>
            <h2>Hi <?php echo $user_name; ?>! Welcome back.</</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Upcoming events nearby</h2>
			<div id="map" style="width:100%;height:400px;"></div>
        </div>
    </div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script>
var map;
var markersArray = [];
var infoArray = [];
var lat=48.789254;
var lng=9.179077;

function initialize() {
	
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
	} else {
		errorFunction();
	}
	
	var mapOptions = {
		center: new google.maps.LatLng(lat, lng),
		zoom: 8
	};
	map = new google.maps.Map(document.getElementById("map"),mapOptions);	
}

function placeMarker(id,location, name, creator, beginning, end) {
            
	var contentString = '<a href="<?php echo BASE_URL; ?>event/show/'+id+'"><h1>'+name+'</h1></a>Created by: '+creator+'<br />Starting: '+ beginning +'<br />End: '+ end;
	var marker = new google.maps.Marker({
		position: location, 
		map: map,
		title: name,
		info: contentString
	});

	// add marker in markers array
	google.maps.event.addListener(marker, 'click', function() {
		var infowindow = new google.maps.InfoWindow({content: marker.info});
		infowindow.open(map,marker);
	});

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
function errorFunction() {
	var mapOptions = {
		center: new google.maps.LatLng(lat, lng),
		zoom: 5
	};
	map = new google.maps.Map(document.getElementById("map"),mapOptions);
	<?php 
		foreach ($events as $event) { 
			echo 'placeMarker('.$event->EventId.',new google.maps.LatLng('.$event->Latitude.', '.$event->Longitude.',"'.$event->EventName.'"),"'.$event->EventName.'","'.$event->Creator.'","'.$event->BeginningTime.'","'.$event->EndTime.'");'."\n"; 
			
		}
	?>
}
function successFunction(position) {
    lat = position.coords.latitude;
    lng = position.coords.longitude;
	
	var mapOptions = {
		center: new google.maps.LatLng(lat, lng),
		zoom: 14
	};
	map = new google.maps.Map(document.getElementById("map"),mapOptions);
	<?php 
		foreach ($events as $event) { 
			echo 'placeMarker('.$event->EventId.',new google.maps.LatLng('.$event->Latitude.', '.$event->Longitude.',"'.$event->EventName.'"),"'.$event->EventName.'","'.$event->Creator.'","'.$event->BeginningTime.'","'.$event->EndTime.'");'."\n"; 
			
		}
	?>
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php include('footer.php'); ?>
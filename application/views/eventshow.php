<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header">
            <h1><?php echo $event_name; ?></h1>
            <h2>Created by <?php echo $event_creator; ?></h2>
        </div>

		<div class="content">
		<h2 class="content-subhead">Facts</h2>
			
			<div class="pure-g-r grid-example">
				<div class="pure-u-2-5">
					<div class="l-box">
						<h3>Time</h3>
						<p>
							<table>
							<tr>
							<td>Starting at:</td><td><?php echo $event_start; ?></td></tr>
							<td>Ending at:</td><td><?php echo $event_end; ?></td></tr>
							</table>
						</p>
						<h3>Check-in</h3>
						<?php if ($checkedin) { echo '<p>You are already checked-in.</p>'; } else { ?>
						
						<p>
							<form class="pure-form pure-form" method="post" action="<?php echo BASE_URL; ?>event/checkin/<?php echo $event_id; ?>" id="checkinform" style="display: none">
								<fieldset>
									<div class="pure-controls">
										<input type="text" id="lat" name="lat" style="display:none" />
										<input type="text" id="lng" name="lng" style="display:none" />
									</div>
									<div class="pure-controls">
										<button type="submit" class="pure-button pure-button-primary">Check-in</buttons>
									</div>
								</fieldset>
							</form>
							<div id="checkinerror" style="display:none">
								As soon as you are near enough to the events location, you can check-in.
							</div>
						</p>
						
						<?php } ?>
					</div>
				</div>

				<div class="pure-u-3-5">
					<div class="l-box">
						<h3>Location</h3>
						<div id="map" style="width:100%;height:200px;"></div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script>
var map;
var markersArray = [];
var lat=<?php echo $event_lat; ?>;
var lng=<?php echo $event_lng; ?>;

function initialize() {
	
	var mapOptions = {
		center: new google.maps.LatLng(lat, lng),
		zoom: 15
	};
	map = new google.maps.Map(document.getElementById("map"),mapOptions);
	placeMarker(new google.maps.LatLng(lat, lng));
	
	errorFunction();
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
	} else {
		errorFunction();
	}
}

function successFunction(position) {

	document.getElementById("lat").value = position.coords.latitude;
	document.getElementById("lng").value = position.coords.longitude;
	
	document.getElementById("checkinerror").style.display = "none";
	document.getElementById("checkinform").style.display = "inline";
}

function errorFunction() {

	document.getElementById("lat").value = "error";
	document.getElementById("lng").value = "error";
	
	document.getElementById("checkinerror").style.display = "inline";
	document.getElementById("checkinform").style.display = "none";
}

function placeMarker(location) {
	

	var marker = new google.maps.Marker({
		position: location, 
		map: map
	});
	// add marker in markers array
	markersArray.push(marker);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php include('footer.php'); ?>
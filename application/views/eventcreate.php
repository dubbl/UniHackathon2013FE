<?php include('header.php'); ?>
	
<?php if (empty($user_id)) {include('menu_notlogged.php');} else {include('menu.php');} ?>

    <div id="main">
        <div class="header">
            <h1>New event</h1>
            <h2>Make em, start em, track em</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Create new event</h2>
            <p>
				<form class="pure-form pure-form-aligned" method="post" action="<?php echo BASE_URL; ?>event/save">
					<fieldset>
						<div class="pure-control-group">
							<label for="name">Event name</label>
							<input id="name" name="name" type="text" placeholder="Name of the event" required>
						</div>

						<div class="pure-control-group">
							<label for="startdate">Start date</label>
							<input id="startdate" name="startdate" type="text" placeholder="Start date" required>
						</div>
								
						<div class="pure-control-group">
							<label for="starttime">Start time</label>
							<input id="starttime" name="starttime" value="08:30">
						</div>
						
						<div class="pure-control-group">
							<label for="enddate">End date</label>
							<input id="enddate" name="enddate" type="text" placeholder="End date" required>
						</div>
								
						<div class="pure-control-group">
							<label for="endtime">End time</label>
							<input id="endtime" name="endtime" value="09:30">
						</div>
					
						<input id="lat" name="lat" style="display:none"/>
						<input id="lng" name="lng" style="display:none"/>
						 
						<p>
							Click on the map to place the marker manually.
						</p>
						<div id="map" style="width:100%;height:400px;"></div>

						<div class="pure-controls">
							<button type="submit" class="pure-button pure-button-primary">Submit</button>
						</div>
					</fieldset>
				</form>
			</p>
        </div>
    </div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?php echo BASE_URL; ?>static/js/globalize.js"></script>
<script src="<?php echo BASE_URL; ?>static/js/globalize.culture.de-DE.js"></script>
<script src="<?php echo BASE_URL; ?>static/js/maps.js"></script>
<script>
	$(function() {
		$( "#startdate" ).datepicker();
	});
	$(function() {
		$( "#enddate" ).datepicker();
	});
	$.widget( "ui.timespinner", $.ui.spinner, {
		options: {
			// seconds
				step: 60 * 1000 * 15,
			// hours
			page: 60
		},

		_parse: function( value ) {
			if ( typeof value === "string" ) {
				// already a timestamp
				if ( Number( value ) == value ) {
				return Number( value );
				}
				return +Globalize.parseDate( value );
			}
			return value;
		},
		_format: function( value ) {
				return Globalize.format( new Date(value), "t" );
			}
		});

	$(function() {
		Globalize.culture("de-DE");
		$( "#starttime" ).timespinner();
	});
	$(function() {
		Globalize.culture("de-DE");
		$( "#endtime" ).timespinner();
	});
</script>
<?php include('footer.php'); ?>
<?php

class Event extends Controller {
	
	function create()
	{
		require_once(APP_DIR.'plugins/user.php');
		$user = new User();

		// user login check
		if ($user->user_id) {
			$template = $this->loadView('eventcreate');
			$template->set('user_id',$user->user_id);
		} else {
			$template = $this->loadView('index_notlogged');
			$params = array('redirect_uri' => BASE_URL.'main');
			$template->set('login_url',$user->handle->getLoginUrl($params));
		}
		
		$template->render();
	}
	
	function checkin($id) {
		require_once(APP_DIR.'plugins/user.php');
		require APP_DIR.'config/config.php';
		$user = new User();

		// user login check
		if ($user->user_id) {
			$pageContent = file_get_contents($config['REST_SRV'].'events/'.$id);
			
			if ($pageContent != 'null') {
				
				$longitude = $_POST['lng'];
				$latitude = $_POST['lat'];
				
				$postdata = http_build_query(
					array(
						'FacebookId' => $user->user_id,
						'Langitude' => $longitude,
						'Latitude' => $latitude,
						'Radius' => 0,
						'EventId' => $id
					)
				);

				$opts = array('http' =>
					array(
						'method'  => 'POST',
						'header'  => 'Content-type: application/x-www-form-urlencoded'."\r\nContent-Length: " . strlen($postdata) . "\r\n",
						'content' => $postdata
					)
				);

				$context  = stream_context_create($opts);

				$result = file_get_contents($config['REST_SRV'].'checkins/', false, $context);
			} else {
				$this->redirect('error');
			}
		}
	}
	
	function show($id) {
		require_once(APP_DIR.'plugins/user.php');
		require APP_DIR.'config/config.php';
		$user = new User();

		// user login check
		if ($user->user_id) {
			$template = $this->loadView('eventshow');
			
			$pageContent = file_get_contents($config['REST_SRV'].'events/'.$id);
						
			if ($pageContent != 'null') {
			
				$parsed_json  = json_decode($pageContent);
				$event_id = $parsed_json->EventId;
				$event_name = $parsed_json->EventName;
				$event_creator = $parsed_json->Creator;
				$event_start = $parsed_json->BeginningTime;
				$event_end = $parsed_json->EndTime;
				$event_lat = $parsed_json->Latitude;
				$event_lng = $parsed_json->Longitude;
				
				$template->set('event_id',$event_id);
				$template->set('event_name',$event_name);
				$template->set('event_creator',$event_creator);
				$template->set('event_start',$event_start);
				$template->set('event_end',$event_end);
				$template->set('event_lat',$event_lat);
				$template->set('event_lng',$event_lng);
				
				$pageContent = file_get_contents($config['REST_SRV'].'checkins/'.$user->user_id);
				$checkedin = false;
				if ($pageContent != 'null') {
					$parsed_json  = json_decode($pageContent);
					foreach ($parsed_json as $event) {
						if ($event->EventId == $event_id)
							$checkedin = true;
					}
				}
				$template->set('checkedin',$checkedin);
						
			} else {
				$this->redirect('error');
			}
			
			$template->set('user_id',$user->user_id);
		} else {
			$template = $this->loadView('index_notlogged');
			$params = array('redirect_uri' => BASE_URL.'main');
			$template->set('login_url',$user->handle->getLoginUrl($params));
		}
		
		$template->render();
	}
	
	function save() {
		require_once(APP_DIR.'plugins/user.php');
		require APP_DIR.'config/config.php';
		$user = new User();

		// user login check
		if ($user->user_id) {
			
			$user_profile = $user->handle->api('/me');
			$creator = $user_profile['name'];
			
			
			if (!empty($_POST['name']) && !empty($_POST['startdate']) && !empty($_POST['starttime']) && !empty($_POST['enddate']) && !empty($_POST['endtime']) && !empty($_POST['lat']) && !empty($_POST['lng'])) {
				$name = htmlspecialchars(mysql_real_escape_string($_POST['name']));
				$startdate = htmlspecialchars(mysql_real_escape_string($_POST['startdate']));
				$starttime = htmlspecialchars(mysql_real_escape_string($_POST['starttime']));
				$enddate = htmlspecialchars(mysql_real_escape_string($_POST['enddate']));
				$endtime = htmlspecialchars(mysql_real_escape_string($_POST['endtime']));
				$lat = htmlspecialchars(mysql_real_escape_string($_POST['lat']));
				$lng = htmlspecialchars(mysql_real_escape_string($_POST['lng']));
				
				$start = str_replace("/",".",$startdate)." ".explode(":",$starttime)[0].":".explode(":",$starttime)[1].":00";
				$end = str_replace("/",".",$enddate)." ".explode(":",$endtime)[0].":".explode(":",$endtime)[1].":00";
				
				$postdata = http_build_query(
					array(
						'EventName' => $name,
						'Creator' => $creator,
						'BeginningTime' => $start,
						'EndTime' => $end,
						'Longitude' => $lng,
						'Latitude' => $lat
					)
				);

				$opts = array('http' =>
					array(
						'method'  => 'POST',
						'header'  => 'Content-type: application/x-www-form-urlencoded'."\r\nContent-Length: " . strlen($postdata) . "\r\n",
						'content' => $postdata
					)
				);

				$context  = stream_context_create($opts);

				$result = file_get_contents($config['REST_SRV'].'events', false, $context);
				
			} else {
				$this->redirect('event/create');
			}
		
			$template = $this->loadView('eventsave');
			$template->set('user_id',$user->user_id);
		} else {
			$template = $this->loadView('index_notlogged');
			$params = array('redirect_uri' => BASE_URL.'main');
			$template->set('login_url',$user->handle->getLoginUrl($params));
		}
		
		$template->render();
	}
    
}

?>

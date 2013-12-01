<?php

class Profile extends Controller {
	
	function show($profile_id)
	{
		require APP_DIR.'config/config.php';
		require_once(APP_DIR.'plugins/user.php');
		$user = new User();

		// user login check
		if ($user->user_id) {
		
			$pageContent = file_get_contents($config['REST_SRV'].'users/'.$profile_id);
						
			if ($pageContent != 'null') {
			
				$pageContent = file_get_contents('http://graph.facebook.com/'.$profile_id);
				$parsed_json  = json_decode($pageContent);
				$profile_name = $parsed_json->name;
			
				$template = $this->loadView('profile');
				$params = array('redirect_uri' => BASE_URL.'main');
				$template->set('user_id',$user->user_id);
				$template->set('profile_name',$profile_name);
				$template->set('profile_id',$profile_id);
				$template->render();
			} else {
				$this->redirect('error');
			}
		} else {
			$template = $this->loadView('index_notlogged');
			$params = array('redirect_uri' => BASE_URL.'main');
			$template->set('login_url',$user->handle->getLoginUrl($params));
			$template->render();
		}
	}
    
}

?>

<?php

class Main extends Controller {
	
	function index()
	{
		require_once(APP_DIR.'plugins/user.php');
		require APP_DIR.'config/config.php';
		$user = new User();

		// user login check
		if ($user->user_id) {
			$template = $this->loadView('index');
			
			$user_profile = $user->handle->api('/me');
			$username = $user_profile['name'];
			
			$pageContent = file_get_contents($config['REST_SRV'].'events',false);
			$parsed_json  = json_decode($pageContent);
			
			$template->set('events',$parsed_json);
			$template->set('user_name',$username);
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

<?php

class Settings extends Controller {
	
	function index()
	{
		require_once(APP_DIR.'plugins/user.php');
		$user = new User();

		// user login check
		if ($user->user_id) {
			$template = $this->loadView('settings');
			$params = array('redirect_uri' => BASE_URL.'main');
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

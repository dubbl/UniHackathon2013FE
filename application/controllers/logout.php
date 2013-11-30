<?php

class Logout extends Controller {
	
	function index()
	{
		require_once(APP_DIR.'plugins/user.php');
		$user = new User();

		$user->handle->destroySession();
		$template = $this->loadView('index_notlogged');
		$params = array('redirect_uri' => BASE_URL.'main');
		$template->set('login_url',$user->handle->getLoginUrl($params));
		
		$template->render();
	}
    
}

?>

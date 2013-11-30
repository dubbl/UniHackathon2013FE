<?php

class Imprint extends Controller {
	
	function index()
	{
		require_once(APP_DIR.'plugins/user.php');
		$user = new User();

		$template = $this->loadView('imprint');
		$template->set('user_id',$user->user_id);
		$template->render();
	}
    
}

?>

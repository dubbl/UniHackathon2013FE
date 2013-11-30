<?php

class Contact extends Controller {
	
	function index()
	{
		require_once(APP_DIR.'plugins/user.php');
		$user = new User();

		// form was sent
		if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
			$to = 'dubbel14@googlemail.com';
			$title = 'New message from a XStudy user: '.htmlspecialchars($_POST['name']);
			$message = htmlspecialchars($_POST['message']);
			$header = 'From: '.htmlspecialchars($_POST['email'])."\r\n".
				'Reply-To: '.htmlspecialchars($_POST['email'])."\r\n".
				'X-Mailer: PHP/' . phpversion();

			mail($to, $title, $message, $header);
			$template = $this->loadView('contact_sent');
			$template->set('user_id',$user->user_id);
			$template->render();
		} else {
			$template = $this->loadView('contact');
			$template->set('user_id',$user->user_id);
			$template->render();
		}
	}
    
}

?>

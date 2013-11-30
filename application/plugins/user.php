<?php
class User {
	
	var $fb = true;
	var $user_id;
	var $handle;
	
	function __construct() {
		require 'facebook.php';
		require APP_DIR.'config/config.php';

		// Create our Application instance (replace this with your appId and secret).
		$this->handle = new Facebook(array(
		  'appId' => $config['fb_app_id'],
		  'secret' => $config['fb_app_secret'],
		));
		
		// Get User ID
		$this->user_id = $this->handle->getUser();

		if ($this->user_id) {
		  try {
			// Proceed knowing you have a logged in user who's authenticated.
			$user_profile = $this->handle->api('/me');
		  } catch (FacebookApiException $e) {
			error_log($e);
			$this->user_id = null;
		  }
		}
	}
}
?>
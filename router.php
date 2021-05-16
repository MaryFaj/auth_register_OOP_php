<?php
require_once('controllers/indexController.php');
require_once('controllers/registerController.php');
require_once('controllers/authController.php');
require_once('controllers/registerViewController.php');
require_once('controllers/authViewController.php');
require_once('requestDeterminer.php');
require_once('controllers/logoutController.php');

class Router extends requestDeterminer{
	
	public function route() {
		if($this->method=='GET') {
		  switch($this->uri) {
			case '/': 			
			$view = new indexController();
			$view->handleRequest();
			break;
			case '/register/': 			
			$view = new registerViewController();
			$view->handleRequest();
			break;
			case '/auth/':			
			$view = new authViewController();
			$view->handleRequest();
			break;
		  }
		
		} else {
		  switch($this->uri) {
			case '/?module=registerHandle':
			$register = new registerController();
			$register->handleRequest();			
			break;
			
			case '/?module=authHandle':
			$auth = new authController();
			$auth->handleRequest();			
			break;
			
			case '/?module=logoutHandle':
			$logout = new logoutController();
			$logout->handleRequest();
			break;
		}
	}

}
}
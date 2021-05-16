<?php
require_once('controller.php');

class logoutController implements Controller{
		
 	public function handleRequest(){
 		unset($_SESSION['user']);
		echo 'goodbye!';
 	}
 }
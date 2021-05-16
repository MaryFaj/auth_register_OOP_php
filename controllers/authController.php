<?php
require_once('./helpers/validator.php');
require_once('./models/userModel.php');
require_once('controller.php');

class authController implements Controller{
		
 	public function handleRequest(){
 		$validator = new Validator();
 		
		$email_data = $validator->prepare($_POST['email'], 30, 1);
		$password_data = $validator->prepare($_POST['password'], 30, 1);
		$password_data = md5($password_data);
		
		$userModel = new userModel();
		
		$userData = $userModel->getUser($email_data, $password_data); 
		if(!$userData){		
			echo 'неверный email или пароль!';
			return;
		} else {			
			$_SESSION['user'] = $userData['name'].' '.$userData['sirname'];			
			echo 'здравствуйте, '.$userData['name'].' '.$userData['sirname'].' !';	
		}	
 	}
 }
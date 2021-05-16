<?php
require_once('./helpers/validator.php');
require_once('./models/userModel.php');
require_once('controller.php');

  class registerController implements Controller{
		
 	public function handleRequest(){
 			$validator = new Validator();
 		
			$email_data = $validator->prepare($_POST['email'], 30, 5);
			$password_data = $validator->prepare($_POST['password'], 30, 1,'password');
			$password_data = md5($password_data);
			$name_data = $validator->prepare($_POST['name'], 30, 2);
			$sirname_data = $validator->prepare($_POST['sirname'], 30, 2);
			
			if((!$email_data)||(!$password_data)||(!$name_data)||(!$sirname_data)){
				echo 'не все поля заполнены корректно!';
				return;
			}
		
			$userModel = new userModel();
			$isUserExist =$userModel->getUserByEmail($email_data);
			if($isUserExist){
				echo "данный email уже использован для регистрации";
				return;
			} else {
				$result = $userModel->createUser($email_data, $password_data, $name_data, $sirname_data); 
				//print_r($result);
				echo $name_data.', вы успешно зарегистрированы!';
			}
		
 		}
  }
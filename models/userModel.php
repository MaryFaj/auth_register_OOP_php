<?php
require_once('db.php');

class userModel extends Database{
	
	public function createUser($email, $password, $name, $sirname) {
		$db=$this->createConnect();
		if(!$db){
			return false;
		}		
		$stmt = $db->prepare("INSERT INTO users (email, password, name, sirname) VALUES (?, ?, ?, ?)");		
      $row = $stmt->execute([$email,$password,$name,$sirname]);
		 		
 		if($row) {
 			return $row;
 		} else {
 			return $db->errorInfo();
			}
 		}
	
	public function getUserByEmail($email){
		$db=$this->createConnect();
		if(!$db){
			return false;
		}	
		$stmt = $db->prepare("SELECT name FROM `users` WHERE `email`=?");
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		
		if($result){
			return true;
		} else {
			return false;
		}
	}
	
	public function getUser($email,$password){
		$db=$this->createConnect();
		if(!$db){
			return false;
		}	
		$stmt = $db->prepare("SELECT name, sirname FROM `users` WHERE `email`=? AND `password`=?");
		$stmt->execute([$email,$password]);
		$result = $stmt->fetch();
		
		if($result){
			return ['name'=>$result['name'], 'sirname'=>$result['sirname']];
		} else {
			return false;
		}
	}
}
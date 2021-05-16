<?php

class Database {
	const DB_DRIVER = 'mysql';
	const DB_HOST = '192.168.10.10';
	const DB_NAME = 'test_auth';
	const DB_USER = 'homestead';
	const DB_PASS = 'secret';
	
	public function createConnect() {
		try{
			$connect_str = self::DB_DRIVER . ':host='. self::DB_HOST . ';dbname=' . self::DB_NAME;
			$db = new PDO($connect_str, self::DB_USER, self::DB_PASS);		
		} catch(PDOException $e){
			die("Error: ".$e->getMessage());
		}
		if($db) {
			return $db; 
			
		} else{
			return false;
		}
	}
}
	
	


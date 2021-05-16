<?php
class Validator {
	public function prepare($data, $max, $min, $type='string'){
		if(!$this->isSizeCorrect($data, $max, $min)){
			//echo "size_incorrect!";
			return false;
		}
		if($type!='password'){
			$data = trim($data);
		 	$data = stripslashes($data);
		 	$data = strip_tags($data);
		 	$data = htmlspecialchars($data);
		} 
		return $data;		
	}
	public function isSizeCorrect($data, $max,$min) {
		if(!((strlen($data)<$max)&&(strlen($data)>=$min))) {
			return false;
		} else {
			return true;
		}
	}
}
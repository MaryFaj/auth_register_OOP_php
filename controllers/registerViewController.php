<?php
require_once('controller.php');
require_once('./templateEngine/templateEngine.php');

 class registerViewController implements Controller{
 	
 	public function handleRequest(){
 		$data =[];
 		$data['title']='welcome';
 		$data['content_tpl'] = 'registerBlock.php';
 		$data['layout']= 'tpls/main.php';
 		$data['title'] = 'регистрация';
 		
 		if(isset($_SESSION['user'])) {			
 			$data['user'] = $_SESSION['user'];
 		} else {
 			$data['user'] = false;			
 		}
 		
 		$tpl = new templateEngine();
 		$tpl->render($data);
		
 	}
 }

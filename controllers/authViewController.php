<?php
 require_once('./templateEngine/templateEngine.php');
 require_once('controller.php');
 
 class authViewController implements Controller{
 	
 	public function handleRequest(){
 		$data =[];		
 		$data['layout']= 'tpls/main.php';
 		
 		if(isset($_SESSION['user'])) {			
 			$data['user'] = $_SESSION['user'];
 			$data['title']= 'Здравствуйте, '.$_SESSION['user'];
 			$data['content_tpl'] = 'authSuccessBlock.php';	
 			
 		} else {
 			$data['user'] = false;
 			$data['title']= 'вход';
 			$data['content_tpl'] = 'authBlock.php';			
 		}
 		
 		$tpl = new templateEngine();
 		$tpl->render($data);
 		
 	}
 }
 


 
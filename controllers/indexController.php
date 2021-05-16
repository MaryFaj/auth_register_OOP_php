<?php
require_once('controller.php');
require_once('./templateEngine/templateEngine.php');

 class indexController implements Controller{
 	
 	public function handleRequest(){
 		$data =[];
 		$data['title']='welcome';		
 		$data['layout']= 'tpls/main.php';
 		
 		if(isset($_SESSION['user'])) {			
 			$data['user'] = $_SESSION['user'];
 			$data['content_tpl'] = 'startSuccessAuthBlock.php';
 		} else {
 			$data['user'] = false;
 			$data['content_tpl'] = 'startBlock.php';
 		} 		
 		$tpl = new templateEngine();
 		$tpl->render($data);
		
 	}
 }
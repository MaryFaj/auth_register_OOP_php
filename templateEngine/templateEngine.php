<?php

class templateEngine{

	public function render($data){
		$title = $data['title'];
		$content_tpl = $data['content_tpl'];
		$user = $data['user'];
		include_once($data['layout']);
	}
}
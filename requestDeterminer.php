<?php

class requestDeterminer{
	public $uri;
	public $method;
	
	public function __construct(){
		$this->uri = $this->determineUri();
		$this->method = $this->determineMethod();
	}
	
	public function determineUri() {
		return $_SERVER['REQUEST_URI'];
	}
	public function determineMethod() {
		return $_SERVER['REQUEST_METHOD'];
	}
}
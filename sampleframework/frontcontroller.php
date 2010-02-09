<?php
class FrontController
{
	protected $notfound = false;
	public function run()
	{

		$params = $this->getParams();	
		if ($this->notfound) {
			return;
		}
		require_once($params["controller"] . ".php");
		$controller = new $params["controller"]($params);
		$controller->init();
		$controller->$params["action"]();
		$controller->shutdown();
	}
	
	public function getParams()
	{
		$url = $_SERVER['REQUEST_URI'];
		$url = substr($url, 1);
		$parts = explode('/', $url);
		
		$controller = $parts[0];
		$action = $parts[1];
		
		if (!$controller) {
			$this->notfound();
		}
		
		if (!$action) {
			$action = 'index';
		}
		
		return array("action"=>$action, "controller"=>$controller);
	}
	
	public function notfound()
	{
		header("HTTP/1.1 404 Not Found");
		echo ('well, that doesnt work');
		$this->notfound = true;
	}
}
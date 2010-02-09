<?php
class FrontController
{
	public function run()
	{
		$params = $this->getParams();	
		
		require_once($params["controller"] . ".php");
		$controller = new $params["controller"]($params);
		$controller->init();
		$controller->$params["action"];
		$controller->shutdown();
	}
	
	public function getParams()
	{
		$url = $_SERVER['REQUEST_URI'];
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
}
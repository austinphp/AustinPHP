<?php
require_once 'view.php';
class Controller
{
	public function __construct($params)
	{
		$this->action = $params['action'];
		$this->controller = $params['controller'];
	}
	
	public function init()
	{
		$this->view = new View("$this->controller.$this->action.phtml");
	}
	
	public function shutdown()
	{
		$this->view->render();
	}
}
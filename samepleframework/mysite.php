<?php
require_once('controller.php');
class mysite extends Controller
{
	public function index()
	{
		$this->view->content = 'index';
	}
	
	public function test()
	{
		$this->view->content = 'test';
	}
}
<?php
class View
{
	public function __construct($viewscript)
	{
		$this->viewscript = $viewscript;	
	}
	
	public function render()
	{
		require_once($this->viewscript);
	}
}
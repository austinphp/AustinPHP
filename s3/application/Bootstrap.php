<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	public function _initAutloader()
	{
		$module_loader = new Zend_Application_Module_Autoloader(array("namespace" => "",
																	  "basePath" => APPLICATION_PATH));
		return $module_loader;
	}

}


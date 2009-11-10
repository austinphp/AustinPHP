<?php
class Model_Entity
{
	protected $adapter;
	protected $config;
	
	public function __construct()
	{
		$fc = Zend_Controller_Front::getInstance();
		$bootstrap = $fc->getParam('bootstrap');
		$this->adapter = $bootstrap->bootstrap('db')
								   ->getResource('db');
								   
		$this->config = new Zend_Config_Ini('../application/configs/amazon.ini', 's3');								   
	}
	
	public function findAll()
	{
		$sql = "SELECT *
				FROM entities";
		$res = $this->adapter->query($sql);
		$res = $res->fetchAll();
		foreach ($res as &$entity) {
			$entity["image"] = "http://" . $this->config->imagebucket . "." . $this->config->s3prefix . "/" . $entity["s3hash"] . ".jpg";	
		}
		
		return $res;
	}
	
	public function insert($values)
	{
		$sql = "INSERT INTO entities (`name`, `description`, `s3hash`)
				VALUES (?,?,?)";
		$res = $this->adapter->query($sql, $values);
		if ($res) {
			return true;
		}
		return false;
	}
}
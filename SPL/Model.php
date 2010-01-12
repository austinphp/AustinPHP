<?php
class Model
{
	protected $_storage = array();
	
	public function __construct(array $data)
	{
		foreach ($data as $key => $value) {
			$this->_storage[$key] = $value;
		}
	}
	
	public function __get($property)
	{
		return $this->_storage;
	}
	
	public function __set($property, $value)
	{
		$this->_storage[$property] = $value;
	}
}
<?php
class Model implements ArrayAccess
{
	protected $_storage = array();
	
	public function __get($property)
	{
		return $this->_storage;
	}
	
	public function __set($property, $value)
	{
		$this->_storage[$property] = $value;
	}
	
	public function offsetExists()
	{
		
	}
	
	public function offsetGet($offset)
	{
		
	}
	
	public function offsetSet($offset, $value)
	{
		
	}
	
	public function offsetUnset($offset)
	{
	
	}
}
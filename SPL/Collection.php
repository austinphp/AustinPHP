<?php
class Collection implements Iterator, ArrayAccess
{
	protected $_storage = array();
	
	/**
	 * Iterator functions
	 */
	public function valid()
	{
		
	}
	
	public function rewind()
	{
		
	}
	
	public function next()
	{
		
	}
	
	public function current()
	{
		
	}
	
	public function key()
	{
		
	}
	
	
    /**
     * ArrayAccess functions
     */
	public function offsetExists($offset)
	{
		if (isset($this->_storage[$offset])) {
			return true;
		}
		return false;
	}
	
	public function offsetGet($offset)
	{
		return $this->_storage[$offset];
	}
	
	public function offsetSet($offset, $value)
	{
		$this->_storage[$offset] = $value;
	}
	
	public function offsetUnset($offset)
	{
		unset($this->_storage[$offset]);
	}	
	
}
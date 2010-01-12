<?php
class Collection implements Iterator, ArrayAccess, Countable
{
	protected $_storage = array();
	protected $_position;
	
	/**
	 * Iterator functions
	 */
	public function valid()
	{
		if (isset($this->_storage[$this->_position])) {
			return true;
		}
		return false;
	}
	
	public function rewind()
	{
		$this->_position = 0;
	}
	
	public function next()
	{
		$this->_position++;
	}
	
	public function current()
	{
		return $this->_storage[$this->_position];
	}
	
	public function key()
	{
		return $this->_position;
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
		if ($offset == "") {
			$this->_storage[] = $value;
		} else {
			$this->_storage[$offset] = $value;			
		}

	}
	
	public function offsetUnset($offset)
	{
		unset($this->_storage[$offset]);
	}	
	
	/**
	 * Countable functions
	 */
	public function count()
	{
		return count($this->_storage);
	}
	
}
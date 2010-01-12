<?php
class PickyCollection implements Iterator, ArrayAccess, Countable
{
	const FILTER_VALUE = 'ValueFilter';
	const FILTER_NAME  = 'NameFilter'; 

	protected $_filters = array();
	protected $_storage = array();
	protected $_position;
	
	public function __construct()
	{

	}
	
	public function addFilter($filterName, $params)
	{
		//could use an autoloader here, could also use some validation
		require ($filterName . ".php");
		$this->_filters[] = new $filterName($params);
	}
	
	protected function filter($data)
	{
		foreach ($this->_filters as $filter) {
			if (!$filter->isValid($data)) {
				return false;
			}
		}
		return true;
	}
	
	/**
	 * Iterator functions
	 */
	public function valid()
	{
		while ($this->_position < count($this->_storage) && !$this->filter($this->current())) {
			$this->next();
		}
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
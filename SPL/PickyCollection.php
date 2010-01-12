<?php
class PickyCollection extends Collection
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
	
	/**
	 * Countable functions
	 */
	public function count()
	{
		return count($this->_storage);
	}
}
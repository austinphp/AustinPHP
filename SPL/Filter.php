<?php
abstract class Filter
{
	
	/**
	 * filter the data and return 
	 * @param mixed $value
	 * @return boolean
	 */
	abstract public function isValid($value);
	
	public function __construct($params = null)
	{
		if (is_array($params)) {
			foreach ($params as $key => $value) {
				$this->$key = $value;
			}
		}
	}
}
<?php
class ValueFilter extends Filter
{
	public function isValid($data)
	{
		if (isset($this->mode) && isset($this->value)) {
			switch ($this->mode) {
				case "greaterThan":
					if ($data->value > $this->value) {
						return true;
					}
					break;
				case "lessThan":
					if ($data->value < $this->value) {
						return true;
					}
					break;
				case "equalTo":
					if ($data->value == $this->value) {
						return true;
					}
					break;
			}
			return false;
		}
		return true;
	}	
}
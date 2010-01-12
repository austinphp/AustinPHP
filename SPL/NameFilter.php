<?php
class NameFilter extends Filter
{
	public function isValid($data)
	{
		if (!isset($this->bannedNames)) {
			return true;
		} else if (is_array($this->bannedNames)) {
			if (in_array($data->name, $this->bannedNames)) {
				return false;
			}
		} else {
			if ($data->name == $this->bannedNames) {
				return false;
			}
		}
		return true;		
	}
}
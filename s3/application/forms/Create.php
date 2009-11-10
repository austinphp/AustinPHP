<?php
class Form_Create extends Zend_Form
{
	public function __construct()
	{
		parent::__construct();
		
		$this->setEnctype('multipart/form-data')
		     ->setMethod('post')
		     ->setAction('/index/submit');
		
		$name = $this->createElement('text', 'name')
					 ->setLabel('Name:');
		
		$description = $this->createElement('text', 'description')
					        ->setLabel('Description:');
		
		$file = $this->createElement('file', 'image')
					 ->setLabel('Image:');
					 
		$submit = $this->createElement('submit', 'submit');
		
		$this->addElement($name)
			 ->addElement($description)
			 ->addElement($file)
		     ->addElement($submit);
	}
}
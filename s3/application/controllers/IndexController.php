<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function createAction()
    {
   		 $form = new Form_Create();
		 $this->view->form = $form;
    }
    
    public function listAction()
    {
    	$model = new Model_Entity();
    	$entities = $model->findAll();
    	$this->view->entities = $entities;
    }
    
    
    public function submitAction()
    {
    	$this->_helper->ViewRenderer->setNoRender();
    	
    	$model = new Model_Entity();
    	
    	$form = new Form_Create();
    	
    	if ($form->isValid($_POST)) {
			$s3hash = md5($form->getValue('name'));
			$model->insert(array($form->getValue('name'),
								 $form->getValue('description'),
								 $s3hash));

			$form->getElement('image')->receive();
			$tmpfile = $form->getElement('image')->getFileName();								 
			$this->_sendS3($tmpfile, $s3hash);
			
			$this->_redirect('/index');
    	}
    }
    
    public function indexAction()
    {
		
    }
    
    private function _sendS3($tmpfile, $name)
    {
    	$config = new Zend_Config_Ini('../application/configs/amazon.ini', 's3');
    	
    	$s3 = new Zend_Service_Amazon_S3($config->access_key, $config->secret_key);
    	
    	$bytes = file_get_contents($tmpfile);
    	
    	return $s3->putObject($config->imagebucket . "/" . $name . ".jpg", $bytes, array(Zend_Service_Amazon_S3::S3_ACL_HEADER=>Zend_Service_Amazon_S3::S3_ACL_PUBLIC_READ));
    }
    
	
}


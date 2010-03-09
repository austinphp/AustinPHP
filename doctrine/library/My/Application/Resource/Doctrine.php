<?php
class My_Application_Resource_Doctrine extends Zend_Application_Resource_ResourceAbstract
{
    public function init()
    {
        //pull in options from config file
        $options = $this->getOptions();
        
        //require doctrine core
        require_once('Doctrine/lib/Doctrine.php');
        
        //setup autoloading for doctrine core and models
        $loader = Zend_Loader_Autoloader::getInstance();
        $loader->pushAutoLoader(array('Doctrine', 'autoload'));
        $loader->pushAutoLoader(array('Doctrine', 'modelsAutoLoad'));
        
        //tell doctrine to load the models but load them conservatively
        $manager = Doctrine_Manager::getInstance();
        $manager->setAttribute(Doctrine::ATTR_MODEL_LOADING, Doctrine::MODEL_LOADING_CONSERVATIVE);
        $manager->setAttribute(Doctrine_Core::ATTR_AUTO_ACCESSOR_OVERRIDE, true);
        Doctrine::loadModels($options["modelPath"]);
        
        $manager->openConnection($options["connectionString"], 'db');
        
        //return doctrine manager as the resource that was bootstrapped
        return $manager;
    }
}

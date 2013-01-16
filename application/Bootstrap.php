<?php
Zend_Session::start();
//print_r($_SESSION);

require_once(APPLICATION_ENV.'_site_constants.php');

ini_set('display_errors', '1');
	error_reporting(E_ALL ^ E_NOTICE);

	class Bootstrap extends Zend_Application_Bootstrap_Bootstrap{
	    protected function _initAutoload(){
	        // Add autoloader empty namespace
	        $autoLoader = Zend_Loader_Autoloader::getInstance();
	        $autoLoader->registerNamespace('CMS_');
	        $resourceLoader = new Zend_Loader_Autoloader_Resource(
	        	array(
			        'basePath' => APPLICATION_PATH,
			        'namespace' => '',
			        'resourceTypes' => array(
			        	'form' => array(
				          	'path' => 'forms/',
				          	'namespace' => 'Form_',
				        ),
	          			
	          		),
	          	)
	        );
	        // Return it so that it can be stored b the bootstrap
	        return $autoLoader;
	    }
	   
	   	public function initSession(){
	        $session= Globals::getSession();
	    }
	}

<?php

class BaseController extends Zend_Controller_Action
{

  public function preDispatch()
  {
  	if(!$_SESSION['name']){
 	    $this->_redirect(BASE_URL.'admin/login');    
  		}
	}
    
  public function init()
  {
        /* Initialize action controller here */
  }

 }
 ?>
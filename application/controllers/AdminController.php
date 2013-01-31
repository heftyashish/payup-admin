<?php

class AdminController extends Zend_Controller_Action
{


  public function indexAction()
  {
  
  }

	public function loginAction()
	{
    $this->_helper->layout->disableLayout();    

    if ($this->getRequest()->isPost()) {
        $formData = $this->getRequest()->getPost();
            $name = $_POST['username'];
            $password = $_POST['password'];
            $index = new Application_Model_DbTable_Login();
            $data = $index->admin($name,$password);
              

                if($data == 'error'){
                    //echo 'Enter valid credentials';
                    $_SESSION['login_failed']=true;
                    $this->_redirect('admin/login');
                } 
                if($data['id']){
                  $_SESSION['id']  =$data[0]['id'];
                  $_SESSION['name']=$data[0]['username'];
                  header('location:index');
                }
        }
	}


  public function logoutAction()
  {
    session_destroy();
    $this->_redirect('admin/login');
  }

}


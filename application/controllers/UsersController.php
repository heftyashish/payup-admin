<?php
include("BaseController.php");
class UsersController extends BaseController
{


  public function init()
  {
        /* Initialize action controller here */
  }

  public function usersAction()
  {

            $index = new Application_Model_DbTable_Users();
            $data = $index->user_all();
            $this->view->assign('data',$data);
                if($data == 'error'){
                     echo 'Enter valid credentials';
                } 
                     
  }

 }
 ?>
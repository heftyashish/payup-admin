<?php
include("BaseController.php");

class CalendarController extends BaseController
{


  public function indexAction()
  {
  
  }

	public function calendarAction()
	{

		$from = date("Y-m-d", strtotime($_POST['date_1']));
		$to = date("Y-m-d", strtotime($_POST['date_2']));
		$date_type=$_POST['date_type'];
		$toc=$_POST['toc'];
		$email=$_POST['email'];

		// if($_POST['date_type']=="updated_at"){
		// 	echo stripos("meme", "@");
		// 	die;
		// }
		// else{
		// 	$updated_at=false;
		// }

		$index = new Application_Model_DbTable_Users();	
		$data_all = $index->user_all();											// gets all the users.
		$data_filtered=$index->users_between($from,$to,$date_type,$toc,$email); // conditional call to filter users
		// echo "<pre>";
		// print_r($data_filtered);
		// die;		
		   if(isset($_POST['submit'])){
           		$this->view->assign('data',$data_filtered);
			}
			else{
	            $this->view->assign('data',$data_all);
			}
		
	}

}


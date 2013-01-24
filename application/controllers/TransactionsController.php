<?php

include('BaseController.php');
class TransactionsController extends BaseController{

 public function indexAction() {
        
 }

public function transactiondetailsAction(){
					
						$index = new Application_Model_DbTable_Transactions();
				    $data = $index->transaction_detail();
						$this->view->assign('data',$data);

						if($this->getRequest()->isPost()) {
								if(isset($_POST['submit'])) {
											$type = $_POST['users'];
				
											$from = $_POST['date_1'];
											$fromdate = date("Y-m-d",strtotime($from));
										
											$to = $_POST['date_2'];
											$todate = date("Y-m-d",strtotime($to));

									$index = new Application_Model_DbTable_Transactions();
							    $data = $index->transaction_detail_from_date($fromdate,$todate,$type);
									$this->view->assign('data',$data);		
									}	
								}		
				}
	}

?>
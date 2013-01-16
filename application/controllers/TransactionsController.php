<?php

include('BaseController.php');
class TransactionsController extends BaseController{

 public function indexAction() {
        
 }

public function transactiondetailsAction(){
		 $index = new Application_Model_DbTable_Transactions();
         $data = $index->transaction_detail();
         
         $this->view->assign('data',$data);

}


}

?>
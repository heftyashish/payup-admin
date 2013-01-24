<?php

class Application_Model_DbTable_Transactions extends Zend_Db_Table_Abstract
{

    protected $_name='transactions';

    
    /* --------------------Transaction details------------------------------------------------------------- */

    public function transaction_detail() {

		$select  =  $this->select()->setIntegrityCheck(false);	
		$select->from('transactions',array('id','account_id','amount','type','status','created_at','updated_at'))
					 ->join('accounts','accounts.id = transactions.account_id',array('current_balance'))
					 ->join('users','users.id =accounts.user_id',array('firstname'));

		$row = $this->fetchAll($select)->toArray();

			if(!empty($row))
					return $row ;
			else
					return 'error';
		}	


		 /* --------------------Transaction details by date------------------------------------------------------------- */

		 public function transaction_detail_from_date($fromdate,$todate,$type) {

		$select  =  $this->select()->setIntegrityCheck(false);	
		$select->from('transactions',array('id','account_id','amount','type','status','created_at','updated_at'))
					 ->join('accounts','accounts.id = transactions.account_id',array('current_balance'))
					 ->join('users','users.id =accounts.user_id',array('firstname'));
		
					if($fromdate){
								$select->where('transactions.created_at>= ?',$fromdate);
							}
					if($todate){
								$select->where('transactions.created_at<= ?',$todate);
							}
					if($type){
								$select->where('transactions.type= ?',$type);
						}		

		$row = $this->fetchAll($select)->toArray();

			if(!empty($row))
					return $row ;
			else
					return 'error';
		}	



}

?>
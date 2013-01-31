<?php

class Application_Model_DbTable_Transactions extends Zend_Db_Table_Abstract
{

    protected $_name='transactions';

    
    /* --------------------Transaction details------------------------------------------------------------- */

    public function transaction_detail() {

			$select  =  $this->select()->setIntegrityCheck(false);	
			$select->from('transactions',array('id','account_id','amount','type','status','created_at','updated_at'))
						 ->join('accounts','accounts.id = transactions.account_id',array('current_balance'))
						 ->join('users','users.id =accounts.user_id',array('firstname','lastname'));

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
					 ->join('users','users.id =accounts.user_id',array('firstname','lastname'));
		
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

		/* ----------------------------To get CSV file--------------------------------------------------------------------------------*/
		
		public function get_transactions_csv() {
					
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename=transactions_data.csv');

			// create a file pointer connected to the output stream
			$output = fopen('php://output', 'w');

			// output the column headings
			fputcsv($output, array('Id', 'Account_Id', 'Amount','Type','status','created_at','updated_at','Current Balance','Name'));

			// fetch the data
			mysql_connect('localhost', 'root', 'root');
			mysql_select_db('payup');
			$select  =  $this->select()->setIntegrityCheck(false);	
			$select->from('transactions',array('id','account_id','amount','type','status','created_at','updated_at'))
						 ->join('accounts','accounts.id = transactions.account_id',array('current_balance'))
						 ->join('users','users.id =accounts.user_id',array('firstname','lastname'));
		
			$rows = mysql_query($select);
			// loop over the rows, outputting them
			while ($row = mysql_fetch_assoc($rows)) 
												fputcsv($output, $row);
		}		

}

?>
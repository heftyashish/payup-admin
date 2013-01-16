<?php

class Application_Model_DbTable_Transactions extends Zend_Db_Table_Abstract
{

    protected $_name='transactions';

    public function transaction_detail() {

			$var = $this->select()->from($this,array('id','account_id','reference_id','amount','type','status','created_at','updated_at'));
			$row = $this->fetchAll($var);
			
			if(!empty($row))
					return $row ;
			else
					return 'error';
		}	
}

?>
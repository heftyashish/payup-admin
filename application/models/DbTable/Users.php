<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name='users';

    public function user_all() {

			$var = $this->select()->from($this,array('id','firstname','lastname','email','status','created_at','updated_at'));
			$row = $this->fetchAll($var);
		if(!empty($row))
			return $row ;
		else
			return 'error';
		}	

    public function users_between($from,$to) {

			$var = $this->select()->from($this,array('id','firstname','lastname','email','status','created_at','updated_at'))->where('created_at= ?', $from)->where('created_at= ?', $to);
			$row = $this->fetchAll($var);
		if(!empty($row))
			return $row ;
		else
			return 'error';
		}			
}

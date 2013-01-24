<?php

class Application_Model_DbTable_Users extends Zend_Db_Table_Abstract
{

    protected $_name='users';

    public function user_all() {

			$var = $this->select()->from($this,array('id','firstname','lastname','email','status','toc_accepted','email_verified','created_at','updated_at'));
			$row = $this->fetchAll($var);
		if(!empty($row))
			return $row ;
		else
			return 'error';
		}	

    public function users_between($from,$to,$date_type,$toc,$email) {
    	if($date_type=="updated_at"){
			$var = $this->select()->from($this,array('id','firstname','lastname','email','status','toc_accepted','email_verified','created_at','updated_at'))->where('updated_at>= ?', $from)->where('updated_at<= ?', $to);

    		if($toc=="true"){
 				$var->where('toc_accepted= ?', 1);		// toc accepted case
    		}
    		else if($toc=="false"){
 				$var->where('toc_accepted= ?', 0);		// toc not accepted case
    		}
    		else{
																// do nothing!!!
    		}

    		if($email=="true"){
 				$var->where('email_verified= ?', 1);		// toc accepted case
    		}
    		else if($email=="false"){
 				$var->where('email_verified= ?', 0);		// toc not accepted case
    		}
    		else{
			
    		}
			$row = $this->fetchAll($var);  	
		}

		else{
			$var = $this->select()->from($this,array('id','firstname','lastname','email','status','toc_accepted','email_verified','created_at','updated_at'))->where('updated_at>= ?', $from)->where('updated_at<= ?', $to);

    		if($toc=="true"){
 				$var->where('toc_accepted= ?', 1);		// toc accepted case
    		}
    		else if($toc=="false"){
 				$var->where('toc_accepted= ?', 0);		// toc not accepted case
    		}
    		else{
																// do nothing!!!
    		}

    		if($email=="true"){
 				$var->where('email_verified= ?', 1);		// toc accepted case
    		}
    		else if($email=="false"){
 				$var->where('email_verified= ?', 0);		// toc not accepted case
    		}
    		else{
			
    		}
			$row = $this->fetchAll($var);  	
		}

		if(!empty($row))
			{
				return $row ;
		}
		else
			return 'error';
		}			

    public function users_between_toc($from,$to,$date_type,$toc) {

    	if($date_type=="updated_at"){
			$var = $this->select()->from($this,array('id','firstname','lastname','email','status','created_at','updated_at','toc_accepted'))->where('updated_at>= ?', $from)->where('updated_at<= ?', $to);
			$row = $this->fetchAll($var);
		}
		else{
			$var = $this->select()->from($this,array('id','firstname','lastname','email','status','created_at','updated_at','toc_accepted'))->where('created_at>= ?', $from)->where('created_at<= ?', $to);
			$row = $this->fetchAll($var);			
		}

		if(!empty($row))
			{
				return $row ;
		}
		else
			return 'error';
		}					
}

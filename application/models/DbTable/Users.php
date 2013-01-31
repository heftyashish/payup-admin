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


		public function user_csv(){
			// output headers so that the file is downloaded rather than displayed
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename=data.csv');

			// create a file pointer connected to the output stream
			$output = fopen('php://output', 'w');

			// output the column headings
			fputcsv($output, array('User-id', 'firstname', 'lastname', 'Email Id', 'status', 'T & C', 'Email', 'Joined At', 'Last Seen' ));

			// fetch the data
			mysql_connect('localhost', 'root', '');
			mysql_select_db('payup');
			$rows = mysql_query('SELECT id, firstname, lastname, email, status, toc_accepted, email_verified, created_at, updated_at FROM users');
			
			// loop over the rows, outputting them


			while ($row = mysql_fetch_assoc($rows) )
				{
					if($row['toc_accepted']==1){
						$row['toc_accepted']="accepted";
					} 
					else{
						$row['toc_accepted']="not accepted";
					}

					if($row['email_verified']==1){
						$row['email_verified']="verified";
					} 
					else{
						$row['email_verified']="not verified";
					}		
					fputcsv($output, $row);
				}
		}				
}

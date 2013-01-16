<?php

class Application_Model_DbTable_Login extends Zend_Db_Table_Abstract
{

    protected $_name = 'admin_credentials';

    public function admin($name,$password) {

		//$row = $this->fetchRow('id = 1');
		$var = $this->select()->from($this,array('id'))->where('username= ?', $name)->where('password= ?', $password);	
			// echo $var = "SELECT id FROM ".$this->_name." where username='".$name."' and password = '".$password."'";
		$row = $this->find($var);
		 // echo $row[0]['username'];
		 // die;
		// echo "<pre>";
		// print_r($row);
		// die;


		if(isset($row[0])){
			if($row[0]['username']==$name && $row[0]['password']==$password)
			// 	echo "if";
			// else
			// 	echo "not";			
			return $row ;
		}
		else{
			return 'error';					
		}
	}


}


<?php
require 'config.db.php';

class db{

/*** Declare instance ***/
private static $instance = NULL;
/*private $db_config = array(
		'hostname' 	=> 'localhost' ,
		'username' 	=> 'root' ,
		'password' 	=> '123456',
		'database' 	=> 'sysu',
		'charset'	=> 'utf8',
		'pconnect'	=> 1,
		'log'		=> 1,
		'logfilepath' => './'
	);*/

	
public function __construct() {
	if (!self::$instance)
   	 {
   	 	self::$instance = new PDO('mysql:host=localhost;dbname=sysu', 'root', '123456' ,array(PDO::ATTR_PERSISTENT => true));;
    	self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   	 }

  /*** maybe set the db name here later ***/
}

/**
*
* Like the constructor, we make __clone private
* so nobody can clone the instance
*
*/
private function __clone(){
}


public function insert_new_user($para){
	try {
		self::$instance->beginTransaction();
		
        $date = getdate();
		$id = $date[0];
	
		$para2 = array();
		$para2[] = "'" . $id . "'"; // here calculate id.
		$para2[] = "'" . $para['email'] . "'";
		$para2[] = "'" . $para['password'] . "'";
		$para2[] = "''";
	        		
		$insert_string = implode(", ", $para2); 
		$insert_string2 = "INSERT INTO Users (uid, uemail, npwd)
		" . " VALUES (" . $insert_string . " )";
		self::$instance->exec($insert_string2);
		self::$instance->commit();
      
        return $id;
		}
	 catch (Exception $e) {
		 self::$instance->rollBack();
		 return false;
	}
} 

function has_user_email($email){
	try{
		self::$instance->beginTransaction();
		$query = self::$instance->query("Select uid From Users Where uemail = " . "'" . $email . "'");
		self::$instance->commit();
		$result = mysql_fetch_array($query);
		if(!$result['uid'])
			return false;
		else
			return true;
	}
	 catch (Exception $e) {
		 self::$instance->rollBack();
		 return false;
	}
}




}/*** end of class ***/
?>

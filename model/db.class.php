<?php
require 'config.db.php';

class db{

/*** Declare instance ***/
private static $instance = NULL;

	
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
	        		
		$insert_string = implode(", ", $para2); 
		$insert_string2 = "INSERT INTO users (uid, uemail, npwd)
		" . " VALUES (" . $insert_string . " )";
		self::$instance->exec($insert_string2);
		self::$instance->commit();
        return $id;
		}
	 catch (Exception $e) {
		self::$instance->rollBack();
		echo "cannot insert users   ".$e->getMessage(). "    " . $insert_string2;
		return false;
	}
} 

function has_user_email($email){
	try{
		self::$instance->beginTransaction();
		$check_string = "Select uid From Users Where uemail = " . "'" . $email . "'";
		$query = self::$instance->query($check_string);
		self::$instance->commit();
		$query->setFetchMode(PDO::FETCH_ASSOC); 
		$result = $query->fetchAll();
		if($result){
			// echo "exist";
			return true;
		}
		else{
			// echo "unexist";
			return false;
		}

	}
	 catch (Exception $e) {
		 self::$instance->rollBack();
		 echo "cannot check email ".$e->getMessage(). "    " . $insert_string2;
		 return false;
	}
}




}/*** end of class ***/
?>

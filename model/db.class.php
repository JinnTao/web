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

<<<<<<< HEAD

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
=======
// insert new user!
public function new_user($para){
	try {
		self::$instance->beginTransaction();
		
        $date = date('y-m-d');
		
		$para2 = array();
		$para2[] = "'" . $para['email'] . "'";
		$para2[] = "'" . $para['password'] . "'";
	    $para2[] = "'" . $date . "'";
				
		$insert_string = implode(", ", $para2); 
		$insert_string2 = "INSERT INTO users (email, password,sign_up_time)
		" . " VALUES (" . $insert_string . " )";
		self::$instance->exec($insert_string2);
		self::$instance->commit();
        return $para['email'];
		}
	 catch (Exception $e) {
		self::$instance->rollBack();
		echo "cannot insert users   ".$e->getMessage(). "    <br>"; 
>>>>>>> aaa/master
		return false;
	}
} 

<<<<<<< HEAD
function has_user_email($email){
	try{
		self::$instance->beginTransaction();
		$check_string = "Select uid From Users Where uemail = " . "'" . $email . "'";
=======
public function update_user($para){
	try {
		self::$instance->beginTransaction();
		
		
		$insert_string2 = "UPDATE Users SET 
		    name = '". $para['name'] .
		"' , photo = '".$para['photo'] .
		"' , gender = '". $para['gender'] .
		"' , age = '". $para['age'].
		"' , description = '".  $para['description'].
		"' Where id = '". $para['id']."'";
		
		self::$instance->exec($insert_string2);
		echo "update finish!" .$insert_string2 ;
		self::$instance->commit();
	
        return true;
		}
	 catch (Exception $e) {
		self::$instance->rollBack();
		echo "cannot update ".$e->getMessage().$insert_string2 . "    <br>"; 
		return false;
	}
} 

// test email wether email exist!
function has_user_email($email){
	try{
		self::$instance->beginTransaction();
		$check_string = "Select id From Users Where email = " . "'" . $email . "'";
>>>>>>> aaa/master
		$query = self::$instance->query($check_string);
		self::$instance->commit();
		$query->setFetchMode(PDO::FETCH_ASSOC); 
		$result = $query->fetchAll();
		if($result){
<<<<<<< HEAD
			// echo "exist";
			return true;
		}
		else{
			// echo "unexist";
=======
			//echo "exist <br>";
			return true;
		}
		else{
			//echo "unexist <br>";
>>>>>>> aaa/master
			return false;
		}

	}
	 catch (Exception $e) {
		 self::$instance->rollBack();
<<<<<<< HEAD
		 echo "cannot check email ".$e->getMessage(). "    " . $insert_string2;
=======
		 echo "cannot check email ".$e->getMessage(). "    <br>";
		 return false;
	}
}

// check email and password 2 correct 1 password incorrect 0 email unexist
function check_email_password($email,$password){
	try{
		self::$instance->beginTransaction();
		$check_string = "Select password From Users Where email = " . "'" . $email . "'";
		$query = self::$instance->query($check_string);
		self::$instance->commit();
		$query->setFetchMode(PDO::FETCH_ASSOC); 
		$result = $query->fetchAll();
		//print_r($result[0]['password']);
		
		if($result){
			if($result[0]['password'] === $password){
				//echo "you are in  <br>";
				return 2;
			}
			else{
				//echo "password incorrect! <br>";
				return 1;
			}
		}
		else{
			//echo "email unexist <br>";
			return 0;
		}

	}
	 catch (Exception $e) {
		 self::$instance->rollBack();
		 echo "Error: ".$e->getMessage(). "    <br>" ;
>>>>>>> aaa/master
		 return false;
	}
}

<<<<<<< HEAD

=======
public function new_topic($para){
	try {
		// test para valign?
		if(empty($para['title']) or empty($para['content'])){
			echo 'title or content is empty <br>';
			return false;
		}
		
		//begin insert
		self::$instance->beginTransaction();
        $date = date('y-m-d');
	
		$para2 = array();
		$para2[] = "'" . $para['title'] . "'";
		$para2[] = "'" . $para['content'] . "'";
		$para2[] = "'" . $para['start_id'] . "'";
	    $para2[] = "'" . $date . "'";
				
		$insert_string = implode(", ", $para2); 
		$insert_string2 = "INSERT INTO topics (title,content,start_id,start_time)
		" . " VALUES (" . $insert_string . " )";
		self::$instance->exec($insert_string2);
		self::$instance->commit();
        //echo "topic create successfully!";
		return true;
		}
	 catch (Exception $e) {
		self::$instance->rollBack();
		echo "cannot create topics   ".$e->getMessage(). "    <br>"; 
		return false;
	}
} 
public function del_topic($id){
	try {
		self::$instance->beginTransaction();
		$insert_string2 = "DELETE FROM topics WHERE id = '".$id."'";
		self::$instance->exec($insert_string2);
		self::$instance->commit();
        echo "topic del successfully!";
		return true;
		}
	 catch (Exception $e) {
		self::$instance->rollBack();
		echo "cannot del ".$e->getMessage(). "    <br>"; 
		return false;
	}
} 

public function del_user($id){
	try {
		self::$instance->beginTransaction();
		$insert_string2 = "DELETE FROM Users WHERE id = '".$id."'";
		self::$instance->exec($insert_string2);
		self::$instance->commit();
        echo "User del successfully!";
		return true;
		}
	 catch (Exception $e) {
		self::$instance->rollBack();
		echo "cannot del ".$e->getMessage(). "    <br>"; 
		return false;
	}
} 
>>>>>>> aaa/master


}/*** end of class ***/
?>

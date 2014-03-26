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
		  return false;
	  }
  } 
  
  public function update_user_base_information($para){
	  try {
		  self::$instance->beginTransaction();
		  
		  
		  $insert_string2 = "UPDATE Users SET 
			  name = '". $para['name'] .
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
  public function update_user_photo($para){
	  try {
		  self::$instance->beginTransaction();
		  
		  
		  $insert_string2 = "UPDATE Users SET ".
		  "photo = '".$para['photo'] .
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
  public function update_user_password($para){
	  try {
		  self::$instance->beginTransaction();
		  
		  
		  $insert_string2 = "UPDATE Users SET ".
		  "password = '".$para['password'] .
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
  
  public function get_user_by_email($email){
	  try {
		  self::$instance->beginTransaction();
		  $sql_string = "Select * From Users where email = "."'".$email."'"."";
		  $query = self::$instance->query($sql_string);
		  self::$instance->commit();
		  
		  
		  $query->setFetchMode(PDO::FETCH_ASSOC); 
		  $user = $query->fetchAll();
		  //print_r ($topic_array);
		  //echo "topic create successfully!";
		  return $user['0'];
		  }
	   catch (Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot query ".$e->getMessage(). "    <br>"; 
		  return false;
	  }
  
  }
  
  public function get_user_id_by_email($email){
	  try {
		  self::$instance->beginTransaction();
		  $sql_string = "Select id From Users where email = "."'".$email."'"."";
		  $query = self::$instance->query($sql_string);
		  self::$instance->commit();
		  
		  
		  $query->setFetchMode(PDO::FETCH_ASSOC); 
		  $user = $query->fetchAll();

		  return $user['0']['id'];
		  }
	   catch (Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot query ".$e->getMessage(). "    <br>"; 
		  return false;
	  }
  
  }
  // test email wether email exist!
  function has_user_email($email){
	  try{
		  self::$instance->beginTransaction();
		  $check_string = "Select id From Users Where email = " . "'" . $email . "'";
		  $query = self::$instance->query($check_string);
		  self::$instance->commit();
		  $query->setFetchMode(PDO::FETCH_ASSOC); 
		  $result = $query->fetchAll();
		  if($result){
			  //echo "exist <br>";
			  return true;
		  }
		  else{
			  //echo "unexist <br>";
			  return false;
		  }
  
	  }
	   catch (Exception $e) {
		   self::$instance->rollBack();
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
		   return false;
	  }
  }
  
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
  public function get_topics(){
	  try {
		  self::$instance->beginTransaction();
		  $sql_string = "Select * From topics";
		  $query = self::$instance->query($sql_string);
		  self::$instance->commit();
		  
		  
		  $query->setFetchMode(PDO::FETCH_ASSOC); 
		  $topic_array = $query->fetchAll();
		  //print_r ($topic_array);
		  //echo "topic create successfully!";
		  return $topic_array;
		  }
	   catch (Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot query ".$e->getMessage(). "    <br>"; 
		  return false;
	  }
  }
  public function get_topic_by_id($id){
	  try {
		  self::$instance->beginTransaction();
		  $sql_string = "Select * From topics where id = "."'".$id."'"."";
		  $query = self::$instance->query($sql_string);
		  self::$instance->commit();
		  
		  
		  $query->setFetchMode(PDO::FETCH_ASSOC); 
		  $topic = $query->fetchAll();
		  //print_r ($topic_array);
		  //echo "topic create successfully!";
		  return $topic['0'];
		  }
	   catch (Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot query ".$e->getMessage(). "    <br>"; 
		  return false;
	  }
  }
  
  
  
  public function update_topic($topic){
	  try {
		  self::$instance->beginTransaction();
		  $sql_string = 'UPDATE topics SET title='.'"'.$topic['title'].'"'.', content='.'"'.$topic['content'].'"'.' WHERE id='.'"'.$topic['id'].'"';
  
		  self::$instance->exec($sql_string);
		  self::$instance->commit();
		  return true;
		  }
	   catch (Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot update ".$e->getMessage(). "    <br>"; 
		  return false;
	  }
  
  }
  
  public function del_topic_by_id($id){
	  try {
		  self::$instance->beginTransaction();
		  $insert_string2 = "DELETE FROM topics WHERE id = '".$id."'";
		  self::$instance->exec($insert_string2);
		  self::$instance->commit();
		  //echo "topic del successfully!";
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
  public function make_friends($id1,$id2){
	  if(self::check_friend($id1, $id2) == true){
		  echo 'make friend failure!';
		  		 	 return false;
	  	  }

	  try{
		  self::$instance->beginTransaction();
		  $insert_string = "INSERT INTO Friends (id1, id2) VALUES(" . "'" . $id1 . "'" . "," . "'" . $id2  . "'" . ")";
		  self::$instance->exec($insert_string);
		  self::$instance->commit();
		  echo 'make friends success!';
		  return true;

	  }
	  catch(Exception $e){
		  self::$instance->rollBack();
		  echo "cannot del ".$e->getMessage(). "    <br>"; 
		  return false;
	  }
  }
  
  public function check_friend($id1,$id2)
	{	
	 try{
		self::$instance->beginTransaction();
		$query_string1 = "(SELECT id1 , id2 from Friends where id1 = " . "'" . $id1 . "'" . " AND id2 = " . "'" . $id2 . "'" . ")";
		$query_string2 = "(SELECT id1 , id2 from Friends where id1 = " . "'" . $id2 . "'" . " AND id2 = " . "'" . $id1 . "'" . ")";
		
		$result1 = self::$instance->query($query_string1);
		//self::$instance->commit();

		
		$result2 = self::$instance->query($query_string2);
		self::$instance->commit();
		
		$result1->setFetchMode(PDO::FETCH_ASSOC); 
		$anwser1 = $result1->fetchAll();
		
		$result2->setFetchMode(PDO::FETCH_ASSOC); 
		$anwser2 = $result2->fetchAll();
		
		if($anwser1 || $anwser2){
			return true;
		}
		else
			return false;
	 }
	catch(Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot check friend ".$e->getMessage(). "    <br>".$query_string1.'<br>'.$query_string2; 
		  return false;
	}
   }
   
   public function get_friend_list_by_user_id($id){
	try{
		$friend_list = array();
		self::$instance->beginTransaction();
		$sql_string = "(SELECT id1 , id2 from Friends where id1 = " . "'" . $id . "'" . " OR id2 = ". "'" . $id . "'" . ")";
		
		$result = self::$instance->query($sql_string);
		self::$instance->commit();
		$result->setFetchMode(PDO::FETCH_ASSOC); 
		$result = $result->fetchAll();
		if($result){
			foreach($result as $key => $value){
				if($value['id1'] == $id)
					$friend_list[] = $value['id2'];
				else
					$friend_list[] = $value['id1'];
			}
		}
		
		return $friend_list;
		
		
	 }
	catch(Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot return list ".$e->getMessage(). "    <br>"; 
		  return null;
	}
   }
   
   public function del_friend_by_user_id($user_id,$friend_id){
   	  try {
		  $user_id = "'".$user_id."'";
		  $friend_id = "'".$friend_id."'";
		  self::$instance->beginTransaction();
		  $sql_string = "DELETE FROM Friends WHERE (id1 = " . $user_id . " AND id2 = " . $friend_id . ") OR (
					id1 = " . $friend_id . " AND id2 = " . $user_id . ")";
		  self::$instance->exec($sql_string);
		  self::$instance->commit();
		  //echo "frend".$user_id."    ".$friend_id." del successfully!";
		  return true;
		  }
	   catch (Exception $e) {
		  self::$instance->rollBack();
		  echo "cannot del ".$e->getMessage(). "    <br>"; 
		  return false;
	  }
   
   }
   
   

}/*** end of class ***/
?>

<html>
<?php
	require 'config.db.php';
	/*create data base*/
	$link = mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);
	$initial_sql = 'CREATE DATABASE ' . $db_config["database"];
	
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	if (mysql_query($initial_sql, $link)) {
		echo "Database SYSU created successfully <br>";
	} else {
		echo 'Error creating database: ' . mysql_error() . "<br>";
	}
	mysql_close($link);
	
	/*create tables Users*/
	$link = mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);
	mysql_select_db($db_config["database"], $link);
	$sql_create_user_table = "CREATE TABLE Users(
	id int(10) NOT NULL auto_increment,
	email VARCHAR(80) NOT NULL UNIQUE,
	password VARCHAR(40) NOT NULL,
	name VARCHAR(80),
	photo VARCHAR(200),
	gender CHAR(1),
	age CHAR(4),
	description TEXT,
	sign_up_time DATE NOT NULL,
	PRIMARY KEY (id))";
	
	if(mysql_query($sql_create_user_table, $link)){
		echo 'Table Users created!' . "<br>";
	}
	else
		echo 'Error creating table::' . mysql_error() . "<br>";
		
	$test_user_sql =  "Insert Into Users(email,password,name,age,description,sign_up_time) VALUES('test@163.com','123456','admin','20','I am CEO,Bitch!','2014-03-03')";
	if(mysql_query($test_user_sql))
	{
		echo 'Test User initialized! <br>';
	}
	else
		echo 'Error initialized ::'.mysql_error().'<br>';
		
		
	mysql_close($link);
	
	/*create tables Admin*/
	$link = mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);
	mysql_select_db($db_config["database"], $link);
	$sql_create_table = "CREATE TABLE Admin(
	id int(10) NOT NULL auto_increment,
	name VARCHAR(40) NOT NULL,
	password VARCHAR(40) NOT NULL,
	description TEXT,
	PRIMARY KEY (id))";
	
	/*intialize admin account*/
	if(mysql_query($sql_create_table, $link)){
		echo 'Table Admin created!' . "<br>";
	}
	else
		echo 'Error creating table::' . mysql_error() . "<br>";
		
	
	$root_admin_sql =  "Insert Into Admin(name,password,description) VALUES('administration','5588','permission is all')";
	if(mysql_query($root_admin_sql))
	{
		echo 'Admin root initialized! <br>';
	}
	else
		echo 'Error initialized ::'.mysql_error().'<br>';
		
	
	mysql_close($link);

	/*create tables Topics*/
	$link = mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);
	mysql_select_db($db_config["database"], $link);
	$sql_create_table = "CREATE TABLE Topics(
	id int(11) NOT NULL auto_increment,
	title TEXT NOT NULL,
	content LONGTEXT NOT NULL,
	start_id int(10) NOT NULL,
	start_time DATE NOT NULL,
	PRIMARY KEY (id),
	FOREIGN KEY (start_id) references Users (id) ON DELETE CASCADE
	)";
	
	if(mysql_query($sql_create_table, $link)){
		echo 'Table Topics created!' . "<br>";
	}
	else
		echo 'Error creating table::' . mysql_error() . "<br>";
		
		
	mysql_close($link);
	
	/*create tables Friends*/
	$link = mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);
	mysql_select_db($db_config["database"], $link);
	$sql_create_table = "CREATE TABLE Friends(
	id1 int(11) NOT NULL,
	id2 int(11) NOT NULL,
	FOREIGN KEY (id1) references Users (id) ON DELETE CASCADE,
	FOREIGN KEY (id2) references Users (id) ON DELETE CASCADE
	)";
	
	if(mysql_query($sql_create_table, $link)){
		echo 'Table Friends created!' . "<br>";
	}
	else
		echo 'Error creating table::' . mysql_error() . "<br>";
	
	/* create table topic_like*/	
	$sql_create_table = "CREATE TABLE Topic_User_Like(
	topic_id int(11) NOT NULL,
	user_id int(11) NOT NULL,
	FOREIGN KEY (topic_id) references Topics (id) ON DELETE CASCADE,
	FOREIGN KEY (user_id) references Users (id) ON DELETE CASCADE
	)";
	
	if(mysql_query($sql_create_table, $link)){
		echo 'Table Topic_User_Like created!' . "<br>";
	}
	else
		echo 'Error creating table::' . mysql_error() . "<br>";

		
		
	mysql_close($link);
	
	
	
?>
</html>
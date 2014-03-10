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
	email VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	name VARCHAR(15),
	photo VARCHAR(20),
	gender CHAR(1),
	age CHAR(4),
	description VARCHAR(50),
	sign_up_time DATE NOT NULL,
	PRIMARY KEY (id))";
	
	if(mysql_query($sql_create_user_table, $link)){
		echo 'Table Users created!' . "<br>";
	}
	else
		echo 'Error creating table::' . mysql_error() . "<br>";
		
		
	mysql_close($link);
	
	/*create tables Admin*/
	$link = mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);
	mysql_select_db($db_config["database"], $link);
	$sql_create_table = "CREATE TABLE Admin(
	id int(10) NOT NULL auto_increment,
	name VARCHAR(20) NOT NULL,
	password VARCHAR(20) NOT NULL,
	description VARCHAR(50),
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
	title VARCHAR(20) NOT NULL,
	content VARCHAR(100) NOT NULL,
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
	
?>
</html>
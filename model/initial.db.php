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
	
	/*create tables*/
	$link = mysql_connect($db_config["hostname"], $db_config["username"], $db_config["password"]);
	mysql_select_db($db_config["database"], $link);
	$sql_create_user_table = "CREATE TABLE Users(
	uid CHAR(10),
	uemail VARCHAR(20),
	npwd VARCHAR(10),
	PRIMARY KEY (uid))";
	
	if(mysql_query($sql_create_user_table, $link)){
		echo 'Table Users created!' . "<br>";
	}
	else
		echo 'Error creating table::' . mysql_error() . "<br>";
		
		
	mysql_close($link);
	
	
?>
</html>
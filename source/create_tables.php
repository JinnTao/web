<html>
	<?php
	/*link mysql server*/
	$link = mysql_connect('localhost', 'root', '/');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}

	/*create data base*/
	$sql = 'CREATE DATABASE mynote8';
	if (mysql_query($sql, $link)) {
		echo "Database mynote8 created successfully\n";
	} else {
		echo 'Error creating database: ' . mysql_error() . "\n";
	}
	mysql_close($link);
	
	
	/*create tables*/
	$link = mysql_connect('localhost', 'root', '/');
	mysql_select_db("mynote8", $link);
	$sql_create_user_table = "CREATE TABLE Users(
	uid CHAR(10),
	uname VARCHAR(15),
	npwd VARCHAR(10),
	gender CHAR(1),
	urealname VARCHAR(10),
	email VARCHAR(20),
	description VARCHAR(50),
	setuptime DATE,
	newestComment CHAR(10),
	PRIMARY KEY (uid))";
	
	if(mysql_query($sql_create_user_table, $link)){
		echo 'Table Users created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	$sql_create_friends_table = "CREATE TABLE Friends(
	uid1 CHAR(10),
	uid2 CHAR(10),
	PRIMARY KEY (uid1, uid2),
	FOREIGN KEY (uid1) references Users (uid),
	FOREIGN KEY (uid2) references Users (uid))";
	
	if(mysql_query($sql_create_friends_table, $link)){
		echo 'Table Friends created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	
	$sql_create_groups_table = "CREATE TABLE Groups(
	gid CHAR(10),
	gname VARCHAR(15),
	gadmin CHAR(10),
	gdate  DATE,
	PRIMARY KEY (gid),
	FOREIGN KEY (gadmin) references Users (uid))";
	
	if(mysql_query($sql_create_groups_table, $link)){
		echo 'Table Groups created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	$sql_create_groups_members_table = "CREATE TABLE GroupsMembers(
	gid CHAR(10),
	uid CHAR(10),
	PRIMARY KEY (gid, uid),
	FOREIGN KEY (gid) REFERENCES Groups (gid),
	FOREIGN KEY (uid) REFERENCES Users (uid))";
	
	if(mysql_query($sql_create_groups_members_table, $link)){
		echo 'Table GroupsMembers created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	
	$sql_create_resouces_table = "CREATE TABLE Resources(
	rid CHAR(10),
	rtitle VARCHAR(30),
	rgeneral VARCHAR(500),
	setuper CHAR(10),
	setuptime DATE,
	PRIMARY KEY (rid),
	FOREIGN KEY (setuper) REFERENCES Users (uid))";
	
	if(mysql_query($sql_create_resouces_table, $link)){
		echo 'Table Resources created! . "\n"';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	
	
	$sql_create_commentary_table = "CREATE TABLE Commentaries(
	cid CHAR(10),
	rid CHAR(10),
	ctitle VARCHAR(30),
	content VARCHAR(200),
	setuper CHAR(10),
	setuptime DATE,
	PRIMARY KEY (cid, rid),
	FOREIGN KEY (setuper) REFERENCES Users (uid))";
	
	if(mysql_query($sql_create_commentary_table, $link)){
		echo 'Table Commentaries created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	
	$sql_create_notes_table = "CREATE TABLE Notes(
	nid CHAR(10),
    rid CHAR(10),
    privacy INT,
	ntitle VARCHAR(20),
	content VARCHAR(500),
	setuper CHAR(10),
	setuptime DATE,
	PRIMARY KEY (nid, rid),
	FOREIGN KEY (rid) REFERENCES Resources (rid),
	FOREIGN KEY (setuper) REFERENCES Users (uid))";
	/*privacy: 1 totally private, 2 public for friends, 4 public for groups*/
	if(mysql_query($sql_create_notes_table, $link)){
		echo 'Table Notes created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
	
	
	$sql_create_message_table = "CREATE TABLE Messages(
	mid CHAR(10),
	mreceiver CHAR(10),
	msender CHAR(10),
	mcontent INT,
	option CHAR(10),
	PRIMARY KEY (mid),
	FOREIGN KEY (mreceiver) REFERENCES Users (uid))";
	/*mcontent 0 for making friends and 1 for inviting into groups and 2 for application into groups*/
	/*option means group id.*/
	if(mysql_query($sql_create_message_table, $link)){
		echo 'Table Messages created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	
	$sql_create_message_table = "CREATE TABLE Topics(
	tid CHAR(10),
	gid CHAR(10),
	setuper CHAR(10),
	setuptime DATE,
	title VARCHAR(20),
	general VARCHAR(100),
	PRIMARY KEY (tid),
	FOREIGN KEY (setuper) REFERENCES Users (uid))";
	echo $sql_create_message_table;
	/*mcontent 0 for making friends and 1 for inviting into groups and 2 for application into groups*/
	if(mysql_query($sql_create_message_table, $link)){
		echo 'Table Topics created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	
	$sql_create_message_table = "CREATE TABLE TopicsResponse(
	trid CHAR(10),
	tid CHAR(10),
	setuper CHAR(10),
	setuptime DATE,
	title VARCHAR(20),
	general VARCHAR(100),
	PRIMARY KEY (trid),
	FOREIGN KEY (tid) REFERENCES Topics (tid),
	FOREIGN KEY (setuper) REFERENCES Users (uid))";
	echo $sql_create_message_table;
	/*mcontent 0 for making friends and 1 for inviting into groups and 2 for application into groups*/
	if(mysql_query($sql_create_message_table, $link)){
		echo 'Table TopicsRespondes created!';
	}
	else
		echo 'Error creating table::' . mysql_error() . "\n";
		
	
	mysql_close($link);
	

	
?>
	
	
	
</html>

<?php
	
	function insert_new_user($para){
		$con = mysql_connect("localhost", "root", "");
        $date = getdate();
		$id = $date[0];
	
		if($con){
			mysql_select_db("mynote8", $con);
			$para2 = array();
			$para2[] = "'" . $id . "'"; // here calculate id.
			$para2[] = "'" . $para['name'] . "'";
			$para2[] = "'" . $para['password'] . "'";
			$para2[] = "'" . $para['gender'] . "'";
			$para2[] = "'" . $para['realname'] . "'";
			$para2[] = "'" . $para['email'] . "'";
			$para2[] = "'" . $para['description'] . "'";
			$para2[] = "'" . $para['setuptime'] . "'";
			$para2[] = "''";
	        		
			$insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO Users (uid, uname, npwd, gender, urealname, email, description, setuptime, newestComment)
				" . " VALUES (" . $insert_string . " )";
			if(!mysql_query($insert_string2)){
                #   echo mysql_error() . "\n";
                return false;
            }        
            mysql_close($con);
            return $id;
		}
		else{
    #			die('Could not connect database');
                return false;
		}
	}
	
	function has_user_name($username){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$query = mysql_query("Select uid From Users Where uname = " . "'" . $username . "'");
			if(!$query)
				echo mysql_error();
			else{
				$result = mysql_fetch_array($query);
				if(!$result['uid'])
					return false;
				else
					return true;
			}
		}
		else{
            #die('Could not connect database');
            return false;
		}
	}
	
	/*delete all commetaries and notes and get it out of group*/
	function delete_user_by_username($name){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			
			$delete_string = "DELETE FROM Users WHERE uname = " . "'" .  $name . "'";
		    echo $delete_string;
			if(!mysql_query($delete_string)){
                echo mysql_error() . "\n";
                return false;	}	
            mysql_close($con);
            return true;
		}
		else{
            #die('Could not connect database');
            return false;
		}
	}
	
	function get_user_by_name($name){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Users where uname = " . "'" . $name . "'");
            if(!$result)
                return null;
            $row = mysql_fetch_array($result);
			mysql_close($con);
			return $row;
		}
		else{
			#die('Could not connect database');
            return null; 
        }
    }

    function get_user_by_id($id){
        $con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Users where uid = " . "'" . $id . "'");
			$row = mysql_fetch_array($result);
			mysql_close($con);
			return $row;
		}
		else{
		#	die('Could not connect database');
            return null; 
        }
    }
    
	function update_user_password_by_name($name, $pwd){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			
			$update_string = "UPDATE Users SET npwd = " . "'" .  $pwd . "' Where uname = '" . $name . "'";
			echo $update_string;
			if(!mysql_query($update_string))
				echo mysql_error() . "\n";		
            mysql_close($con);
            return true;
		}
		else{
            #die('Could not connect database');
            return false;
		}
	}
	
	function update_user_info_by_name($name, $newinfo){ // $infolist 的值与数据库中表的列名字相同。
		$con = mysql_connect("localhost", "root", "");
		if($con){
            mysql_select_db("mynote8", $con);
            $info = array();
            $info[]= 'gender';
            $info[]='urealname';
            $info[] = 'email';
            $info[] = 'description';
            #echo count($info);
			foreach($info as $eachlist){
				$update_string = "UPDATE Users SET " . $eachlist . " = " . "'" .  $newinfo[$eachlist] . "' Where uname = '" . $name . "'";
				#echo $update_string;
				if(!mysql_query($update_string))
                    #echo mysql_error() . "\n";
                    return false;
			}
            mysql_close($con);
            return true;
		}
		else{
			#die('Could not connect database');
            return false;
        }
	}

	function insert_friend($username1, $username2){
        $temp1 = get_user_by_name($username1);
        $temp11 = $temp1['uid'];
        $temp2 = get_user_by_name($username2);
        $temp22 = $temp2['uid'];

		$userid1 = "'" . $temp11 . "'";
		$userid2 = "'" . $temp22 . "'";
		
		if(check_friends($username1, $username2) == true){
			return false;
		}
		
		$con = mysql_connect("localhost", "root", "");
		if($con){
			if(!mysql_select_db("mynote8", $con))
				echo mysql_error();
			$insert_string = "INSERT INTO Friends (uid1, uid2) VALUES(" . $userid1 . "," . $userid2 . ")";
		#	echo $insert_string;
			if(!mysql_query($insert_string))
				echo mysql_error() . "\n";
			mysql_close($con);
			return true;
		}
		else{
            #	die('Could not connect database');
                return false;
		}
	}
	
	function check_friends($username1, $username2){
        $temp1 = get_user_by_name($username1);
        $userid1 = $temp1['uid'];
        $temp2 = get_user_by_name($username2);
        $userid2 = $temp2['uid'];
		
		$query_string1 = "(SELECT uid1 , uid2 from Friends where uid1 = " . "'" . $userid1 . "'" . " AND uid2 = " . "'" . $userid2 . "'" . ")";
		$query_string2 = "(SELECT uid1 , uid2 from Friends where uid1 = " . "'" . $userid2 . "'" . " AND uid2 = " . "'" . $userid1 . "'" . ")";
		
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result1 = mysql_query($query_string1);
			$result2 = mysql_query($query_string2);
			$tp1 = mysql_fetch_array($result1);
			$uid1 = $tp1['uid1'];
			$tp2 = mysql_fetch_array($result2);
			$uid2 = $tp2['uid1'];
			mysql_close($con);
			
			if(!$uid1 && !$uid2){
			#	echo 'you are not f yet';
				return false;
			}
			else{
			#	echo 'you are f';
				return true;
			}
		}
		else{
#			die('Could not connect database');
            return false; 
        }
	}
	
	function get_friends_by_user_name($username){
        $tp = get_user_by_name($username);
		$userid = $tp['uid'];
		$result = array();
		$temp = array();
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$query_string = "(SELECT uid1 , uid2 from Friends where uid1 = " . "'" . $userid . "'" . " OR uid2 = ". "'" . $userid . "'" . ")";
			$temp = mysql_query($query_string);
			if(!$temp)
                #echo mysql_error() . "\n";
                return null;
			while($row = mysql_fetch_array($temp)){
				if($userid == $row['uid1']){
					$result[] = $row['uid2'];
				}
				else{
					$result[] = $row['uid1'];
				}
			}
			mysql_close($con);
			return $result;
		}
		else{
		#	die('Could not connect database');
            return null;
        }
	}
	
	function delete_friend_by_names($username1, $username2){
		$t1 = get_user_by_name($username1);
		$t2 = get_user_by_name($username2);
		$uid1 = "'" . $t1['uid'] . "'";
		$uid2 = "'". $t2['uid'] . "'";
		
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$delete_string = "DELETE FROM Friends WHERE (uid1 = " . $uid1 . " AND uid2 = " . $uid2 . ") OR (
					uid1 = " . $uid1 . " AND uid2 = " . $uid2 . ")";
            $result = mysql_query($delete_string);
            echo $delete_string;
			if(!$result)
			    return false;
            mysql_close($con);
            return true;
        }
		else
            #die('Could not connect database');
            return false;

	}
	 
	function create_group($para, $members){
        $tp = get_user_by_name($para['groupadmin']);
		$groupadminid = $tp['uid'];
		$memberid = array();
		for($i = 0; $i < count($members); $i++){
            $tp1 = get_user_by_name($members[$i]);
			$memberid[] = $tp1['uid'];
		//	echo $memberid[$i];
		}
		$memberid[] = $groupadminid;
		
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$values = array();
            $tp2 = getdate(); 
			$values[] = "'" . $tp2[0] . "'";			
			$values[] = "'" . $para['groupname'] . "'";
            $values[] = "'" . $groupadminid . "'";
            $values[] = "'" . $para['groupdate']. "'";
            $values[] = '"' . $para['groupdesc']. '"';
			$groupid = $values[0];
		
			$insert_string = implode(", ", $values); 
			$insert_string2 = "INSERT INTO Groups (gid, gname, gadmin, gdate, gdesc)"  .  " VALUES (" . $insert_string . " )";
			if(!mysql_query($insert_string2)) {
                echo mysql_error();
                return false;
            }

            for($i = 0; $i < count($memberid); $i++){
                $values = array();
                $values[] = $groupid;
                $values[] = "'" . $memberid[$i] . "'";
                $insert_string = implode(", ", $values); 
                $insert_string2 = "INSERT INTO GroupsMembers (gid, uid)
                    " . " VALUES (" . $insert_string . " )";
        //		echo $insert_string2 . "\n";
        //		echo $values[1] . '\n';
                if(!mysql_query($insert_string2)) {
                    #echo mysql_error();
                    return false;
                }
            }
            mysql_close($con);
            return $groupid;
        }
        else {
        #    die('Could not connect database');
		     return false;
        }
	}



    /********* Function added by Gogle  *********/
	function create_group_2($para, $members){
        $tp = get_user_by_name($para['groupadmin']);
		$groupadminid = $tp['uid'];
		$memberid = array();
		for($i = 0; $i < count($members); $i++){
            $tp1 = get_user_by_name($members[$i]);
			$memberid[] = $tp1['uid'];
		//	echo $memberid[$i];
		}
		$memberid[] = $groupadminid;
		
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$values = array();
            $tp2 = getdate(); 
			$values[] = "'" . $tp2[0] . "'";			
			$values[] = "'" . $para['groupname'] . "'";
            $values[] = "'" . $groupadminid . "'";
            $values[] = "'" . $para['groupdate'] . "'";
            $values[] = "''" . $para['groupdesc']. "'";
			$groupid = $values[0];
		
			$insert_string = implode(", ", $values); 
			$insert_string2 = "INSERT INTO Groups (gid, gname, gadmin, gdate, gdesc)
					" . " VALUES (" . $insert_string . " )";
		//	echo $insert_string2 . "\n";
			if(!mysql_query($insert_string2)){
                echo mysql_error();
                return false;
            }
            /*modified by gogle! here when no member it return false!!!! So i add a if */
            if (count($memberid) > 0) {
                for($i = 0; $i < count($memberid); $i++){
                    $values = array();
                    $values[] = $groupid;
                    $values[] = "'" . $memberid[$i] . "'";
                    $insert_string = implode(", ", $values); 
                    $insert_string2 = "INSERT INTO GroupsMembers (gid, uid)
                        " . " VALUES (" . $insert_string . " )";
            //		echo $insert_string2 . "\n";
            //		echo $values[1] . '\n';
                    if(!mysql_query($insert_string2))
                        #echo mysql_error();
                        return false;
                }
            }
            mysql_close($con);
            return $groupid;
		}
        else	
        #    die('Could not connect database');
		     return false;
    }

    function get_n_group($n){
        $con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
            $query_string = "Selet * from Groups";
            $query_result = mysql_query($query_string);
            if(!$query_result)
                return null;
            $c = 0;
            $n_groups = array();
            while($c < $n && $row = mysql_fetch_array($query_result)){
                $ngroups[] = $row;
                $c++;
                #echo $c;
            }
            return $n_groups;
        }
        else
            return null;       
    }
/*
    function has_group_name($gname){
        $con = mysql_connect("localhost", "root", "");
        if($con){
             mysql_select_db("mynote8", $con);
             $query_string = "SELECT gid From Groups where gname = " . "'" . $gname . "'";
             $query_result = mysql_query($query_string);
             
             if(!$query_result)
                 return true;
             else{
                 $result = mysql_fetch_array($query_result);
                 return $result;
             }
        }
        else
            return true;
    }*/
	function add_group_member($gid, $username){
		$temp = get_user_by_name($username);
		$uid = $temp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$values = array();
			$values[] = "'" . $gid . "'";
			$values[] = "'" . $uid . "'";
			$insert_string = implode(", ", $values); 
			$insert_string2 = "INSERT INTO GroupsMembers (gid, uid)" . " VALUES (" . $insert_string . " )";
			if(!mysql_query($insert_string2))
                #	echo mysql_error();
            return true;
		}
		else{
            #	die('Could not connect database');
            return false;
		}
	}
	
	/*group names could not be duplicate!!!!!*/
	function get_group_members_by_name($groupname){
        $tp = get_group_info_by_name($groupname);
		$groupid = $tp['gid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$query_string = "SELECT uid FROM GroupsMembers WHERE gid = " . "'" . $groupid . "'";
			$result = mysql_query($query_string);
			$groupmemberid = array();
			if(!$result)
                #echo mysql_error();
                return null;
			while($row = mysql_fetch_array($result)){
				$groupmemberid[] = $row['uid'];
			}
			return $groupmemberid;
		}
		else{
            #die('Could not connect database');
            return null;
		}
	}
    
    function get_group_members_by_id($id){
       # $tp = get_group_info_by_name($groupname);
       # $groupid = $tp['gid'];
        $con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
            $query_string = "SELECT uid FROM GroupsMembers WHERE gid = " . "'" . $id . "'";
            $result = mysql_query($query_string);
            $groupmemberid = array();
            if(!$result)
                # echo mysql_error();
                return null;
            while($row = mysql_fetch_array($result)){
                $groupmemberid[] = $row['uid'];
                            }
                        return $groupmemberid;
                    }
        else{
            #die('Could not connect database');
            return null;
        }
     }
        
	function get_group_info_by_name($groupname){
    //  $tp = get_user_by_name($groupadminname);
	//	$adminid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Groups where gname = " . "'" . $groupname . "'");
			if(!$result) {
				echo mysql_error();
                return null;    
            }
            $row = mysql_fetch_array($result);
			mysql_close($con);
			return $row;
		}
		else{
		#	die('Could not connect database');
            return null;
        }
	}
	
	function has_group_name($groupname){
		if(!get_group_info_by_name($groupname))
			return false;
		else
			return true;
	}
	
	function dismiss_group_by_group_name($groupname){
        $tp =get_group_info_by_name($groupname);
		$groupid = $tp['gid'];
		//echo $groupid;
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$delete_from_groups = mysql_query("Delete FROM Groups where gid = " . "'" . $groupid . "'");
			$delete_from_groupmembers = mysql_query("Delete FROM GroupsMembers where gid = " . "'" . $groupid . "'");
			if(!$delete_from_groups)
                #echo mysql_error();
                return false;
			if(!$delete_from_groupmembers)
                #echo mysql_error();
                return false;
            mysql_close($con);
            return true;
        }
		else{
            #	die('Could not connect database');
            return false;
		}
	}
	
	function get_all_groups_by_name($username){
		$temp = get_user_by_name($username);
		$userid = $temp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
            mysql_select_db("mynote8", $con);
            $query_string = mysql_query("Select * FROM GroupsMembers Where uid = " . "'" . $userid . "'");
			if(!$query_string)
             #   echo mysql_error();
                return false;    
            $result = array(); // return group id;
			while($row = mysql_fetch_array($query_string))
                $result[] = $row['gid'];
			mysql_close($con);
            return $result;
        }
        else{
         #   die('Could not connect database');
             return false;
         }

    }

    function get_creating_groups_by_name($username){
        $temp = get_user_by_name($username);
        $userid = $temp['uid'];
        $con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
            $query_string = mysql_query("Select * FROM Groups Where gadmin = " . "'" . $userid . "'");
            if(!$query_string)
                return null;
            $result = array();
            while($row = mysql_fetch_array($query_string))
                #$result[] = $row['gid'];
                $result[] = $row;
            mysql_close($con);
            return $result; 
        }
        else
            return null;
    }

    function get_participating_groups_by_name($username){
        $temp = get_user_by_name($username);
        $userid = $temp['uid'];
        $all_groups = get_all_groups_by_name($username);
        $con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
            $query_string = mysql_query("Select * FROM Groups, GroupsMembers Where Groups.gadmin != " . $userid
                            . " And GroupsMembers.uid = " . $userid);
            if(!$query_string)
                                return null;
            $result = array();
            while($row = mysql_fetch_array($query_string))
                $result[] = $row;
            mysql_close($con);
            return $result;
         }
        else
            return null;
    }

    ##-------------This function is added by Gogle-----------##
	function get_group_info_by_id($gid){
    //  $tp = get_user_by_name($groupadminname);
	//	$adminid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Groups where gid = " . "'" . $gid . "'");
			if(!$result)
				#echo mysql_error();
                return null;    
            $row = mysql_fetch_array($result);
			mysql_close($con);
			return $row;
		}
		else{
		#	die('Could not connect database');
            return null;
        }
	}
    

	function kick_one_out_of_group($groupname, $username){
		$temp = get_group_info_by_name($groupname);
		$temp2 = get_user_by_name($username);
		$gid = $temp['gid'];
		$userid = $temp2['uid'];
		$con = mysql_connect("localhost", "root", "");	
		if($con){
			mysql_select_db("mynote8", $con);
			$delete_string = mysql_query("Delete From GroupsMembers Where gid = " . $gid . " And uid = ". $userid);
			if(!$delete_string)
                #	echo mysql_error();
                return false;
            return true;
		}
		else
            #	die('Could not connect database');
            return false;
	}
	
	//function one_into_groups_by_gid($gid, $xx)
	function insert_resource($para){
	/*	rid CHAR(10),
		rtitle VARCHAR(20),
		rgeneral VARCHAR(500),
		setuper CHAR(10),
		setuptime DATE,
	*/
		$para2 = array();
        $tp = getdate();
		$para2[] = "'" . $tp[0] . "'"; // here calculate id.
		//echo $tp[0];
		$para2[] = "'" . $para['rtitle'] . "'";
		$para2[] = "'" . $para['rgeneral'] . "'";
        $tp2 = get_user_by_name($para['setupername']);
		$para2[] = "'" . $tp2['uid'] . "'";
		$para2[] = "'" . $para['setupdate'] . "'";
		$con = mysql_connect("localhost", "root", "");
		
		if($con){
			mysql_select_db("mynote8", $con);		
			$insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO Resources (rid, rtitle, rgeneral, setuper, setuptime)" . " VALUES (" . $insert_string . " )";	
			if(!mysql_query($insert_string2))
			#	echo mysql_error() . "\n";
			    return false;	
            mysql_close($con);
            return $tp[0];
		}
		else{
		#	die('Could not connect database');
            return false;
        }
	}
	
	
	function get_top_n_resources($n){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$query_string = "SELECT * FROM Resources";
			$result = mysql_query($query_string);
			$count = 0;
			$get_result = array();
			while($count < $n && $row = mysql_fetch_array($result)){
                $get_result[] = $row;
                $count++;
			}
			mysql_close($con);
			return $get_result;
		}
		else{
            #		die('Could not connect database');
            return null;
		}
	}
	
	function get_resource_by_id($id){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Resources where rid = " . "'" . $id . "'");
			$row = mysql_fetch_array($result);
			mysql_close($con);
			return $row;
		}
		else{
            #	die('Could not connect database');
            return false;
		}
	}
	
	function get_resources_by_setuper($username){
        $tp = get_user_by_name($username);
		$userid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Resources where setuper = " . "'" . $userid . "'");
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
            #	die('Could not connect database');
            return false;
		}
	}

    /** this function is added by Gogle **/
	function get_resources_by_uid($userid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Resources where setuper = " . "'" . $userid . "'");
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
            #	die('Could not connect database');
            return false;
		}
	}
    /** this function is added by Gogle **/
    function get_existing_groups() {
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Groups" );
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
            #	die('Could not connect database');
            return false;
		}
    }
	
	function insert_commentary($para){
	/*	cid CHAR(10),
		rid CHAR(10),
		ctitle VARCHAR(30),
		content VARCHAR(200),
		setuper CHAR(10),
		setuptime DATE,
	*/
		$para2  = array();
        $tp = getdate();
		//echo $tp[0];
		$para2[] = "'" . $tp[0] . "'";
		$para2[] = "'" . $para['rid'] . "'";
		$para2[] = "'" . $para['title'] . "'";
		$para2[] = "'" . $para['content'] . "'";
        $tp3 = get_user_by_name($para['setupername']);
		$para2[] = "'" . $tp3['uid'] . "'";
		$para2[] = "'" . $para['setupdate'] . "'";
		
		$infolist = array();
		$infolist[] = "newestComment";
		$newinfo = array();
		$newinfor["newestComment"] = $para2[0];
		update_user_info_by_name($para['setupername'], $infolist, $newinfo);
		
		$con = mysql_connect("localhost", "root", "");
		
		if($con){
			mysql_select_db("mynote8", $con);		
			
			$insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO Commentaries (cid, rid, ctitle, content, setuper, setuptime)" . " VALUES (" . $insert_string . " )";
			if(!mysql_query($insert_string2))
                #		echo mysql_error() . "\n";
                return false;
            mysql_close($con);
            return $tp[0];
		}
		else{
		#	die('Could not connect database');
            return false;
        }
	}
	
	function get_commentary_by_id($cid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);		 
			$query_string = "SELECT * FROM Commentaries WHERE cid = " . "'" . $cid . "'";
			#echo $query_string;
			$result = mysql_query($query_string);
			if(!$result)
			#	echo mysql_error() . "\n";
                return null;    
            $row = mysql_fetch_array($result);
			mysql_close($con);
			return $row;
		}
		else{
			#die('Could not connect database');
            return false;
        }

	}
	
	function get_resource_commentaries_by_id($rid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);		 
			$query_string = "SELECT * FROM Commentaries WHERE rid = " . "'" . $rid . "'";
			#echo $query_string;
			$result = mysql_query($query_string);
			if(!$result)
                #	echo mysql_error() . "\n";
                return null;
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
		#	die('Could not connect database');
            return false;
        }
	}
	
	function update_resource_commentary_by_id($cid, $content){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);		 
			$update_string = "UPDATE  Commentaries SET content = " . "'" . $content . "'" . " Where cid = " . "'" . $cid . "'";
			$result = mysql_query($update_string);
			if(!$result)
                #	echo mysql_error() . "\n";
                return false;
            mysql_close($con);
            return true;
		}
		else{
            #die('Could not connect database');
            return false;
		}
	}
	
	function delete_resource_commentary_by_id($cid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);		 
			$delete_string = "DELETE FROM Commentaries WHERE cid = " . $cid;
			$result = mysql_query($delete_string);
			if(!$result)
                #echo mysql_error() . "\n";
                return false;
            mysql_close($con);
            return true;
		}
		else{
			#die('Could not connect database');
            return false;
        }
	}
	
	function insert_note($para){
	/*	nid CHAR(10),
		rid CHAR(10),
		ntitle VARCHAR(20),
		content VARCHAR(500),
		setuper CHAR(10),
		setuptime DATE,*/
	
        $tp = get_user_by_name($para['setuper']);
		$setuper = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
        $tp2 = getdate();
		$id = $tp2[0];
		//echo $id;
		if($con){
			mysql_select_db("mynote8", $con);
			$para2 = array();
			$para2[] = "'" . $id . "'"; // here calculate id.
			$para2[] = "'" . $para['resoucesid'] . "'";
			$para2[] = $para['privacy'];
			$para2[] = "'" . $para['title'] . "'";
			$para2[] = "'" . $para['content'] . "'";
			$para2[] = "'" . $setuper . "'";
			$para2[] = "'" . $para['setuptime'] . "'";
			
			$insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO Notes (nid, rid, privacy, ntitle, content, setuper, setuptime)
				" . " VALUES (" . $insert_string . " )";
			if(!mysql_query($insert_string2))
				#echo mysql_error() . "\n";		
                return false;    
            mysql_close($con);
            return $id;
		}
		else{
            #	die('Could not connect database');
            return false;
		}
	}
	
	function get_notes_by_username($username){
        $tp = get_user_by_name($username);
		$userid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Notes where setuper = " . "'" . $userid . "'");
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
	#		die('Could not connect database');
            return null;
        }
	}
	
	function get_private_notes_by_username($username){
        $tp = get_user_by_name($username);
		$userid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Notes where setuper = " . "'" . $userid . "' AND privacy = 1");
			if(!$result)
                #echo mysql_error();
                return null;
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
            #	die('Could not connect database');
            return null;
		}
	}
	
	function get_friends_public_notes_by_username($username){
        $tp = get_user_by_name($username);
		$userid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Notes where setuper = " . "'" . $userid . "' AND (privacy = 2 OR privacy = 6)");
			if(!$result)
                #	echo mysql_error();
                return null;
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
		#	die('Could not connect database');
            return null;
        }
	}
	
	function get_group_public_notes_by_username($username){
        $tp = get_user_by_name($username);
		$userid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Notes where setuper = " . "'" . $userid . "' AND (privacy = 4 OR privacy = 6)");
			if(!$result)
                #echo mysql_error();
                return null;
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
		#	die('Could not connect database');
            return null;
        }
	}

    /** This function is added. Gogle  **/
	function get_group_public_notes_by_gid($gid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT Notes.* FROM Notes,GroupsMembers where gid = "  .  "'"  .  $gid  .  "' AND uid = setuper AND (privacy = 4 OR privacy = 6)");
			if(!$result)
                #echo mysql_error();
                return null;
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
		else{
		#	die('Could not connect database');
            return null;
        }
	}
	
	function delete_note_by_id($id){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			
			$delete_string = "DELETE FROM NOTES WHERE nid = " . "'" .  $id . "'";
			echo $delete_string;
			if(!mysql_query($delete_string))
                #echo mysql_error() . "\n"
                return null;		
			mysql_close($con);
		}
		else{
			#die('Could not connect database');
            return null;
        }
	}
	
    function insert_making_friends_message($para){ 
        $t = getdate();
		$id = $t[0];
        $con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
			$values = array();
			$values[] = "'" . $id . "'";
			$values[] = "'" . $para['receiver'] . "'";
			$values[] = "'" . $para['sender'] . "'";
			$values[] = 0;
			$values[] = "''";
            $insert_string = implode(", ", $values); 
			$insert_string2 = "INSERT INTO Messages (mid, mreceiver, msender, mcontent, moption)
				" . " VALUES (" . $insert_string . " )";

            if(!mysql_query($insert_string2))
                # echo mysql_error() . "\n"; 
                return false;   
            mysql_close($con);
            return $id;
        }
        else{
		#	die('Could not connect database');
            return false;
        } 
	}


    function insert_reject_friends_message($para){
        $t = getdate();
		$id = $t[0];
		$con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
			$values = array();
			$values[] = "'" . $id . "'";
			$values[] = "'" . $para['receiver'] . "'";
			$values[] = "'" . $para['sender'] . "'";
			$values[] = 4;
			$values[] = "''";
            $insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO Messages (mid, mreceiver, msender, mcontent, moption)
				" . " VALUES (" . $insert_string . " )";

            if(!mysql_query($insert_string2))
                return false;   
            mysql_close($con);
            return $id;
        }
        else{
		#	die('Could not connect database');
            return false;
        } 
    }
    
	function insert_inviting_group_message($para){
	/*	mid CHAR(10),
       	mreceiver CHAR(10),
        msender CHAR(10),
       	mcontent INT,
		option CHAR(10),*/
		
		$t = getdate();
		$id = $t[0];
		$temp = get_group_info_by_name($para['sender']);//groupname
		$msenderid = $temp['gadmin'];
		$groupid = $temp['gid'];
		$con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
			$values = array();
			$values[] = "'" . $id . "'";
			$values[] = "'" . $para['receiver']. "'";
			$values[] = "'" . $msenderid. "'";
			$values[] = 1;
			$values[] = "'" . $groupid . "'";
            $insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO Messages (mid, mreceiver, msender, mcontent, moption)
				" . " VALUES (" . $insert_string . " )";

            if(!mysql_query($insert_string2))
                #echo mysql_error() . "\n";  
                return false;  
            mysql_close($con);
            return $id;
        }
        else{
            #die('Could not connect database');
            return false;
        } 
	}

    function insert_reject_into_group_message($para){
        $t = getdate();
        $id = $t[0];
        $temp = get_group_info_by_name($para['sender']);//groupname
        $msenderid = $temp['gadmin'];
        $groupid = $temp['gid'];
        $con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
            $values = array();
            $values[] = "'" . $id . "'";
            $values[] = "'" . $para['receiver'] . "'";
            $values[] = "'" . $para['sender'] . "'";
            $values[] = 3;
            $values[] = "'" . $groupid . "'";
            $insert_string = implode(", ", $para2);
            $insert_string2 = "INSERT INTO Messages (mid, mreceiver, msender,  mcontent, moption)
                " . " VALUES (" . $insert_string . " )";
            
            if(!mysql_query($insert_string2))
                  return false;
            mysql_close($con); 
            return $id;
        }
        else{
            return false;
         } 

    }
    

   function insert_applying_group_message($para){
   	/*	mid CHAR(10),
          	mreceiver CHAR(10),
           msender CHAR(10),
          	mcontent INT,
   		option CHAR(10),*/
   	
   		$t = getdate();
   	    $id = $t[0];
        $temp = get_group_info_by_name($para['receiver']);//groupname
        $mreceiverid = $temp['gadmin'];
        $temp2 = get_user_by_id($mreceiverid);
        $mreceiver = $temp2['uname'];
     	$groupid = $temp['gid'];
     	$con = mysql_connect("localhost", "root", "");
        if($con){
            mysql_select_db("mynote8", $con);
     	    $values = array();
     		$values[] = "'" . $id . "'";
     		$values[] = "'" . $mreceiver. "'";
           	$values[] = "'" . $para['sender'] . "'";
     		$values[] = 2;
     		$values[] = "'" . $groupid . "'";
            $insert_string = implode(", ", $values); 
    		$insert_string2 = "INSERT INTO Messages (mid, mreceiver, msender, mcontent, moption)
   				" . " VALUES (" . $insert_string . " )";
     
            if(!mysql_query($insert_string2))
                return false;  
            mysql_close($con);
            return $id;
        }
        else{
            return false;
			#die('Could not connect database');
        } 
	}
	
	function get_messages_by_username($username){
	    $con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$result = mysql_query("SELECT * FROM Messages where mreceiver = " . "'" . $username . "'");
			if(!$result)
                #echo mysql_error();
                return null;
			$search_result = array();
			while($row = mysql_fetch_array($result))
				$search_result[] = $row;
			mysql_close($con);
			return $search_result;
		}
        else{
            #	die('Could not connect database');
            return false;
        } 
	}
	
	function delete_message($mid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$delete_string = "DELETE FROM Messages WHERE mid = " . "'" .  $mid . "'";
            if(!mysql_query($delete_string))
                return false;
                #echo mysql_error() . "\n";    
            mysql_close($con);
            return true;
		}
        else{
            return false;
			#die('Could not connect database');
        } 
	}
	
	
	function insert_topic($para){
	/*	tid CHAR(10),
	gid()
	setuper CHAR(10),
	setuptime DATE,
	title VARCHAR(20),
	general VARCHAR(100),*/
	
        $tp = get_user_by_name($para['setuper']);
		$setuper = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
        $tp2 = getdate();
		$id = $tp2[0];
		//echo $id;
		if($con){
			mysql_select_db("mynote8", $con);
			$para2 = array();
			$para2[] = "'" . $id . "'"; // here calculate id.
			$para2[] = "'" . $para['groupid'] . "'";
			$para2[] = "'" . $setuper . "'";
			$para2[] = "'" . $para['setuptime'] . "'";
			$para2[] = "'" . $para['title'] . "'";
			$para2[] = "'" . $para['general'] . "'";
			
			$insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO Topics (tid, gid, setuper, setuptime, title, general)
				" . " VALUES (" . $insert_string . " )";
            if(!mysql_query($insert_string2))
                return false;
		#		echo mysql_error() . "\n";		
            mysql_close($con);
            return $id;
		}
		else{
            #die('Could not connect database');
            return null;
		}
	}
	
	function get_group_topics_grouprname($groupname){
        $tp = get_group_info_by_name($groupname);
		$groupid = $tp['uid'];
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$query_string = "SELECT * FROM Topics Where gid = " . "'" . $groupid . "'"; 
			$result = mysql_query($query_string);
			$search_result = array();
			while($row = mysql_fetch_array($result)){
				$search_result[] = $row;
			}	
			mysql_close($con);
			return $search_result;
		}
        else{
            return null;
			#die('Could not connect database');
		}
	}
	
	function delete_group_topic_groupname($topicid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$query_string = "DELETE FROM Topics Where tid = " . "'" . $topicid . "'"; 
			$result = mysql_query($query_string);	
            mysql_close($con);
            return true;
		}
        else{
            return false;
			#die('Could not connect database');
		}
	}
	
	function insert_topic_response($para){
		/*
		trid CHAR(10),
		tid CHAR(10),
		setuper CHAR(10),
		setuptime DATE,
		title VARCHAR(20),
		general VARCHAR(100),
		*/
		$con = mysql_connect("localhost", "root", "");
        $date = getdate();
		$id = $date[0];
		$tp = get_user_by_name($para['setuper']);
		$setuperid = $tp['uid'];
		
		if($con){
			mysql_select_db("mynote8", $con);
			$para2 = array();
			$para2[] = "'" . $id . "'"; // here calculate id.
			$para2[] = "'" . $para['tid'] . "'";
			$para2[] = "'" . $setuperid . "'";
			$para2[] = "'" . $para['setupdate'] . "'";
			$para2[] = "'" . $para['setuptime'] . "'";
			$para2[] = "'" . $para['title'] . "'";
			$para2[] = "'" . $para['general'] . "'";
			
			$insert_string = implode(", ", $para2); 
			$insert_string2 = "INSERT INTO TopicsResponse (trid, tid, setuper, setuptime, title, general)
				" . " VALUES (" . $insert_string . " )";
			if(!mysql_query($insert_string2))
                #	echo mysql_error() . "\n";		
                return false;
            mysql_close($con);
            return $id;
		}
        else{
            return false;
			#die('Could not connect database');
		}
	}
	
	function get_topics_responses($tpid){
		$con = mysql_connect("localhost", "root", "");
		if($con){
			mysql_select_db("mynote8", $con);
			$query_string = "SELECT * FROM TopicsResponse Where tid = " . "'" . $tpid . "'"; 
			$result = mysql_query($query_string);
			$search_result = array();
			while($row = mysql_fetch_array($result)){
				$search_result[] = $row;
			}	
			mysql_close($con);
			return $search_result;
		}
        else{
            return null;
			#die('Could not connect database');
		}
	}
?>

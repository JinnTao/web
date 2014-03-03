<?php
	$search_name = $_REQUEST["friendname"];
	//echo $search_name;
	$has_user = false;

    //To judge whether the user is exist
    if(has_user_name($search_name)){
        $has_user = true;
        $search_user = get_user_by_name($search_name);
        //echo $search_user["uid"].'id   ';
        //echo $search_user["uname"].'name    ';
        //echo $search_user["npwd"].'pwd    ';
        //echo $search_user["description"];
        $is_friend = check_friends($search_user['uname'],$_SESSION['username']);
    }

    //Get friends' friends,here store their ids
        $friends_by_friends = array();
    //Get friends' id
        $friends_by_user = get_friends_by_user_name($_SESSION['username']);

        for($i = 0; $i < count($friends_by_user); $i++){
            $friends_name_by_user = get_user_by_id($friends_by_user[$i]);
            $friendsid_list_by_friends = get_friends_by_user_name($friends_name_by_user['uname']);
            //echo count($friends_by_user).'count  ';
            //echo $i.'i   ';
           // echo $friends_name_by_user['uname'].'...';
            for($j = 0; $j < count($friendsid_list_by_friends); $j++){
                //echo count($friendsid_list_by_friends);
                $might_name = get_user_by_id($friendsid_list_by_friends[$j]);
                if($_SESSION['username'] === $might_name['uname']){
                    //echo $_SESSION['username'];

                    continue;
                }
                if(!check_friends($_SESSION['username'],$might_name['uname'])){
                     $friends_by_friends[] = get_user_by_id($friendsid_list_by_friends[$j]);
                }
                   
            }
           
        }

        //echo count($friends_by_friends);
        $path = __SITE_PATH . '/views/friend_find.php';
		include ($path);
?>
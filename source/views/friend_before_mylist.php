<?php
	//echo $_SESSION["username"];
        $myfriends = get_friends_by_user_name($_SESSION['username']);
        $friends_counts = count($myfriends);
        //echo $friends_counts;
        $onefriend = array();

        for($i = 0; $i < $friends_counts; $i++)
        {
            $onefriendid[] = get_user_by_id($myfriends[$i]);

        }

        $path = __SITE_PATH . '/views/friend_mylist.php';
		include ($path);
?>
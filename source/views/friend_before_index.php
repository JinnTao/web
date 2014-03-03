<?php  

  $friends_by_friends = array();
  $resources = array();
  $notes = array();
  //get friends' id
  $friends_by_user = get_friends_by_user_name($_SESSION['username']);

  //get resource and notes from friends
  for($i = 0; $i < count($friends_by_user); $i++){
    $friends_name_by_user = get_user_by_id($friends_by_user[$i]);
    if(get_resources_by_setuper($friends_name_by_user['uname'])){
      $n_resources = get_resources_by_setuper($friends_name_by_user['uname']);
      $resources[] = $n_resources[0];
    }

    if(get_friends_public_notes_by_username($friends_name_by_user['uname'])){
      $n_notes = get_friends_public_notes_by_username($friends_name_by_user['uname']);
      $notes[] = $n_notes[0];
    }
  }

    
   /* for($i = 0; $i < count($friends_by_friends); $i++){
      $resources[] = get_resources_by_setuper($friends_by_friends[$i]);
      $notes[] = get_friends_public_notes_by_username($friends_by_friends[$i]);

    }*/

   // echo 'resource is :  '.count($resources);
   // echo 'notes is :  '.count($notes);
   // echo $resources[0]['rtitle'];


  if (isset($_SESSION["username"]) && $_SESSION["username"] != ""){
		$path = __SITE_PATH . '/views/friend_index.php';
		include ($path);
	}
	else{
		$path = __SITE_PATH . '/views/index_resource_logout.php';
		include ($path);
	}
?>
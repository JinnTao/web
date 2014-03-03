<?php

Class friendController Extends baseController {

    public function index() {
        $this->registry->template->cssfile2 = '../front_end/css/friend_index.css';
       // $this->index_manager();
        $this->registry->template->show('friend_before_index');
    }

    public function find() {
        $this->registry->template->cssfile = '../front_end/css/friend_find.css';
        $this->registry->template->jsfile = '../front_end/js/friend_add.js';
        $this->registry->template->show('friend_before_find');
    }

    public function mylist() {
        $this->registry->template->cssfile = '../front_end/css/friend_index.css';
        $this->registry->template->jsfile = '../front_end/js/friend_delete.js';
        $this->registry->template->show('friend_before_mylist');
    }

   // public function index_manager(){
    //    include ('./model/database2.php');
     //   session_start();
      //  echo $_SESSION['username'];
        /***get friends' recent resources***/
        //$resources = get_recent_friendresource();
        //$notes = get_recent_friendnote();
        //$comments = get_recent_friendcomment();
    //}

    //public function mylist_manager(){
        /*** get all friends of the user ***/
       // echo $_SESSION["username"];
       // $myfriends = get_friends_by_user_name($_SESSION['username']);
    //    $friends_counts = count($myfriends);

      //  $onefriend = array();

    //   for($i = 0; $i < $friends_counts; $i++)
    //    {
     //       $onefriendid[$i] = get_user_by_id($myfriends[$i]);
//
     //   }
   // }

   // public function find_manager(){
        
   //     $search_name = $_REQUEST["friendname"];
   //     if(!is_null($search_name))
   //         $search_user = get_user_by_name($search_name);

  //      $search_name2 = get_might_know($_SESSION['username']);
  //      $search_user2 = get_user_by_name($search_name2);

  //  }   

    public function manage_add() {
        //session_start();
        $group_name = $_POST["group_name"];
        $group_desc = $_POST["group_desc"];
        echo $group_name . $group_desc;
        echo "success";
    }

    public function delete_friends(){
        //session_start();
        $friend_name = $_REQUEST["friendname"];
        $my_name = $_SESSION["username"];
        $ans = delete_friend_by_names($friend_name, $my_name);
       
    }   

    public function add_friends(){
        //session_start();
        $friend_name = $_REQUEST["friendname"];
        $my_name = $_SESSION['username'];
        echo $friend_name;
        $para["sender"] = $my_name;
        $para["receiver"] = $friend_name;
        insert_making_friends_message($para);
    }   

}
?>

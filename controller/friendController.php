<?php

Class friendController Extends baseController {
	public function index() {
		$jsfile = array();
		$cssfile = array();
		$jsfile[] = './front_end/js/sysu_info.js';
		$pagepath = 'friend_new.php';

		$this->registry->template->pagepath = $pagepath;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->sysu_show('sysu_friend');
	}
	//显示好友动态
	public function friendnews()
	{
		$jsfile = array();
		$cssfile = array();
		$userinfo = array();
		// $cssfile[] = './front_end/css/sysu_index.css';
		$jsfile[] = './front_end/js/sysu_info.js';

		$userid = $this->registry->db->get_user_id_by_email($_SESSION['email']);
		$userinfo = $this->registry->db->get_user_by_email($_SESSION['email']);
		$pagepath = 'friend_new.php';

		$this->registry->template->pagepath = $pagepath;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->username = $userinfo['name'];
		$this->registry->template->userid = $userinfo['id'];
		$this->registry->template->sex = $userinfo['gender'];
		$this->registry->template->age = $userinfo['age'];
		$this->registry->template->resume = $userinfo['description'];
		$this->registry->template->signuptime = $userinfo['sign_up_time'];		

		$this->registry->template->sysu_show('sysu_friend');
	}

	//发现好友
	public function friendfind(){
		$jsfile = array();
		$cssfile = array();
		$userid = $this->registry->db->get_user_id_by_email($_SESSION['email']);
		$pagepath = 'friend_find.php';
		$this->registry->template->pagepath = $pagepath;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->sysu_show('sysu_friend');
	}

	//显示好友列表
	public function friendlist()
	{
		if(!isset($_COOKIE['user_id'])){
			header("location:index.php");			
		}
		$jsfile = array();
		$cssfile = array();

		$jsfile[] = './front_end/js/sysu_friend.js';
		$pagepath = 'friend_find.php';

		$this->registry->template->pagepath = $pagepath;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->sysu_show('sysu_friend');
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
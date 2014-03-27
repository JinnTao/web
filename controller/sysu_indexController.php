<?php

Class sysu_indexController Extends baseController {
	public function index() {
		if(isset($_SESSION['email'])){
			$user_email = $_SESSION['email'];
			self::set_cookies($user_email);
		}
		
		$jsfile = array();
		$cssfile = array();

		$cssfile[] = './front_end/css/sysu_index.css';

		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		
		$this->registry->template->sysu_show('sysu_index');
	}
	
	public function set_cookies($user_email){
		$user = array();
		
		$user = $this->registry->db->get_user_by_email($user_email);	
		setcookie("user_id", $user['id'], time()+3600);
		setcookie("user_email", $user['email'], time()+3600);
		setcookie("user_name", $user['name'], time()+3600);
	}

	public function info(){
		$jsfile = array();
		$cssfile = array();
		$userinfo = array();
		// $cssfile[] = './front_end/css/sysu_index.css';
		$jsfile[] = './front_end/js/sysu_info.js';

		$userid = $this->registry->db->get_user_id_by_email($_SESSION['email']);
		$userinfo = $this->registry->db->get_user_by_email($_SESSION['email']);

		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->username = $userinfo['name'];
		$this->registry->template->userid = $userinfo['id'];
		$this->registry->template->sex = $userinfo['gender'];
		$this->registry->template->age = $userinfo['age'];
		$this->registry->template->resume = $userinfo['description'];
		$this->registry->template->signuptime = $userinfo['sign_up_time'];		

		$this->registry->template->sysu_show('sysu_info');
	}

	public function info_change(){
		$jsfile = array();
		$cssfile = array();
		$userinfo = array();
		$insertuser = array();
		$insertpw = array();
		$userid = $this->registry->db->get_user_id_by_email($_SESSION['email']);
		// update user base information
		if(isset($_REQUEST['username'])){
			$insertuser['name']=  $_REQUEST['username'];
			$insertuser['gender'] = $_REQUEST ['sex'];
			$insertuser['age'] = $_REQUEST ['age'];
			$insertuser['description'] = $_REQUEST['resume'];
			$insertuser['id'] = $userid;
			$this->registry->db->update_user_base_information($insertuser);
		}	
		//update user password
		if (isset($_REQUEST ['newpw'])) {
			$insertpw['password'] = $_REQUEST['newpw'];
			$insertpw['id'] = $userid;
			$this->registry->db->update_user_password($insertpw);			
		}

		$userinfo = $this->registry->db->get_user_by_email($_SESSION['email']);

		// $cssfile[] = './front_end/css/sysu_index.css';
		$jsfile[] = './front_end/js/sysu_info.js';
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->username = $userinfo['name'];
		$this->registry->template->userid = $userinfo['id'];
		$this->registry->template->sex = $userinfo['gender'];
		$this->registry->template->age = $userinfo['age'];
		$this->registry->template->resume = $userinfo['description'];
		$this->registry->template->signuptime = $userinfo['sign_up_time'];		
	
		$this->registry->template->sysu_show('sysu_info');
	}

	


public function friend(){
		$jsfile = array();
		$cssfile = array();
	

		// $jsfile[] = './front_end/js/sysu_topic.js';
		// $cssfile[] = './front_end/css/sysu_topic.css';
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
    	$this->registry->template->sysu_show('sysu_friend');
	}

	public function explore(){
		$jsfile = array();
		$cssfile = array();
	

		// $jsfile[] = './front_end/js/sysu_topic.js';
		$cssfile[] = './front_end/css/sysu_explore.css';
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
    	$this->registry->template->sysu_show('sysu_explore');
	}

	public function result(){
		$jsfile = array();
		$cssfile = array();
		// $jsfile[] = './front_end/js/sysu_topic.js';
		// $cssfile[] = './front_end/css/sysu_explore.css';
		$searchname=  $_REQUEST['searchname'];

		
		$this->registry->template->searchname = $searchname;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
    	$this->registry->template->sysu_show('sysu_result');
	}

}
?>

<?php

Class setController Extends baseController {
	public function index() {
		$jsfile = array();
		$cssfile = array();
		$jsfile[] = './front_end/js/sysu_info.js';
		$pagepath = 'set_info.php';

		$this->registry->template->pagepath = $pagepath;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->sysu_show('sysu_info');
	}

	public function info()
	{
		$jsfile = array();
		$cssfile = array();
		$userinfo = array();
		// $cssfile[] = './front_end/css/sysu_index.css';
		$jsfile[] = './front_end/js/sysu_info.js';

		$userid = $this->registry->db->get_user_id_by_email($_SESSION['email']);
		$userinfo = $this->registry->db->get_user_by_email($_SESSION['email']);
		$pagepath = 'set_info.php';

		$this->registry->template->pagepath = $pagepath;
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

		// $userinfo = $this->registry->db->get_user_by_email($_SESSION['email']);

		// $cssfile[] = './front_end/css/sysu_index.css';
		// $jsfile[] = './front_end/js/sysu_info.js';
		// $pagepath = 'set_info.php';

		// $this->registry->template->pagepath = $pagepath;
		// $this->registry->template->jsfile = $jsfile;
		// $this->registry->template->cssfile = $cssfile;
		// $this->registry->template->username = $userinfo['name'];
		// $this->registry->template->userid = $userinfo['id'];
		// $this->registry->template->sex = $userinfo['gender'];
		// $this->registry->template->age = $userinfo['age'];
		// $this->registry->template->resume = $userinfo['description'];
		// $this->registry->template->signuptime = $userinfo['sign_up_time'];		
	
		// $this->registry->template->sysu_show('sysu_info');
		header("location:index.php?rt=set/info");
	}

	public function avatar()
	{
		if(!isset($_COOKIE['user_id'])){
			header("location:index.php");			
		}
		$jsfile = array();
		$cssfile = array();

		$jsfile[] = './front_end/js/sysu_info.js';
		$jsfile[] = './front_end/js/jquery-pack.js';
		$jsfile[] = './front_end/js/jquery.imgareaselect.min.js';
		$cssfile[] = './front_end/css/set.css';
		$pagepath = 'set_avatar.php';

		$userid = $_COOKIE['user_id'];
		$userinfo = $this->registry->db->get_user_by_email($_SESSION['email']);
		$photo = $userinfo['photo'];

		$this->registry->template->photo = $photo;
		$this->registry->template->userid = $userid;
		$this->registry->template->pagepath = $pagepath;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->sysu_show('sysu_info');
	}

	public function password()
	{
		$jsfile = array();
		$cssfile = array();
		$jsfile[] = './front_end/js/sysu_info.js';
		$pagepath = 'set_pw.php';

		$this->registry->template->pagepath = $pagepath;
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$this->registry->template->sysu_show('sysu_info');
	}
}
?>
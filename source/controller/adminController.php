<?php

class adminController Extends baseController {
	public function index() {
		session_start();

		if (isset($_SESSION['admin']) && $_SESSION['admin'] != ""){
			$this->manage();
		}
		else{
			$this->registry->template->jsfile = './front_end/js/admin_login.js';
			$this->registry->template->cssfile = './front_end/css/index_front.css';
			$this->registry->template->show('admin_login');
		}
	}

	public function login_manager(){
		session_start();
		$name = $_REQUEST["adname"];
		$pwd = $_REQUEST["adpwd"];

		if ($name == "kqlxy" && $pwd == "wsrjg"){
			$_SESSION['username'] = "admin";
			echo true;
		}	
		else
			echo false;
	}

	public function manage() {
		session_start();
		if (isset($_SESSION['admin']) && $_SESSION['admin'] != ""){
			$this->registry->template->cssfile = './front_end/css/admin_manager.css';
			$this->registry->template->jsfile = './front_end/js/admin_manager.js';
			$this->registry->template->show('admin_manage');
		}
		else
			$this->index();
	}

	public function manager() {
		include ('./model/database2.php');
		$uname = $_REQUEST['username'];

		delete_user_by_username($uname);
	}
}

?>
<?php

Class indexController Extends baseController {

	public function index() {
		include_once ('./model/database2.php');
		# session_start();

		$this->registry->template->jsfile = './front_end/js/index_login_check.js';
		$this->registry->template->cssfile = './front_end/css/index_public_page.css';

		$resources = array();
		$resources = get_top_n_resources(10);	//get 10 resources
		$this->registry->template->resources = $resources;

		if (isset($_SESSION["username"]) && $_SESSION["username"] != ""){
			//get 10 random groups
			$groups = array();
			//$groups = get_n_group(10);
			$this->registry->template->groups = $groups;

			$this->registry->template->show("index_index_login");
		}
		else{
			$this->registry->template->show("index_index_logout");
		}
	}

	public function register(){
		$this->registry->template->cssfile = './front_end/css/index_front.css';
		$this->registry->template->jsfile = './front_end/js/index_register_check.js';
		$this->registry->template->show('index_register');
	}

	public function login(){
		$this->registry->template->cssfile = './front_end/css/index_front.css';
		$this->registry->template->jsfile = './front_end/js/index_login_check.js';
		$this->registry->template->show('index_login');
	}

	public function resource(){
		include_once ('./model/database2.php');
		# session_start();
	
		$this->registry->template->cssfile = './front_end/css/index_resources.css';

		$resource_id = $_REQUEST["rid"];
		$details = get_resource_by_id($resource_id);
		$commentaries = get_resource_commentaries_by_id($resource_id);
		$setupers = array();
		for ($i = 0; $i < count($commentaries); $i ++){
			$uid = $commentaries[$i]['setuper'];
			$user_info = get_user_by_id($uid);
			$setupers[$i] = $user_info['uname'];
		}

		$this->registry->template->details = $details;
		$this->registry->template->commentaries = $commentaries;
		$this->registry->template->resource_id = $resource_id;
		$this->registry->template->setupers = $setupers;
	
		if (isset($_SESSION["username"]) && $_SESSION["username"] != ""){
			$this->registry->template->show('index_resource_login');
		}
		else{
			$this->registry->template->show('index_resource_logout');
		}
	
	}
	
	public function login_logout_manager(){
		# session_start();
		
		if (isset($_REQUEST['logusername'])){
			$name = $_REQUEST['logusername'];
			$pwd = $_REQUEST['logpwd'];
	
			//check whether login-username and login-password is matched 
			$check = has_user_name($name);
			if ($check == false){
				echo $check;
				die();
			}
			
			$result = get_user_by_name($name);
		
			if ($pwd != $result['npwd']){
				$check = false;
			}
			else{
				$check = true;
				$_SESSION['username'] = $name;
			}
			echo $check;
		}
		else{
			session_destroy();
			header("location: index.php?rt=index");
		}
	}
	
	public function register_manager(){
		if (isset($_GET['username'])){
			$username = $_GET['username'];
			$check = false;
	
			//check whether username is already a record in DB
			$check = has_user_name($username);
			echo $check;
		
			die();
		}

		$newUser = array();
		date_default_timezone_set('PRC');
	
		$newUser['name'] = $_REQUEST['regusername'];
		$newUser['password'] = $_REQUEST['regpwd'];
		$newUser['gender'] = $_REQUEST['gender'];
		$newUser['username'] = (empty($_REQUEST['realname'])) ? '': $_REQUEST['realname'];
		$newUser['email'] = (empty($_REQUEST['email'])) ? '' : $_REQUEST['email'];
		$newUser['discription'] = (empty($_REQUEST['disc'])) ? '' : $_REQUEST['disc'];
		$newUser['setuptime'] = date('Y-m-d H:i:s',time());
		
		insert_new_user($newUser);
		header("location: index.php?rt=index/login");
	}
	
	public function resource_manager(){
		#include ('./model/database2.php');
		date_default_timezone_set('PRC');
		# session_start();
	
		$comment = array();
		$note = array();
	
		$resource_id = $_REQUEST["rid"];
		
		$comment['rid'] = $resource_id;
		$comment['title'] = $_REQUEST['com_title'];
		$comment['content'] =  $_REQUEST['comment'];
		$comment['setupername'] = $_SESSION['username'];
		$comment['setupdate'] = date('Y-m-d H:i:s',time());
	
		$note['resourceid'] = $resource_id;
		$note['privacy'] = $_REQUEST['privacy'];
		$note['title'] = $_REQUEST['note_title'];
		$note['content'] =  $_REQUEST['note'];
		$note['setuper'] = $_SESSION['username'];
		$note['setuptime'] = date('Y-m-d H:i:s',time());
	
		insert_commentary($comment);
		insert_note($note);
	
		$url = "index.php?rt=index/resource&rid=" . $resource_id;
		header("location: $url");
	}
	
}

?>

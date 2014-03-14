<?php

Class indexController Extends baseController {
	


public function index() {
		session_destroy();

	
		$this->registry->template->r_jsfile = './front_end/js/register_check.js';
		$this->registry->template->l_jsfile = './front_end/js/login_check.js';
		$this->registry->template->cssfile = './front_end/css/index.css';
    	$this->registry->template->show('loading');
}

public function register() {
		#$this->registry->template->cssfile = './front_end/css/index_front.css';
		$this->registry->template->jsfile = './front_end/js/register_check.js';	
        $this->registry->template->show('register');
}

public function login() {
		#$this->registry->template->cssfile = './front_end/css/index_front.css';
		$this->registry->template->jsfile = './front_end/js/login_check.js';
       // $this->registry->template->show('login');
}

public function registry_ajax()
{
		if ($frm_action = 'check') {
			$useremail = $_GET['useremail'];
			$check = false;
			$check = $this->registry->db->has_user_email($useremail);
			if ($check == "") {
				echo "0";
			}
			else{
				echo "1";
			}
			die();
		}

}

public function registry_manager()
{
		// $email = $_POST['useremail'];
		// echo $email;
		$_SESSION['email'] =  $_REQUEST['email'];
		$newUser = array();
		date_default_timezone_set('PRC');

		$newUser['email'] = $_REQUEST['email'];
		$newUser['password'] = $_REQUEST['password'];
		$id = $this->registry->db->new_user($newUser);
        $this->registry->template->show('loading');
		
        //header("refresh:2;url=index.php?rt=sysu_index/index");

}

public function login_ajax()
{
		if ($frm_action = 'check') {
			$useremail = $_GET['useremail'];
			$userpw = $_GET['userpw'];
			$check = 0;
			$check = $this->registry->db->check_email_password($useremail,$userpw);
			echo $check;
			
			die();
		}

}



public function login_manager()
{
		$_SESSION['email'] =  $_REQUEST['email'];
        $this->registry->template->show('loading');
		
        header("refresh:2;url=index.php?rt=sysu_index/index");

}
}

?>

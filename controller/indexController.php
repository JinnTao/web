<?php

Class indexController Extends baseController {

public function index() {
	/*** set a template variable ***/
        $this->registry->template->welcome = 'Welcome to PHPRO MVC';
	/*** load the index template ***/
	$test_user = array(
		"email" => "123456@qq.com",
		"password" => "123456"
	);
	//$this->registry->template->result = $this->registry->db->insert_new_user($test_user);
	$email = "123@qq.com";
	$this->registry->template->result = $this->registry->db->has_user_email($email);
	
    $this->registry->template->show('index');
}

public function register() {
		#$this->registry->template->cssfile = './front_end/css/index_front.css';
		$this->registry->template->jsfile = './front_end/js/register_check.js';	
        $this->registry->template->show('register');
}

public function login() {
		#$this->registry->template->cssfile = './front_end/css/index_front.css';
		$this->registry->template->jsfile = './front_end/js/login_check.js';
        $this->registry->template->show('login');
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
		
		$newUser = array();
		date_default_timezone_set('PRC');

		$newUser['email'] = $_REQUEST['email'];
		$newUser['password'] = $_REQUEST['password'];
<<<<<<< HEAD
		$id = $this->registry->db->insert_new_user($newUser);
=======
		$id = $this->registry->db->new_user($newUser);
>>>>>>> aaa/master
        $this->registry->template->show('register_sucess');
        header("refresh:5;url=index.php?rt=index/login");
		// header("location: index.php?rt=index/login");

}

public function login_manager()
{
<<<<<<< HEAD
		// if ($frm_action = 'check') {
		// 	$useremail = $_GET['useremail'];
		// 	$userpw = $_GET['userpw'];
		// 	$check = false;
		// 	$check = $this->registry->db->has_user_email($useremail);
		// 	if ($check == false) {
		// 		echo "0";
		// 	}
		// 	else{
		// 		echo "1";
		// 	}
		// 	die();
		// }
=======
		if ($frm_action = 'check') {
			$useremail = $_GET['useremail'];
			$userpw = $_GET['userpw'];
			$check = 0;
			$check = $this->registry->db->check_email_password($useremail,$userpw);
			// if ($check == 2) {
			// 	header("location: index.php?rt=index");
			// }
			// else{
				echo $check;
			// /
			die();
		}
>>>>>>> aaa/master

}
}

?>

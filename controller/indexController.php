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
	$email = "123456@qq.com";
	$this->registry->template->result = $this->registry->db->has_user_email($email);
	
    $this->registry->template->show('index');
}

}

?>

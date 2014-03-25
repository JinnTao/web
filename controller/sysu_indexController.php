<?php

Class sysu_indexController Extends baseController {
	public function index() {
		$jsfile = array();
		$cssfile = array();

		$cssfile[] = './front_end/css/sysu_index.css';

		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		$email = 'test@163.com';
		$user = array();
		$user['email'] = 'test2@163.com';
		$user['password'] = '123456';
		$user['name'] = '123';
		$user['gender'] = 'F';
		$user['age'] = '23';
		$user['description']= 'Hello world!';
		$id1 = '2';
		$id2 = '55';
		$friend_list = $this->registry->db->del_friend_by_user_id($id1,$id2);
		print_r($friend_list);
		//$this->registry->template->user_id = $this->registry->db->make_friends($id1,$id2);
		$id1 = '2';
		$id2 = '5';
		//$this->registry->template->user_id = $this->registry->db->make_friends($id1,$id2);
		$id1 = '3';
		$id2 = '6';
		//$this->registry->template->user_id = $this->registry->db->make_friends($id1,$id2);
		$id1 = '3';
		$id2 = '1';
		//$this->registry->template->user_id = $this->registry->db->make_friends($id1,$id2);
		$id1 = '3';
		$id2 = '4';
		//$this->registry->template->user_id = $this->registry->db->make_friends($id1,$id2);
		$id1 = '2';
		$id2 = '3';
		//$this->registry->template->user_id = $this->registry->db->make_friends($id1,$id2);
		$id1 = '2';
		$id2 = '5';
		//$this->registry->template->user_id = $this->registry->db->make_friends($id1,$id2);
		//$this->registry->template->user_id = $this->registry->db->new_user($user);
		//$this->registry->template->user_id = $this->registry->db->update_user_base_information($user);
		
		
		//$this->registry->template->sysu_show('sysu_index');
	}

	public function info(){
		$jsfile = array();
		$cssfile = array();

		// $cssfile[] = './front_end/css/sysu_index.css';

		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		
		
		$this->registry->template->sysu_show('sysu_info');
	}

	public function topic(){
		$jsfile = array();
		$cssfile = array();
 
		$jsfile[] = './front_end/js/sysu_topic.js';
		$cssfile[] = './front_end/css/sysu_topic.css';
		
		
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		// return all topics!!!
		$this->registry->template->topic_array = $this->registry->db->get_topics();
		
		$this->registry->template->sysu_show('sysu_topic');
		
	}
	public function topic_manager(){
		$new_topic = array();

		$new_topic['title'] =  $_REQUEST['topic_title'];
		$new_topic['content'] = $_REQUEST['topic_content'];
		$new_topic['start_id'] = '1';
		
		$result = $this->registry->db->new_topic($new_topic);
		if($result){	
			header("location:index.php?rt=sysu_index/topic");
		}
		else
		{
			echo 'Error!!';
		}
	}
	public function topic_update(){
		$jsfile = array();
		$cssfile = array();
 
		$jsfile[] = './front_end/js/sysu_topic.js';
		$cssfile[] = './front_end/css/sysu_topic.css';
		
		
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		
		$this->registry->template->topic = $this->registry->db->get_topic_by_id($_REQUEST['topic_id']);

		$this->registry->template->sysu_show('topic_update');
	}
	public function topic_update_manage(){
		$current_topic = array();
		$current_topic['id'] = $_REQUEST['topic_id'];
		$current_topic['title'] = $_REQUEST['topic_title'];
		$current_topic['content']= $_REQUEST['topic_content'];
		$result = $this->registry->db->update_topic($current_topic);
		header("location:index.php?rt=sysu_index/topic_view&topic_id=".$current_topic['id']);
	
	}
	
	public function topic_view(){
		$jsfile = array();
		$cssfile = array();
		
		$cssfile[] = './front_end/css/sysu_topic_view.css';
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		
		$this->registry->template->topic = $this->registry->db->get_topic_by_id($_REQUEST['topic_id']);

    	$this->registry->template->sysu_show('topic_view');
	}
	public function topic_del(){
		$current_topic['id'] = $_REQUEST['topic_id'];
		
		$this->registry->db->del_topic_by_id($_REQUEST['topic_id']);
		
		header("location:index.php?rt=sysu_index/topic");
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

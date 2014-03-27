<?php

Class sysu_topicController Extends baseController {
	public function index() {
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
	public function manager(){
		$new_topic = array();

		$new_topic['title'] =  $_REQUEST['topic_title'];
		$new_topic['content'] = $_REQUEST['topic_content'];
		$new_topic['start_id'] = '1';
		
		$result = $this->registry->db->new_topic($new_topic);
		if($result){	
			header("location:index.php?rt=sysu_topic/index");
		}
		else
		{
			echo 'Error!!';
		}
	}
	public function update(){
		$jsfile = array();
		$cssfile = array();
 
		$jsfile[] = './front_end/js/sysu_topic.js';
		$cssfile[] = './front_end/css/sysu_topic.css';
		
		
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		
		$this->registry->template->topic = $this->registry->db->get_topic_by_id($_REQUEST['topic_id']);

		$this->registry->template->sysu_show('topic_update');
	}
	public function update_manage(){
		$current_topic = array();
		$current_topic['id'] = $_REQUEST['topic_id'];
		$current_topic['title'] = $_REQUEST['topic_title'];
		$current_topic['content']= $_REQUEST['topic_content'];
		$result = $this->registry->db->update_topic($current_topic);
		header("location:index.php?rt=sysu_topic/view&topic_id=".$current_topic['id']);
	
	}

	public function view(){
		$jsfile = array();
		$cssfile = array();
		
		$cssfile[] = './front_end/css/sysu_topic_view.css';
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		
		$this->registry->template->topic = $this->registry->db->get_topic_by_id($_REQUEST['topic_id']);

    	$this->registry->template->sysu_show('topic_view');
	}
	public function del(){
		$current_topic['id'] = $_REQUEST['topic_id'];
		
		$this->registry->db->del_topic_by_id($_REQUEST['topic_id']);
		
		header("location:index.php?rt=sysu_topic/index");
	}
	public function count_like_ajax(){
		$topic_id = $_REQUEST['topic_id'];
		$like_list = $this->registry->db->get_like_list_by_topic_id($topic_id);
		$like_numbers = count($like_list);
		echo $like_numbers ;
		
	}
	public function add_like(){
		if(isset($_COOKIE['user_id'])){
			$topic_id = $_REQUEST['topic_id'];
			$user_id = $_COOKIE['user_id'];
			$this->registry->db->topic_add_like_by_user($topic_id,$user_id);
			$like_list = $this->registry->db->get_like_list_by_topic_id($topic_id);
			$like_numbers = count($like_list);
			echo $like_numbers ;
			
		}
		else{
		}
		
	}
	

}
?>

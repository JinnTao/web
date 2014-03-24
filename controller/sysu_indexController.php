<?php

Class sysu_indexController Extends baseController {
	public function index() {
		$jsfile = array();
		$cssfile = array();

		$cssfile[] = './front_end/css/sysu_index.css';

		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
		
		
		$this->registry->template->sysu_show('sysu_index');
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
		
		$this->registry->template->topic = $this->registry->db->get_topicById($_REQUEST['topic_id']);

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
		
		$this->registry->template->topic = $this->registry->db->get_topicById($_REQUEST['topic_id']);

    	$this->registry->template->sysu_show('topic_view');
	}
	public function topic_del(){
		$current_topic['id'] = $_REQUEST['topic_id'];
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

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

public function topic(){
		$jsfile = array();
		$cssfile = array();
	

		$jsfile[] = './front_end/js/sysu_topic.js';
		$cssfile[] = './front_end/css/sysu_topic.css';
		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
    	$this->registry->template->sysu_show('sysu_topic');
}
public function topic_view(){
		$jsfile = array();
		$cssfile = array();
	

		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
    	$this->registry->template->sysu_show('topic_view');
}
public function topic_edit(){
		$jsfile = array();
		$cssfile = array();
	


		
		$this->registry->template->jsfile = $jsfile;
		$this->registry->template->cssfile = $cssfile;
    	$this->registry->template->sysu_show('topic_edit');
}

}
?>

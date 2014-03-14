<?php

Class sysu_indexController Extends baseController {
	


public function index() {
		$this->registry->template->cssfile = './front_end/css/sysu_index.css';
		$this->registry->template->sysu_show('sysu_index');
}

}
?>

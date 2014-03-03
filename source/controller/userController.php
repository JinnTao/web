<?php

class userController extends baseController
{
	private $temp_array;

	public function index()
    {
        if (isset($_SESSION['username']) && $_SESSION['username'] != "")
		    $name = $_SESSION["username"];
        else {
            $url = "index.php?rt=index";
            header("location: $url");
            die();
        }
		$details = get_user_by_name($name);
		$notice = "Not fill in yet >_<";

		$this->registry->template->cssfile = './front_end/css/user_index.css';
		$this->registry->template->name = $name;
		$this->registry->template->gender = $details['gender'];
		$this->registry->template->realname = empty($details['realname']) ? $notice : $details['realname'];
		$this->registry->template->email = empty($details['email']) ? $notice : $details['email'];
		$this->registry->template->setuptime = $details['setuptime'];
		$this->registry->template->description = empty($details['description']) ? $notice : $details['description'];

		$my_friends = array();
		$friends = get_friends_by_user_name($name);
		for($i = 0;$i < count($friends); $i++){
			$id = $friends[$i];
			$person = get_user_by_id($id);
			$my_friends[] = $person['uname'];
		}
		$temp_array = $my_friends;

		$my_groups = array();
		$groups = get_all_groups_by_name($name);
		for($i = 0;$i < count($groups); $i++){
			$id = $groups[$i];
			$group = get_group_info_by_id($id);
			$my_groups[] = $group['gname'];
		}

		$my_resources = array();
		$my_resources = get_resources_by_setuper($name);

		$this->registry->template->my_friends = $my_friends;
		$this->registry->template->my_groups = $my_groups;
		$this->registry->template->my_resources = $my_resources;

		$this->registry->template->show('user_index');
	}

	public function profile_manager(){
		$name = $_REQUEST["uname"];
		$details = get_user_by_name($name);
		$notice ="Not fill in yet >_<";

		$this->registry->template->cssfile = './front_end/css/user_index.css';
		$this->registry->template->uname = $name;
		$this->registry->template->gender = $details['gender'];
		$this->registry->template->realname = empty($details['realname']) ? $notice : $details['realname'];
		$this->registry->template->email =empty($details['email']) ? $notice : $details['email'];
		$this->registry->template->setuptime = $details['setuptime'];
		$this->registry->template->description1 = empty($details['description']) ? $notice : $details['description'];

		$this->registry->template->show('user_public_profile');
	}

	public function my_notes_manager(){
		$my_notes = array();
		$my_notes = get_notes_by_username($_SESSION['username']);
		$this->registry->template->my_notes = $my_notes;
		$this->registry->template->n = count($my_notes);
		$this->registry->template->show('user_note');
	}

	public function friend_notes_manager(){
		$friend_names = $temp_array;

		$friend_notes = array();
		for ($i = 0; $i < count($friend_names); $i++) { 
			$friend_name = $friend_names[$i];
			$friend_notes[] = get_friends_public_notes_by_username($friend_name);
		}
		$this->registry->template->friend_names = $friend_names;
		$this->registry->template->friend_notes = $friend_notes;
		$this->registry->template->n = count($friend_names);

		$this->registry->template->show('user_friend_note');
	}

	public function update(){
		$this->registry->template->cssfile = './front_end/css/user_profile.css';
		$this->registry->template->show('user_update_profile');
	}

	public function update_profile_manager()
	{
		$uname = $_SESSION['username'];
		$old_details = get_user_by_name($uname);

		$newinfo = array();
		$newinfo['gender'] = empty($_REQUEST['gender']) ? $old_details['gender']: $_REQUEST['gender'];
		$newinfo['urealname'] = empty($_REQUEST['realname']) ? $old_details['urealname'] : $_REQUEST['realname'];
		$newinfo['email'] = empty($_REQUEST['email']) ? $old_details['email'] : $_REQUEST['email'];
		$newinfo['description'] = empty($_REQUEST['description']) ? $old_details['description'] : $_REQUEST['description'];
 
		update_user_info_by_name($uname, $newinfo);

		$url = "index.php?rt=user";
		header("location: $url");
	}

	public function news()
	{
		$username = $_SESSION['username'];
		$messages = array();
		$messages = get_messages_by_username($username);

		$this->registry->template->cssfile = './front_end/css/user_profile.css';
		$this->registry->template->jsfile = './front_end/js/user_news.js';
		$this->registry->template->messages = $messages;
		$this->registry->template->show('user_news');
    }

    public function news_manager(){
    	$action = $_GET['action'];
    	if ($action == 1){
    		$stranger = $_GET['stranger'];
    		$me = $_SESSION['username'];
    		insert_friend($stranger,$me);
    	}
    	else if($action == 2){
    		$group_id = $_GET['group'];
    		add_group_member($group_id, $_SESSION['username']);
    	}
    	else if($action == 3){
    		$new_member = $_GET['user'];
    		$group_id = $_GET['group'];
    		add_group_member($group_id, $new_member);
    	}
    	else if($action == 4){
    		$para['sender'] = $_SESSION['username'];
    		$para['receiver'] = $_GET['stranger'];
    		insert_reject_friends_message($para);
    	}
    	else if($action == 5){
    		$para['receiver'] = $_GET['user'];
    		$para['sender'] = $_GET['group'];
    		insert_reject_into_group_message($para);
    	}
    	$mid = $_GET['mid'];
    	delete_message($mid);
    }
    
    public function manage_insert_resource(){
        $this->registry->template->show('post_resource');       
    }

    public function insert_resource(){
        $username = $_SESSION['username'];
        $dateformat = date('Y-m-d H:i:s', time());     
        #echo $dateformat;
        #$username= 'aaa';
        $para = array();
        $para['rtitle'] = $_POST['title'];
        $para['rgeneral'] = $_POST['genernal'];
        $para['setupername'] = $username;
        $para['setupdate'] = $dateformat;

        $id = insert_resource($para);

        $url = "index.php?rt=index/resource&rid=" . $id;
        header("location: $url");
    }

}

?>

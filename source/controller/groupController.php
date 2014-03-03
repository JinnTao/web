<?php

Class groupController Extends baseController {

    public function index() {
        $my_group_ids = get_all_groups_by_name($_SESSION["username"]); 
        $my_groups_new_notes = array();
        for ($i=0; $i<count($my_group_ids); $i++) {
            $a_group_info = get_group_info_by_id($my_group_ids[$i]);
            $a_group_name = $a_group_info[1];
            $a_group_new_notes = get_group_public_notes_by_gid($my_group_ids[$i]);

            $my_groups_new_notes[$a_group_name] = $a_group_new_notes;
        }

        $this->registry->template->new_notes= $my_groups_new_notes;

        $this->registry->template->own_groups = get_creating_groups_by_name($_SESSION["username"]); 
        $this->registry->template->of_groups = get_participating_groups_by_name($_SESSION["username"]);
        $this->registry->template->jsfile = '../front_end/js/accordion.js';
        $this->registry->template->cssfile2 = '../front_end/css/group_index.css';
        $this->registry->template->cssfile = '../front_end/css/ui-lightness/jquery-ui-1.9.2.custom.min.css';
        $this->registry->template->show('group_index');
    }

    public function create() {
        $this->registry->template->own_groups = get_creating_groups_by_name($_SESSION["username"]); 
        $this->registry->template->of_groups = get_participating_groups_by_name($_SESSION["username"]);
        $this->registry->template->jsfile = '../front_end/js/group_add.js';
        $this->registry->template->cssfile = '../front_end/css/group_index.css';
        $this->registry->template->show('group_create');
    }

    public function details() {
        $group_info = get_group_info_by_id($_REQUEST["gid"]);
        $this->registry->template->group_detail = $group_info;
        $group_admin = get_user_by_id($group_info[2]);
        $this->registry->template->group_admin_name = $group_admin[1]; 
        
        
        $this->registry->template->own_groups = get_creating_groups_by_name($_SESSION["username"]); 
        $this->registry->template->of_groups = get_participating_groups_by_name($_SESSION["username"]);

        $this->registry->template->cssfile = '../front_end/css/group_details.css';
        $this->registry->template->jsfile = '../front_end/js/group_join.js';
        $this->registry->template->show('group_details');
    }

    public function spot() {
        $this->registry->template->own_groups = get_creating_groups_by_name($_SESSION["username"]); 
        $this->registry->template->of_groups = get_participating_groups_by_name($_SESSION["username"]);

        $all_groups = get_existing_groups();
        $all_groups_size = array();
        foreach ($all_groups as $group) {
            $all_groups_size[$group[0]] = count(get_group_members_by_name($group[1])); 
        }
        $this->registry->template->all_groups = $all_groups;
        $this->registry->template->all_groups_size = $all_groups_size;

        $this->registry->template->cssfile = '../front_end/css/group_spot.css';
        $this->registry->template->show('group_spot');
    }

    public function admin() {
        $this->registry->template->own_groups = get_creating_groups_by_name($_SESSION["username"]); 
        $this->registry->template->of_groups = get_participating_groups_by_name($_SESSION["username"]);
        
        $this->registry->template->cssfile = '../front_end/css/group_admin.css';
        $this->registry->template->show('group_admin');

    }

    public function new_resources() {
        $my_group_ids = get_all_groups_by_name($_SESSION["username"]); 
        $my_groups_new_resource = array();
        for ($i=0; $i<count($my_group_ids); $i++) {
            $a_group_info[] = get_group_info_by_id($my_group_ids[$i]);
            $a_group_name = $a_group_info[1];
            $a_group_new_resource = array();
            $members_of_a_group[] = get_group_members_by_id($my_group_ids[$i]);
            for ($j=0; $j<count($members_of_a_group); $j++) {

            }

            $my_groups_new_resource[$a_group_name] = $a_group_new_resource;
        }

        $this->registry->template->my_groups_new_resource = $my_groups_new_resource;
    }

    public function find() {
        $this->registry->template->own_groups = get_creating_groups_by_name($_SESSION["username"]); 
        $this->registry->template->of_groups = get_participating_groups_by_name($_SESSION["username"]);

        $this->registry->template->cssfile = '../front_end/css/group_index.css';
        $this->registry->template->show('group_find');
    }

    public function manage_add() {
        $group_name = $_POST["group_name"];
        $group_desc = $_POST["group_desc"];

        $members = array();
        $para["groupadmin"] = $_SESSION["username"];
        $para["groupname"] = $group_name;
        $para["groupdate"] = date('Y-m-d H:i:s',time());
        $para["groupdesc"] = $group_desc;
        
        $group_name_exist = has_group_name($group_name);
        if ($group_name_exist) {
            echo "Group Name already used! Please choose another one.";
            return;
        }
        else if (create_group($para, $members)) {
            echo $group_name . "created successful!";
            return;
        }
        else echo $para["groupadmin"]."Failed. Try again later.";
    }

    public function manage_join1() {
        $name = $_POST["group_name"];
        $name = $name . '';
        $info = get_group_info_by_name($name);
        echo $info;




        $groupname = $_POST["group_name"];
        $groupinfo = get_group_info_by_name($groupname);
        echo $groupname;
        return;
        $para = array();
        $para["sender"] = $_SESSION["username"];
        $para["receiver"] = $info["gadmin"];
        if (insert_applying_group_message($para)) {
            echo "Request made! Wait for the coming reply~~";
        }
        else {
            echo "Request failed! Tried again later~~!";
        }
    }

    public function manage_join() {
        $name = $_POST["group_name"];
        $info = get_group_info_by_name($name);
        echo $info;
    }


}
?>

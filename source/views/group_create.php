<div>
    <h1>Create a Group:</h1>
</div>

<div id="right-column">
    <?php include __SITE_PATH . "/views/group_right_column.php"; ?> 
</div>


<div>
    <form action="index.php?rt=group/manage_add" method="post">
        <div style="color:red" id="msg"></div>
        GroupName: <input id="group_name" type="text" name="groupname" /> <br />
        GroupIcon: <input id="group_icon" type="file" name="groupicon" />

        <br />
        Brief introduction of your group. <br />
        <!--<textarea id="group_desc" cols="25" rows="2"></textarea> <br />-->
        <input type="text" id="group_desc" /> <br />
<!--
        Choose your friends to be a member of this group:
        <label><input type="checkbox" value="Tom"> Tom</label>
        <label><input type="checkbox" value="Kate"> Kate</label>
        <label><input type="checkbox" value="John"> John</label>
        <br />
-->
        <input id="create" type="button" value="create" name="create" />
        <label id="inform"></label>
    </form>
</div>

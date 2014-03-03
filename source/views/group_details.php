<div id="group-headline">
    <h1> My Groups! </h1>
    <img src="../front_end/image/group_icon/1.jpg" />
    <h2 id="group_name"> <?= $group_detail[1] ?> </h2>
    <?php if ($group_admin_name == $_SESSION["username"]) {  ?>
    <span> I am the administrator. </span>
    <span> Manage the group here<a href="index.php?rt=group/admin"> --> </a> </span>
    <?php }  else { ?>
   <span><form action="index.php?rt=group/manage_join" method="post"> <input type="button" id="join_this_group" value="Join this group!"/></span> 
    <?php } ?>


</div>
<div id="group-content">
    <div class="right-column">
    <?php include __SITE_PATH . "/views/group_right_column.php"; ?> 
    </div>

    <div class="left-column">
        <div class="group-info">
            <div>
                <p>
                Created in <?= $group_detail[3] ?> &nbsp; &nbsp; Administator：
                <a href="<? "index.php?rt=user&uid=". $group_detail[2] ?>"> <?= $group_admin_name ?></a>
                </p>
                <p>
                Brief Intro:
                <?= $group_detail[4] ?>
                </p>
            </div>
            <div>
                <span>&nbsp;</span>
                <?php if ($group_admin_name == $_SESSION["username"]) {  ?>
                <input type="button" value="edit" style="float:right"/>
                <?php }  ?>
            </div>
        </div>

        <div class="group-topic-bar">
            <span><em>Recent Topics</em></span>
            <span class="to-right"><button id="make_a_topic">Make a Topic!</button></span>
        </div>
        <div class="group-topic-list">
            <table>
                <tr>
                    <td class="td_title"><a href="">How nice is today! But I met with a strange person! </a> </td>
                    <td class="td_count">20 replies</td>
                    <td class="td_author"><a href=""> Gogle </a></td>
                </tr>
                <tr>
                <tr>
                    <td>How nice is today!</td>
                    <td>1 replied</td>
                    <td>Gogle</td>
                </tr>
                    <td>How nice is today!</td>
                    <td>20 replied</td>
                    <td>Gogle</td>
                </tr>
            </table>
        </div>
    </div>
</div>

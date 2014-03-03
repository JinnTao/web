<?php
$of_groups = array();
?>
    <div>
        <p>
            <a href="index.php?rt=group/spot"> >> Spot more groups:</a>
        </p>
    </div>

    <div>
        <a href="index.php?rt=group/mygroup"> >> Groups I manage</a>
        <?php if (count($own_groups) > 0) { ?>
        <ul>
            <?php for($i=0; $i<count($own_groups); $i++) { ?>
            <li><a href="<?= "index.php?rt=group/details&gid=" . $own_groups[$i][0] ?>"> <?= $own_groups[$i][1] ?> </a></li>
            <?php } ?>
        </ul>
        <?php } else { ?>
            <p>You have not create any groups yet!.</p>
        <?php } ?>
    </div>

    <div>
        <p><a href="index.php?rt=group/belong"> >> Groups I participate in</a></p>
        <?php if (count($of_groups) > 0) { ?>
        <ul>
            <?php for($i=0; $i<count($of_groups); $i++) { ?>
            <li><a href="<?= "index.php?rt=group/details&gid=" . $of_groups[$i][0] ?>"> <?= $of_groups[$i][1] ?> </a></li>
           <?php } ?>
        </ul>
        <?php } else { ?>
            <!--<p id="no_group">You have not participated in any groups yet!.</p>-->
        <?php } ?>
    </div>

    <div>
        <p><a href="index.php?rt=group/create"> >> Create a new group</a></p>
    </div>

    <div>
        <p><a href="index.php?rt=group/find"> >> Search groups:</a></p>
        <form action="index.php?rt=group/find">
            <input type="text" text="search groups..." name="groupname" />
            <input type="submit" value="search"/>
        </form>
    </div>

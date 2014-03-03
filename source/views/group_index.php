<div>
<h1>Groups<span> Notes </span></h1>
</div>


<div id="right-column">
    <?php include __SITE_PATH . "/views/group_right_column.php"; ?> 
</div>


<div id="left-column">
<!--
    <div class="nav">
        <ul>
            <li><a href="" >NEWEST NOTES</a></li>
            <li><a href="" >NEWEST RESOURCES</a></li>
            <li><a href="" >NEWEST COMMENTS</a></li>
        </ul>
    </div>
-->



    <div id="content">
        <?php if (count($own_groups)==0 && count($of_groups)==0) { ?>
        <h3>You have no groups yet!!</h3>        
        <span>Go ahead to <a href="index.php?rt=group/spot"> <em>spot</em></a> groups to join or <a href="index.php?rt=group/create"><em> create</em> </a> one of your own!!.</span>
        <?php } else { ?>
        <script>
            $(function() {
                $( "#accordion" ).accordion();
            });
        </script>
        <div id="accordion">
            <?php foreach($new_notes as $key=>$value) { ?>
            <h3>group <?= $key ?></h3>
            <div>
                <?php if (count($value) == 0) { ?>
                <p>This Group's members haven't created any notes yet!</p>
                <?php }  foreach ($value as $note) { ?>
                <div class="note">
                    <img src="../front_end/image/0002.jpg" />
                    <h3><?= $note["ntitle"] ?></h3>
                    <p><?php $note["content"] ?></p>
                </div>
                <?php } ?>  <!-- end for (value - note)  -->
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>

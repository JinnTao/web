<div id="group-headline">
    <h1> Manage your Groups! </h1>
</div>

<div id="group-content">
    <div class="right-column">
    <?php include __SITE_PATH . "/views/group_right_column.php"; ?> 
    </div>

    <div class="left-column">
        <div class="members">
            <h4> Remove some members: </h4>
            <div>
                <ul>
                    <li><label><input type="checkbox" name="member" value="Tom" />Tom</label></li>
                </ul>
            </div>
            <span class="inform1"></span>
        <div>

        <div class="invite">
            <h4> Invite your friends! </h4>
            Enter your friends name here: <input type="text" name="friend_name" />
            <button id="invite_friends">OK</button>
            <span class="inform2"></span>
        </div>

        <div class="dismiss">
            <h4> Dismiss (Caution! Unrecoverale!!)</h4>
            <button id="dismiss_group">dismiss</button>
            <span class="inform3"></span>
        </div>

        <div class="delete_topics">
            
        </div>
    </div>
</div>

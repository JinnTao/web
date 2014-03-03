<!DOCTYPE HTML> <html>
    <head>
        <title><?php echo "MyNote" ?></title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="../front_end/css/masterpage.css" type="text/css" rel="stylesheet" />
        <link href="<?php echo $cssfile ?>" type="text/css" rel="stylesheet" />
        <link href="<?php echo $cssfile2 ?>" type="text/css" rel="stylesheet" />

        <script src="../front_end/js/jquery.js" type="text/javascript"></script>
        <script src="../front_end/js/jquery-1.8.3.js"></script>
        <script src="../front_end/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="<?php echo $jsfile ?>" type="text/javascript"></script>
    </head>
    <body>
<!--
        <img id="bg" src="../front_end/image/background.jpg" />
-->
        <div id="header">
            <div id="header_wrapper">
<?php
# session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $status_bar["available_action"] = "Log out";
    # $status_bar["new_msgs"] = "10";                 //need api
    $msgs = get_messages_by_username($username);
    $status_bar["new_msgs"] = count($msgs); 
    $status_bar["user"] = $username;
    $status_bar['user_id'] = "1";                   //need api

    if ($status_bar["user"] == "admin") {
        $status_bar["user"] = "kqlxy";
    }
}
else {
    $status_bar["available_action"] = "Log in";
}
?>
                <div id="header_rightdiv">
                    <span><a href="index.php?rt=index/login_logout_manager"> <?php echo $status_bar["available_action"] ?> </a> </span>
                    <?php if (count($status_bar) > 1) { ?>
                    <span>Msg<a href="index.php?rt=user/news"> <em> <?= $status_bar["new_msgs"] ?> </em> </a> </span>
                    <span>Hello,<a href="index.php?rt=user/index"><em> <?= $status_bar["user"] ?> </em></a></span>
                    <?php } ?>
                </div>
                <div id="header_leftdiv">
                    <ul>
                        <li><a href="index.php?">Home </a></li>
                        <li><a href="index.php?rt=user"> You </a></li>
                        <li><a href="index.php?rt=friend"> Friend </a></li>
                        <li><a href="index.php?rt=group"> Group </a></li>
                        <li><a href="index.php?rt=about"> About </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main">
            <?php include ($path) ?>
        </div>
        <div id="footer">
            <br />
            <br />
            <hr />
            
            <div>
                2012 &copy; All rights reserved.          
            </div>
        </div>
    </body>
</html>

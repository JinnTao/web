<!DOCTYPE HTML> <html>
    <head>
        <title><?php echo "MySYSU" ?></title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="./front_end/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen"/> 
        <!--<link href="<?php echo $cssfile ?>" type="text/css" rel="stylesheet" />

        <link href="../front_end/css/bootstrap.css" type="text/css" rel="stylesheet" />
        <link href="../front_end/css/jquery-ui-1.9.2.custom.css" type="text/css" rel="stylesheet" />       
        <link href="../front_end/css/docs.css" type="text/css" rel="stylesheet" />
        <link href="< ?php echo $cssfile2 ?>" type="text/css" rel="stylesheet" />-->
        
        <!--<script src="../front_end/js/bootstrap.js"></script>-->
        <script src="./front_end/js/jquery.js"></script>
    </head>
    <body>
<!--
        <img id="bg" src="../front_end/image/background.jpg" />
-->
        <div id="main">
            <?php include ($path) ?>
        </div>

        <div id="footer">
            <br />
            <br />
            <hr />
            
            <div>
                2014 &copy; All rights reserved.          
            </div>
        </div>
		<!--<script src="http://code.jquery.com/jquery.js"></script>-->
        <script src="./front_end/js/bootstrap.min.js"></script>
        <script src="<?php echo $jsfile ?>" type="text/javascript"></script>

    </body>
</html>

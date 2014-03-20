<!DOCTYPE HTML> <html>
    <head>
        <title><?php echo "MySYSU" ?></title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="./front_end/css/bootstrap.min.css" type="text/css" rel="stylesheet" 

media="screen"/> 
        <link href="./front_end/css/bootstrap-responsive.min.css" type="text/css" 

rel="stylesheet" media="screen"/>
        <link href="./front_end/css/font-awesome.min.css" type="text/css" rel="stylesheet" 

media="screen"/>
        <?php
		if	(isset($cssfile)){
			foreach($cssfile as  $value){
				echo '<link href="'.$value.'" type="text/css" rel="stylesheet" 

media="screen"/> ';
			}
		}
		?>
    </head>
    <body>
  
            <?php 
				include $path;
		    ?>

            
    	<script src="./front_end/js/jquery.js"></script>
    	<script src="./front_end/js/bootstrap.min.js"></script>
        <script src="./front_end/js/sco.modal.js"></script>
  		<?php
		if	(isset($jsfile)){
			foreach($jsfile as $value){
				echo '<script src="'.$value.'"></script>';
			}
		}
				
		?>
    </body>
</html>

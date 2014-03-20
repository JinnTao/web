<!DOCTYPE HTML> <html>
    <head>
        <title><?php echo "MySYSU" ?></title>

		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link href="./front_end/css/bootstrap.min.css" type="text/css" rel="stylesheet" media="screen"/> 
        <link href="./front_end/css/bootstrap-responsive.min.css" type="text/css" rel="stylesheet" media="screen"/>
        <link href="./front_end/css/font-awesome.min.css" type="text/css" rel="stylesheet" media="screen"/>
		 <link href="./front_end/css/sysu_master.css" type="text/css" rel="stylesheet" media="screen"/>
         <?php
		if	(isset($cssfile)){
			foreach($cssfile as $value){
				echo '<link href="'.$value.'" type="text/css" rel="stylesheet" 

media="screen"/> ';

			}
		}
				
		?>

    </head>
    <body>
<div class=" navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SYSU Campus</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">个人主页</a></li>
              <li ><a href="index.php?rt=sysu_index/topic">话题</a></li>
              <li><a href="#contact">时间轴</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <div class="nav navbar-text pull-right">
            	<a  href="#"><i class="icon-user icon-balck"></i>JinnTao</a>
  				<a  class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret"></b></a>
  				<ul class="dropdown-menu">
    				<li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
    				<li><a href="#"><i class="icon-trash"></i> Delete</a></li>
    				<li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
    				<li class="divider"></li>
    				<li><a href="#"><i class="i"></i> Make admin</a></li>
  				</ul>
       			
           		 <a href="#" >Sign out</a>
            </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <br/>
        <br/> <br/>
    
  <div class="container_master">
      <?php include $path ?>
      
      </div>
      
      
      
<br/>
<br/>
<br/>
<br/>

<div class="container">
   <footer>
            
        2014 &copy; All rights reserved.          

   </footer> 
</div> 


<script src="./front_end/js/jquery.js"></script>
<script src="./front_end/js/bootstrap.min.js"></script>
<script src="./front_end/js/sco.modal.js"></script>
<script src="./front_end/js/jquery.hotkeys.js"></script>
<script src="./front_end/js/bootstrap-wysiwyg.js"></script>
  <?php
		if	(isset($jsfile)){
			foreach($jsfile as $value){
				echo '<script src="'.$value.'"></script>';
			}
		}		
		?>

<script>
 
</script>

    </body>
</html>




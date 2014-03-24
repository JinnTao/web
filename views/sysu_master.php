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
<!-- Fixed navbar -->
 
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">MySYSU</a>
        
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li><a href="index.php?rt=sysu_index">主页</a></li>
            <li><a href="index.php?rt=sysu_index/topic">话题</a></li>
            <li><a href="index.php?rt=sysu_index/friend">好友</a></li>
            <li><a href="index.php?rt=sysu_index/explore">发现</a></li>
            <li class="dropdown">
              <a href="#messages" class="dropdown-toggle" data-toggle="dropdown">消息 <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">提到我的</a></li>
                <li><a href="#">加我好友</a></li>
                <li><a href="#">给我点赞</a></li>

               
              </ul>
            </li>

          </ul>

          <form class="navbar-form pull-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="搜索话题、人">
            
            <button type="submit" class="btn btn-default">搜索</button>
            </div>
            
          </form>
                              
          <ul class="nav pull-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-balck"></i><?php echo $_SESSION['email']?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#"><i class="icon-pencil"></i>编辑</a></li>
          <li><a href="#"><i class="icon-trash"></i> 删除</a></li>
          <li><a href="#"><i class="icon-ban-circle"></i> 禁止</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="i"></i> 管理员权限</a></li>
        </ul>
      </li>
      <li><a href="index.php" >Sign out</a></li>
      
    </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    </div>
<br/><br/><br/>
    
  <div class="container_master">
      <?php include $path ?>
      
  </div>
      
      
      
<br/>
<br/>
<br/>
<br/>

<div class="container">
   <footer>
       <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">    
       <p align="center">2014<a href="http://www.weibo.com/ahtxd" target="_blank">@MySYSU</a> &copy; All rights reserved.</p>         
       </nav>
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




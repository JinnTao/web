<h3>个人信息</h3>

<div class="tabbable" id="tabs"> 
    <ul class="nav nav-tabs">
      <li ><a href="index.php?rt=set/info">基本信息</a></li>
      <li class=""><a href="index.php?rt=set/avatar">设置头像</a></li>
      <li class=""><a href="index.php?rt=set/password">修改密码</a></li>      
    </ul>

    <input type="hidden" name="path" value="<?php echo $pagepath ?>" id="path" />
     <?php 
        include $pagepath;
      ?> 
</div>         
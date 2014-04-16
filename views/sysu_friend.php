
<div class="tabbable" id="tabs"> 
    <ul class="nav nav-tabs">
      <li ><a href="index.php?rt=friend/friendnews">好友动态</a></li>
      <li ><a href="index.php?rt=friend/friendlist">好友列表</a></li>
      <li ><a href="index.php?rt=friend/friendfind">寻找好友</a></li>
      <li ><a href="index.php?rt=friend/message">好友请求</a></li>
    </ul>
      
    <input type="hidden" name="path" value="<?php echo $pagepath ?>" id="path" />
    <?php 
      include $pagepath;
    ?> 
               
</div>
<form class="form-search" action="index.php?rt=sysu_index/result" method="post">
  <div class="input-append" >
    <input type="text" class="input-xlarge search-query" required="required" name="searchname" value="<?php echo $searchname; ?>">
    <button type="submit" class="btn">Search</button>
  </div>
</form>
<!-- 
< ?php echo $searchname; ?>
 -->

<div class="tabbable" id="tabs"> 
    <ul class="nav nav-tabs">
      <li class="active"><a href="#panel-1" data-toggle="tab" contenteditable="false">成员</a></li>
      <li class=""><a href="#panel-2" data-toggle="tab" contenteditable="false">话题</a></li>
      <li class=""><a href="#panel-3" data-toggle="tab" contenteditable="false">问题</a></li>
      <li class=""><a href="#panel-4" data-toggle="tab" contenteditable="false">回答</a></li>
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="panel-1" contenteditable="false">
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" alt="xiayizhan" style="weight:100px; height:100px;" src="./front_end/img/next.png">
          </a>
          <div class="media-body">
            <a href="#"><h4 class="media-heading">下一站微信</h4></a>   
            <div class="media">
              他很喜欢旅游、创意和设计。</br>
              849人关注
            </div>
            <button class="btn btn-small btn-success" type="button"> + 关注</button>
          </div>
        </div>
        <div class="media">
          <a class="pull-left" href="#">
            <img class="media-object" alt="xiayizhan" style="weight:100px; height:100px;" src="./front_end/img/next.png">
          </a>
          <div class="media-body">
            <a href="#"><h4 class="media-heading">下一站微信2</h4></a>   
            <div class="media">
              他很喜欢旅游、创意和设计。</br>
              849人关注
            </div>
            <button class="btn btn-small btn-success" type="button"> + 关注</button>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="panel-2" contenteditable="false">
        <div class="hottopic">
          <a class="pull-left" href="#">
            <img class="media-object" alt="renqiwang" style="weight:50px; height:50px;" src="./front_end/img/weixin.jpg">
          </a>
          <div class="media-body">
            <a href="#"><h5 class="media-heading">微信公众账号1</h5></a>
            <p>7676人关注</p>
          </div>
        </div>
        <div class="hottopic">
          <a class="pull-left" href="#">
            <img class="media-object" alt="renqiwang" style="weight:50px; height:50px;" src="./front_end/img/weixin.jpg">
          </a>
          <div class="media-body">
            <a href="#"><h5 class="media-heading">微信公众账号2</h5></a>
            <p>7676人关注</p>
          </div>
        </div>

      </div>
      <div class="tab-pane" id="panel-3" contenteditable="false">
        <a href="#"><p>你每天必读的微信公众账号有哪些？内容是哪方面的？</p></a>
        <a href="#"><p>你每天必读的微信公众账号有哪些？内容是哪方面的？</p></a>
        <a href="#"><p>你每天必读的微信公众账号有哪些？内容是哪方面的？</p></a>
      </div>
      <div class="tab-pane" id="panel-4" contenteditable="false">
        <p>对不起，暂时还没有人回答过与“微信”相关的回答。</p>
      </div>
    </div>          
</div>
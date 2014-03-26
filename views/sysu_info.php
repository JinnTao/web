<h3>个人信息</h3>

<div class="tabbable" id="tabs"> 
    <ul class="nav nav-tabs">
      <li class="active"><a href="#baseinfo" data-toggle="tab" contenteditable="false">基本信息</a></li>
      <li class=""><a href="#userimage" data-toggle="tab" contenteditable="false">设置头像</a></li>
<!--       <li class=""><a href="#panel-3" data-toggle="tab" contenteditable="false">设置签名</a></li>
 -->  <li class=""><a href="#usertag" data-toggle="tab" contenteditable="false">个人标签</a></li>
      <li class=""><a href="#userpw" data-toggle="tab" contenteditable="false">修改密码</a></li>      
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="baseinfo" contenteditable="false">
        <span id="sexchoice" style="display: none" ><?php echo $sex; ?></span>
      	<form  name="InfoForm"class="form-horizontal" action="index.php?rt=sysu_index/info_change" method="post">
			    <div class="control-group">
            	<label class="control-label" for="inputEmail">注册邮箱</label>
            	<div class="controls">
               		<?php echo $_SESSION['email']?>
            	</div>      
          </div>
          <div class="control-group">
            	<label class="control-label" for="inputEmail">注册时间</label>
            	<div class="controls">
               		<?php echo $signuptime; ?>
              </div>      
          </div>
        	<div class="control-group">
            	<label class="control-label" for="inputname">昵称</label>
            	<div class="controls">
               		<input type="text" name="username" id="inputname" maxlength="20" value="<?php echo $username; ?>">
				          <span class="nametip"></span>
              </div>
        	</div>
        	<div class="control-group">
            	<label class="control-label" for="gender">性别</label>
            	<div class="controls">
                	<input type="radio" name="sex" checked="checked" value="m" /> 男
					        <input type="radio" name="sex" value="f" /> 女
            	</div>
        	</div>
        	<div class="control-group">
            	<label class="control-label" for="inputage">年龄</label>
            	<div class="controls">
               		<input type="text" name="age" id="inputage" maxlength="5" placeholder="" value="<?php echo $age; ?>">
				          <span class="agetip"></span>
              </div>
        	</div>
        	<div class="control-group">
            	<label class="control-label" for="inputresume">个人简介</label>
            	<div class="controls">
               		<!-- <input type="text" name="" id="inputname" placeholder=""> -->
                  <textarea id="inputresume" name="resume" cols="30" rows="5" style = "font-size:16"><?php echo $resume; ?></textarea>
				      </div>
        	</div>
        	<div class="control-group"> 
            	<div class="controls">
                	<button id="infosignup" type="submit" class="btn btn-large btn-primary">保存</button>
            	</div>
        	</div>
      	</form>
      </div>

      <div class="tab-pane" id="userimage" contenteditable="false">  
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
            <button class="btn btn-small btn-success" type="button"> -取消关注</button>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="userpw" contenteditable="false">
        <form id="PwForm" name="PwForm" class="form-horizontal" action="index.php?rt=sysu_index/info_change" method="post">
        	<div class="control-group">
            	<label class="control-label" for="newPassword">新密码</label>
            	<div class="controls">
               		<input type="password" name="newpw" id="newPassword" maxlength="20" required="required" placeholder="">
               		<span class="pwtip"></span><i class="pwtip icon-ok icon-black" style="display: none"></i>               
            	</div>
        	</div>
        	<div class="control-group">
            	<label class="control-label" for="Password2">确认密码</label>
            	<div class="controls">
               		<input type="password" id="Password2" maxlength="20" required="required" placeholder="Type Your Password Again">
               		<span class="pw2tip"></span><i class="pw2tip icon-ok icon-black" style="display: none"></i>          
            	</div>
        	</div>

        	<div class="control-group"> 
            	<div class="controls">
                	<button id="passwordsignup" type="submit" class="btn btn-large btn-primary">保存</button>
            	</div>
        	</div>
        </form>
      </div>
      <div class="tab-pane" id="usertag" contenteditable="false">
        <p>对不起，暂时还没有人回答过与“微信”相关的回答。</p>
      </div>
    </div> 
</div>         
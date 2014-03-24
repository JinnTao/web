<h3>账户设置</h3>

<div class="tabbable" id="tabs"> 
    <ul class="nav nav-tabs">
      <li class="active"><a href="#baseinfo" data-toggle="tab" contenteditable="false">基本信息</a></li>
      <li class=""><a href="#panel-2" data-toggle="tab" contenteditable="false">设置头像</a></li>
      <li class=""><a href="#panel-3" data-toggle="tab" contenteditable="false">设置签名</a></li>
      <li class=""><a href="#panel-4" data-toggle="tab" contenteditable="false">个人标签</a></li>
      <li class=""><a href="#panel-5" data-toggle="tab" contenteditable="false">修改密码</a></li>      
    </ul>
    <div class="tab-content">
      <div class="tab-pane active" id="baseinfo" contenteditable="false">
      	<form  class="form-horizontal" action="index.php?rt=sysu_index/info" method="post">
			<div class="control-group">
            	<label class="control-label" for="inputEmail">注册邮箱</label>
            	<div class="controls">
               		JInntao@qq.com
            	</div>      
            </div>
            <div class="control-group">
            	<label class="control-label" for="inputEmail">注册时间</label>
            	<div class="controls">
               		2014-3-16
            	</div>      
            </div>
        	<div class="control-group">
            	<label class="control-label" for="inputname">昵称</label>
            	<div class="controls">
               		<input type="text" name="" id="inputname" maxlength="15" placeholder="">
				</div>
        	</div>
        	<div class="control-group">
            	<label class="control-label" for="gender">性别</label>
            	<div class="controls">
                	<input type="radio" name="sex" checked="checked" value="male" /> 男
					<input type="radio" name="sex" value="female" /> 女
            	</div>
        	</div>
        	<div class="control-group">
            	<label class="control-label" for="inputage">年龄</label>
            	<div class="controls">
               		<input type="text" name="" id="inputage" maxlength="5" placeholder="">
				</div>
        	</div>
        	<div class="control-group">
            	<label class="control-label" for="inputname">个人简介</label>
            	<div class="controls">
               		<input type="text" name="" id="inputname" placeholder="">
				</div>
        	</div>
        	<div class="control-group"> 
            	<div class="controls">
                	<button id="infosignup" type="submit" class="btn btn-large btn-primary">保存</button>
            	</div>
        	</div>
      	</form>
      </div>

      <div class="tab-pane" id="panel-2" contenteditable="false">  
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
      <div class="tab-pane" id="panel-5" contenteditable="false">
        <form class="form-horizontal" action="index.php?rt=sysu_index/info" method="post">
        	<div class="control-group">
            	<label class="control-label" for="newPassword">新密码</label>
            	<div class="controls">
               		<input type="password" name="" id="newPassword" maxlength="20" required="required" placeholder="">
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
      <div class="tab-pane" id="panel-4" contenteditable="false">
        <p>对不起，暂时还没有人回答过与“微信”相关的回答。</p>
      </div>
    </div> 
</div>         
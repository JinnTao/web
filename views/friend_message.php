 <div class="tab-pane active" id="baseinfo" contenteditable="false">
      <span id="sexchoice" style="display: none" ><?php echo $sex; ?></span>
      	<form  name="InfoForm"class="form-horizontal" action="index.php?rt=set/info_change" method="post">
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
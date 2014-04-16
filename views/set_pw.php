<div class="tab-pane" id="userpw" contenteditable="false">
        <form id="PwForm" name="PwForm" class="form-horizontal" action="index.php?rt=set/info_change" method="post">
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
<div class="container">
<!--  -->
	<form action="index.php?rt=index/registry_manager" method="post" class="form-horizontal">
		<h2 class="form-register-heading">Welcome TO JOIN US</h2>
        <div class="control-group">
            <label class="control-label" for="inputEmail">E-mail</label>
            <div class="controls">
               <input type="text" name="email" id="inputEmail" required="required" placeholder="Email">
               <span class="emailtip"></span><i class="emailtip icon-ok icon-black" style="display: none"></i>
            </div>
            
        </div>
        <div class="control-group">
            <label class="control-label" for="inputPassword">Password</label>
            <div class="controls">
               <input type="password" name="password" id="inputPassword" maxlength="20" required="required" placeholder="Password">
               <span class="pwtip"></span><i class="pwtip icon-ok icon-black" style="display: none"></i>               
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="Password2">Password Comfirm</label>
            <div class="controls">
               <input type="password" id="Password2" maxlength="20" required="required" placeholder="Type Your Password Again">
               <span class="pw2tip"></span><i class="pw2tip icon-ok icon-black" style="display: none"></i>          
            </div>
        </div>

        <div class="control-group"> 
            <div class="controls">
                <label class="radio" >
                   <input type="radio" checked> I Agree the 
                   <a href="#myModal" class="register_protocol" data-toggle="modal">contract</a>!
                </label>
                <button id="signup" type="submit" class="btn btn-large btn-primary">Join Us</button>
            </div>
        </div>
    </form>

</div>

<!-- Button to trigger modal 
<a href="#myModal" role="button" class="btn" data-toggle="modal">查看演示案例</a>-->
 
<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">注册协议</h3>
  </div>
  <div class="modal-body">
    <p>注册协议<br>中大之旅提醒您：在使用本网站的各项服务前，请认真阅读以下相关条例</p>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary">已经阅读并同意该条例</button>
  </div>
</div>
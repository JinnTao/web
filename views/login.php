<div class="container">
<form  action="index.php?rt=index/login_manager" method="post"  class="form-horizontal">
		<h2 class="form-signin-heading">Please sign in</h2>
        <div class="control-group">
            <label class="control-label" for="l-inputEmail" >Email</label>
            <div class="controls">
               <input type="text" id="l-inputEmail" required="required" placeholder="Email">
               <span class="l-emailtip"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="l-inputPassword" >Password</label>
            <div class="controls">
               <input type="password" id="l-inputPassword" required="required" placeholder="Password">
               <span class="l-pwtip"></span>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <label class="checkbox">
                   <input type="checkbox"> Remember me
                </label>
                <button id="l-login" type="submit" class="btn btn-large btn-primary">Sign in</button>
            </div>
        </div>
    </form>
 </div>
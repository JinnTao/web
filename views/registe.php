 <form action="index.php?rt=index/registry_manager" method="post">
		
        <div class="control-group">

            <div class="controls">
               <input type="text" name="email" id="r-inputEmail" required="required" placeholder="Email" class="input-block-level">
               <span class="r-emailtip"></span><i class="r-emailtip icon-ok icon-black" style="display: none"></i>
            </div>
            
        </div>
        <div class="control-group">
    
            <div class="controls">
               <input type="password" name="password" id="r-inputPassword"required="required" placeholder="Password" class="input-block-level">
               <span class="r-pwtip"></span><i class="r-pwtip icon-ok icon-black" style="display: none"></i>               
            </div>
        </div>
        <div class="control-group">
          
            <div class="controls">
               <input type="password" id="r-Password2" required="required" placeholder="Type Your Password Again" class="input-block-level">
               <span class="r-pw2tip"></span><i class="r-pw2tip icon-ok icon-black" style="display: none"></i>          
            </div>
        </div>

        <div class="control-group"> 
            <div class="controls">
                <label class="radio" >
                   <input type="radio" checked> I Agree the 
                   <a href="./views/contract.php" data-title="注册协议" data-trigger="modal" >contract!</a>
                </label>
                <button id="signup" type="submit" class="btn btn-large btn-block btn-primary">Join Us</button>
            </div>
        </div>
    </form>

			<div id="form">
				<a href="index.php?rt=index"><img src="./front_end/image/logo.jpg"/></a>
				<p id="wel">Welcome to My Notes!</p>
				<form action="index.php?rt=index/register_manager" method="post">
					<div class="entry">
						<span>UserName</span>
						<input type="text" name="regusername" maxlength="15" size="30" id="name" 
												required="required" placeholder="name here"/>
					</div>
					
					<div class="entry tips" id="warn1"></div>
					
					<div class="entry">
						<span>PassWord</span>
						<input id="pw" type="password" name="regpwd" maxlength="10" size="30" 
								required="required" placeholder="a-zA-Z0-9,at least 6 words"/>
					</div>
					
					<div class="tips" id="warn2">
						Not allow shorter than 6 words,please check
					</div>
					
					<div class="entry">
						<span>PassWord confirm</span>
						<input id="pw2" type="password" maxlength="10" size="30"
								required="required" placeholder="type your pwd again"/>
					</div>
					
					<div class="tips" id="warn3">
						CAN NOT match the previous password,please check
					</div>
					
					<div class="entry">
						<span>Gender</span>
						<label><input type="radio" name="gender" value="M" checked="checked"/>Male</label>
					    <label><input type="radio" name="gender" value="F"/>Female</label>
					</div>
					
					<div class="entry">
						<span>Real Name</span>
						<input type="text" name="realname" maxlength="10" size="30" placeholder="optional"/>
					</div>
					
					<div class="entry">
						<span>E-mail</span>
						<input type="email" name="email" maxlength="30" size="30" placeholder="optional"/>
					</div>
					
					<div class="entry">
						<span>Personal Description</span>
						<textarea name="disc" name = "description" cols="25" rows="2"></textarea>
					</div>
					
					<div class="entry" id="agreement">
						Don't say bad language.</br>
						Don't call up fights.</br>
						Love reading,love life,love the world.</br>
						Not allow to be unhappy!
					</div>
					<input type="checkbox" id="agree"/>I agree with this agreement!
					
					<div class="entry">
						<button id="sub">SignUp</button>
					</div>
				</form>
			</div>
			<div id="link">
				<p>Already had an account? </P>
				<p>Log in directly  
					<a href="index.php?rt=index/login">LogIn</a>
				</p>
			</div>

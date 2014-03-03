			<div>
				<a href="index.php?rt=index"><img src="./front_end/image/logo.jpg"/></a>
				<!--<a href="index.php?rt=user?username=<?= $_SESSION['username'] ?>" id="out"><?= $_SESSION['username'] ?></a>
				<a href="index.php?rt=index/login_logout_manager" id="out">LogOut</a>-->
			</div>
			
			<div id="resources">

				<div id="public-topics">
					<h1>Public topics:What people are reading...</h1>
					<ul>
					<?php
						for($ct = 0;$ct < count($resources); $ct ++){
						?>
							<li>
								<a href="index.php?rt=index/resource&rid=<?= $resources[$ct]['rid'] ?>" >
										<?= $resources[$ct]['rtitle'] ?></a>  
							</li>
						<?php
						}
						?>
					</ul>
				</div>
			
				<div id="groups">
					<h1>Groups you may be interested in...</h1> 
					<ul>
					<?php
						for($ct = 0;$ct < count($groups); $ct ++){
						?>
							<li><a href=""><?= $groups[$ct]['gname'] ?></a></li>
						<?php
						}
						?>
					</ul>
				</div>
			
			</div>
	


			<div>
				<a href="index.php?rt=index"><img src="./front_end/image/logo.jpg"/></a>
			</div>
			
			<div id="content" >
			
				<div class="entry">
					<span>Title:</span>
					<?= $details['rtitle'] ?> 
				</div>
				
				<div class="entry">
					<span>Discription:</span>
					<?= $details['rgeneral'] ?> 
				</div>
				
				<div class="entry">
					<span>SetUp Time:</span>
					<<?= $details['setuptime'] ?> 
				</div>

				<div class="entry">
					<h1>Reviews of <?= $details['rtitle']?></h1>
					<?php
					for ($ct = 0;$ct < count($commentaries);$ct ++){
					?>
						<div class="review">
							<h2><?= $commentaries[$ct]['ctitle'] ?></h2>
							Reviewer: <?= $commentaries[$ct]['setuper'] ?>
							<?php $c = $commentaries[$ct]['content'];
							$pos = 0;
							$len = 70;
							while($pos + $len <= strlen($c)){
							?>
								<div class="rcontent"><?= substr($c,$pos,$len) ?></div>
							<?php
								$pos += $len;
								if ($pos + $len < strlen($c))
									$len = 70;
								else
									$len = strlen($c) - $pos;
							}
							?>
						</div>
					<?php
					}
					?>
				</div>
			</div>

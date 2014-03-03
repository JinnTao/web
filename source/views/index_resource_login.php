
			<div>
				<a href="index.php?rt=index"><img src="./front_end/image/logo.jpg"/></a>
			</div>
			
			
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
				<?= $details['setuptime'] ?> 
			</div>
				
			<div class="entry">
				<h1>Reviews of <?= $details['rtitle']?></h1>
				<?php
				for ($ct = 0;$ct < count($commentaries);$ct ++){
				?>
					<div class="review">
						<h2><?= $commentaries[$ct]['ctitle'] ?></h2>
						Reviewer: <?= $setupers[$ct] ?>
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

			<form id="content" action="index.php?rt=index/resource_manager&rid=<?= $resource_id ?>" method="post">
				<div class="entry">
					<span>Comment:</span>
					<input type="text" name="com_title" 
								maxlength="30" size="30"  placeholder="title here!"/>
					<textarea class="content" name="comment" cols="40" rows="10"></textarea>
				</div>
				
				<div class="entry">
					<span>Take notes:</span>
					<input type="text" name="note_title" 
								maxlength="30" size="30"  placeholder="title here!"/>
					<textarea class="content" name="note" cols="40" rows="10"></textarea>
					<div class="content">you want WHO to read your notes</div>
					<label><input class="content" type="radio" name="privacy" value="1" checked="checked" />Only myself</label>
					<label><input class="content" type="radio" name="privacy" value="2" />Show it to my friends</label>
					<label><input class="content" type="radio" name="privacy" value="4" />Show it to my groups</label>
					<label><input class="content" type="radio" name="privacy" value="6" />Both friends and groups</label>
				</div>
				
				<input type="submit" id="sub" value="submit" />
			</form>

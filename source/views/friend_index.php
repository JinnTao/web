<div>
	<h1>Friends</h1>
</div>

<div id="all">
	<div id="right-colomn">
		<p>
			<a href="index.php?rt=friend"> >> Friends Dynamic</a>
		</p>

		<p>
			<a href="index.php?rt=friend/mylist"> >> My Friend List</a>
		</p>

		<p>
			<a href="index.php?rt=friend/find&friendname="> >> Search Friends</a>
			<form action="index.php?rt=friend/find" method="post">
				<input type="text" name="friendname" />
				<input type="submit" value="Search"/>
			</form>
		</p>
	</div>

	<div id="left-colomn">
		<div id="left-up">
			<ul>
				<li>NEWEST RESOURCES</li>
				<li>NEWEST NOTE</li>
				<li>NEWEST COMMENT</li>
			</ul>

		</div>

		<div id="content">
			<?php
			if(count($resources) > 0){
				for($i = 0; $i < count($resources); $i++){
					$setuper_info = get_user_by_id($resources[$i]['setuper']);
				?>
					<div class="resource">
						<h3><?= $resources[$i]['rtitle']?></h3>
					<!--<p>< ?= $resources[$i]['rid']?><p>-->
						<p><?= $setuper_info['uname']?> ' share</p>

						<img src=""/>
						<p>brief:<?=$resources[$i]['rgeneral']?></p>
						<p>setuptime: <?=$resources[$i]['setuptime']?></p>
					</div>
				<?php
				}
			}
			
			if(count($notes) > 0){
				for($i = 0; $i < count($notes); $i++){
					$setuper_info = get_user_by_id($notes[$i]['setuper']);
				?>
					<div class="note">
						<h3><?= $notes[$i]['ntitle']?></h3>
					<!--<p>< ?= $resources[$i]['rid']?><p>-->
						<p><?= $setuper_info['uname']?> ' note</p>

						<img src=""/>
						<p>brief:<?=$resources[$i]['content']?></p>
						<p>setuptime: <?=$resources[$i]['setuptime']?></p>
					</div>
				<?php
				}
			}
			?>
		

	<!--
			<div class="comment">
			<?php
			//	for($i = 0; $i < count($comments); $i++){
				?>
					<h3>< ?= $comments[$i]['rtitle']?></h3>
					<p>< ?= $comments[$i]['setuper']?></p>
					<img src=""/>
					<p>< ?=$comments['rgeneral']?></p>
				< ?php
				} 
				?>
			</div>
		-->

			<div class="resource">
				<h3>This is an fantastic book!!</h3>
				<p>XXX's resource</p>
				<img src="../front_end/image/0002.jpg" />
        		<p>Dive Into Python is a free Python book for experienced programmers. It was originally hosted at DiveIntoPython.org, but the author has pulled down all copies. It is being mirrored here. You can read the book online, or download it in a variety of formats. It is also available in multiple languages.</p>
    		</div>

    		<div class="note">
				<h3>This is an fantastic book!!</h3>
				<p>XXX's note</p>
				<img src="../front_end/image/0002.jpg" />
        		<p>Dive Into Python is a free Python book for experienced programmers. It was originally hosted at DiveIntoPython.org, but the author has pulled down all copies. It is being mirrored here. You can read the book online, or download it in a variety of formats. It is also available in multiple languages.</p>
    		</div>

    		<div class="comment">
				<h3>This is an fantastic book!!</h3>
				<p>XXX's comment</p>
				<img src="../front_end/image/0002.jpg" />
        		<p>Dive Into Python is a free Python book for experienced programmers. It was originally hosted at DiveIntoPython.org, but the author has pulled down all copies. It is being mirrored here. You can read the book online, or download it in a variety of formats. It is also available in multiple languages.</p>
    		</div>
		</div>

	</div>

</div>

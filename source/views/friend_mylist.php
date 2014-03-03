<div>
	<h1>My Friends</h1>
</div>

	<h2> I have <?= $friends_counts?> friends</h2>
   <?php
	if($friends_counts == 0)
	{
	?>
		<p>You have no friends yet.</p>
		<p>Look for more friends?</p>
		<p>Please go and take a look at the people here: <a href="index.php?rt=friend/find&friendname="/>Click Here</a></p>
	<?php
	}
	else
	{
		?>
		<p>Click the picture, you can go to the friend site to see the things you can read.</p>
		<?php
	    for($i = 0; $i < $friends_counts; $i++)
		{
		?>
			<div class="friend">
				<?php
				$url = 'index.php?rt=user/profile_manager&uname='.$onefriendid[$i]['uname'];
				//echo $url;
				?>
				
				<h3><a href=<?=$url?>/><?= $onefriendid[$i]['uname']?></h3></a>
				<input name="deletefriend" type="button" value="Delete The Friend" name="deletefriend" />
				<h4>description : <?= $onefriendid[$i]['description']?></h4>
				<h4>setuptime: <?= $onefriendid[$i]['setuptime']?></h4>
				
			</div>
		<?php
		}
	}
?>

<div>
	<h1> Searching Friends!</h1>
</div>

<div id="all">
	<form id="searchform" action="index.php?rt=friend/find" method="post"> 
		<input type="text" name="friendname" value="<?=$search_name?>" size="60" maxlength="50"/>
		<input type="submit" value="Search"/>
	</form>

	<div id="right-colomn">
		<h2>What is friend searching???</h2>
		<p>Friend Searching provide you a chance to find a new friend or the people you know them.<br />You can search the friends you are intrested here, and we also recommend some excellent people to you! <br />Here you can see the people you might interested. If you concerned about a person, click the button "To Be a Friend" or go to his page and click it.</p>
	</div>

	<div id="left-colomn">
		<div class="searcher">
		<h2>The Searching Result:</h2>

		<div class="search">
	<?php
		if($has_user == true)
		{
		?>
			<h3><a href=""><?=$search_user['uname']?></a></h3>
		<?php
			if($is_friend)
			{
		?>
				<input class="isfriend" name="isfriend" type="button" value="IS Friend" />
		<?php
			}
			else
			{
		?>
		 		<input class="addfriend" type="button" value="To Be A Friend" name="addfriend" />
				
			<?php
			}
			?>
			<p>Description :<?=$search_user["description"]?></p>
			<h5>Setup Time: <?=$search_user["setuptime"]?></h5>
			<?php
		}
		else
		{
		?>
			<p>The user is not exist!<p>
		<?php
		}
	?>
		</div>
		</div>
	<!--	
		<div class="searcher">
			<h3><a href="">uname</a></h3>
			<input class="isfriend" type="button" value="IS Friend" />
			<h4>I'm a doctor, I like swimming</h4>
		
    		<h3><a href="">uname2</a></h3>
			<input class="addfriend" type="button" value="To Be A Friend" name="addfriend" />
			<h4>I'm a teacher, I like reading</h4>			
		</div>
    -->



		<div id="search_interesting">
			<h2>The Ones You Might Interesting ...</h2>
		<?php	

		if(count($friends_by_friends) > 0){
			if(count($friends_by_friends) < 4)
				$count_friend = count($friends_by_friends);
			else
				$count_friend = 4;
		
			for($i = 0; $i < $count_friend; $i++){
			?>
				<div class="might_friend">
					<p><a name="username" href=""><?=$friends_by_friends[$i]['uname']?></a></p>
					<h4><?=$friends_by_friends[$i]['description']?></h4>
					<input class="addfriend" type="button" value="To Be A Friend" name="addfriend" />
				</div>
			<?php
			}
		}
		else{
			?>
			<div class="might_friend">
				<h3><a name="username" href="">lrh</a></h3>
				<h4>A new user here,love books!</h4>
				<input class="addfriend" type="button" value="To Be A Friend" name="addfriend" />
			</div>
			<?php
		}
		?>
		<!--
			<div id="changegroup">
				<p><a href=""> >> MORE</a></p>
			</div>
		-->
		</div>
	</div>

</div>
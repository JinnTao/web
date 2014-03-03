
<div id="wrapper">
	<h1>Hello,<?= $name ?></h1>

	<div id="up">
		<div id="profile">
			<div id="stitle">My profile</div>
			<p>realname:<?= $realname ?></p><br />
			<p>gender:<?= $gender ?></p><br />
			<p>email:<?= $email ?></p><br />
			<p>setuptime:<?= $setuptime ?></p><br />
			<p>personal discription:<?= $description ?></p><br />
			<p><a href="index.php?rt=user/update">
						Edit personal profile</a></p>
		</div>

		<div id="friends">
			<div id="stitle">My friends</div>
			<?php
			for($i = 0;$i < count($my_friends);$i ++){
			?>
				<a href="index.php?rt=user/profile_manager&uname<?= $my_friends[$i] ?>">
					<?= $my_friends[$i] ?></a><br />
			<?php
			}
			?>
		</div>
					
		<div id="groups">
			<div id="stitle">My groups</div>
			<?php
			for($i = 0;$i < count($my_groups);$i ++){
			?>
				<<a href="index.php?rt=group/index&gid<?=$groups[$i] ?>">
					<?= $my_groups[$i] ?></a><br />
			<?php
			}
			?>
		</div>
	</div>

	<div id="down">
		<div id="resources">
			<a href="index.php?rt=user/manage_insert_resource">Creat new resource</a>	
			<div id="stitle">My resources</div>	
			<?php
			for($i = 0;$i < count($my_resources);$i ++){
			?>
				<a href="index.php?rt=index/resource&rid=<?=$my_resources[$i]['rid'] ?>">
					<?= $my_resources[$i]['rtitle'] ?></a><br />
			<?php
			}
			?>
		</div>

		<div id="notes">		
			<a href="index.php?rt=user/my_notes_manager"><div id="stitle">My notes</div></a>
			<a href="index.php?rt=user/friend_notes_manager"><div id="stitle">Friends' public notes</div></a>
		</div>
	</div>
</div>

<div id="content_main">
	<h1>Update Profile</h1>

	<form action="index.php?rt=user/update_profile_manager" method="post">
		<!--div>
			<span>User Name:</span> <?= $uname ?>
		</div-->
		<div>
			<span>Gender:</span>
			<input type="radio" name="gender" value="male" checked="checked"/> Male
			<input type="radio" name="gender" value="female"/> Female
		</div>

		<div>
			<span>Realname:</span>
			<input type="text" name="realname" maxlength="10" size="30"/>
		</div>

		<div>
			<span>E-mail:</span>
			<input type="text" name="email" size="30" />
		</div>

		<div>
			<span>Personal Description:</span>
			<textarea row="2" col="25" name="description"></textarea>
		</div>

		<div>
			<input type="submit" value="Update"/>
		</div>

	</form>

</div>


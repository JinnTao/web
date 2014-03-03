
<?php
	for($i = 0; $i < count($messages); $i++) {		
		$sender = $messages[$i]["msender"];
		$receiver = $messages[$i]["mreceiver"];
		$content = $messages[$i]["mcontent"];
		$mid = $messages[$i]['mid'];
		if (isset($messages[$i]['moption']))
			$gid = $messages[$i]['moption'];
		?>		
	
		<div class="message">
			<?php
				if ($content == 0) {
					$para = $sender . "/" . $mid;
			?>
				<div>
					<p><?= $sender ?> wants to make friends with you.</p>
					<button class="new_friends" value="<?= $para ?>">Agree</button>
					<button class="reject_friend" value="<?= $para ?>">Reject</button>
				</div>
			<?php
				}
				else if ($content == 1){ 
					$para = $gid . "/" . $mid;
				?>
				<div>
					<p>Group :<?= $sender ?> wants you to join.</p>
					<button class="join_group" value="<?= $para ?>">Agree</button>
					<button class="ignore" value="<?= $mid ?>">Ignore</button>
				</div>
			<?php
				}
				else if ($content == 2) {
					$para = $sender . "/" . $gid . "/" . $mid;
				?>
				<div>
					<p><?= $sender ?> wants join group <?= $receiver ?>.</p>
					<button class="add_group_member" value="<?= $para ?>">Agree</button>
					<button class="reject_member" value="<?= $para ?>">Reject</button>
				</div>
			<?php
				}
				else if ($content == 3) {
				?>
				<div>
					<p>Group:<?= $sender ?> didn't allow you to join.</p>
					<button class="ignore" value="<?= $mid ?>">OK T_T</button>
				</div>
			<?php
				}
				else{
				?>
				<div>
					<p><?= $sender ?> refused to friend you.</p>
					<button class="ignore" value="<?= $mid ?>">OK T_T</button>
				</div>
				<?php
				}
				?>

		</div>
	<?php
	}
?>


<p>Here are all your friends' notes</p><br />
<dl>
	<?php
	for($i = 0; $i < $n; $i ++){
		$friend_name = $friend_names[$i];
		$this_friend_notes = $friend_notes[$i];
	?>
		<dt><?= $i ?>:From your friend : <?= $friend_name ?></dt>
		<?php
		for($j = 0; $j < count($this_friend_notes ); $j ++){
			?>
			<dd>
				<?= $j ?>)<?= $this_friend_notes[$j]['ntitle'] ?>
			</dd>
			<dd>
				<?= $this_friend_notes[$j]['content'] ?>
			</dd>
		<?php
		}
	}
	?>
</dl>
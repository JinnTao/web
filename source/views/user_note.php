
<p>Here are all your notes @_@</p><br />
<dl>
	<?php
	for($i = 0; $i < $n; $i ++){
	?>
		<dt><?= $i ?>:<?= $my_notes[$i]['ntitle'] ?></dt>
		<dd>
			<?= $my_notes[$i]['content'] ?>
		</dd>
	<?php
	}
	?>
</dl>


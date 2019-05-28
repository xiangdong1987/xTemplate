<section<?php echo $col ? ' class="col col-' . $col . '"' : '' ?>>
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>

	<div class="inline-group">
		<?php foreach ($data as $k => $v): ?>
			<label class="radio">
				<input type="radio" value="<?php echo $k ?>"<?php if ("$val" === "$k") {
					echo " checked";
				} ?>
					   name="<?php echo $name ?>"><i></i><?php echo htmlentities($v, ENT_QUOTES, "UTF-8") ?>
			</label>
		<?php endforeach ?>
	</div>
</section>

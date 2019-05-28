<section<?php echo $col ? ' class="col col-' . $col . '"' : '' ?>>
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
	<label class="select">
		<select name="<?php echo $name ?>" placeholder="<?php echo $note ?>">
			<option value="">请选择</option>
			<?php foreach ($data as $k => $v): ?>
				<option <?php if ("$k" === "$val") {
					echo 'selected="selected" ';
				} ?>value="<?php echo $k ?>"><?php echo $v ?></option>
			<?php endforeach ?>
		</select> <i></i> </label>
</section>

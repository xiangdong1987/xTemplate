<section<?php echo isset($col)&&$col ? ' class="col col-' . $col . '"' : '' ?>>
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
	<label class="input"><select name="<?php echo $name ?>" placeholder="<?php echo $note ?>" class="select2" style="width: 100%"  id="<?php echo $name ?>">
		<?php foreach ($data as $k => $v): ?>
			<option <?php if ("$k" === "$val") {
				echo 'selected="selected" ';
			} ?>value="<?php echo $k ?>"><?php echo $v ?></option>
		<?php endforeach ?>
	</select> <i></i></label>
</section>

<div class="form-group">
	<label><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>

	<select multiple style="width:100%" class="select2" id="<?php echo $name ?>[]" name="<?php echo $name ?>[]"
			placeholder="<?php echo $note ?>">
		<!--<optgroup label="Alaskan/Hawaiian Time Zone">
			<option value="AK">Alaska</option>
			<option value="HI">Hawaii</option>
		</optgroup>-->
		<?php foreach ($data as $k => $v): ?>
			<option <?php if (in_array($k, $val)) {
				echo 'selected="selected" ';
			} ?>value="<?php echo $k ?>"><?php echo $v ?></option>
		<?php endforeach ?>
	</select>
	<?php if ($note): ?>
		<div class="note">
			<?php echo $note ?>
		</div>
	<?php endif ?>
</div>
<div class="form-group" style="width: <?php echo $width ?>;">
	<div class="form-group">
		<label class="select">
			<select id="<?php echo $name ?>" name="<?php echo $name ?>" class="input-sm">
				<option value=""><?php echo $title ?></option>
				<?php foreach ($data as $k => $v): ?>
					<option <?php if ("$k" === "$val") {
						echo 'selected="selected" ';
					} ?>value="<?php echo $k ?>"><?php echo $v ?></option>
				<?php endforeach ?>
			</select>
		</label>
	</div>
</div>　　
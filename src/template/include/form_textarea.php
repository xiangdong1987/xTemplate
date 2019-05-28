<section<?php echo isset($col)&&$col ? ' class="col col-' . $col . '"' : '' ?>>
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
	<label class="textarea">
		<textarea rows="<?php echo isset($line) ? $line :2;  ?>" name="<?php echo $name ?>"
				  placeholder="<?php echo $note ?>"><?php echo htmlentities($val, ENT_QUOTES, "UTF-8") ?></textarea>
	</label>
</section>

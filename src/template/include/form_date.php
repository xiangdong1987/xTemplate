<section<?php echo isset($col)&&$col ? ' class="col col-' . $col . '"' : '' ?>>
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
	<label class="input"> <i class="icon-append fa fa-calendar"></i>
		<input type="text" name="<?php echo $name ?>" placeholder="<?php echo $note ?>" class="datepicker" data-dateformat='yy-mm-dd' value="<?php echo htmlentities($val, ENT_QUOTES, 'UTF-8') ?>">
	</label>
</section>
<section<?php echo $col ? ' class="col col-' . $col . '"' : '' ?>>
	<label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
	<label class="input"> <i class="<?php echo $icon ? "icon-prepend $icon" : "" ?>"></i>
		<input type="text" value="<?php echo htmlentities($val, ENT_QUOTES, "UTF-8") ?>" id="<?php echo $name ?>"
			   name="<?php echo $name ?>" placeholder="<?php echo $note ?>" <?=$ifReadOnly?'readonly':''?> >
	</label>
</section>
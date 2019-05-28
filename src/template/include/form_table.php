<section<?php echo $col ? ' class="col col-' . $col . '"' : '' ?>>
    <label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
    <label class="input"> <i class="<?php echo $icon ? "icon-append fa $icon" : "" ?>"></i>
        <input type="text" value="<?php echo htmlentities($val, ENT_QUOTES, "UTF-8") ?>" id="<?php echo $name ?>"
               placeholder="<?php echo $note ?>" readonly>
        <input type="hidden" value='<?php echo $origin_val?>' name="<?php echo $name;?>" id="<?php echo 'origin_' .$name?>">
    </label>
</section>

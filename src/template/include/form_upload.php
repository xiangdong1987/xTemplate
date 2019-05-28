<section<?php echo $col ? ' class="col col-' . $col . '"' : '' ?>>
    <label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
    <div class="input input-file ">
        <span class="button">
            <input type="file" id="file" onchange="this.parentNode.nextSibling.value = this.value" name="file">上传
        </span>
        <input type="text" value="<?=$val;?>" name="<?=$name;?>" readonly>
    </div>
</section>

<el-form :model="<?php echo $form_name; ?>" ref="<?php echo $form_name; ?>"
    <?php echo isset($rules) && $rules ? ':rules="rules"' : ""; ?> label-width="80px">
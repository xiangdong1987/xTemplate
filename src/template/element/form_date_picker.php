<?php if ($title) { ?>
<el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
    <?php } ?>
    <el-date-picker
            v-model="<?php echo isset($form_name) ? $form_name : $name; ?>"
            type="<?php echo $type ?>"
        <?php echo isset($format) ? "format='$format'" : ""; ?>
        <?php echo isset($range_separator) ? "range-separator='$range_separator'" : ""; ?>
        <?php echo isset($start_placeholder) ? "start-placeholder='$start_placeholder'" : ""; ?>
        <?php echo isset($end_placeholder) ? "end-placeholder='$end_placeholder'" : ""; ?>
        <?php echo isset($value_format) ? "value-format='$value_format'" : ""; ?>
        <?php echo isset($default_time) ? "default-time='$default_time'" : ""; ?>
            placeholder="<?php echo $note; ?>">
    </el-date-picker>
    <?php if ($title) { ?>
</el-form-item>
<?php } ?>

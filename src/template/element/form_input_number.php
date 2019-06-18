<?php if ($title) { ?>
<el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
    <?php } ?>
    <el-input-number v-model="<?php echo isset($form_name) ? $form_name : $name; ?>"
                     placeholder="<?php echo $note ?>"
        <?php echo $ifReadOnly ? ':disabled="true"' : "" ?>
        <?php echo $min ? ':min=' . $min : "" ?>
        <?php echo $max ? ':max=' . $max : "" ?>
        <?php echo $ifClear ? 'clearable' : "" ?>
        <?php echo $step ? ':step=' . $step : "" ?>
        <?php echo $strictly ? "step-strictly" : "" ?>
        <?php echo $precision ? ":precision=" . $precision : "" ?>
        <?php echo $size ? "size=" . $size : "" ?>
    ></el-input-number>
    <?php if ($title) { ?>
</el-form-item>
<?php } ?>

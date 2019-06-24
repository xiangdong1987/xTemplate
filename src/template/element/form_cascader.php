<?php if ($title) { ?>
<el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
    <?php } ?>
    <el-cascader
            v-model="<?php echo isset($form_name) ? $form_name : $name; ?>"
            :options="<?php echo $name; ?>_options"
            <?php echo isset($expandTrigger) ? ":props=\"{ expandTrigger: '$expandTrigger' }\"" :""?>
    ></el-cascader>
    <?php if ($title) { ?>
</el-form-item>
<?php } ?>

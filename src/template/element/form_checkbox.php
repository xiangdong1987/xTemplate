<?php if ($title) { ?>
<el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
    <?php } ?>
    <el-checkbox-group
            v-model="<?php echo isset($form_name) ? $form_name : $name; ?>" <?php echo $disabled ? "disabled" : ""; ?>
            size="<?php echo $size; ?>">
        <?php foreach ($data as $key => $value) { ?>
            <el-<?php echo $css ?>
                    :label=<?php echo $key ?> <?php echo $border ? "border" : ""; ?>><?php echo $value ?></el-<?php echo $css ?>>
        <?php } ?>
    </el-checkbox-group>
    <?php if ($title) { ?>
</el-form-item>
<?php } ?>

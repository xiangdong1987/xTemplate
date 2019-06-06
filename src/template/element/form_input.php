<?php if ($title) { ?>
    <el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
<?php } ?>
    <el-input v-model="<?php echo isset($form_name) ? $form_name : $name; ?>"
              placeholder="<?php echo $note ?>"
        <?php echo $ifReadOnly ? ':disabled="true"' : "" ?>
        <?php echo $ifPassword ? 'show-password' : "" ?>
        <?php echo $ifClear ? 'clearable' : "" ?>
        <?php echo $icon ? 'prefix-icon="' . $icon . '"' : "" ?>
    ></el-input>
<?php if ($title) { ?>
    </el-form-item>
<?php } ?>
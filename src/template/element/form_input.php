<el-form-item label="<?php echo $title ?>">
    <el-input v-model="<?php echo $name ?>"
              placeholder="<?php echo $note ?>"
        <?php echo $ifReadOnly ? ':disabled="true"' : "" ?>
        <?php echo $ifPassword ? 'show-password' : "" ?>
        <?php echo $ifClear ? 'clearable' : "" ?>
        <?php echo $icon ? 'prefix-icon="' . $icon . '"' : "" ?>
    ></el-input>
</el-form-item>
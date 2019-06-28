<?php if ($title) { ?>
    <el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
<?php } ?>
        <el-upload
                class="upload-demo"
                action="<?php echo $action ?>"
                :on-preview="handlePreview"
                :on-remove="handleRemove"
                :before-remove="beforeRemove"
                multiple
                :limit="3"
                :on-exceed="handleExceed"
                :file-list="<?php echo isset($form_name) ? $form_name : $name; ?>">
            <el-button size="small" type="primary">点击上传</el-button>
            <div slot="tip" class="el-upload__tip"><?php echo $note ?></div>
        </el-upload>
<?php if ($title) { ?>
    </el-form-item>
<?php } ?>

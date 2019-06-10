<?php if ($title) { ?>
    <el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
<?php } ?>
    <el-select v-model="<?php echo isset($form_name) ? $form_name : $name; ?>"
        <?php echo $disable ? "disabled" : ""; ?>
        <?php echo $ifClear ? 'clearable' : "" ?>
        <?php echo $isMultiple ? 'multiple' : "" ?>
        <?php echo $isCollapse ? 'collapse-tags' : "" ?>
        <?php echo $isFilter ? 'filterable' : "" ?>
               placeholder="<?php echo $note ?>">
        <?php if ($isGroup){ ?>
        <el-option-group
                v-for="group in <?php echo $name ?>_options"
                :key="group.label"
                :label="group.label">
                <el-option
                    v-for="item in group.options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value"
                    :disabled="item.disabled"
                >
                </el-option>
            <?php } else { ?>
                <el-option
                    v-for="item in <?php echo $name ?>_options"
                    :key="item.value"
                    :label="item.label"
                    :value="item.value"
                    :disabled="item.disabled"
                >
                </el-option>
            <?php } ?>
            <?php if ($isGroup) { ?>
        </el-option-group>
    <?php } ?>
    </el-select>
<?php if ($title) { ?>
    </el-form-item>
<?php } ?>
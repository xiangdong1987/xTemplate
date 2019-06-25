<?php if ($title) { ?>
<el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
    <?php } ?>
    <el-time-picker
            v-model="<?php echo isset($form_name) ? $form_name : $name; ?>"
        <?php echo $arrow_control ? "arrow-control" : ""; ?>
        <?php if (!$is_range) { ?>
            :picker-options="{
                selectableRange: '<?php echo $start ? $start : ""; ?> - <?php echo $end ? $end : ""; ?>'
            }"
        <?php } else { ?>
            <?php echo "is-range" ?>
        <?php } ?>
            placeholder="<?php echo $note; ?>">
    </el-time-picker>
    <?php if ($title) { ?>
</el-form-item>
<?php } ?>

<?php if ($title) { ?>
<el-form-item label="<?php echo $title ?>" prop="<?php echo $name ?>">
    <?php } ?>
    <el-time-select
            v-model="<?php echo isset($form_name) ? $form_name : $name; ?>"
            :picker-options="{
                start: '<?php echo $start; ?>',
                step: '<?php echo $step; ?>',
                end: '<?php echo $end; ?>',
                <?php echo $relation ? " minTime: $relation" : ""; ?>
            }"
            placeholder="<?php echo $note; ?>">
    </el-time-select>
    <?php if ($title) { ?>
</el-form-item>
<?php } ?>

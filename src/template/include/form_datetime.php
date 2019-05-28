<script type="text/javascript" src="/src/template/static/js/plugin/bootstrap-datetime/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/src/template/static/js/plugin/bootstrap-datetime/bootstrap-datetimepicker.zh-CN.js"></script>
<link rel="stylesheet" href="/src/template/static/js/plugin/bootstrap-datetime/bootstrap-datetimepicker.min.css">
<section <?php echo isset($col) && $col ? ' class="col col-' . $col . '"' : '' ?>>
    <label class='label'><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>
    <label class='input'>
        <i class="icon-append fa fa-calendar"></i>
        <input id="<?php echo $name ?>" type="text" style="z-index:1050;position:relative;" name='<?php echo $name ?>' placeholder="<?php echo $note ?>" value="<?php echo htmlentities($val, ENT_QUOTES, 'UTF-8') ?>"/>
    </label>
</section>
<script>
    $('#<?php echo $name ?>').datetimepicker({
        language: 'zh-CN',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1,
        zIndex:1060
    });
</script>

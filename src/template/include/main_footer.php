<script src="/src/template/static/js/bootstrap/bootstrap.min.js"></script>
<script src="/src/template/static/js/notification/SmartNotification.min.js"></script>
<script src="/src/template/static/js/smartwidgets/jarvis.widget.min.js"></script>
<script src="/src/template/static/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
<script src="/src/template/static/js/plugin/sparkline/jquery.sparkline.min.js"></script>
<script src="/src/template/static/js/plugin/jquery-validate/jquery.validate.min.js"></script>
<script src="/src/template/static/js/plugin/masked-input/jquery.maskedinput.min.js"></script>
<script src="/src/template/static/js/plugin/select2/select2.js"></script>
<script src="/src/template/static/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>
<script src="/src/template/static/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>
<script src="/src/template/static/js/plugin/fastclick/fastclick.js"></script>

<!--[if IE 7]>
<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
<![endif]-->
<!-- Demo purpose only -->
<script src="/src/template/static/js/demo.js"></script>

<!-- MAIN APP JS FILE -->
<script src="/src/template/static/js/app.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="/src/template/static/js/plugin/datatables/jquery.dataTables-cust.min.js"></script>
<script src="/src/template/static/js/plugin/datatables/ColReorder.min.js"></script>
<script src="/src/template/static/js/plugin/datatables/FixedColumns.min.js"></script>
<script src="/src/template/static/js/plugin/datatables/ColVis.min.js"></script>
<script src="/src/template/static/js/plugin/datatables/ZeroClipboard.js"></script>
<script src="/src/template/static/js/plugin/datatables/media/js/TableTools.min.js"></script>
<script src="/src/template/static/js/plugin/datatables/DT_bootstrap.js"></script>
<script src='/src/template/static/js/plugin/datatables/input.js'></script>
<script src="/src/template/static/js/plugin/layui/layui.all.js" type="text/javascript"></script>

<script type="text/javascript">
    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    $(document).ready(function () {
        pageSetUp();
    });
    <?php if (isset($this->js) && $this->js) {
        foreach ($this->js as $v) {
            echo $v;
        }
    } ?>
    $.sound_path = "/src/template/static/sound/";
</script>
</body>

</html>
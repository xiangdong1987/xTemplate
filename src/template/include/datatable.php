<style>
    .btn {
        float: right;
        height: 31px;
        margin: 7px 0 0 5px;
        padding: 0 22px;
        font: 300 15px/29px 'Open Sans', Helvetica, Arial, sans-serif;
        cursor: pointer;
    }
</style>
<div style="border-style:none;">
    <div class="navbar-form navbar-left smart-form" role="search">
        <?php foreach ($search as $key => $item) { ?>
            <div class="form-group">
                <?php
                switch ($item['type']) {
                    case 'input':
                    case 'date':
                        $type = $item['type'];
                        echo $this->template->$type("", "", false, "", "", "$key", $item['note']);
                        break;
                    case 'select2':
                        $type = $item['type'];
                        echo $this->template->$type("", "", false, "", "", "$key", "", $item['data']);
                        break;
                }
                ?>
            </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary" onclick="reload()">
            搜索
        </button>
        <?php if($exportUrl){?>
        <button type="submit" class="btn btn-primary" onclick="csvExport()">
            导出
        </button>
        <?php } ?>
    </div>
</div>
<table id="example" class="table table-bordered">
    <thead>
    <tr>
        <?php foreach ($showColumn as $key => $name) { ?>
            <th><?php echo $name; ?></th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<script>
    var mytable = {};
    $(document).ready(function () {
        mytable = $('#example').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            "iDisplayLength": <?php echo $pageSize?>,//默认每页数量
            "bLengthChange": false,
            "sAjaxSource": '<?php echo $sAjaxSource; ?>',
            "bSort": false, //排序功能
            "bFilter": false,
            "fnServerParams": function (aoData) {
                <?php foreach ($search as $key => $item) { ?>
                aoData.push({name: '<?php echo $key; ?>', value: $('#<?php echo $key; ?>').val()});
                <?php } ?>
            },
            "aoColumns": [
                <?php foreach ($showColumn as $key => $name) { ?>
                {"mDataProp": "<?php echo $key; ?>", "sClass": "center"},
                <?php } ?>
            ],
            "oLanguage": { // 国际化配置
                "sProcessing": "正在获取数据，请稍后...",
                "sLengthMenu": "显示 _MENU_ 条",
                "sZeroRecords": "没有找到数据",
                "sInfo": "从 _START_ 到  _END_ 条记录 总记录数为 _TOTAL_ 条",
                "sInfoEmpty": "记录数为0",
                "sInfoFiltered": "(全部记录数 _MAX_ 条)",
                "sInfoPostFix": "",
                "sSearch": "搜索",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "第一页",
                    "sPrevious": "上一页",
                    "sNext": "下一页",
                    "sLast": "最后一页"
                }
            },
        });
    });
    function reload() {
        mytable.fnDraw();
    }
    <?php if($exportUrl){?>
        function csvExport() {
            <?php
            $query="";
            foreach ($search as $key => $item) { ?>
                var <?php echo $key; ?> =$('#<?php echo $key; ?>').val();
                <?php $query.=$key.'="+'.$key.'+"&';?>
            <?php } ?>
            location.href = "<?php echo $exportUrl?>?<?php echo $query;?>" ;
        }
    <?php }?>
</script>
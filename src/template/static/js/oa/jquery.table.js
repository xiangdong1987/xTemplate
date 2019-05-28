/**
 * Created by Administrator on 2016/9/7.
 */
if ($('#addtab').length == 0) {
    (function() {
        $('#main').append('<div id="addtab" title=""> </div>');
    })();
}


jQuery.fn.extend({
    table: function(options){
        var defaults = {
            width: 1200,
            height: 600,
            field: '',
            componment: '',
            dataParams: '',
            url: '',
            alert_col: '',
            table_title:'',
            origin_row : 2
        };

        var settting = $.extend({}, defaults, options);
        this.click(function(){
            var params = {};
            if (settting.dataParams !== '') {
                $.each(settting.dataParams, function(k,v){
                    if (v instanceof Object) {
                        params[k] = v.val();
                    } else {
                        params[k] = v;
                    }
                });
            }

            settting.componment = $('#addtab').dialog({
                autoOpen : false,
                width : settting.width,
                height:settting.height,
                resizable : false,
                modal : true,
                title: settting.title,
                buttons : [{
                    html : "<i class='fa fa-times'></i>&nbsp; 清空",
                    "class" : "btn btn-default",
                    click : function() {
                        $(this).dialog("close");
                    }
                }, {
                    html : "<i class='fa fa-plus'></i>&nbsp; 添加",
                    "class" : "btn btn-danger",
                    click : function() {
                        var td = '';
                        $.each($("input[name='checkbox']:checked"), function(k, v){
                            td = '<tr><td>'+(k+1)+'</td>' +
                                '<td>'+$(v).val()+'<input type="hidden" name="asset_num[]" value="'+$(v).val()+'" class="asset_num"></td>';
                            for (var i = 0; i < settting.origin_row -1; i++) {
                                td += '<td><label class="input" > ' +
                                        '<input type="text" name="asset_remark[]" value="" style="width: 100%">' +
                                    '</label></td>';
                            }
                            td += '<td><a class="table-remove">删除</a></td>';
                            td += '</tr>';
                            $('#table').find('tbody').append(td);
                        });
                        $(this).dialog("close");
                    }
                }]
            });

            $.post(
                settting.url,
                params,
                function(data){
                    if (data.code == 400) {
                        alert(data.msg);
                        return false;
                    }
                    //已存在asset_num剔除
                    var exist_asset = [];
                    $.each($('.asset_num'), function(k, v){
                        exist_asset.push($(v).val())
                    });

                    var html = gen_table_header(settting.table_title);
                    html += '<tr><thead><th><label class="checkbox"><input type="checkbox" id="checkbox-all"><i></i> </label></th>';
                    $.each(settting.alert_col, function (k,v) {
                        html += '<th>'+v+'</th>';
                    });
                    html += "</tr></thead>";

                    html += '<tbody>';
                    var i = 0;
                    $.each(data.data.list, function(k, v){
                        html += '<tr>';
                        i = 0 ;
                        $.each(settting.alert_col, function(_field){
                            if (i == 0) {
                                if (exist_asset.indexOf(v[_field]) !== -1) return false;
                                html += '<td><label class="checkbox"><input type="checkbox" ' +
                                    ' value="'+v[_field]+'" name="checkbox"> <i></i> </label></td>';
                            }
                            html += '<td>'+v[_field]+'</td>';
                            i++;
                        })
                        html += '</tr>';
                    });
                    html += '</tbody>';
                    html += gen_table_footer();
                    settting.componment.dialog("open");
                    $('#addtab').empty();
                    $('#addtab').append(html);
                    $('#checkbox-all').click(function(){
                        var bool = $(this).prop("checked");
                        $("input[name='checkbox']").prop('checked', bool);
                    });

                },
                'json'
            );

        });
    }

});

function gen_table_header(title)
{
    var str = '<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-3" data-widget-editbutton="false">' +
        ' <header><span class="widget-icon"><i class="fa fa-table"></i></span><h2>'+title+'</h2></header>' +
        '<div style="padding: 40px;"><table class="table table-bordered table-striped table-condensed table-hover smart-form has-tickbox">';

    return str;
}


function gen_table_footer()
{
    var str = "</table></div></div>";

    return str;
}

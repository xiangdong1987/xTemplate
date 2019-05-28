/**
 * Created by Administrator on 2016/9/7.
 */
if ($('#addtab').length == 0) {
    (function() {
        $('#main').append('<div id="addtab" title=""> </div>');
    })();
}
window.real_assets = {};
(function($, window, document){
    var Cart = function(ele, opt){
        this.$element = ele;
        this.defaults = {};
        this.options = $.extend({}, this.defaults, opt);
        this.$dialog = $('#addtab')
        this.dialog = this.$dialog.dialog({
            autoOpen : false,
            width : 1400,
            height:800,
            resizable : false,
            modal : true,
            title: this.options.title,
            buttons : [{
                html : "<i class='fa fa-times'></i>&nbsp; 清空",
                "class" : "btn btn-danger",
                click : function() {
                    $(this).dialog("close");
                }
            }, {
                html : "<i class='fa fa-plus'></i>&nbsp; 添加到实发列表",
                "class" : "btn btn-success",
                click : function() {
                    var show_asset = [];
                    $.each($('#real_table').find('tbody').find('tr'), function(i, v){
                        show_asset.push($(v).find('input:hidden').val());
                    });

                    var td = '';
                    var i = 0;
                    $.each(window.real_assets, function(k, v){
                        if (show_asset.indexOf(k) == -1) {
                            td = '<tr><td>'+(i+1)+'</td>' +
                                '<td>'+k+'<input type="hidden" name="asset_num[]" value="'+k+'" class="asset_num"></td>';
                            td += '<td><label class="input" > ' +
                                '<input type="text" name="remark[]" value="" style="width: 100%">' +
                                '</label></td>';
                            td += '<td><label class="select">' +
                                '<select name="use_info[]" style="100%"><option value="2" selected>私用</option><option value="1" >公用</option></select>' +
                                '<i></i> </label></td>';
                            td += '<td><a class="table-remove" data-value="'+k+'">删除</a></td>';
                            td += '</tr>';
                            $('#real_table').find('tbody').append(td);
                            i++;
                        }
                    });
                    $('.table-remove').click(function(){
                        delete window.real_assets[$(this).attr('data-value')]
                        $(this).parent('td').parent('tr').remove();
                    });
                    $(this).dialog("close");
                }
            }]
        });



    };

    Cart.prototype = {
        register:function(){
            var that = this;
            this.$element.click(function(){
                var me = that;
                $.each($('#real_table').find('tbody').find('tr'), function(i, v){
                    window.real_assets[$(v).find('input:hidden').val()] = [];
                });
                $.post(
                    '/asset/ajaxAsset',
                    {existAsset:window.real_assets},
                    function (data) {
                        var html = "";
                        html += genFramework();
                        me.dialog.dialog("open");
                        me.$dialog.empty();
                        me.$dialog.append(html);
                        $('#dialog_asset_list').append(data.data.html);
                        $('#choice_list').append(gen_table_header('已选列表')+'<tbody></tbody>'+gen_table_footer());
                        $('.always_asset').click(function(){
                            var tbody = '';
                            $.each(window.real_assets, function(k, v){
                                if (v.length != 0) {
                                    tbody += '<tr>';
                                    $.each(v, function(k, v){
                                        tbody += '<td>'+v+'</td>'
                                    })
                                    tbody += '<td><a data-value="'+k+'" class="choice_asset_remove">删除</a></td>'
                                    tbody += '</tr>';
                                }

                            });
                            $('#choice_list').find('tbody').empty();
                            $('#choice_list').find('tbody').append(tbody);
                            $('.choice_asset_remove').click(function(){
                                delete window.real_assets[$(this).attr('data-value')]
                                $(this).parents('tr').remove();
                            }) ;
                        });
                    },
                    'json'
                );

            });
        },

    };

    $.fn.assetCart = function(options){
        var cart = new Cart(this, options);
        cart.register();
        return;
    };

    function genFramework(){

        return '<div class="row">' +
                    '<div class="col-sm-12">' +
                        '<div class="padding-10">' +
                        '<ul class="nav nav-tabs tabs-pull-left">' +
                                '<li class="active"> <a href="#dialog_asset_list" data-toggle="tab">资产列表</a></li>' +
                                '<li><a href="#choice_list" data-toggle="tab" class="always_asset">已选资产菜单</a></li>' +
                                '<li class="pull-right"><span class="margin-top-10 display-inline"><i class="fa fa-rss text-success"></i></span></li> ' +
                        '</ul>' +
                        '<div class="tab-content padding-top-10"> ' +
                            '<div class="tab-pane fade in active" id="dialog_asset_list"> ' +
                            '</div> ' +
                            '<div class="tab-pane fade" id="choice_list">' +
                            '</div> ' +
                        '</div> ' +
                        '</div> ' +
                    '</div>' +
            ' </div>';
    }



})(jQuery, window, document);
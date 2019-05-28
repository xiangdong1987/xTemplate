/**
 * Created by Administrator on 2016/9/26.
 */
(function(window, $, document){
    if ($('#addtab').length == 0) {
        (function() {
            $('#main').append('<div id="addtab" title=""> </div>');
        })();
    }

    var Modal = function (ele, options) {
        this.$element = ele;
        this.defaults = {
            id : "",
            title: "",
            request : '',
            url : '',
            depend: {}
        };
        this.options = $.extend({}, this.defaults, options);
        this.$dialog = $('#addtab');
    };

    Modal.prototype = {
        select:function () {
            var me = this;
            me.$element.click(function(){
                var request = me._request();
                var dialog = me.$dialog.dialog({
                    autoOpen: false,
                    width: 1200,
                    height: 600,
                    resizable: false,
                    modal: true,
                    title: me.options.title,
                    buttons : [{
                        html : "<i class='fa fa-times'></i>&nbsp; 清空",
                        "class" : "btn btn-default",
                        "id" : "name",
                        click : function() {
                            $("input[id='origin_"+me.options.id+"']").val(0);
                            $("input[id='"+me.options.id+"']").val('');
                            $(this).dialog("close");
                        }
                    }, {
                        html : "<i class='fa fa-plus'></i>&nbsp; 添加",
                        "class" : "btn btn-danger",
                        click : function() {
                            var id = $(".tree input:checked").val();
                            var name = $(".tree input:checked").attr('data-name');
                            $("input[id='origin_"+me.options.id+"']").val(id);
                            $("input[id='"+me.options.id+"']").val(name);
                            $(this).dialog("close");
                        }
                    }]
                });
                $.post(
                    me.options.url,
                    request,
                    function (data) {
                        if (data.code == 400) {
                            alert(data.msg);
                            return false;
                        }
                        dialog.dialog("open");
                        me.$dialog.empty();
                        me.$dialog.append(data.data.html);
                    },
                    'json'
                )
            })
        },
        mselect:function () {
            var me = this;
            me.$element.click(function(){
                var request = me._request();
                var dialog = me.$dialog.dialog({
                    autoOpen: false,
                    width: 1200,
                    height: 600,
                    resizable: false,
                    modal: true,
                    title: me.options.title,
                    buttons : [{
                        html : "<i class='fa fa-times'></i>&nbsp; 清空",
                        "class" : "btn btn-default",
                        "id" : "name",
                        click : function() {
                            $("input[id='origin_"+me.options.id+"']").val(0);
                            $("input[id='"+me.options.id+"']").val('');
                            $(this).dialog("close");
                        }
                    }, {
                        html : "<i class='fa fa-plus'></i>&nbsp; 添加",
                        "class" : "btn btn-danger",
                        click : function() {
                            var id = '';
                            var name = '';
                            $.each($(".tree input:checked"), function(k, v){
                                id += $(v).val() + ',';
                                name += $(v).attr('data-name') + ',';
                            });
                            $("input[id='origin_"+me.options.id+"']").val(id);
                            $("input[id='"+me.options.id+"']").val(name);
                            $(this).dialog("close");
                        }
                    }]
                });
                $.post(
                    me.options.url,
                    request,
                    function (data) {
                        if (data.code == 400) {
                            alert(data.msg);
                            return false;
                        }
                        dialog.dialog("open");
                        me.$dialog.empty();
                        me.$dialog.append(data.data.html);
                    },
                    'json'
                )
            })
        },
        show : function () {
            var me = this;
            me.$element.click(function(){
                var request = me._request();

                var dialog = me.$dialog.dialog({
                    autoOpen: false,
                    width: 1200,
                    height: 600,
                    resizable: false,
                    modal: true,
                    title: me.options.title
                });

                $.post(
                    me.options.url,
                    request,
                    function (data) {
                        if (data.code == 400) {
                            alert(data.msg);
                            return false;
                        }
                        dialog.dialog("open");
                        me.$dialog.empty();
                        me.$dialog.append(data.data.html);
                    },
                    'json'
                )
            });
        },
        table: function () {
            var me = this;
            me.$element.click(function(){
                var dialog = me.$dialog.dialog({
                    autoOpen: false,
                    width: 1400,
                    height: 800,
                    resizable: false,
                    modal: true,
                    title: me.options.title,
                    buttons : [{
                        html : "<i class='fa fa-times'></i>&nbsp; 清空",
                        "class" : "btn btn-default",
                        "id" : "name",
                        click : function() {
                            $('#origin_'+me.options.id).val('');
                            $('#'+me.options.id).val('');
                            $(this).dialog("close");
                        }
                    }, {
                        html : "<i class='fa fa-plus'></i>&nbsp; 添加",
                        "class" : "btn btn-danger",
                        click : function() {
                            var ret_json = [];
                            var $tbody = $('#table-'+me.options.id).find('tbody');
                            var len = $tbody.find('tr').length;
                            if (len == 0) {
                                $('#origin_'+me.options.id).val('');
                                $(this).dialog("close");
                                return false;
                            }
                            $.each($tbody.find('tr'), function(i,v){
                                var obj = {};
                                $.each(me.options.depend.field, function(k, _field){
                                    obj[_field.name] = $(v).find('input[name="'+_field.name+'[]"]').val();
                                });
                                ret_json.push(obj);
                            });
                            $('#origin_'+me.options.id).val(JSON.stringify(ret_json));
                            $(this).dialog("close");
                        }
                    }]
                });
                var data = {};
                if ($('#origin_'+me.options.id).val() != '') {
                    data = JSON.parse($('#origin_'+me.options.id).val());
                }
                var html = genTable(me.options.id, me.options.depend.th);
                dialog.dialog("open");
                me.$dialog.empty();
                me.$dialog.append(html);
                $('.add-instance').addForm({
                    table: $('#table-'+me.options.id),
                    field: me.options.depend.field,
                    data: data
                });
            });
        },
        _request:function(){
            var result = {};
            if (this.options.request == '') {
                return  result;
            }
            $.each(this.options.request, function(k,v){
                if (v instanceof $) {
                    result[k] = v.val();
                } else {
                    result[k] = v;
                }
            });
            return result;
        }
    };

    $.fn.oaModal = function (options) {
        var modal = new Modal(this, options);
        return modal;
    }


})(window, jQuery, document);
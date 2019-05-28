/**
 * Created by Administrator on 2016/9/7.
 */
if ($('#addtab').length == 0) {
    (function () {
        $('#main').append('<div id="addtab" title=""> </div>');
    })();
}
jQuery.fn.extend({
    addForm: function (options) {
        var ID = 1;
        var defaults = {
            field: '',
            table: '',
            init: function(){}
        };
        var settting = $.extend({}, defaults, options);
        _initData();

        this.click(function () {
            initTr();
            settting.init();
        });
        function _initData() {
            for (var i = 0; i < settting.data.length; i++) {
                initTr(settting.data[i]);
            }
        }
        function initTr(value) {
            var td = '';
            var showValue = '';
            td += '<tr><td>' + ID + '</td>';
            for (var i = 0; i < settting.field.length; i++) {
                if (value == undefined) {
                    showValue = ' ';
                } else {
                    showValue = value[settting.field[i].name];
                }
                if (settting.field[i].type == 'select2') {
                    td += '<td><label class="input" > ' + '<input  class=' + settting.field[i].require + ' id="' + settting.field[i].name + "_" + ID + '" type="text" name="' + settting.field[i].name + '[]" value="' + showValue + '" style="width:100%">' + '</label></td>';
                } else if (settting.field[i].type == 'datePick') {
                    td += '<td><label class="input" > ' + '<input  class=' + settting.field[i].require + ' id="' + settting.field[i].name + "_" + ID + '" type="text" name="' + settting.field[i].name + '[]" value="' + showValue + '" style="width:100%">' + '</label></td>';
                } else {
                    td += '<td><label class="input" > ' + '<input  class=' + settting.field[i].require + ' type="text" name="' + settting.field[i].name + '[]" value="' + showValue + '" style="width: 100%">' + '</label></td>';
                }
            }
            td += '<td><a class="table-remove">删除</a></td>';
            td += '</tr>';
            settting.table.find('tbody').append(td);
            $('.table-remove').click(function () {
                $(this).parent('td').parent('tr').remove();
            });
            for (var i = 0; i < settting.field.length; i++) {
                if (settting.field[i].type == 'select2') {
                    // console.log("#" + settting.field[i].name + "_" + ID);
                    $("#" + settting.field[i].name + "_" + ID).select2({
                        data: eval(settting.field[i].select2Data),
                        width: 'resolve'
                    });
                } else if (settting.field[i].type == 'datePick') {
                    $("#" + settting.field[i].name + "_" + ID).datepicker({
                        changeMonth: true,
                        changeYear: true,
                        dateFormat: 'yy-mm-dd',
                        prevText: '<i class="fa fa-chevron-left"></i>',
                        nextText: '<i class="fa fa-chevron-right"></i>',
                    });
                } else {

                }
            }
            ID++;
        }
    },

});

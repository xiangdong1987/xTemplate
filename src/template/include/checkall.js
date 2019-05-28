var $ctrl = function () {}
$ctrl.prototype = {
    checkall: function ($checked, $name) {
        $("input[name='" + $name + "[]']").prop('checked', $checked);
    },
    getchecks: function ($name) {
        var ids = new Array();
        $("input[name='" + $name + "[]']").each(function (i, n) {
            if ($(this).is(':checked')) {
                ids.push($(n).val());
            }
        })
        return ids.toString();
    },
    submit: function ($url, $name) {
        var $ids = $chk_ctrl.getchecks($name);
        if (!$ids) {

        }
    }
}
var $c = new $ctrl();

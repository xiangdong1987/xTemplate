var $ctrl = function () {
}
$ctrl.prototype = {
    checkAll: function ($checked, $name) {
        $("input[name='" + $name + "[]']").prop('checked', $checked);
    },
    getChecks: function ($name) {
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
    },
    initAlert: function () {
        $("[alert]").click(function (e) {
            var $href = $(this).attr('href');
            $.SmartMessageBox({
                title: "警告",
                content: $(this).attr('alert'),
                buttons: '[否][是]'
            }, function (ButtonPressed) {
                if (ButtonPressed === "是") {
                    window.location.href = $href;
                }
            });
            e.preventDefault();
        })
    }
}
$ctrl.initAlert();


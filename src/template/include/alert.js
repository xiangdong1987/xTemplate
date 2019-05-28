$("[confirm]").click(function (e) {
        var $href = $(this).attr('href'), $form = $(this).parents('form');
        var $params = {
            title: "警告",
            content: $(this).attr('confirm'),
            buttons: '[否][是]'
        };
        if ($(this).attr('confirm_select')) {
            $params['input'] = 'select';
            $params['options'] = $(this).attr('confirm_select');
        }
        if ($(this).attr('must_select') && !$form.find('input:checked').length) {
            faild_alert('请选择要操作的记录');
            return;
        }
        var $confirm_select_name = $(this).attr('confirm_select_name');
        if ($(this).attr('confirm')) {
            $.SmartMessageBox($params, function (ButtonPressed, Value) {
                if (ButtonPressed === "是") {
                    if ($href.substr(0, 7) === 'submit:') {
                        $form.prop('action', $href.substr(7));
                        if ($confirm_select_name) {
                            $form.find("[name='" + $confirm_select_name + "']").val(Value);
                        }
                        $form.submit();
                    } else {
                        window.location.href = $href;
                    }
                }
            });
        } else {
            if ($href.substr(0, 7) === 'submit:') {
                $form.prop('action', $href.substr(7));
                if ($confirm_select_name) {
                    $form.find("[name='" + $confirm_select_name + "']").val(Value);
                }
                $form.submit();
            } else {
                window.location.href = $href;
            }
        }
        e.preventDefault();
    }
)
;
$("[alert]").click(function (e) {
    var $href = $(this).attr('href'), $form = $(this).parents('form');
    $.SmartMessageBox({
        title: "警告",
        content: $(this).attr('alert'),
        buttons: '[确定]'
    });
    e.preventDefault();
});
function faild_alert($msg) {
    $.smallBox({
        title: "提示",
        content: "<i class='fa fa-clock-o'></i> <i>" + $msg + "</i>",
        color: "#C46A69",
        iconSmall: "fa fa-times fa-2x fadeInRight animated",
        timeout: 4000
    });
}
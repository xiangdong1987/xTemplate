/**
 * Created by xiangdong on 16/11/28.
 */
(function (global) {

    function Xbutton(url, data, msg, moveTo, callback) {
        var _this = this;
        this.msg = msg;
        this.flag = false;
        this.url = url;
        this.data = data;
        this.callback = callback;
        $.ajax({
            type: 'POST',
            url: this.url,
            data: this.data,
            async: false,
            success: function (result) {
                var result = JSON.parse(result);
                if (result.code == 200) {
                    (_this.callback && typeof(_this.callback) === "function") && _this.callback();
                    if (moveTo) {
                        alert(_this.msg);
                        if(result.data.moveTo){
                            window.location.href = result.data.moveTo;
                        }else{
                            window.location.href = moveTo;
                        }
                    } else {
                        this.flag = true;
                    }
                } else {
                    if (msg) {
                        alert(result.msg);
                    } else {
                        this.flag = false
                    }
                }
            },
        });
    }

    global.Xbutton = Xbutton;
})(window);

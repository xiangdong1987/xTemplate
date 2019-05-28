<script src="/src/template/static/js/plugin/dropzone/dropzone.js"></script>
<section<?php echo isset($col) && $col ? ' class="col col-' . $col . '"' : '' ?>>
    <label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>

    <div class="dropzone dropzone-previews" id="<?= $name; ?>-dropzone"></div>
    <input type="hidden" name="<?php echo $name ?>" id="<?php echo $name ?>"
           value='<?php echo $val; ?>'>
</section>
<script>
    Dropzone.autoDiscover = false;
    (function (window, $) {
        var maxFiles = "<?php echo $maxfile;?>";
        var dropzone_id = "<?php echo $name;?>" + '-dropzone';
        var input_id = "<?php echo $name;?>";
        var type = "<?php echo $type;?>";
        var apply_id = "<?php echo $apply_id;?>";
        var obj = <?php echo $obj;?>;
        var Dropzone = $('#' + dropzone_id).dropzone({
            url: "/common/uploadFile?type=" + type + "&id=" + apply_id,
            dictResponseError: '文件上传失败!',
            addRemoveLinks: true,
            maxFiles: maxFiles,
            init: function () {
                var mockFile = obj;
                var drop = this;
                if (mockFile.length != 0) {
                    $.each(mockFile, function (key, item) {
                        drop.files.push(item);
                        drop.emit('addedfile', item);
                        drop.emit("thumbnail", item, item.path);
                    });
                }

                this.on("success", function (file, response) {
                    data = JSON.parse(response);
                    if (data.code == 0) {
                        var imgs = $('#' + input_id).val();
                        if (imgs) {
                            imgs = imgs + "," + data.file.name;
                        } else {
                            imgs = data.file.name;
                        }
                        $('#' + input_id).val(imgs);
                        $(file.previewElement).find('[data-dz-name]').html(data.file.name);
                        file.previewElement.classList.add("dz-success");
                    } else {
                        file.previewElement.classList.add("dz-error");
                        file.previewElement.querySelector("[data-dz-errormessage]").textContent = data.error;
                    }
                });

            },
            removedfile: function (file) {
                var name = file.path;
                $.ajax({
                    type: 'POST',
                    url: '/common/delete',
                    data: "name=" + name,
                    dataType: 'html'
                });
                var imgs = $('#' + input_id).val();
                imgs = imgs.split(',');
                var result = '';
                $.each(imgs, function (k, v) {
                    if (v != name) {
                        result = result + v + ',';
                    }
                });
                $('#' + input_id).val(result);
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            maxfilesexceeded: function () {
                alert('上传数量超过了限定数量！');
                return false;
            }
        });
    })(window, jQuery);

</script>
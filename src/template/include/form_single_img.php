<section>
    <label class="label"><?php echo $title . ($need ? " <font color='red'>★</font>" : "") ?></label>

    <div class="input input-file">
        <span class="button">
        <input id="upload<?php echo $name;?>" type="file" id="file" name="<?php echo $name ?>File">Browse</span>
        <input id="videos" name="<?php echo $name ?>" type="text" placeholder="Include some files" value="<?php echo $val; ?>">
    </div>
</section>
<section>
        <img id="img<?php echo $name ?>" src="<?php echo $val?$val:""; ?>" width="40" height="40">
</section>
<script>
    $(document).ready(function () {
        $("input[name=<?php echo $name ?>File]").change(function () {
            uploadFile();
        });
        //上传文件
        function uploadFile() {
            var client = new XMLHttpRequest();
            var file = document.getElementById("upload<?php echo $name ?>");
            var formData = new FormData();
            formData.append("file", file.files[0]);
            client.open("post", "/Common/uploadFile?type=1", true);
            client.send(formData);
            client.onreadystatechange = function () {
                if (client.readyState == 4 && client.status == 200) {
                    var result = JSON.parse(client.responseText);
                    if (result.code == 0) {
                        $("input[name=<?php echo $name ?>]").val(result.file.name);
                        $("#img<?php echo $name ?>").attr("src",result.file.name);
                        alert("上传成功");
                    } else {
                        alert("上传失败");
                    }
                }
            }
        }
    });
</script>
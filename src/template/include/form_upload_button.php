<div style="display:inline-block; " >
    <form  method="post" enctype="multipart/form-data" id="formImport_detail">
        <label for="uploadFile_<?=$id;?>" class="btn btn-primary"><?=$name;?></label>
        <input  type="file" name="<?=$file_name;?>" id="uploadFile_<?=$id;?>" onchange="submitImport_<?=$id;?>()" style="display:none" />
    </form>
</div>
<script>
    function submitImport_<?=$id;?>(){
        var epath = $('#uploadFile_<?=$id;?>').val();

        if(epath==""){
            alert( '导入文件不能为空!');
            return;
        }

        /*        if(epath.substring(epath.lastIndexOf(".") + 1).toLowerCase()=="xlsx"){
         alert( '03以上版本Excel导入暂不支持!');
         return;
         }*/
        if (epath.substring(epath.lastIndexOf(".") + 1).toLowerCase()!="xls" &&
            epath.substring(epath.lastIndexOf(".") + 1).toLowerCase()!="xlsx") {
            alert( '导入文件类型必须为excel!');
            return;
        }
        $.ajaxFileUpload({
            type: "post",
            secureuri: false, //是否需要安全协议，一般设置为false
            fileElementId: 'uploadFile_<?=$id;?>', //文件上传域的ID
            dataType: "json",  // 'xml', 'script', or 'json' (expected server response type)
            url: "<?=$upload_url;?>",
            success: function (data) {
                if (data.code == 200) {
                    alert(data.data);
                    window.location.href = "<?=$return_url;?>";
                } else {
                    alert(data.msg);
                }
            },
            error: function (msg) {
                alert("文件上传失败");
            }
        });
    }
</script>
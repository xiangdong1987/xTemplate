<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/6/28
 * Time: 17:45
 */
function upload($form)
{
    $form->setDecorate(new \Component\XUpload("图片上传", "", "imgs", "只能上传jpg/png文件，且不超过500kb", "http://local.admin.com/element.php?controller=upload&action=uploadImg"));
}

function uploadImg()
{
    //判断上传的文件是否出错,是的话，返回错误
    if ($_FILES["file"]["error"]) {
        echo $_FILES["file"]["error"];
    } else {
        //没有出错
        //加限制条件
        //判断上传文件类型为png或jpg且大小不超过1024000B
        if (($_FILES["file"]["type"] == "image/png" || $_FILES["file"]["type"] == "image/jpeg") && $_FILES["file"]["size"] < 1024000) {
            //防止文件名重复
            $filename = "./img/" . $_FILES["file"]["name"];
            //检查文件或目录是否存在
            if (file_exists($filename)) {
                echo "该文件已存在";
            } else {
                //保存文件,   move_uploaded_file 将上传的文件移动到新位置
                move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
                //将临时地址移动到指定地址
                $result['name'] = $_FILES["file"]["name"];
                $result['url'] = "http://local.admin.com/" . $filename;
                die(json_encode($result));
            }
        } else {
            echo "文件类型不对";
        }
    }
}

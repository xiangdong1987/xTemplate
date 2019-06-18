<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/6/10
 * Time: 10:10
 */
/**
 * @param $form \Component\XTemplate
 */
function input($form)
{
    $form->setDecorate(new \Component\XInput("", "空input", "", "", "", "test1", "请输入内容"));
    $form->setDecorate(new \Component\XInput("", "有值input", "", "", "test2", "test2", ""));
    $form->setDecorate(new \Component\XInput("", "只读", "", "", "test2", "test3", "", true));
    $form->setDecorate(new \Component\XInput("", "密码", "", "", "test2", "test4", "", false, true));
    $form->setDecorate(new \Component\XInput("", "可清除", "", "", "test2", "test5", "", false, false, true));
    $form->setDecorate(new \Component\XInput("", "有Icon", "", "el-icon-search", "test2", "test6", ""));
    $form->setDecorate(new \Component\XInputNumber("数字Input", 1, "in", "", 1, 10));
    $form->setDecorate(new \Component\XInputNumber("不可用", 1, "in1", "", 1, 10, 1, false, 0, true));
    $form->setDecorate(new \Component\XInputNumber("严格步数", 1, "in2", "", 1, 10, 2, true));
    $form->setDecorate(new \Component\XInputNumber("精度", 1, "in3", "", 1, 10, 0.1, false, 2));
    $form->setDecorate(new \Component\XInputNumber("大小", 1, "in4", "", 1, 10, 0.1, false, 2,false,2));
}

<?php
include "./../vendor/autoload.php";
$menus = [
    [
        'icon' => "el-icon-edit",
        'name' => "表单",
        'url' => "",
        'sub_menus' => [
            [
                'icon' => "",
                'name' => "INPUT",
                'url' => "http://local.admin.com/element.php?controller=form",
                'controller' => "form",
                'view' => "input",
                'get' => ""
            ],
        ]
    ]
];
$root = new \Component\ElementTemplate();
$root->setDecorate(new \Component\XMainHeader());
$root->setDecorate(new \Component\XLeftMenu("form", "input", $menus));
$main = new \Component\XMainContent("表单");
$rules["test1"] = [
    ["required" => true, "message" => '该字段是必填字段', "trigger" => 'blur'],
    ["min" => 3, "max" => 5, "message" => '长度在 3 到 5 个字符', "trigger" => 'blur'],
];
$form = new \Component\XForm("表单", 'form1', "", "", $rules);
$root->setDecorate($main);
$main->setDecorate($form);
$form->setDecorate(new \Component\XInput("", "空input", "", "", "", "test1", "请输入内容"));
$form->setDecorate(new \Component\XInput("", "有值input", "", "", "test2", "test2", ""));
$form->setDecorate(new \Component\XInput("", "只读", "", "", "test2", "test3", "", true));
$form->setDecorate(new \Component\XInput("", "密码", "", "", "test2", "test4", "", false, true));
$form->setDecorate(new \Component\XInput("", "可清除", "", "", "test2", "test5", "", false, false, true));
$form->setDecorate(new \Component\XInput("", "有Icon", "", "el-icon-search", "test2", "test6", ""));
$root->setDecorate(new \Component\XMainFooter());
$root->show($root);
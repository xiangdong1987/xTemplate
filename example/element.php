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
                'url' => "http://local.admin.com/element.php?controller=input",
                'controller' => "input",
                'view' => "input",
                'get' => ""
            ],
            [
                'icon' => "",
                'name' => "SELECT",
                'url' => "http://local.admin.com/element.php?controller=select",
                'controller' => "select",
                'view' => "select",
                'get' => ""
            ],
            [
                'icon' => "",
                'name' => "RADIO",
                'url' => "http://local.admin.com/element.php?controller=radio",
                'controller' => "radio",
                'view' => "radio",
                'get' => ""
            ],
            [
                'icon' => "",
                'name' => "TIMEPICKER",
                'url' => "http://local.admin.com/element.php?controller=timepicker",
                'controller' => "timepicker",
                'view' => "timepicker",
                'get' => ""
            ],
        ]
    ]
];
$controller = $_GET['controller'];
$root = new \Component\ElementTemplate();
$root->setDecorate(new \Component\XMainHeader());
$root->setDecorate(new \Component\XLeftMenu($controller, $controller, $menus));
$main = new \Component\XMainContent("表单","http://local.admin.com/element.php?controller=input",$controller);
$rules["test1"] = [
    ["required" => true, "message" => '该字段是必填字段', "trigger" => 'blur'],
    ["min" => 3, "max" => 5, "message" => '长度在 3 到 5 个字符', "trigger" => 'blur'],
];
$form = new \Component\XForm("表单", 'form1', "", "", $rules);
$root->setDecorate($main);
$main->setDecorate($form);
//引入测试文件
include_once "$controller.php";
call_user_func($controller, $form);
$root->setDecorate(new \Component\XMainFooter());
$root->show($root);

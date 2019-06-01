<?php
include "./../vendor/autoload.php";
$menus = [];
$root = new \Component\ElementTemplate();
$root->setDecorate(new \Component\XMainHeader());
$root->setDecorate(new \Component\XLeftMenu("main", "index", $menus));
$main = new \Component\XMainContent("表单");
$form = new \Component\XForm("表单", 'form1', "", "");
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
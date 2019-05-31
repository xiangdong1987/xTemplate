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
$form->setDecorate(new \Component\XInput("", "测试", "", "", "test", "test", ""));
$root->setDecorate(new \Component\XMainFooter());
$root->show($root);



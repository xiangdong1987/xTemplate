<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/29
 * Time: 17:01
 */

function form()
{
    $menus = [
        [
            'icon' => "fa-group",
            'name' => "主菜单",
            'url' => "",
            'sub_menus' => [
                [
                    'icon' => "",
                    'name' => "表单",
                    'url' => "?controller=form",
                    'controller' => "main",
                    'view' => "index",
                    'get' => ""
                ],
                [
                    'icon' => "",
                    'name' => "子菜单2",
                    'url' => "",
                    'controller' => "main",
                    'view' => "index2",
                    'get' => ""
                ]
            ]
        ]
    ];
    decorateShow($menus);
}

function decorateShow($menus)
{
    $mainHeader = new \Component\XMainHeader();
    $mainHeader->setRoot();
    $mainHeader->setDecorate(new \Component\XTopMenu("", "测试页面", "测试", "test", "http://www.baidu.com"));
    $mainHeader->setDecorate(new \Component\XLeftMenu("main", "index", $menus));
    $mainContent = new \Component\XMainContent("表单");
    $form = new \Component\XForm("表单", "test", "Post", "");
    $fieldSet = new \Component\XFieldSet();
    $fieldSet->setDecorate(new \Component\XInput("", "输入框", "", "", "", "input", "输入框"));
    $fieldSet->setDecorate(new \Component\XSelect2("", "下拉框", true, "", "1", "status", "", [0 => "请选择", 1 => "选择1", 2 => "选择2"]));
    $fieldSet->setDecorate(new \Component\XCheckBox("", "复选框", false, "", [1, 2], "", [0 => "请选择", 1 => "选择1", 2 => "选择2"], ""));
    $fieldSet->setDecorate(new \Component\XRadio("", "单选框", false, "", "1", "radio_test", [0 => "请选择", 1 => "选择1", 2 => "选择2"], ""));
    $form->setDecorate($fieldSet);
    $fieldSet1 = new \Component\XFieldSet();
    $fieldSet1->setDecorate(new \Component\XDate(6, "日期", false, "", "", "date", ""));
    $fieldSet1->setDecorate(new \Component\XDateTime(6, "日期", false, "", "", "date", ""));
    $form->setDecorate($fieldSet1);
    $fieldSet2 = new \Component\XFieldSet();
    $fieldSet2->setDecorate(new \Component\XTextArea("", "文本框", false, "", "文本框", "", "", 5));
    $fieldSet2->setDecorate(new \Component\XSingleImg("", "单图片上传", false, "", "", "img", ""));
    $fieldSet2->setDecorate(new \Component\XDropZone("", "图片上传", false, "", "", "{}", "", 1, "", ""));
    $form->setDecorate($fieldSet2);
    $mainContent->setDecorate($form);
    $mainHeader->setDecorate($mainContent);
    $mainHeader->setDecorate(new \Component\XMainFooter());
    $mainHeader->show();
}

function normalShow($menus)
{
    $path = dirname(__DIR__);
    $template = new \Component\Template($path . "/src/template/");
    echo $template->mainHeader();
    echo $template->topMenu("", "测试页面", "测试", "test", "http://www.baidu.com");
    echo $template->leftMenu("main", "index", $menus);
    echo $template->mainStart("表单");
    echo $template->formStart("表单", "test", "Post", "");
    echo $template->fieldsetS();
    echo $template->input("", "输入框", "", "", "", "input", "输入框");
    echo $template->select2("", "下拉框", true, "", "1", "", "", [0 => "请选择", 1 => "选择1", 2 => "选择2"]);
    echo $template->checkbox("", "复选框", false, "", "1", "", [0 => "请选择", 1 => "选择1", 2 => "选择2"], "");
    echo $template->radio("", "单选框", false, "", "1", "radio_test", [0 => "请选择", 1 => "选择1", 2 => "选择2"], "");
    echo $template->fieldsetE();
    echo $template->fieldsetS();
    echo $template->date(6, "日期", false, "", "", "date", "");
    echo $template->datetime(6, "带时间日期", false, "", "", "datatime", "");
    echo $template->fieldsetE();
    echo $template->fieldsetS();
    echo $template->textArea("", "文本框", false, "", "文本框", "", "", 5);
    echo $template->singleImg("", "单图片上传", false, "", "", "img", "");
    echo $template->dropZone("", "图片上传", false, "", "", "{}", "", 1, "", "");
    echo $template->fieldsetE();
    echo $template->formEnd();
    echo $template->mainEnd();
    echo $template->mainFooter();
}
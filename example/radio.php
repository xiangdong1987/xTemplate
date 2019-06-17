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
function radio($form)
{
    $form->setDecorate(new \Component\XRadio("普通", 1, "r1", ["1" => "备选项", "2" => "备选项"]));
    $form->setDecorate(new \Component\XRadio("禁用", 2, "r2", ["1" => "备选项", "2" => "备选项"], 1, 1, false, true));
    $form->setDecorate(new \Component\XRadio("样式2", 2, "r3", ["1" => "备选项", "2" => "备选项"], 2, 1));
    $form->setDecorate(new \Component\XRadio("样式3", 2, "r4", ["1" => "备选项", "2" => "备选项"], 1, 1, true));
    $form->setDecorate(new \Component\XRadio("小号", 2, "r5", ["1" => "备选项", "2" => "备选项"], 1, 2, true));
    $form->setDecorate(new \Component\XRadio("迷你", 2, "r6", ["1" => "备选项", "2" => "备选项"], 1, 3, true));
    $form->setDecorate(new \Component\XDivider("CheckBox", 2));
    $form->setDecorate(new \Component\XCheckBox("普通", [1, 3], "c1", ["1" => "备选项1", "2" => "备选项2", "3" => "备选项3"], 1));
    $form->setDecorate(new \Component\XCheckBox("禁用", [1, 3], "c2", ["1" => "备选项1", "2" => "备选项2", "3" => "备选项3"], 1, 1, false, true));
    $form->setDecorate(new \Component\XCheckBox("样式2", [1, 3], "c2", ["1" => "备选项1", "2" => "备选项2", "3" => "备选项3"], 2, 1, true));
    $form->setDecorate(new \Component\XCheckBox("样式3", [1, 3], "c2", ["1" => "备选项1", "2" => "备选项2", "3" => "备选项3"], 1, 1));
    $form->setDecorate(new \Component\XCheckBox("小号", [1, 3], "c2", ["1" => "备选项1", "2" => "备选项2", "3" => "备选项3"], 1, 2, true));
    $form->setDecorate(new \Component\XCheckBox("迷你", [1, 3], "c2", ["1" => "备选项1", "2" => "备选项2", "3" => "备选项3"], 1, 3, true));

}

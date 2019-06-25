<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/6/10
 * Time: 10:31
 */
/**
 * @param $form \Component\XTemplate
 */
function timepicker($form)
{
    $form->setDecorate(new \Component\XTimePicker("任意时间", "st1", date("Y-m-d H:i:s", strtotime("18:40:00")), "18:30:00", "20:30:00", "任意时间"));
    $form->setDecorate(new \Component\XTimePicker("箭头选择", "st2", date("Y-m-d H:i:s", strtotime("18:40:00")), "18:30:00", "20:30:00", "箭头选择", ['arrow_control' => true]));
    $form->setDecorate(new \Component\XTimePicker("时间范围", "st3", [date("Y-m-d H:i:s", strtotime("08:40:00")), date("Y-m-d H:i:s", strtotime("09:40:00"))], "", "", "任意时间", [
        'is_range' => true,
    ]));
    $form->setDecorate(new \Component\XTimePicker("箭头选择", "st4", [date("Y-m-d H:i:s", strtotime("08:40:00")), date("Y-m-d H:i:s", strtotime("09:40:00"))], "", "", "箭头选择", [
        'is_range' => true,
        'arrow_control' => true,
    ]));
}

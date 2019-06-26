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
    $form->setDecorate(new \Component\XDatePicker("日期选择", "d1", date("Y-m-d"), "", "", "date", "日期选择"));
    $form->setDecorate(new \Component\XDatePicker("选择周", "d2", date("Y-m-d"), "", "", "week", "选择周", [
        'format' => "yyyy 第 WW 周"
    ]));
    $form->setDecorate(new \Component\XDatePicker("选择月", "d3", date("Y-m-d"), "", "", "month", "选择月"));
    $form->setDecorate(new \Component\XDatePicker("选择年", "d4", date("Y-m-d"), "", "", "year", "选择年"));
    $form->setDecorate(new \Component\XDatePicker("范围月", "d5", [date("Y-m-d", strtotime("2019-08")), date("Y-m-d", strtotime("2019-09"))], "", "", "monthrange", "范围月", [
        'range_separator' => "至",
        'start_placeholder' => "开始月份",
        'end_placeholder' => "结束月份",
    ]));
    $form->setDecorate(new \Component\XDatePicker("日期时间", "d6", "", "", "", "datetime", "日期时间",[
        'default_time'=>"12:00:00"
    ]));
    $form->setDecorate(new \Component\XDatePicker("日期时间", "d7", "", "", "", "datetimerange", "日期时间",[
        'range_separator' => "至",
        'start_placeholder' => "开始月份",
        'end_placeholder' => "结束月份",
    ]));
}

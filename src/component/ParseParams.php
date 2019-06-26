<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/6/24
 * Time: 15:31
 */

namespace Component;


class ParseParams
{
    static function getParams($params)
    {
        $result = [];
        //只读
        if (isset($params['ifReadOnly'])) {
            $result['ifReadOnly'] = $params['ifReadOnly'];
        }
        //是否密码
        if (isset($params['ifPassword'])) {
            $result['ifPassword'] = $params['ifPassword'];
        }
        //是否可清除
        if (isset($params['ifClear'])) {
            $result['ifClear'] = $params['ifClear'];
        }
        //多级菜单展开方式
        if (isset($params['expandTrigger'])) {
            switch ($params['expandTrigger']) {
                case "hover":
                    break;
                default:
                    $params['expandTrigger'] = "click";
            }
            $result['expandTrigger'] = $params['expandTrigger'];
        }
        //时间选择器 箭头控制
        if (isset($params['arrow_control'])) {
            $result['arrow_control'] = $params['arrow_control'];
        }
        //时间选择器 范围选择
        if (isset($params['is_range'])) {
            $result['is_range'] = $params['is_range'];
        }
        //日期选择格式
        if (isset($params['format'])) {
            $result['format'] = $params['format'];
        }
        //范围选择
        if (isset($params['range_separator'])) {
            $result['range_separator'] = $params['range_separator'];
        }
        //范围选择
        if (isset($params['start_placeholder'])) {
            $result['start_placeholder'] = $params['start_placeholder'];
        }
        //范围选择
        if (isset($params['end_placeholder'])) {
            $result['end_placeholder'] = $params['end_placeholder'];
        }
        //日期选择格式
        if (isset($params['value_format'])) {
            $result['value_format'] = $params['value_format'];
        }
        //日期选择格式
        if (isset($params['default_time'])) {
            $result['default_time'] = $params['default_time'];
        }
        return $result;
    }
}

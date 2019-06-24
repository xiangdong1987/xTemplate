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
        if (isset($params['expandTrigger'])) {
            switch ($params['expandTrigger']) {
                case "hover":
                    break;
                default:
                    $params['expandTrigger'] = "click";
            }
            $result['expandTrigger'] = $params['expandTrigger'];
        }
        if (isset($params['ifReadOnly'])) {
            $result['ifReadOnly'] = $params['ifReadOnly'];
        }
        return $result;
    }
}

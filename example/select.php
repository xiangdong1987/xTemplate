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
function select($form)
{
    $option1 = [
        [
            "value" => '1',
            "label" => '黄金糕'
        ],
        [
            "value" => '2',
            "label" => '双皮奶'
        ],
        [
            "value" => '3',
            "label" => '蚵仔煎'
        ],
        [
            "value" => '4',
            "label" => '龙须面',
            "disabled" => true
        ], [
            "value" => '5',
            "label" => '北京烤鸭'
        ],
    ];
    $option2 = [
        [
            "label" => "热门城市",
            "options" => [
                [
                    "value" => 'Shanghai',
                    "label" => '上海'
                ],
                [
                    "value" => 'Beijing',
                    "label" => '北京'
                ]
            ]
        ],
        [
            "label" => "城市名",
            "options" => [
                [
                    "value" => 'Chengdu',
                    "label" => '成都'
                ],
                [
                    "value" => 'Shenzhen',
                    "label" => '深圳'
                ],
                [
                    "value" => 'Guangzhou',
                    "label" => '广州'
                ],
                [
                    "value" => 'Dalian',
                    "label" => '大连',
                ]
            ]
        ],
    ];
    $form->setDecorate(new \Component\XSelect("", "普通", "", "", "select1", "请选择", $option1));
    $form->setDecorate(new \Component\XSelect("", "禁用select", "", "", "select2", "请选择", $option1, true));
    $form->setDecorate(new \Component\XSelect("", "可清除", "", "1", "select3", "请选择", $option1, false, true));
    $form->setDecorate(new \Component\XSelect("", "多选", "", ["1", "2"], "select4", "请选择", $option1, false, false, true));
    $form->setDecorate(new \Component\XSelect("", "多选短", "", ["1", "2"], "select5", "请选择", $option1, false, false, true, true));
    $form->setDecorate(new \Component\XSelect("", "分组", "", "", "select6", "请选择", $option2, false, false, true, false, true));
    $form->setDecorate(new \Component\XSelect("", "搜索", "", "", "select7", "请选择", $option2, false, false, false, false, true, true));
}
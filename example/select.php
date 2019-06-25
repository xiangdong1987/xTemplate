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
    $jsonMenu = '[{"value":"zhinan","label":"指南","children":[{"value":"shejiyuanze","label":"设计原则","children":[{"value":"yizhi","label":"一致"},{"value":"fankui","label":"反馈"},{"value":"xiaolv","label":"效率"},{"value":"kekong","label":"可控"}]},{"value":"daohang","label":"导航","children":[{"value":"cexiangdaohang","label":"侧向导航"},{"value":"dingbudaohang","label":"顶部导航"}]}]},{"value":"zujian","label":"组件","children":[{"value":"basic","label":"Basic","children":[{"value":"layout","label":"Layout 布局"},{"value":"color","label":"Color 色彩"},{"value":"typography","label":"Typography 字体"},{"value":"icon","label":"Icon 图标"},{"value":"button","label":"Button 按钮"}]},{"value":"form","label":"Form","children":[{"value":"radio","label":"Radio 单选框"},{"value":"checkbox","label":"Checkbox 多选框"},{"value":"input","label":"Input 输入框"},{"value":"input-number","label":"InputNumber 计数器"},{"value":"select","label":"Select 选择器"},{"value":"cascader","label":"Cascader 级联选择器"},{"value":"switch","label":"Switch 开关"},{"value":"slider","label":"Slider 滑块"},{"value":"time-picker","label":"TimePicker 时间选择器"},{"value":"date-picker","label":"DatePicker 日期选择器"},{"value":"datetime-picker","label":"DateTimePicker 日期时间选择器"},{"value":"upload","label":"Upload 上传"},{"value":"rate","label":"Rate 评分"},{"value":"form","label":"Form 表单"}]},{"value":"data","label":"Data","children":[{"value":"table","label":"Table 表格"},{"value":"tag","label":"Tag 标签"},{"value":"progress","label":"Progress 进度条"},{"value":"tree","label":"Tree 树形控件"},{"value":"pagination","label":"Pagination 分页"},{"value":"badge","label":"Badge 标记"}]},{"value":"notice","label":"Notice","children":[{"value":"alert","label":"Alert 警告"},{"value":"loading","label":"Loading 加载"},{"value":"message","label":"Message 消息提示"},{"value":"message-box","label":"MessageBox 弹框"},{"value":"notification","label":"Notification 通知"}]},{"value":"navigation","label":"Navigation","children":[{"value":"menu","label":"NavMenu 导航菜单"},{"value":"tabs","label":"Tabs 标签页"},{"value":"breadcrumb","label":"Breadcrumb 面包屑"},{"value":"dropdown","label":"Dropdown 下拉菜单"},{"value":"steps","label":"Steps 步骤条"}]},{"value":"others","label":"Others","children":[{"value":"dialog","label":"Dialog 对话框"},{"value":"tooltip","label":"Tooltip 文字提示"},{"value":"popover","label":"Popover 弹出框"},{"value":"card","label":"Card 卡片"},{"value":"carousel","label":"Carousel 走马灯"},{"value":"collapse","label":"Collapse 折叠面板"}]}]},{"value":"ziyuan","label":"资源","children":[{"value":"axure","label":"Axure Components"},{"value":"sketch","label":"Sketch Templates"},{"value":"jiaohu","label":"组件交互文档"}]}]';
    //多级菜单
    $form->setDecorate(new \Component\XCascader("多级菜单", ['zhinan', 'shejiyuanze', 'yizhi'], 'c1', "", json_decode($jsonMenu, 1)));
    //$form->setDecorate(new \Component\XCascader("多级Hover", [''], 'c2', "", json_decode($jsonMenu, 1), ['expandTrigger' => 'hover']));
    $form->setDecorate(new \Component\XTimeSelect("时间选择", "st1", "", "08:00", "00:15", "18:00", "时间选择"));
    $form->setDecorate(new \Component\XTimeSelect("开始时间", "st2", "", "08:00", "00:15", "10:00", "开始时间"));
    $form->setDecorate(new \Component\XTimeSelect("结束时间", "st3", "", "08:00", "00:15", "10:00", "结束时间", "form1.st2"));
}

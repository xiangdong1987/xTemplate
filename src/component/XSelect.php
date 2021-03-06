<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XSelect extends XTemplate
{
    public $is_dynamic = false;

    public $content;
    public $contentS;
    public $params;
    /**
     * @var Dom
     */
    public $decorate;

    function __construct($col, $title, $icon, $val, $name, $note, $data, $disable = false, $ifClear = false, $isMultiple = false, $isCollapse = false, $isGroup = false, $isFilter = false)
    {
        parent::__construct();
        $this->params = [
            'col' => $col,
            'title' => $title,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'data' => $data,
            'disable' => $disable,
            'isMultiple' => $isMultiple,
            'ifClear' => $ifClear,
            'isCollapse' => $isCollapse,
            'isGroup' => $isGroup,
            'isFilter' => $isFilter
        ];
    }

    function getModel()
    {
        //判断是否是表单内
        if (isset($this->params['form_name'])) {
            $list = explode('.', $this->params['form_name']);
            $data[$list[0]][$list[1]] = $this->params['val'];
        } else {
            $data[$this->params['name']] = $this->params['val'];
        }
        //options
        $data[$this->params['name'] . "_options"] = $this->params['data'];
        return $data;
    }

    function getRules()
    {
        return $this->rules;
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
        $this->contentS = $this->fetch('element/form_select.php', $this->params);
        echo $this->contentS;
    }

    function contentE()
    {
        parent::contentE(); // TODO: Change the autogenerated stub
    }

    function decorate(Dom $dom)
    {
        $this->decorate = $dom;
        return $dom;
    }

    function show(Dom $root)
    {
        parent::show($root);
    }
}
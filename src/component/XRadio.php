<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XRadio extends XTemplate
{
    public $is_dynamic = false;

    public $content;
    public $contentS;
    public $params;
    /**
     * @var Dom
     */
    public $decorate;

    function __construct($title, $val, $name, $data, $css = 1, $size = 1, $border = false, $disabled = false)
    {
        switch ($css) {
            case 1:
                $css = "radio";
                break;
            case 2:
                $css = "radio-button";
                break;
            default:
                $css = "radio";
        }
        switch ($size) {
            case 1:
                $size = "medium";
                break;
            case 2:
                $size = "small";
                break;
            case 3:
                $size = "mini";
                break;
            default:
                $size = "medium";
        }
        parent::__construct();
        $this->params = [
            'title' => $title,
            'val' => $val,
            'name' => $name,
            'data' => $data,
            'css' => $css,
            'border' => $border,
            'disabled' => $disabled,
            'size' => $size
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
        return $data;
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
        if ($this->isElement) {
            $this->contentS = $this->fetch('element/form_radio.php', $this->params);
        } else {
            $this->contentS = $this->fetch('include/form_radio.php', $this->params);
        }
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

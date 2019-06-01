<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XInput extends XTemplate
{
    public $is_dynamic = false;

    public $content;
    public $contentS;
    public $params;
    /**
     * @var Dom
     */
    public $decorate;

    function __construct(
        $col,
        $title,
        $need,
        $icon,
        $val,
        $name,
        $note,
        $ifReadOnly = 0,
        $ifPassword = false,
        $ifClear = false
    ) {
        parent::__construct();
        $this->params = [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'ifReadOnly' => $ifReadOnly,
            'ifPassword' => $ifPassword,
            'ifClear' => $ifClear,
        ];
    }

    function getModel()
    {
        $data = [$this->params['name'] => $this->params['val']];
        return $data;
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
        if ($this->isElement) {
            $this->contentS = $this->fetch('element/form_input.php', $this->params);
        } else {
            $this->contentS = $this->fetch('include/form_input.php', $this->params);
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
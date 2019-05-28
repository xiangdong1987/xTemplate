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

    /**
     * @var Dom
     */
    public $decorate;

    function __construct($col, $title, $need, $icon, $val, $name, $data, $note)
    {
        parent::__construct();
        $this->contentS = $this->fetch('include/form_radio.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'data' => $data
        ]);
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
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

    function show()
    {
        parent::show();
    }
}
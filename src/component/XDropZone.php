<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XDropZone extends XTemplate
{
    public $is_dynamic = false;

    public $contentS;

    /**
     * @var Dom
     */
    public $decorate;

    function __construct($col, $title, $need, $icon, $val, $obj, $name, $maxfile, $type, $apply_id)
    {
        parent::__construct();
        $this->contentS = $this->fetch('include/form_dropzone.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'obj' => $obj,
            'name' => $name,
            'maxfile' => $maxfile,
            'type' => $type,
            'apply_id' => $apply_id
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

    function show(Dom $root)
    {
        parent::show($root);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XMainHeader extends XTemplate
{
    public $is_dynamic = false;

    public $content;

    public $contentS;
    public $params;
    public $isElement;
    /**
     * @var Dom
     */
    public $decorate;

    function __construct()
    {
        parent::__construct();
        $this->params = [];
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
        if ($this->isElement) {
            $contentS = $this->fetch('element/main_header.php', $this->params);
        } else {
            $contentS = $this->fetch('include/main_header.php', $this->params);
        }
        echo $contentS;
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
<?php
/**
 * Created by PhpStorm.
 * User: xiangdong
 * Date: 16/10/17
 * Time: 上午11:13
 */

namespace Component;

use Interfaces\Dom;

class ElementTemplate extends XTemplate
{

    public $is_dynamic = false;

    public $contentS;
    public $isElement;

    /**
     * @var Dom
     */
    public $decorate;

    function __construct()
    {
        parent::__construct();
        $this->root = true;
        $this->isElement = true;
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
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
        //初始化app
        echo $this->fetch('element/app_js.php', ['data' => json_encode($this->data)]);

    }

}
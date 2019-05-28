<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XFieldSet extends XTemplate
{
    public $is_dynamic = false;

    public $contentS;
    public $contentE;

    /**
     * @var Dom
     */
    public $decorate;

    function __construct($id = "")
    {
        parent::__construct();
        if ($id) {
            $this->contentS .= "<fieldset id='$id'>";
        } else {
            $this->contentS .= "<fieldset>";
        }
        $this->contentE = "</fieldset>";
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
        echo $this->contentS;
    }

    function contentE()
    {
        parent::contentE(); // TODO: Change the autogenerated stub
        echo $this->contentE;
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
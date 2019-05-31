<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XMainFooter extends XTemplate
{
    public $is_dynamic = false;

    public $contentS;


    /**
     * @var Dom
     */
    public $decorate;

    function __construct()
    {
        parent::__construct();

    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
        if ($this->isElement) {
            $this->contentS = $this->fetch('element/main_foot.php', []);
        } else {
            $this->contentS = $this->fetch('include/main_footer.php', []);
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
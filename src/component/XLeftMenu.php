<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XLeftMenu extends XTemplate
{
    public $is_dynamic = false;

    public $contentS;
    /**
     * @var Dom
     */
    public $decorate;
    public $params;
    public $isElement;

    function __construct($controller, $view, $menuList)
    {
        parent::__construct();

        $this->params = [
            "controller" => $controller,
            "view" => $view,
            "menuList" => $menuList,
        ];
    }

    function contentS()
    {
        parent::contentS(); // TODO: Change the autogenerated stub
        if ($this->isElement) {
            $contentS = $this->fetch('element/left_menu.php', $this->params);
        } else {
            $menu = new Menu($this->params['controller'], $this->params['view']);
            foreach ($this->params['menuList'] as $mainList) {
                $menu->main($mainList['icon'], $mainList['name'], $mainList['url']);
                foreach ($mainList['sub_menus'] as $sub_menu) {
                    $menu->sub($sub_menu['icon'], $sub_menu['name'], $sub_menu['url'], $sub_menu['controller'], $sub_menu['view']);
                }
            }
            $contentS = "<aside id=\"left-panel\">";
            $contentS .= $menu->create();
            $contentS .= "<span class=\"minifyme\"> <i class=\"fa fa-arrow-circle-left hit\"></i> </span></aside>";
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
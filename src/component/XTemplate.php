<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XTemplate implements Dom
{
    public $is_dynamic = false;

    public $content;

    private $tpl_var;
    private $component_path;
    public $decorates;
    public $decorate;
    public $root = false;

    function __construct()
    {
        $this->loadConf();
    }

    function assign($array)
    {
        foreach ($array as $key => $value) {
            $this->tpl_var[$key] = $value;
        }
    }

    /**
     * @param $tpl_name
     */
    function display($tpl_name)
    {
        if($this->tpl_var){
            extract($this->tpl_var);
        }
        include $this->component_path . $tpl_name;
    }

    function fetch($tpl_name = '', $val = array())
    {
        $this->assign($val);
        ob_start();
        $this->display($tpl_name);
        $content = ob_get_contents();
        ob_end_clean();
        $this->tpl_var = [];
        return $content;
    }

    function setRoot()
    {
        $this->root = true;
    }

    function setDecorate($decorate)
    {
        $this->decorates[] = $decorate;
    }

    /**
     * @return mixed
     */
    function decorateAll()
    {
        $currentDom = "";
        $first = "";
        $i = 0;
        $repeat = 0;
        foreach ($this->decorates as $dom) {
            if ($dom->decorate) {
                $repeat++;
                continue;
            }
            if ($i == 0) {
                //判断当前节点是不是跟节点
                if ($this->root) {
                    $currentDom = $this->decorate($dom);
                    $dom = "";
                } else {
                    $currentDom = $dom;
                }
                $first = $dom;
            } else {
                $currentDom = $currentDom->decorate($dom);
            }
            $i++;
        }
        return $first;
    }


    function loadConf()
    {
        $this->component_path = dirname(__DIR__) . "/template/";
    }

    function decorate(Dom $dom)
    {
    }

    function contentS()
    {

    }

    function contentE()
    {

    }

    function show()
    {
        $linkHead = "";
        if ($this->decorates&&count($this->decorates)) {
            $linkHead = $this->decorateAll();
        }
        $this->contentS();
        if ($linkHead) {
            $linkHead->show();
        }
        $this->contentE();
        if ($this->decorate) {
            $this->decorate->show();
        }
    }
}
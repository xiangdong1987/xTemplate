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
    public $isElement = false;
    public $data;
    public $rules;
    public $methods;

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
        if ($this->tpl_var) {
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
        if ($this->isElement) {
            $decorate->isElement = true;
        }
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

    function getModel()
    {

    }

    function getRules()
    {

    }

    function getMethods()
    {

    }

    function show(Dom $root)
    {
        $linkHead = "";
        if ($this->decorates && count($this->decorates)) {
            $linkHead = $this->decorateAll();
        }
        $this->contentS();
        if ($linkHead) {
            $this->integrateData($root, $linkHead);
            $this->integrateRules($root, $linkHead);
            $this->integrateMethods($root, $linkHead);
            $linkHead->show($root);
        }
        $this->contentE();
        if ($this->decorate) {
            $this->integrateData($root, $this->decorate);
            $this->integrateRules($root, $this->decorate);
            $this->integrateMethods($root, $this->decorate);
            $this->decorate->show($root);
        }
    }

    /**
     * 整合data 数据
     * @param $root
     * @param $sub_node
     */
    function integrateData($root, $sub_node)
    {
        if ($data = $sub_node->getModel()) {
            if ($root->data) {
                $root->data = array_merge_recursive($root->data, $data);
            } else {
                $root->data = $data;
            }
        }
    }

    /**
     * 整个验证资源
     * @param $root
     * @param $sub_node
     */
    function integrateRules($root, $sub_node)
    {
        if ($rules = $sub_node->getRules()) {
            if ($root->rules) {
                $root->rules = array_merge_recursive($root->rules, $rules);
            } else {
                $root->rules = $rules;
            }
        }
    }

    /**
     * 整合方法
     *
     * @param $root
     * @param $sub_node
     */
    function integrateMethods($root, $sub_node)
    {
        if ($methods = $sub_node->getMethods()) {
            if ($root->methods) {
                $root->methods = array_merge_recursive($root->methods, $methods);
            } else {
                $root->methods = $methods;
            }
        }
    }
}
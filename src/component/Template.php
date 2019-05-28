<?php
/**
 * Created by PhpStorm.
 * User: xiangdong
 * Date: 16/10/17
 * Time: 上午11:13
 */

namespace Component;

class Template
{

    private $controller;
    private $content;
    public $is_dynamic = false;
    private $tpl_var;
    private $component_path;

    function __construct($path)
    {
        $this->component_path = $path;
    }

    function assign($array)
    {
        foreach ($array as $key => $value) {
            $this->tpl_var[$key] = $value;
        }
    }

    function display($tpl_name)
    {
        extract($this->tpl_var);
        include $this->component_path . $tpl_name;
    }

    private function fetch($tpl_name = '', $val = array())
    {
        $this->assign($val);
        ob_start();
        $this->display($tpl_name);
        $content = ob_get_contents();
        ob_end_clean();
        $this->tpl_var = [];
        return $content;
    }

    /**
     * select2下拉框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $note
     * @param $data
     * @return mixed
     */
    function select2($col, $title, $need, $icon, $val, $name, $note, $data)
    {
        $content = $this->fetch('include/form_select2.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'data' => $data
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * text 文本框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $note
     * @param $line
     * @return mixed
     */
    function textArea($col, $title, $need, $icon, $val, $name, $note, $line)
    {
        $content = $this->fetch('include/form_textarea.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'line' => $line,
            'note' => '',
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 上传文件插件
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $obj
     * @param $name
     * @param $maxfile
     * @param $type
     * @param $apply_id
     * @return mixed
     */
    function dropZone($col, $title, $need, $icon, $val, $obj, $name, $maxfile, $type, $apply_id)
    {
        $content = $this->fetch('include/form_dropzone.php', [
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
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * input 文本框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $note
     * @return mixed
     */
    function input($col, $title, $need, $icon, $val, $name, $note, $ifReadOnly = 0)
    {
        $content = $this->fetch('include/form_input.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'ifReadOnly' => $ifReadOnly,
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * radio 单选择框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $data
     * @param $note
     * @return mixed
     */
    function radio($col, $title, $need, $icon, $val, $name, $data, $note)
    {
        $content = $this->fetch('include/form_radio.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'data' => $data
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 复选框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $data
     * @param $note
     * @return mixed
     */
    function checkbox($col, $title, $need, $icon, $val, $name, $data, $note)
    {
        $content = $this->fetch('include/form_checkbox.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
            'data' => $data
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 日期 选择框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $note
     * @return mixed
     */
    function date($col, $title, $need, $icon, $val, $name, $note)
    {
        $content = $this->fetch('include/form_date.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
        ]);

        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 时间日期选择框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $note
     * @return mixed
     */
    function datetime($col, $title, $need, $icon, $val, $name, $note)
    {
        $content = $this->fetch('include/form_datetime.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
        ]);

        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 时间日期选择框
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $icon
     * @param $val
     * @param $name
     * @param $note
     * @return mixed
     */
    function singleImg($col, $title, $need, $icon, $val, $name, $note)
    {
        $content = $this->fetch('include/form_single_img.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'icon' => $icon,
            'val' => $val,
            'name' => $name,
            'note' => $note,
        ]);

        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 表单开始
     *
     * @param $title
     * @param $form_name
     * @param $method
     * @param $url
     * @return false|string
     */
    function formStart($title, $form_name, $method, $url)
    {
        $content = $this->fetch('include/form_start.php', [
            'method' => $method,
            'action' => $url,
            'title' => $title,
            'form_name' => $form_name,
        ]);

        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 表单结束
     *
     * @return false|string
     */
    function formEnd()
    {
        $content = $this->fetch('include/form_end.php', []);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }


    /**
     * fieldSet开始
     * @param string $id
     * @return string
     */
    function fieldsetS($id = "")
    {
        if ($this->is_dynamic) {
            if ($id) {
                $this->content .= "<fieldset id='$id'>";
            } else {
                $this->content .= "<fieldset>";
            }
        } else {
            return "<fieldset>";
        }
    }

    /**
     * fieldSet结束
     * @return string
     */
    function fieldsetE()
    {
        if ($this->is_dynamic) {
            $this->content .= "</fieldset>";
        } else {
            return "</fieldset>";
        }
    }

    /**
     * 自定义 div
     * @param string $id
     * @param string $style
     */
    function divS($id = "", $style = "")
    {
        if ($this->is_dynamic) {

            if ($id) {
                $id = "id='$id'";
            }
            if ($style) {
                $style = "style='$style'";
            }
            $this->content .= "<div $id $style>";
        }
    }

    function divE()
    {
        if ($this->is_dynamic) {
            $this->content .= "</div>";
        }
    }

    function line()
    {
        if ($this->is_dynamic) {
            $this->content .= "<hr>";
        }
    }

    /**
     * 隐藏input
     *
     * @param $id
     * @param $name
     * @param $value
     */
    function inputHidden($id, $name, $value)
    {
        if ($this->is_dynamic) {
            if ($id) {
                $str_id = "id='$id'";
            } else {
                $str_id = "";
            }
            $this->content .= "<input type='hidden' $str_id name='$name' value='$value' >";
        }
    }

    /**
     * A 按钮
     *
     * @param $jsFunction
     * @param $buttonName
     * @param string $url
     * @return false|string
     */
    function aButton($jsFunction, $buttonName, $url = "jacascript::void(0)")
    {
        $content = $this->fetch('include/a_button.php', [
            'url' => $url,
            'jsFunction' => $jsFunction,
            'buttonName' => $buttonName,
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 添加js
     *
     * @param $name
     * @param string $path
     * @return false|string
     */
    function addJs($name, $path = "oa/")
    {
        $content = $this->fetch('include/include_js.php', [
            'path' => $path,
            'name' => $name
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * ue 编辑器
     * @param $title
     * @param $need
     * @param $name
     * @param $content
     * @return false|string
     */
    function ueEditor($title, $need, $name, $content)
    {
        $content = $this->fetch('include/form_ueeditor.php', [
            'title' => $title,
            'need' => $need,
            'name' => $name,
            'content' => $content,
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 文件上传
     *
     * @param $col
     * @param $title
     * @param $need
     * @param $val
     * @param $name
     * @return false|string
     */
    function upload($col, $title, $need, $val, $name)
    {
        $content = $this->fetch('include/form_upload.php', [
            'col' => $col,
            'title' => $title,
            'need' => $need,
            'val' => $val,
            'name' => $name,
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 封装dataTable
     *
     * @param $sAjaxSource
     * @param int $pageSize
     * @param $showColumn
     * @param $search
     * @param $exportUrl
     * @return mixed
     */
    function dataTable($sAjaxSource, $pageSize = 10, $showColumn, $search, $exportUrl)
    {
        $content = $this->fetch('include/datatable.php', [
            'showColumn' => $showColumn,
            'pageSize' => $pageSize,
            'sAjaxSource' => $sAjaxSource,
            'search' => $search,
            'exportUrl' => $exportUrl,
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 导入上传
     *
     * @param $name
     * @param $id
     * @param $file_name
     * @param $upload_url
     * @param $return_url
     * @return false|string
     */
    function uploadButton($name, $id, $file_name, $upload_url, $return_url)
    {
        $content = $this->fetch('include/form_upload_button.php', [
            'name' => $name,
            'id' => $id,
            'file_name' => $file_name,
            'upload_url' => $upload_url,
            'return_url' => $return_url,
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * 展示页面
     *
     */
    function showPage()
    {
        $this->controller->displayContent($this->content);
        $this->content = "";
    }

    function mainHeader()
    {
        $content = $this->fetch('include/main_header.php', []);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    function mainFooter()
    {
        $content = $this->fetch('include/main_footer.php', []);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    function topMenu($logo_url, $site_name, $username, $realName, $logout_rul)
    {
        $content = $this->fetch('include/top_menu.php', [
            'logo_url' => $logo_url,
            'site_name' => $site_name,
            'username' => $username,
            'realname' => $realName,
            'logout_rul' => $logout_rul,
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    /**
     * @param $controller
     * @param $view
     * @param $menuList
     * @return string
     */
    function leftMenu($controller, $view, $menuList)
    {
        $menu = new Menu($controller, $view);
        foreach ($menuList as $mainList) {
            $menu->main($mainList['icon'], $mainList['name'], $mainList['url']);
            foreach ($mainList['sub_menus'] as $sub_menu) {
                $menu->sub($sub_menu['icon'], $sub_menu['name'], $sub_menu['url'], $sub_menu['controller'], $sub_menu['view']);
            }
        }
        $content = "<aside id=\"left-panel\">";
        $content .= $menu->create();
        $content .= "<span class=\"minifyme\"> <i class=\"fa fa-arrow-circle-left hit\"></i> </span></aside>";
        return $content;
    }

    /**
     *
     * @param string $title
     * @return false|string
     */
    function mainStart($title = "")
    {
        $content = $this->fetch('include/main_start.php', [
            'title' => $title
        ]);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }

    function mainEnd()
    {
        $content = $this->fetch('include/main_end.php', []);
        if ($this->is_dynamic) {
            $this->content .= $content;
        }
        return $content;
    }
}
<?php
namespace Component;

class Menu
{
    public $index = -1;
    public $menu = [];

    public $controller_name, $view_name;
    const F_icon = 0, F_name = 1, F_url = 2, F_sub = 3, F_alert = 4, F_active = 5;

    function __construct($controller_name, $view_name)
    {
        $this->controller_name = $controller_name;
        $this->view_name = $view_name;
    }

    function main($icon, $name, $url = '#', $controller = null, $view = null, $get = [])
    {
        $menu = [
            $icon,
            $name,
            $url ? $url : '#',
            []
        ];
        $menu[self::F_active] = ($this->isActiveController($controller) && $this->isActiveView($view) && $this->isActiveGet($get)) ? true : false;
        $this->menu[++$this->index] = $menu;
    }

    function sub($icon, $name, $url, $controller = null, $view = null, $get = [])
    {
        if (isset($this->menu[$this->index])) {
            $menu = [
                $icon,
                $name,
                $url,
                []
            ];
            $menu[self::F_active] = ($this->isActiveController($controller) && $this->isActiveView($view) && $this->isActiveGet($get)) ? true : false;
            $this->menu[$this->index][self::F_sub][] = $menu;
        }
    }

    private function isActiveController($controller)
    {
        if (is_array($controller)) {
            //全转小写
            array_walk($controller, function (&$v, $k) {
                $v = strtolower($v);
            });
            if (in_array(strtolower($this->controller_name), $controller)) {
                return true;
            }
        } elseif (strtolower($controller) == strtolower($this->controller_name) || $controller === '*') {
            return true;
        }
        return false;
    }

    private function isActiveView($view)
    {
        if (is_array($view)) {
            //全转小写
            array_walk($view, function (&$v, $k) {
                $v = strtolower($v);
            });
            if (in_array(strtolower($this->view_name), $view)) {
                return true;
            }
        } elseif (strtolower($view) == strtolower($this->view_name) || $view === '*') {
            return true;
        }
        return false;
    }

    private function isActiveGet($get)
    {
        if ($get !== '*') {
            foreach ($get as $k => $v) {
                if (!isset($_GET[$k]) || $_GET[$k] != $v) {
                    return false;
                }
            }
        }
        return true;
    }

    function create()
    {
        $r = "<nav><ul>";
        foreach ($this->menu as $k => $menu) {
            $r .= '<li' . ($menu[self::F_active] ? '  class="active"' : '') . '><a href="' . $menu[self::F_url] . '"'
                . ($menu[self::F_alert] ? ' confirm="' . htmlentities($menu[self::F_alert], ENT_QUOTES, 'UTF-8') . '"' : "")
                #. ($menu[self::F_url] ? " onclick=\"window.location.href='" . $menu[self::F_url] . "'\"" : "")
                . ' title="' . $menu[self::F_name] . '">' . ($menu[self::F_icon] ? '<i class=" fa fa-lg fa-fw ' . $menu[self::F_icon] . '"></i>' : '')
                . '<span class="menu-item-parent">' . $menu[self::F_name] . '</span></a>';
            if (isset($menu[self::F_sub]) && $menu[self::F_sub]) {
                $r .= '<ul>';
                foreach ($menu[self::F_sub] as $subk => $sub) {
                    $r .= '<li' . ($sub[self::F_active] ? '  class="active"' : '') . '><a href="' . $sub[self::F_url] . '"' . ($sub[self::F_alert] ? ' confirm="' . htmlentities($sub[self::F_alert], ENT_QUOTES, 'UTF-8') . '"' : "") . ' title="' . $sub[self::F_name] . '">' . ($sub[self::F_icon] ? '<i class="fa-lg fa-fw ' . $sub[self::F_icon] . '"></i>' : '') . '<span class="menu-item-parent">' . $sub[self::F_name] . '</span></a></li>';
                }
                $r .= '</ul>';
            }
            $r .= '</li>';
        }
        $r .= "</ul></nav>";
        return $r;
    }
}
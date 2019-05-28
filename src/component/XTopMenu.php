<?php
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:21
 */

namespace Component;

use Interfaces\Dom;

class XTopMenu extends XTemplate
{
    public $is_dynamic = false;

    public $content;
    public $contentS;
    /**
     * @var Dom
     */
    public $decorate;

    function __construct($logo_url, $site_name, $username, $realName, $logout_rul)
    {
        parent::__construct();
        $content = $this->fetch('include/top_menu.php', [
            'logo_url' => $logo_url,
            'site_name' => $site_name,
            'username' => $username,
            'realname' => $realName,
            'logout_rul' => $logout_rul,
        ]);
        $this->contentS = $content;
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

    function show()
    {
        parent::show();
    }
}
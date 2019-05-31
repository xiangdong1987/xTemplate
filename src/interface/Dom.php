<?php
namespace Interfaces;
/**
 * Created by PhpStorm.
 * User: xiangdongdong
 * Date: 2019/5/24
 * Time: 18:14
 */
interface Dom
{
    function decorate(Dom $dom);
    function show(Dom $root);
}
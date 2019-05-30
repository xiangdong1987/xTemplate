<?php
include "./../vendor/autoload.php";
$controller = $_GET['controller'];
if ($controller) {
    include "./" . $controller.".php";
    call_user_func($controller);
}




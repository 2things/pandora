<?php

require_once __DIR__ . '/../Library/Smarty/Smarty.class.php';

spl_autoload_register(function($class) {
    $f = __DIR__ . (($class[0] === "\\") ? "" : "/") . str_replace('\\', '/', $class) . ".php";

    if ($f !== false) {
        return include $f;
    }
    return false;
});
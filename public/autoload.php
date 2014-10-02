<?php

require_once __DIR__ . '/../Library/Smarty/Smarty.class.php';

spl_autoload_register(function($class) {
    $f = PATH_ROOT . (($class[0] === "\\") ? "" : "/") . str_replace('\\', '/', $class) . ".php";

    if ($f !== false) {
        return include $f;
    }
    return false;
});
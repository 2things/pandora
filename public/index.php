<?php

$root = dirname(__DIR__);

define('PATH_ROOT', $root);
define('PATH_SYSTEM', PATH_ROOT . '/System');
define('PATH_CONTROLLER', PATH_ROOT . '/App/Controller');
define('PATH_MODEL', PATH_ROOT . '/App/Model');
define('PATH_VIEW', PATH_ROOT . '/App/View');

//@TODO autoload
require_once $root . '/System/Bootstrap.php';

$bootstrap = new \System\Bootstrap();
$runable = $bootstrap->run($_SERVER);

var_dump($runable);
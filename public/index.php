<?php

define('ENV', 'dev');

session_start();

$root = dirname(__DIR__);

define('PATH_ROOT', $root);
define('PATH_SYSTEM', PATH_ROOT . '/System');
define('PATH_CONTROLLER', PATH_ROOT . '/App/Controller');
define('PATH_MODEL', PATH_ROOT . '/App/Model');
define('PATH_VIEW', PATH_ROOT . '/App/View');

require_once 'autoload.php';

require_once $root . '/System/Bootstrap.php';

$bootstrap = new \System\Bootstrap();
$runable = $bootstrap->run($_SERVER);

$controller = '\\App\\Controller\\' . $runable['controller'];
$action     = $runable['action'];

$execute = new $controller();
$execute->$action();

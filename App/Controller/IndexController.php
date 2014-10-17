<?php

namespace App\Controller;
use System;

class IndexController extends \System\HttpFrontController
{
    public function indexAction()
    {
        if (\App\Model\User::isAuthorized()) {
            $this->redirect('/feed/daily');
        }
        $this->getView()->getSmarty()->display('Index/Index.tpl');
    }
}


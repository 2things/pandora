<?php

namespace App\Controller;
use System;

class IndexController extends System\HttpFrontController
{
    public function indexAction()
    {
        $htmlHead   = $this->getView()->getHtmlHead();
        $htmlFooter = $this->getView()->getHtmlFooter();
        
        $this->getView()->setVariable('htmlHead', $htmlHead);
        $this->getView()->setVariable('htmlFooter', $htmlFooter);
        $this->getView()->getSmarty()->display('Index/index.tpl');
    }
}


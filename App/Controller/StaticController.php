<?php

namespace App\Controller;

class StaticController extends \System\HttpFrontController
{
    public function aboutAction()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Static/About.tpl');
    }
    
    public function privacyAction()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Static/Privacy.tpl');
    }
    
    public function featurelistAction()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Static/Featurelist.tpl');
    }
    
    public function faqAction()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Static/Faq.tpl');
    }
}

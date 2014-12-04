<?php
namespace App\Controller;

use System;
/**
 * UserController class
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 */
class ErrorController extends \System\HttpFrontController
{
    public function error404Action()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Error/404.tpl');
    }
    
    public function error500Action()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Error/500.tpl');
    }
}


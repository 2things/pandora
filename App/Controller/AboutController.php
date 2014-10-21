<?php

namespace App\Controller;

class AboutController extends \System\HttpFrontController
{
    public function indexAction()
    {
        $queryString = $this->getServer('QUERY_STRING');
        $queryParams = explode('/', $queryString);
        $username    = (isset($queryParams[1])) ? $queryParams[1] : '';
        if (empty($username)) {
            $this->show404();
            return;
        }
        
        $this->getView()->getSmarty()->display('About/Profile.tpl');
    }
}


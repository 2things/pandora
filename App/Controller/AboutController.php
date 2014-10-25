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
        
        $userHelper  = $this->getHelper()->getUser();
        if (!$userHelper->isUsernameValid($username)) {
            $this->show404();
            return;
        }
        
        $userModel = new \App\Model\User();
        if (!$userModel->isUsernameExist($username)) {
            $this->show404();
            return;
        }
        
        $he = $userModel->getUserByUsername($username);
        $profileModel = new \App\Model\Profile();
        
        $hisProfile = $profileModel->getProfile($he['id']);
        
        $this->getView()->getSmarty()->display('About/Profile.tpl');
    }
}


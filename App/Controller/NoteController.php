<?php

namespace App\Controller;

class NoteController extends \System\HttpFrontController
{
    public function __construct()
    {
        parent::__construct();
        
        if (!\App\Model\User::isAuthorized()) {
            $this->redirect('/');
        }
    }
    
    public function indexAction()
    {
        $this->getView()->getSmarty()->display('Note/Index.tpl');
    }
}

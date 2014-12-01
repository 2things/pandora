<?php
namespace App\Controller;

class FeedController extends \System\HttpFrontController
{    
    public function indexAction()
    {
        $view = $this->getView();
        $view->setLayout('ALayout');
        
        
        
        $view->setPageContent($view->getSmarty()->fetch('Feed/Index.tpl'));
        $view->display();
    }
}

<?php
namespace App\Controller;

class FeedController extends \System\HttpFrontController
{  
    public function __construct()
    {
        parent::__construct();
        
        if (!\App\Model\User::isAuthorized()) {
            $this->redirect('/');
        }
    }
    
    public function dailyAction()
    {
        $this->getView()->getSmarty()->display('Feed/Daily.tpl');
    }
    
    public function getgoallistAction()
    {
        $userId        = $this->getPost('user-id');
        $lastRowNumber = $this->getPost('lrn');
        $limit         = self::$rowGoalLimit;
        $feedModel     = new \App\Model\Feed();
        
        if ($userId != \App\Model\User::$me['id']) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['feed']['daily']['errorLoadGoals']));
        }
        
        try {
            $feedModel->getGoalList($userId, $lastRowNumber);
        } catch (\Exception $e) {
            //TODO write log
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['feed']['daily']['errorLoadGoals']));
        }
    }
}

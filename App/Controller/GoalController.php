<?php

namespace App\Controller;

class GoalController extends \System\HttpFrontController
{
    public function __construct()
    {
        parent::__construct();
        
        if (!\App\Model\User::isAuthorized()) {
            $this->redirect('/');
        }
    }
    
    public function addgoalAction()
    {
        $title   = (isset($this->getInputStream()->title)) ? $this->getInputStream()->title : $this->getPost('title');
        $me          = \App\Model\User::getMe();
        $translation = $this->getTranslation()->get('eng');
        
        if (empty($title)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleEmptyError']));
        }
        
        if (mb_strlen($title) >= 255) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleMaxLength']));
        }
        
        $goalModel = new \App\Model\Goal();
        try {
            $result = $goalModel->addGoal($me['id'], $taskTitle);
            $this->getView()->renderJson(array('status' => 1, 'html' => '', 'data' => $result));
        } catch (System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
}

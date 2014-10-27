<?php

namespace App\Controller;

class MyController extends \System\HttpFrontController
{    
    public function __construct()
    {
        parent::__construct();
        
        if (!\App\Model\User::isAuthorized()) {
            $this->redirect('/');
        }
    }
    
    public function tasksAction($dbOffset = 0, $isAjax = false)
    {
        $me = \App\Model\User::getMe();
        $translation = $this->getTranslation()->get('eng');
        
        $taskModel = new \App\Model\Task();
        
        try {
            $myTasks   = $taskModel->getTasks($me['id'], $dbOffset);
        } catch (\System\Exception\ModelException $e) {
            if ($isAjax) {
                throw new \System\Exception\ControllerException($translation['common']);
            }
            $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
            $this->getView()->getSmarty()->display('Error/500.tpl');
            return;
        }
        
        
        $this->getView()->setVariable('tasks', $myTasks);
        
        if ($isAjax) {
            return $this->getView()->getSmarty()->fetch('My/AjaxTasks.tpl');
        }
        
        $this->getView()->getSmarty()->display('My/Tasks.tpl');
    }
    
    public function ajaxloadmoretasksAction()
    {
        $translation = $this->getTranslation()->get('eng');
        
        $dbOffset = (isset($this->getInputStream()->dboffset)) ? $this->getInputStream()->dboffset : $this->getPost('dboffset');
        if (!is_numeric($dbOffset)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        try {
            $html = $this->tasksAction($dbOffset, true);
            $this->getView()->renderJson(array('status' => 1, 'html' => $html));
            return;
        } catch (\System\Exception\ControllerException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $e->getMessage()));
        }
    }
    
    public function addtaskAction()
    {
        $translation = $this->getTranslation()->get('eng');
        
        $me = \App\Model\User::getMe();
        
        $taskTitle = (isset($this->getInputStream()->title)) ? $this->getInputStream()->title : $this->getPost('title');
        
        if (mb_strlen($taskTitle) >= 255) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleMaxLength']));
        }
        
        $taskModel = new \App\Model\Task();
        try {
            $result = $taskModel->addTask($me['id'], $taskTitle);
            if (!$result) {
                $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
            }
            $this->getView()->renderJson(array('status' => 1, 'html' => ''));
        } catch (\System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
    }
    
    public function edittaskAction()
    {
        $translation = $this->getTranslation()->get('eng');
        
        $me        = \App\Model\User::getMe();
        $taskId    = (isset($this->getInputStream()->id)) ? $this->getInputStream()->id : $this->getPost('id');
        $taskTitle = (isset($this->getInputStream()->title)) ? $this->getInputStream()->title : $this->getPost('title');
        
        if (mb_strlen($taskTitle) >= 255) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleMaxLength']));
        }
        
        if (!is_numeric($taskId)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $taskModel = new \App\Model\Task();
        try {
            $result = $taskModel->editTask($me['id'], $taskModel, $taskTitle);
        } catch (\System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
    
    public function completetaskAction()
    {
        
    }
    
    public function goalsAction()
    {
        
    }
    
    public function addgoalAction()
    {
        
    }
    
    public function editgoalAction()
    {
        
    }
    
    public function goalsetasdoneAction()
    {
        
    }
}

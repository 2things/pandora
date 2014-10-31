<?php

namespace App\Controller;

class TaskController extends \System\HttpFrontController
{
    public function __construct()
    {
        parent::__construct();
        
        if (!\App\Model\User::isAuthorized()) {
            $this->redirect('/');
        }
    }
    
    public function indexAction($dbOffset = 0, $isAjax = false)
    {
        $me = \App\Model\User::getMe();
        $translation = $this->getTranslation()->get('eng');
        
        $taskModel = new \App\Model\Task();
        
        try {
            $myTasks = $taskModel->getTasks($me['id'], $dbOffset);
        } catch (\System\Exception\ModelException $e) {
            if ($isAjax) {
                throw new \System\Exception\ControllerException($translation['common']);
            }
            $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
            $this->getView()->getSmarty()->display('Error/500.tpl');
            return;
        }
        
        if (empty($myTasks)) {
            return $noTaskHtml = $this->getView()->getSmarty()->display('Task/NoTask.tpl');
        }
        
        $this->getView()->setVariable('tasks', $myTasks);
        
        if ($isAjax) {
            return $this->getView()->getSmarty()->fetch('Task/AjaxTasks.tpl');
        }
        
        $this->getView()->getSmarty()->display('Task/Index.tpl');
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
    
    public function ajaxaddtaskAction()
    {
        $taskTitle   = (isset($this->getInputStream()->tasktitle)) ? $this->getInputStream()->tasktitle : $this->getPost('tasktitle');
        $me          = \App\Model\User::getMe();
        $translation = $this->getTranslation()->get('eng');
        
        if (empty($taskTitle)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleEmptyError']));
        }
        
        if (mb_strlen($taskTitle) >= 255) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleMaxLength']));
        }
        
        $taskModel = new \App\Model\Task();
        try {
            $taskModel->addTask($me['id'], $taskTitle);
        } catch (System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
}

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
        
        $view = $this->getView();
        $view->setLayout('ALayout');
        
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
            return $noTaskHtml = $view->setPageContent($view->getSmarty()->fetch('Task/NoTask.tpl'))->display();
        }
        
        if ($isAjax) {
            $this->getView()->renderJson(array('status' => 1, 'html' => '', 'data' => $myTasks));
            return;
        }
        
        $view->setVariable('tasks', $myTasks);
        $pageContent = $view->getSmarty()->render('Task/Index.tpl');
        $view->setPageContent($pageContent);
        $view->display();
    }
    
    public function ajaxloadmoretasksAction()
    {
        $translation = $this->getTranslation()->get('eng');
        
        $dbOffset = (isset($this->getInputStream()->dboffset)) ? $this->getInputStream()->dboffset : $this->getPost('dboffset');
        if (!is_numeric($dbOffset)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        try {
            $this->indexAction($dbOffset, true);
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
            $result = $taskModel->addTask($me['id'], $taskTitle);
            $this->getView()->renderJson(array('status' => 1, 'html' => '', 'data' => $result));
        } catch (System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
    
    public function ajaxsetasdoneAction()
    {
        $tasks       = (isset($this->getInputStream()->tasks)) ? $this->getInputStream()->tasks : $this->getPost('tasks');
        $me          = \App\Model\User::getMe();
        $translation = $this->getTranslation()->get('eng');
        
        $taskModel = new \App\Model\Task();
        
        try {
            $taskModel->setAsDone($me['id'], $tasks);
        } catch (System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
    
    public function ajaxdeletetasksAction()
    {
        $tasks       = (isset($this->getInputStream()->tasks)) ? $this->getInputStream()->tasks : $this->getPost('tasks');
        $me          = \App\Model\User::getMe();
        $translation = $this->getTranslation()->get('eng');
        
        $taskModel = new \App\Model\Task();
        
        try {
            $taskModel->deleteTasks($me['id'], $tasks);
        } catch (System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }


    public function ajaxedittaskAction()
    {
        $taskId      = (isset($this->getInputStream()->taskid)) ? $this->getInputStream()->taskid : $this->getPost('taskid');
        $taskTitle   = (isset($this->getInputStream()->tasktitle)) ? $this->getInputStream()->tasktitle : $this->getPost('tasktitle');
        $me          = \App\Model\User::getMe();
        $translation = $this->getTranslation()->get('eng');
        
        if (!is_numeric($taskId)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        if (empty($taskTitle)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleEmptyError']));
        }
        
        if (mb_strlen($taskTitle) >= 255) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleMaxLength']));
        }
        
        $taskModel = new \App\Model\Task();
        try {
            $taskModel->editTask($me['id'], $taskId, $taskTitle);
        } catch (System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
}

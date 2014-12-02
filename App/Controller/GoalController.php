<?php

namespace App\Controller;

use App\Model\User;
use App\Model\Goal;

class GoalController extends \System\HttpFrontController
{
    public function __construct()
    {
        parent::__construct();
        
        if (!\App\Model\User::isAuthorized()) {
            $this->redirect('/');
        }
    }

    //Get category list
    public function getcategoriesAction()
    {
        $categoryModel = new \App\Model\Category();

        $categories = $categoryModel->getAll();
        
        $this->getView()->renderJson(array('status' => 1, 'data' => $categories, 'html' => ''));
    }
    
    public function addgoalAction()
    {
        $me           = \App\Model\User::getMe();
        $title        = (isset($this->getInputStream()->title)) ? $this->getInputStream()->title : $this->getPost('title');
        $description  = (isset($this->getInputStream()->description)) ? $this->getInputStream()->description : $this->getPost('description');
        $img_attach   = (isset($this->getInputStream()->img_attach)) ? $this->getInputStream()->img_attach : $this->getPost('img_attach');
        $categoryList = (isset($this->getInputStream()->category)) ? $this->getInputStream()->category : $this->getPost('category');
        $translation = $this->getTranslation()->get('eng');
        
        if (empty($title)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleEmptyError']));
        }
        
        if (mb_strlen($title) >= 255) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleMaxLength']));
        }
        
        $goalModel = new \App\Model\Goal();
        try {
            //get new added goal id
            $result = $goalModel->addGoal($me['id'], $title, $description, $img_attach);

            if(!empty($categoryList) && !empty($result)){
                $goalModel->addGoalCategoriesRelation($categoryList, $result);
            }

            $this->getView()->renderJson(array('status' => 1, 'html' => '', 'data' => $result));

        } catch (\System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
}

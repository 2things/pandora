<?php

namespace App\Controller;

use App\Model\User;
use App\Model\Goal;

class GoalController extends \System\HttpFrontController
{
    public static $goalCategories = array(
        array(  
           "id" => "1",
           "name" => "Animals"
        ),
        array(  
           "id" => "2",
           "name" => "Architecture"
        ),
        array(  
           "id" => "3",
           "name" => "Art"
        ),
        array(  
           "id" => "4",
           "name" => "Business"
        ),
        array(  
           "id" => "5",
           "name" => "Cars & Motorcycles"
        ),
        array(  
           "id" => "6",
           "name" => "Celebrities"
        ),
        array(  
           "id" => "7",
           "name" => "Design"
        ),
        array(  
           "id" => "8",
           "name" => "Education"
        ),
        array(  
           "id" => "9",
           "name" => "Family"
        ),
        array(  
           "id" => "10",
           "name" => "Film, Music & Books"
        ),
        array(  
           "id" => "11",
           "name" => "Food & Drink"
        ),
        array(  
           "id" => "12",
           "name" => "Gardening"
        ),
        array(  
           "id" => "13",
           "name" => "Geek"
        ),
        array(  
           "id" => "14",
           "name" => "Hair & Beauty"
        ),
        array(  
           "id" => "15",
           "name" => "Health & Fitness"
        ),
        array(  
           "id" => "16",
           "name" => " History"
        ),
        array(  
           "id" => "17",
           "name" => "Holidays & Events"
        ),
        array(  
           "id" => "18",
           "name" => "Home Decor"
        ),
        array(
           "id" => "19",
           "name" => "Humor"
        ),
        array(  
           "id" => "20",
           "name" => "Illustrations & Posters"
        ),
        array(  
           "id" => "21",
           "name" => "Kids"
        ),
        array(  
           "id" => "22",
           "name" => "Men's Fashion"
        ),
        array(  
           "id" => "23",
           "name" => "Outdoors"
        ),
        array(  
           "id" => "24",
           "name" => "Photography"
        ),
        array(  
           "id" => "25",
           "name" => "Products"
        ),
        array(  
           "id" => "26",
           "name" => "Science & Nature"
        ),
        array(
           "id" => "27",
           "name" => "Sports"
        ),
        array(
           "id" => "28",
           "name" => "Tattoos"
        ),
        array(
           "id" => "29",
           "name" => "Technology"
        ),
        array(
           "id" => "30",
           "name" => "Travel"
        ),
        array(
           "id" => "31",
           "name" => "Weddings "
        ),
        array(
           "id" => "32",
           "name" => "Women's Fashion"
        ),
        array(
           "id" => "33",
           "name" => "Other"
        )
    );
    
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
    
    public function postAction()
    {
        $me          = \App\Model\User::getProfile();
        $title       = trim((isset($this->getInputStream()->title)) ? $this->getInputStream()->title : $this->getPost('title'));
        $categories  = json_decode(json_encode((isset($this->getInputStream()->categories)) ? $this->getInputStream()->categories : $this->getPost('categories')), true);
        $translation = $this->getTranslation()->get('eng');
        
        if (empty($title)) {
            // show error
        }
        if (empty($categories)) {
            // show error
        }
        if (mb_strlen($title) >= 255) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['task']['titleMaxLength']));
        }
        if (count($categories) > count(self::$goalCategories)) {
            // show error
        }
        $goalModel     = new \App\Model\Goal();
        $relationModel = new \App\Model\CategoryRelation();
        
        try {
            $goalId = $goalModel->addGoal($me['id'], $title);
        } catch (\System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        try {
            $relationModel->addGoalCategoriesRelation($categories, $goalId);
        } catch (\System\Exception\ModelException $e) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'data' => '', 'html' => ''));
    }
    
    public function getlistAction()
    {
        $offset     = (isset($this->getInputStream()->offset)) ? $this->getInputStream()->offset : $this->getPost('offset');
        $constrains = array('table' => \App\Model\Profile::getTable());
        
        $goalModel = new \App\Model\Goal();
        $result = $goalModel->getGoals($offset, $constrains);
        
        if (!$result || empty($result)) {
            /**
             * show error
             */
            $this->getView()->renderJson(array('status' => -1, 'data' => '', 'html' => ''));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'data' => $result, 'html' => ''));
    }
}

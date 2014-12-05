<?php

namespace App\Model;

class CategoryRelation extends \System\Model
{
    public static $table = 'relation_goals_categories';
    
    public function addGoalCategoriesRelation($categoryList, $goalId)
    {
        if (empty($categoryList)) {
            throw new \System\Exception\ModelException('category can not be blank.');
        }

        if (!is_numeric($goalId)) {
            throw new \System\Exception\ModelException('worg value was provided for goalId.');
        }

        //Generate insert sql
        $sql = 'INSERT INTO ' . self::$table . ' (category_id, goal_id) VALUES ';
        
        $step = 0;
        foreach ($categoryList as $category) {
            $categoryId = $category['id'];
            $sql .= "($categoryId, $goalId)";
            if($step < count($categoryList) - 1){
                $sql .= ', ';
            }
            ++$step;
        }

        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute();
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
    }
}

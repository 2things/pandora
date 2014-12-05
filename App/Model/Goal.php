<?php

namespace App\Model;

class Goal extends \System\Model
{
    public static $table = 'goal';
    
    protected static $goalStatuses = array(
        'inprogress' => 0,
        'complete'   => 1,
    );
    
    protected static $selectLimit = 20;
    
    public function addGoal($userId, $title)
    {
        if (!is_numeric($userId)) {
            throw new \System\Exception\ModelException('worg value was provided for userId.');
        }
        
        if (mb_strlen($title) >= 255) {
            throw new \System\Exception\ModelException('The string-length of task title exceeds allowable length.');
        }
        
        $sql = 'INSERT INTO ' . self::$table . ' (user_id, title) VALUES (:userId, :title)';
        var_dump('INSERT INTO ' . self::$table . ' (user_id, title) VALUES (' . $userId . ', "'. $title .'")'); exit;
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('userId' => $userId, 'title' => $title));
            $lastInsertedGoal = $db->lastInsertId();
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
        
        return $lastInsertedGoal;
    }
}
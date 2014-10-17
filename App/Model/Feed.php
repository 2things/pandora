<?php

namespace App\Model;

class Feed extends \System\Model
{
    public static $tableGoal = 'goal';
    
    private static $rowGoalLimit = 20;
    
    public function getGoalList($userId, $startedFrom)
    {
        $sql = 'SELECT * FROM ' . self::$tableGoal . ' WHERE owner_id = :userId ORDER BY updated_date DESC LIMIT :startedFrom, :limit';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('userId' => $userId, 'startedFrom' => $startedFrom, 'limit' => self::$rowGoalLimit));
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}


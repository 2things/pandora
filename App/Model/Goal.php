<?php

namespace App\Model;

class Goal extends \System\Model
{
    private static $dbLimit = 20;
    
    private static $table = 'goal';
    
    public static function getTable()
    {
        return self::$table;
    }
    
    protected static $goalStatuses = array(
        'inprogress' => 0,
        'complete'   => 1,
    );
    
    protected static $selectLimit = 20;
    
    public function addGoal($profileId, $title)
    {
        if (!is_numeric($profileId)) {
            throw new \System\Exception\ModelException('worg value was provided for userId.');
        }
        
        if (mb_strlen($title) >= 255) {
            throw new \System\Exception\ModelException('The string-length of task title exceeds allowable length.');
        }
        
        $sql = 'INSERT INTO ' . self::$table . ' (profile_id, title) VALUES (:profileId, :title)';
        
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('profileId' => $profileId, 'title' => $title));
            $lastInsertedGoal = $db->lastInsertId();
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
        
        return $lastInsertedGoal;
    }
    
    /**
     * Gets the list of recently added goals
     * 
     * @param int $dbOffset database limit offser
     * @param array $constrains constrains e.g. table name (in this case table is profile table) when joining to another tabel
     */
    public function getGoals($dbOffset, $constrains)
    {
        if (!isset($constrains['table']) || empty($constrains['table'])) {
            return;
        }
        
        $tableToJoin = $constrains['table'];
        $sql = 'SELECT origin.id AS goal_id, origin.profile_id, origin.title, secondary.username, secondary.avatar, secondary.name '
                . 'FROM ' . self::$table . ' AS origin '
                . 'JOIN ' . $tableToJoin . ' AS secondary '
                . 'ON origin.profile_id = secondary.id '
                . 'ORDER BY origin.id DESC '
                . 'LIMIT :offset, :limit';

        $db  = $this->getDb();
        $sth = $db->prepare($sql);
        $sth->bindParam(':offset', $dbOffset, \PDO::PARAM_INT);
        $sth->bindParam(':limit', self::$dbLimit, \PDO::PARAM_INT);
        $sth->execute();

        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}
<?php

namespace App\Model;

class Category extends \System\Model
{
    private static $table = 'goal_categories';
    
    public static function getTable()
    {
        return self::$table;
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM ' . self::$table;

        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute();
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
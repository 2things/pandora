<?php

namespace App\Model;

class Category extends \System\Model
{
    public static $table = 'categories';
    
    public function getAll()
    {
        $sql = 'SELECT * FROM ' . self::$table;

        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute();
            return $sth->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

    }
}
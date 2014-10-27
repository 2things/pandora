<?php

namespace App\Model;

class Task extends \System\Model
{
    protected static $table = 'task';
    
    protected static $selectLimit = 20;
    
    public function getTasks($userId, $begingingFrom)
    {
        if (!is_numeric($userId)) {
            throw new \System\Exception\ModelException('worg value was provided for userId.');
        }
        
        if (!is_numeric($begingingFrom)) {
            throw new \System\Exception\ModelException('Wrong value was provided for "from" - limit option.');
        }
        
        $sql = 'SELECT * FROM ' . self::$table . ' '
                . 'WHERE user_id = :userId' . ' '
                . 'LIMIT :beginingFrom , ' . self::$selectLimit . ' '
                . 'ORDER BY created_date DESC';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('userId' => $userId, 'beginingFrom' => $begingingFrom));
            return $sth->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
    }
    
    public function addTask($userId, $taskTitle)
    {
        if (!is_numeric($userId)) {
            throw new \System\Exception\ModelException('worg value was provided for userId.');
        }
        
        if (mb_strlen($taskTitle) >= 255) {
            throw new \System\Exception\ModelException('The string-length of task title exceeds allowable length.');
        }
        
        $sql = 'INSERT INTO ' . self::$table . ' '
                . '(user_id, title) VALUES (:userId, :title)';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('userId' => $userId, 'title' => $taskTitle));
            return $db->lastInsertId();
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
    }
    
    public function editTask($userId, $taskId, $taskTitle)
    {
        if (!is_numeric($userId)) {
            throw new \System\Exception\ModelException('worg value was provided for userId.');
        }
        
        if (!is_numeric($taskId)) {
            throw new \System\Exception\ModelException('worg value was provided for taskId.');
        }
        
        if (mb_strlen($taskTitle) >= 255) {
            throw new \System\Exception\ModelException('The string-length of task title exceeds allowable length.');
        }
        
        $sql = 'UPDATE TABLE ' . self::$table . ' '
                . 'SET title = :title '
                . 'WHERE user_id = :userId AND id = :taskId';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            return $sth->execute(array('title' => $taskTitle, 'user_id' => $userId, 'taskId' => $taskId));
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
    }
}

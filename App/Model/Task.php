<?php

namespace App\Model;

class Task extends \System\Model
{
    private static $table = 'task';
    
    public static function getTable()
    {
        return self::$table;
    }
    
    protected static $taskStatuses = array(
        'inprogress' => 0,
        'complete'   => 1,
    );
    
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
                . 'ORDER BY created_date DESC '
                . 'LIMIT :offset, :limit';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->bindParam(':userId', $userId);
            $sth->bindParam(':offset', $begingingFrom, \PDO::PARAM_INT);
            $sth->bindParam(':limit', self::$selectLimit, \PDO::PARAM_INT);
            $sth->execute();
            
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
            $lastInsertedTask = $db->lastInsertId();
            $sql = 'SELECT * FROM ' . self::$table . ' WHERE id = ' . $lastInsertedTask;
            $sth = $db->prepare($sql);
            $sth->execute();
            return $sth->fetch(\PDO::FETCH_ASSOC);
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
    }
    
    public function setAsDone($userId, $tasks)
    {
        if (!is_numeric($userId)) {
            throw new \System\Exception\ModelException('wrong value was provided for userId.');
        }
        
        $updatedDate = date('Y-m-d h:i:s');
        $in = array();
        
        foreach ($tasks as $task) {
            if (is_array($task)) {
                if (!is_numeric($task['id'])) {
                    throw new \System\Exception\ModelException('wrong value was provided for task.');
                }

                $in[] = $task['id'];
            } else {
                if (!is_numeric($task->id)) {
                    throw new \System\Exception\ModelException('wrong value was provided for task.');
                }

                $in[] = $task->id;
            }
        }
        
        if (empty($in)) {
            throw new \System\Exception\ModelException('No task to complete.');
        }
        
        $in = implode(' ,', $in);
        
        $sql = 'UPDATE ' . self::$table . ' '
                . 'SET '
                . 'status = ' . self::$taskStatuses['complete'] . ', '
                . 'updated_date = "' . $updatedDate . '" '
                . 'WHERE '
                . 'user_id = :userId AND id IN (' . $in . ')';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            return $sth->execute(array('userId' => $userId));
        } catch (\System\Exception\DbException $e) {
            throw new \System\Exception\ModelException($e->getMessage());
        }
    }
    
    public function deleteTasks($userId, $tasks)
    {
        if (!is_numeric($userId)) {
            throw new \System\Exception\ModelException('wrong value was provided for userId.');
        }
        
        $in = array();
        
        foreach ($tasks as $task) {
            if (is_array($task)) {
                if (!is_numeric($task['id'])) {
                    throw new \System\Exception\ModelException('wrong value was provided for task.');
                }

                $in[] = $task['id'];
            } else {
                if (!is_numeric($task->id)) {
                    throw new \System\Exception\ModelException('wrong value was provided for task.');
                }

                $in[] = $task->id;
            }
        }
        
        if (empty($in)) {
            throw new \System\Exception\ModelException('No task to complete.');
        }
        
        $in = implode(' ,', $in);
        
        $sql = 'DELETE FROM ' . self::$table
                . ' WHERE'
                . ' user_id = :userId AND id IN (' . $in . ')';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            return $sth->execute(array('userId' => $userId));
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

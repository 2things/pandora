<?php

namespace App\Model;

class Goal extends \System\Model
{
    public static $table = 'goal';
    
    private $data = array(
        'id' => null,
        'owner_id' => null,
        'title' => null,
        'description' => null,
        'img_attach' => null,
        'created_date' => null,
        'updated_date' => null,
        'status' => null,
    );
    
    public function setId($id)
    {
        $this->data['id'] = $id;
        return $this;
    }
    
    public function getId()
    {
        return $this->data['id'];
    }
    
    public function setOwnerId($ownerId)
    {
        $this->data['owner_id'] = $ownerId;
        return $this;
    }
    
    public function getOwnerId()
    {
        return $this->data['owner_id'];
    }
    
    public function setTitle($title)
    {
        $this->data['title'] = $title;
        return $this;
    }
    
    public function getTitle()
    {
        return $this->data['title'];
    }
    
    public function setDescription($description)
    {
        $this->data['description'] = $description;
        return $this;
    }
    
    public function getDescription()
    {
        return $this->data['description'];
    }
    
    public function setImgAttach($imgAttachSource)
    {
        $this->data['img_attach'] = $imgAttachSource;
        return $this;
    }
    
    public function getImgAttach()
    {
        return $this->data['img_attach'];
    }
    
    public function setCreatedDate($createdDate)
    {
        $this->data['created_date'] = $createdDate;
        return $this;
    }
    
    public function getCreatedDate()
    {
        return $this->data['created_date'];
    }
    
    public function setUpdatedDate($updatedDate)
    {
        $this->data['updated_date'] = $updatedDate;
        return $this;
    }
    
    public function getUpdatedDate()
    {
        return $this->data['updated_date'];
    }
    
    public function setStatus($status)
    {
        $this->data['status'] = $status;
        return $this;
    }
    
    public function getStatus()
    {
        return $this->data['status'];
    }
    
    public function setData($data)
    {
        if (array_keys($this->data) != array_keys($data)) {
            throw new Exception('Undefined goal data');
        }
        
        $this->data = $data;
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function insert()
    {
        $data = $this->data;
        unset($data['id']);
        $keys = array_keys($data);
        $sql = 'INSERT INTO ' . self::$table . ' VALUES (';
        foreach ($keys as $value) {
            $sql .= ":{$value} ";
        }
        
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute($data);
            $this->setData($db->lastInsertId());
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $this;
    }
}
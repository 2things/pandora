<?php

namespace App\Model;

class Profile extends \System\Model
{
    protected static $table = 'profile';
    
    protected $data = array(
        'id' => null,
        'user_id' => null,
        'avatar' => null,
        'name' => null,
        'about' => null,
        'website_url' => null,
        'fb_url' => null,
        'twitter_url' => null,
        'followers' => null,
        'followings' => null,
        'wishlist' => null,
        'goals' => null,
        'likes' => null,
        'profession' => null,
        'birth_date' => null,
        'created_date' => null,
        'profile_rating' => null,
        'profile_type' => null
    );
    
    public function setData($data)
    {
        if (!is_array($data)) {
            throw new \System\Exception\ModelException('Model: Profile, Method: setData, Message: Parameter type should be array');
        }
        
        $fields = array_keys($data);
        foreach ($fields as $field) {
            if (!key_exists($field, $this->data)) {
                continue;
            }
            
            $this->data[$field] = $data[$field];
        }
    }
    
    public function getData()
    {
        return $this->data;
    }
    
    public function getProfile($userId)
    {
        if (!is_numeric($userId)) {
            throw new \System\Exception\ModelException('Model: Profile, Method: getProfile, Message: userId parameter should have numeric type');
        }
        
        $sql = 'SELECT * FROM ' . self::$table . ' WHERE user_id = :userId';
        $db = $this->getDb();
        $sth = $db->prepare($sql);
        $sth->execute(array('userId' => $userId));
        return $sth->fetch(\PDO::FETCH_ASSOC);
    }
}

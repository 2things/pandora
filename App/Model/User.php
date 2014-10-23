<?php

namespace App\Model;

use System;

class User extends \System\Model
{
    private $username;
    
    private $email;
    
    private $password;
    
    private $id;
    
    public static $me;
    
    public function __construct($data = null) 
    {
        parent::__construct();
        if ($data) {
            try {
                $this->username = $data['username'];
                $this->email    = $data['email'];
                $this->password = $data['password'];
            } catch (\Exception $e) {
                throw new \Exception($e->getMessage());
            }
        }
    }
    
    public function setOptions($data)
    {
        try {
            $this->username = (isset($data['username']) ? $data['username'] : null);
            $this->email    = (isset($data['email']) ? $data['email'] : null);
            $this->password = (isset($data['password']) ? $data['password'] : null);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $this;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }
    
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
    
    public function signup()
    {
        session_destroy();
        session_start();
        $_SESSION['user'] = self::$me = array('username' => $this->username, 'email' => $this->email, 'id' => $this->id);
    }
    
    public function login()
    {       
        session_destroy();
        session_start();
        $_SESSION['user'] = self::$me = array('username' => $this->username, 'email' => $this->email, 'id' => $this->id);
    }
    
    public function insert()
    {
        $sql = 'INSERT INTO user (username, email, password) VALUES (:username, :email, :password)';
        
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('username' => $this->username, 'email' => $this->email, 'password' => $this->password));
            $this->id = $db->lastInsertId();
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
        
        return $this;
    }
    
    public function getUserByUsername($username)
    {
        $sql = 'SELECT * FROM user WHERE username = :username';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('username' => $username));
            return $sth->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    public function isCredentialsExist($username, $password)
    {
        $sql = 'SELECT * FROM user WHERE username = :username AND password = :password';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('username' => $username, 'password' => $password));
            return (bool)$sth->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    public function isUsernameExist($username)
    {
        $sql = 'SELECT id FROM user WHERE username = :username';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('username' => $username));
            return (bool)$sth->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    public function isEmailExist($email)
    {
        $sql = 'SELECT id FROM user WHERE email = :email';
        try {
            $db = $this->getDb();
            $sth = $db->prepare($sql);
            $sth->execute(array('email' => $email));
            return (bool)$sth->fetch(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
    
    public static function isAuthorized()
    {
        return (isset($_SESSION['user']) && !empty($_SESSION['user']));
    }
    
    public static function getMe()
    {
        return (self::isAuthorized()) ? $this->getSession('user') : false;
    }
}

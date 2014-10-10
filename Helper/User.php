<?php

namespace Helper;

class User
{
    const USERNAME_PATTERN = '/^[A-Za-z0-9_.]{2,31}$/';
    
    const EMAIL_PATTERN = '/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/';
        
    public function isUsernameValid($username)
    {
        return preg_match(self::USERNAME_PATTERN, $username);
    }
    
    public function isEmailValid($email)
    {
        return preg_match(self::EMAIL_PATTERN, $email);
    }
    
    public function makePassHash($password)
    {
        return md5($password);
    }
}
<?php
namespace App\Controller;

use System;
/**
 * UserController class
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 */
class UserController extends \System\HttpFrontController
{
    /**
     * Performs action signup
     * 
     * @return void
     */
    public function signupAction()
    {
        if (\App\Model\User::isAuthorized()) {
            $this->getView()->renderJson(array('status' => 0, 'html' => ''));
        }

        $email      = (isset($this->getInputStream()->email)) ? $this->getInputStream()->email : $this->getPost('email');
        $username   = (isset($this->getInputStream()->username)) ? $this->getInputStream()->username : $this->getPost('username');
        $password   = (isset($this->getInputStream()->password)) ? $this->getInputStream()->password : $this->getPost('password');
        $passRepeat = (isset($this->getInputStream()->passwordRepeat)) ? $this->getInputStream()->passwordRepeat : $this->getPost('password-repeat');

        $userModel   = new \App\Model\User();
        $userHelper  = $this->getHelper()->getUser();
        $translation = $this->getTranslation()->get('eng');
        
        if (!$userHelper->isEmailValid($email)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['signup']['invalidEmail']));
        }
        
        if ($userModel->isEmailExist($email)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['signup']['emailExist']));
        }
        
        if (!$userHelper->isUsernameValid($username)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['signup']['invalidUsername']));
        }
        
        if ($userModel->isUsernameExist($username)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['signup']['usernameExist']));
        }
        
        if (empty($password)) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['signup']['passwordEmptyError']));
        }
        
        if ($password != $passRepeat) {
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['signup']['passwordMatchError']));
        }
        
        $data = array(
            'username' => $username,
            'email'    => $email,
            'password' => $userHelper->makePassHash($password),
        );
        try {
            $userModel->setOptions($data)->insert()->signup();
        } catch (\Exception $e) {
            // @TODO Write log
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']['error']));
        }
        
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
    
    /**
     * Performs action login
     * 
     * @return void
     */
    public function loginAction()
    {
        if (\App\Model\User::isAuthorized()) {
            $this->getView()->renderJson(array('status' => 0, 'html' => ''));
        }
        
        $username   = $this->getPost('username');
        $password   = $this->getPost('password');
        
        $userModel   = new \App\Model\User();
        $userHelper  = $this->getHelper()->getUser();
        $translation = $this->getTranslation()->get('eng');
        
        $data = array(
            'username' => $username,
            'password' => $userHelper->makePassHash($password)
        );
        try {
            if (!$userModel->isCredentialsExist($data['username'], $data['password'])) {
                $this->getView()->renderJson(array('status' => -1, 'html' => $translation['login']['failed'])); 
            }
            
            $userModel->setOptions($data)->login();
        } catch (\Exception $e) {
            // @TODO Write log
            $this->getView()->renderJson(array('status' => -1, 'html' => $translation['common']['error']));
        }
        $this->getView()->renderJson(array('status' => 1, 'html' => ''));
    }
}
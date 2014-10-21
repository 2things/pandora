<?php

namespace System;

/**
 * Http front controller
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 */
class HttpFrontController
{
    /**
     *
     * @var array
     */
    private $session;
    
    /**
     *
     * @var array
     */
    private $get;
    
    /**
     *
     * @var array
     */
    private $post;
    
    /**
     *
     * @var array
     */
    private $server;
    
    /**
     *
     * @var \Smarty
     */
    private $view;
    
    /**
     *
     * @var \System\Model
     */
    private $model;
    
    /**
     *
     * @var \System\Helper
     */
    private $helper;
    
    /**
     *
     * @var \System\Translation
     */
    private $translation;
    
    /**
     *
     * @var \System\Config
     */
    private $config;
    
    /**
     * Constructor of the class
     */
    public function __construct()
    {
        // Global variables
        $this->session = $_SESSION;
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->server  = $_SERVER;
        
        $this->init();
    }
    
    /**
     * Init basic system classes
     * 
     * @return void
     */
    final private function init()
    {
        $this->view        = new \System\View();
        $this->model       = new \System\Model();
        $this->config      = new \System\Config();
        $this->helper      = new \System\Helper();
        $this->translation = new \System\Translation();
    }
    
    /**
     * Redirects to the provided url
     * 
     * @param string $url
     * 
     * @return void
     */
    public function redirect($url)
    {
        header("Location: $url");
        die();
    }
    
    /**
     * Gets view object
     * 
     * @return \Smarty
     */
    public function getView()
    {
        return $this->view;
    }
    
    /**
     * Gets the Model object
     * 
     * @return \System\Model
     */
    public function getModel()
    {
        return $this->model;
    }
    
    /**
     * Gets the Helper object
     * 
     * @return \System\Helper
     */
    public function getHelper()
    {
        return $this->helper;
    }
    
    /**
     * Gets the Translation object
     * 
     * @return \System\Translation
     */
    public function getTranslation()
    {
        return $this->translation;
    }
    
    /**
     * Gets the Config class
     * 
     * @return \System\Config
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Gets the session key from $_SESSION array or all $_SESSION array
     * 
     * @param string $key
     * 
     * @return mixed
     */
    final protected function getSession($key = null)
    {
        if (!$key) {
            return $this->session;
        }
        
        return (isset($this->session[$key])) ? $this->session[$key] : null;
    }
    
    /**
     * Gets the get key from $_GET array or all $_GET array
     * 
     * @param string $key
     * 
     * @return mixed
     */
    final protected function getGet($key = null)
    {
        if (!$key) {
            return $this->get;
        }
        
        return (isset($this->get[$key])) ? $this->get[$key] : null;
    }
    
    /**
     * Gets the post key from $_POST array or all $_POST array
     * 
     * @param string $key
     * 
     * @return mixed
     */
    final protected function getPost($key = null)
    {
        if (!$key) {
            return $this->post;
        }
        
        return (isset($this->post[$key])) ? $this->post[$key] : null;
    }
    
    /**
     * Gets the PHP input straem
     * 
     * @return JSON
     */
    final protected function getInputStream()
    {
        return json_decode(file_get_contents("php://input"));
    }
    
    /**
     * Gets the server key from $_SERVER array or all $_SERVER array
     * 
     * @param string $key
     * 
     * @return mixed
     */
    final protected function getServer($key = null)
    {
        if (!$key) {
            return $this->server;
        }
        
        return (isset($this->server[$key])) ? $this->server[$key] : null;
    }
    
    final protected function show404()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Error/404.tpl');
    }
    
    final protected function show500()
    {
        $this->getView()->setVariable('isAuthorized', \App\Model\User::isAuthorized());
        $this->getView()->getSmarty()->display('Error/500.tpl');
    }
}


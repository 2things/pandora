<?php

namespace System;

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
     * Constructor of the class
     */
    public function __construct()
    {
        $this->session = $_SESSION;
        $this->get     = $_GET;
        $this->post    = $_POST;
        $this->server  = $_SERVER;
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
}


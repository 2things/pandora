<?php

namespace System;

/**
 * Model class
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 */
class Model
{
    /**
     *
     * @var System\Config
     */
    private $config;
    
    /**
     *
     * @var PDO
     */
    private $db;
    
    /**
     *
     * @var _SESSION
     */
    private $session;
    
    /**
     *
     * @var _SERVER
     */
    private $server;
    
    /**
     *
     * @var string
     */
    private $appModelNamespace = '\\App\\Model\\';
        
    /**
     * Constructor of the class
     */
    public function __construct()
    {
        // Global variables
        $this->session = $_SESSION;
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
        $this->config      = new \System\Config();
        $this->db          = $this->initDb();
    }
    
    /**
     * Gets the requested model from App\Model
     * 
     * @param string $model
     * 
     * @return object 
     */
    public function get($model)
    {
        $modelFull = '\\App\\Model\\' . ucfirst($model);
        return new $modelFull($this->config);
    }
    
    /**
     * initialize the database Object
     * 
     * @return \PDO
     */
    private function initDb()
    {
        $dbConfig = $this->getConfig()->get('db');
        return new \PDO('mysql:dbname=' . $dbConfig['name'] . ';host=' . $dbConfig['host'], $dbConfig['user'], $dbConfig['pass']);
    }
    
    /**
     * Gets the database object
     * 
     * @return \PDO
     */
    public function getDb()
    {
        return $this->db;
    }
    
    public function getSession($key = null)
    {
        if ($key) {
            return (isset($this->session[$key])) ? $this->session[$key] : null;
        } else {
            $this->session;
        }
    }
    
    /**
     * Gets the configuration class
     * 
     * @return \System\Config
     */
    public function getConfig()
    {
        return $this->config;
    }
}
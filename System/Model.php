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
     * @var string
     */
    private $appModelNamespace = '\\App\\Model\\';
    
    /**
     * Constructor of the class
     */
    public function __constructor()
    {
        $this->config = new \System\Config();
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
        $modelFull = '\\App\\Model\\' . $model;
        return new $modelFull($this->config);
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
<?php

namespace System;

/**
 * Configuration class
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 */
class Config
{
    /**
     *
     * @var array
     */
    private $options = array(
        'dev' => array(
            'db' => array(
                'host' => '127.0.0.1',
                'user' => 'root',
                'pass' => '',
                'name' => 'eplanner'
            )
        ),
        
        'staging' => array(),
        
        'live' => array()
    );
    
    /**
     * Gets the config var. from the selected environment
     * 
     * @param string $key     config key
     * @param string $fromEnv environment variable
     * 
     * @return mixed
     * 
     * @throws \Exception
     */
    public function get($key, $fromEnv)
    {
        if (!isset($this->options[$fromEnv])) {
            throw new \Exception('Undefined environment variable');
        }
        if (!isset($this->options[$fromEnv][$get])) {
            throw new \Exception('Undefined configuration option');
        }
        
        return $this->options[$fromEnv][$get];
    }
}


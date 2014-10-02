<?php

namespace System;

class Bootstrap
{
    /**
     *
     * @var string
     */
    private $errorController;
    
    /**
     *
     * @var string
     */
    private $error500Action;
    
    /**
     *
     * @var string
     */
    private $error404Action;
    
    /**
     *
     * @var string
     */
    private $defaultController;
    
    /**
     *
     * @var string
     */
    private $defaultAction;
    
    /**
     * Constructor of the class
     */
    public function __construct()
    {
        $this->errorController   = 'errorController';
        $this->error500Action    = 'error500Action';
        $this->error404Action    = 'error404Action';
        $this->defaultController = 'indexController';
        $this->defaultAction     = 'indexAction';
    }
    
    /**
     * Detects the controller and action from http request
     * 
     * @param array|string $httpRequest array or string of hhtp request
     * 
     * @return array controller/action pair
     */
    public function run($httpRequest)
    {
        if (is_string($httpRequest)) {
            $requestComponents = explode('/', trim($httpRequest, '/'));
        } elseif (is_array($httpRequest)) {
            $requestComponents = explode('/', trim(explode('?', $httpRequest['REQUEST_URI'])[0], '/'));
            
            if (empty($requestComponents[0])) {
                return array('controller' => $this->defaultController, 'action' => $this->defaultAction);
            } 
        } else {
            return array('controller' => $this->errorController, 'action' => $this->error500Action);
        }
        
        $controller = ucfirst(strtolower($requestComponents[0])) . 'Controller';
        $action     = (isset($requestComponents[1]) && !empty($requestComponents[1])) ? strtolower($requestComponents[1]) . 'Action' : $this->defaultAction;
        
        if (!file_exists(PATH_CONTROLLER . '/' . $controller . '.php')) {
            return array('controller' => $this->errorController, 'action' => $this->error404Action);
        }
        
        if (!method_exists(new $controller, $action)) {
            return array('controller' => $this->errorController, 'action' => $this->error404Action);
        }
        
        return array('controller' => $controller, 'action' => $action);
    }
}
<?php

namespace System;

/**
 * View class
 * 
 * @author Gevorg Makaryan <makaryan.gevorg@gmail.com>
 */
class View
{
    /**
     *
     * @var \Smarty
     */
    protected $smarty;
    
    /**
     * Contructor of the class
     */
    public function __construct()
    {
        $this->smarty = new \Smarty();
        
        $this->smarty->template_dir = PATH_VIEW . '/';
        $this->smarty->compile_dir  = PATH_ROOT . '/../tmp/Smarty/compile/';
        $this->smarty->cache_dir    = PATH_ROOT . '/../tmp/Smarty/cache/';
        
        $this->smarty->caching = false;
    }
    
    /**
     * Gets the view object
     * 
     * @return \Smarty
     */
    public function getSmarty()
    {
        return $this->smarty;
    }
    
    /**
     * Sets the variable to template
     * 
     * @param string $var   variable to be assigned
     * @param mixed  $value value of the variable
     */
    public function setVariable($var, $value)
    {
        $this->smarty->assign($var, $value);
    }
    
    /**
     * Gets the html head template content
     * 
     * @return string HTML content of the string
     */
    public function getHtmlHead()
    {
        return $this->smarty->fetch('Head.tpl');
    }
    
    /**
     * Gets the html footer template content
     * 
     * @return string HTML content of the string
     */
    public function getHtmlFooter()
    {
        return $this->smarty->fetch('Footer.tpl');
    }
    
    /**
     * Renders a json
     * 
     * @param array $array
     */
    public function renderJson($array)
    {
        header('Content-type: application/json');
        echo json_encode($array);
        exit;
    }
}
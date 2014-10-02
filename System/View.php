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
        $this->smarty = new Smarty();
        
        $this->smarty->template_dir = PATH_VIEW . '/';
        $this->smarty->compile_dir  = PATH_ROOT . '/../tmp/Smarty/compile/';
        $this->smarty->cache_dir    = PATH_ROOT . '/../tmp/Smarty/cache/';
    }
    
    /**
     * Gets the view object
     * 
     * @return \Smarty
     */
    public function getView()
    {
        return $this->smarty;
    }
}
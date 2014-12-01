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
     *
     * @var string
     */
    protected $layout;
    
    /**
     *
     * @var string
     */
    protected $pageContent;
    
    /**
     *
     * @var boolean
     */
    protected $isLeftmenuHidden = false;


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
        return $this->smarty;
    }
    
    /**
     * Sets the layout
     * 
     * @param string $layout
     */
    public function setLayout($layout)
    {
        $this->layout = $layout;
        return $this;
    }
    
    /**
     * Sets the page content
     * 
     * @param string $pageContent
     */
    public function setPageContent($pageContent)
    {
        $this->pageContent = $pageContent;
        return $this;
    }
    
    /**
     * Hides the left menu block
     */
    public function hideLeftmenu()
    {
        $this->isLeftmenuHidden = true;
        return $this;
    }
    
    public function display()
    {
        $this->smarty->assign('isHiddenleftMenu', $this->isLeftmenuHidden);
        $this->smarty->assign('pageContent', $this->pageContent);
        $this->smarty->display('Layouts/' . $this->layout . '.tpl');
        exit;
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
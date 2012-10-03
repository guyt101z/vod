<?php

class Template {
    
    private $path;
    public $template_name;
    public $view_name;
    private $params;
    
    public function __construct() {
        $this->path = substr(__DIR__, 0, -3);
    }
    
    public function set($name) {
        if (!isset($name) || empty($name))
            return FALSE;
        
        $this->template_name = strtolower($name);
    }
    
    public function view($name, $params = array()) {
        
        global $params_view;
        
        if (!isset($name) || empty($name))
            return FALSE;
        
        $this->params = null;
        if (count($params) > 0)
            $this->params = $params;
        
        if (empty($this->template_name))
            require_once $this->path.'views'.DIRECTORY_SEPARATOR.$name.'View.php';
        else
            require_once $this->path.'views'.DIRECTORY_SEPARATOR.$this->template_name.DIRECTORY_SEPARATOR.$name.'View.php';
    }
    
    public function get($name) {
        if (!isset($name) || empty($name))
            return FALSE;
        
        if (empty($this->template_name))
            include $this->path.'views'.DIRECTORY_SEPARATOR.$name.'View.php';
        else
            include $this->path.'views'.DIRECTORY_SEPARATOR.$this->template_name.DIRECTORY_SEPARATOR.$name.'View.php';
    }
}
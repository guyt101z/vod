<?php

class Controller
{
    protected $path;
    private $model;
    private $template;
    public $params_view;
    
    public function __construct($model) {
        $this->path = substr(__DIR__, 0, -11);
        
        // Instantiation du modèle
        $model = $this->loadModel($model);
        
        if ($model != FALSE)
            $this->model = $model;
    }
    
    public function loadTemplate($name) {
        if (!isset($name) || empty($name))
            return FALSE;
        
        $this->template = strtolower($name);
    }
    
    public function loadView($name, $params = array()) {
        global $params_view;
        
        if (!isset($name) || empty($name))
            return FALSE;
        
        $params_view = null;
        if (count($params) > 0)
            $params_view = $params;
        
        if (empty($this->template))
            require_once $this->path.'views'.DIRECTORY_SEPARATOR.$name.'View.php';
        else
            require_once $this->path.'views'.DIRECTORY_SEPARATOR.$this->template.DIRECTORY_SEPARATOR.$name.'View.php';
    }
    
    public function loadModel($name) {
        if (!isset($name) || empty($name))
            return FALSE;
        
        if (class_exists($name))
            return new $name();
        else
            return FALSE;
    }
}
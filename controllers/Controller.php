<?php

class Controller
{
    protected $path;
    private $model;
    
    public function __construct($model) {
        $this->path = substr(__DIR__, 0, -11);
        
        // Instantiation du modèle
        $model = $this->loadModel($model);
        
        if ($model != FALSE)
            $this->model = $model;
    }
    
    public function loadView($name) {
        if (!isset($name) || empty($name))
            return FALSE;
        
        require_once $this->path.'views'.DIRECTORY_SEPARATOR.$name.'View.php';
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
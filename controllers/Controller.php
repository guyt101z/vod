<?php

class Controller
{
    protected $path;
    private $model;
    private $template_name;
    protected $template;
    public $params_view;
    
    public function __construct($model) {
        $this->path = substr(__DIR__, 0, -11);
        
        // Instantiation du modèle
        $model = $this->loadModel($model);
        
        if ($model != FALSE)
            $this->model = $model;
        
        // Template
        global $VOD_TPL;
        $this->template = $VOD_TPL;
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
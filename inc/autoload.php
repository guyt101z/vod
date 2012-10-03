<?php

$path = substr(__DIR__, 0, -3);

// Général

require_once $path.'controllers'.DIRECTORY_SEPARATOR.'Controller.php';
require_once $path.'models'.DIRECTORY_SEPARATOR.'Model.php';

// Autoload controllers

$controllers = array('UsersController', 'FooController');

foreach ($controllers as $controller) {
    
    if (file_exists($path.'controllers'.DIRECTORY_SEPARATOR.$controller.'.php')) {
        require_once $path.'controllers'.DIRECTORY_SEPARATOR.$controller.'.php';
    }
}

// Autoload models

$modeles = array('FooModel', 'UsersModel');

foreach ($modeles as $model) {
    if (file_exists($path.'models'.DIRECTORY_SEPARATOR.$model.'.php')) {
        require_once $path.'models'.DIRECTORY_SEPARATOR.$model.'.php';
    }
}
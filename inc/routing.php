<?php

global $action;

$url = explode('/', $action);

$controller = ucwords($url[0]).'Controller';
$model = ucwords($url[0]).'Model';

array_shift($url);

$method = $url[0];

array_shift($url);

$params = array();
foreach ($url as $param) {
    if (!empty($param))
        $params[] = $param;
}

if (class_exists($controller)) {
    
    $do = new $controller($model);
    
    if (!empty($method)) {
        if (method_exists($controller, $method))
            call_user_func_array(array($do, $method), array($params));
        else
            die('Methode inconnue');
    }
    else {
        if (method_exists($controller, 'index'))
            call_user_func_array(array($do, 'index'), array($params));
    }
    
} else
    die('Classe inconnue');
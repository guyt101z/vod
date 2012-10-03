<?php

require_once 'inc/autoload.php';
require_once 'inc/Database.php';

$db = new Database('127.0.0.1', 'vod', 'root', '');
$VOD_DB = $db->connect();

$params_view = null;

if (isset($_GET['action']) && !empty($_GET['action'])) {
    $action = $_GET['action'];
    require_once 'inc/routing.php';
}

if (isset($_GET['controller']) && !empty($_GET['controller'])) {
    
    $class_name = $_GET['controller'].'Controller';
    $class = new $class_name();
    
    if (isset($_GET['method']) && !empty($_GET['method'])) {
        
        $class->$_GET['method']();
        
    }
}
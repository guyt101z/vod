<?php

class FooController extends Controller
{
    public function __construct($model) {
        parent::__construct($model);
    }
    
    public function index() {
        
    }
    
    public function bar($params = array()) {
        
        
        echo '<pre>params: ';
        print_r($params);
        echo '</pre>';
        
    }
    
    public function test() {
        
        echo 'function test';
        
        $this->loadView('Login');
        
    }
}
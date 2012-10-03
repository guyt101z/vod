<?php

class FooController extends Controller
{
    public function __construct($model) {
        parent::__construct($model);
    }
    
    /**
     * Méthode exécutée par défaut si aucune n'est lancée
     */
    public function index() {
        
    }
    
    /**
     * Test de passage de paramètres
     */
    public function bar($params = array()) {
        
        echo '<pre>params: ';
        print_r($params);
        echo '</pre>';
    }
    
    /**
     * Test de chargement d'une vue
     */
    public function test() {
        echo 'function test'."\n";
        $this->loadView('Test');
    }
    
    /**
     * Test de chargement d'un template + vue
     */
    public function testTemplate() {
        
        $this->loadTemplate('users');
        $this->loadView('TestTwo');
    }
    
    public function testParams() {
        $this->loadTemplate('users');
        
        $params = array();
        $params['Test'] = 'lorem ipsum';
        
        $this->loadView('TestParams', $params);
    }
}
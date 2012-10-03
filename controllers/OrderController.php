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
        $this->template->view('Test');
    }
    
    /**
     * Test de chargement d'un template + vue
     */
    public function testTemplate() {
        $this->template->set('users');
        $this->template->view('TestTwo');
    }
    
    /**
     * Template + params
     */
    public function testParams() {
        $this->template->set('users');
        
        $params = array();
        $params['Test'] = 'lorem ipsum';
        
        $this->template->view('TestParams', $params);
    }
}
<?php

class UsersController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        
    }
    
    public function login() {
        
        if (isset($_POST['doLogin']) && $_POST['doLogin'] == 1) {
            
            if (!isset($_POST['username']) || empty($_POST['username'])) 
                return FALSE;
            
            
            if (!isset($_POST['password']) || empty($_POST['password']))
                return FALSE;
            
            $users_model = $this->loadModel('Users');
            
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $foo = $users_model->login($username, $password);
            
            echo '<pre>';
            print_r($foo);
            echo '</pre>';
            
        }
        else
            $this->loadView('Login');
    }
    
    public function logout() {
        session_destroy();
        header('Location : ../index.php');
    }
    
    public function add($params) {
        
    }
    
    public function get($id) {
        
    }
    
    public function get_all() {
        
    }
    
    public function edit($id) {
        
    }
    
    public function delete($id) {
        
    }
}
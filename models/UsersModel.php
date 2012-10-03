<?php

require_once 'inc/PasswordHash.php';

class UsersModel extends Model
{
    private $Phpass;
    private $table = 'users';
    
    public function __construct() {
        $this->Phpass = new PasswordHash(8, FALSE);
    }
    
    public function login($username, $password) {
        
        if (!isset($username) || empty($username) || !isset($password) || empty($password))
            return FALSE;
        
        // Hash password
        $pswd_hash = $this->Phpass->HashPassword($password);
        
        $query = $this->db->prepare('SELECT id, statut, rang FROM '. $this->table .' WHERE username = :username, password = :password');
        
        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':password', $pswd_hash);
        
        $query->execute();
        
        if ($query->rowCount() == 1) {
            return $query->fetchObject();
        }
        else
            return FALSE;
    }
    
    public function add($params) {
        
        if (!isset($params) || !is_array($params))
            return FALSE;
        
        $query = $this->db->prepare('INSERT INTO '. $this->table .' (username, name, first_name, email, statut, rang, created) VALUES (:username, :name, :first_name, :email, :statut, :rang, NOW())');

        $query->bindParam(':username', $params['username'], PDO::PARAM_STR);
        $query->bindParam(':password', $this->Phpass->HashPassword($params['password']));
        $query->bindParam(':name', $params['name'], PDO::PARAM_STR);
        $query->bindParam(':first_name', $params['first_name'], PDO::PARAM_STR);
        $query->bindParam(':email', $params['email'], PDO::PARAM_STR);
        $query->bindParam(':statut', $params['statut'], PDO::PARAM_INT);
        $query->bindParam(':rang', $params['rang'], PDO::PARAM_INT);
        
        $query->execute();
    }
    
    public function get($id) {
        
        if (!isset($id) || !is_numeric($id))
            return FALSE;
        
        $query = $this->db->prepare('SELECT * FROM '. $this->table .' WHERE id = :id');;
        
        $query->bindParam(':id', $id);
       
        $query->execute();
        
        if ($query->rowCount() == 1) {
            return $query->fetchObject();
        }
        else
            return FALSE;
    }
    
    public function get_all() {
        
        $query = $this->db->query('SELECT * FROM '. $this->table .' ' );
        
        $users = array();
        
        while ($user = $query->fetchObject()) {
            $users[] = $user;
        }
        
        if (count($users) > 0)
            return $users;
        else
            return FALSE;
    }
    
    public function edit($params) {
        
        if (!isset($params) || !is_array($params))
            return FALSE;
        
        $query = $this->db->query('UPDATE '. $this->table .' ON() WHERE id = :id');
        $query->bindParam(':id', $params['id'], PDO::PARAM_INT);
        
        $query->execute();
    }
    
    public function delete($id) {
        if (!isset($id) || !is_numeric($id))
            return FALSE;
        
        $this->db->exec('DELECT FROM '. $this->table.' WHERE id = '. (int)$id);
    }
}
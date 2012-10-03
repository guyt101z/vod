<?php

class Database
{
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_password;
    
    public function __construct($db_host, $db_name, $db_user, $db_password) {
        $this->db_host = $db_host;
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_password = $db_password;
    }
    
    public function connect() {
        try
        {
            $db = new PDO('mysql:dbname='. $this->db_name .';host='. $this->db_host, $this->db_user, $this->db_password);
            return $db;
        }
        catch (PDOException $e)
        {
            die('Erreur connexion bdd');
        }
    }
    
    
}
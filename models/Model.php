<?php

class Model {
    
    protected $db;
    
    public function __construct() {
        
        // Instance DB
        global $VOD_DB;
        $this->db = $VOD_DB;
    }
    
}
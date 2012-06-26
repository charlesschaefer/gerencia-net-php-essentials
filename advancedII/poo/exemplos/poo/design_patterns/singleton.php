<?php 
// singleton
class DB {
    static private $instance;
    private final function __construct() {
      
    }
    
    static public function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new DB;
        }
        return self::$instance;
    }
}




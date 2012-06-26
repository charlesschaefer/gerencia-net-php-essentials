<?php // Database/ActiveRecord/DbConnection.php

namespace Database\ActiveRecord;

abstract class DbConnection {
    /**
     * @var resource $conn Conexão com banco de dados
     * @static
     */
    static protected $conn;

    /**
     * métodos construtor e destrutor
     */
    public function __construct() {
        $this->connect();
    }
    public function __destruct() {
        $this->close();
    }

    /**
     * Métodos abstratos
     */
    abstract public function query($sql);
    abstract public function fetch($rs);
    abstract public function affected();
    abstract public function lastId();
    abstract public function connect();
    abstract public function close();

}




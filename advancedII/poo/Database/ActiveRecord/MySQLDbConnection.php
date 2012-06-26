<?php // Database/ActiveRecord/MySQLDbConnection.php

namespace Database\ActiveRecord;


class MySQLDbConnection extends DbConnection {
    /**
     * @const Dados para conexão
     */
    const DB_HOST = 'localhost';
    const DB_USER = 'root';
    const DB_PASS = '123123';
    const DB_BASE = 'gerencianet';

    public function query($sql) {
        return mysql_query($sql);
    }
    public function fetch($rs) {
        return mysql_fetch_assoc($rs);
    }
    public function affected() {
        return mysql_affected_rows();
    }
    public function lastId() {
        return mysql_insert_id();
    }
    public function connect() {
        if(!self::$conn) {
            if (self::$conn = mysql_connect(self::DB_HOST, self::DB_USER, self::DB_PASS)) {
                mysql_select_db(self::DB_BASE);
            } else {
                throw new \RuntimeException('Não foi possível conectar no banco!');
            }
        }
    }
    public function close() {
        if(self::$conn){
            mysql_close(self::$conn);
            self::$conn= null;
        }
    }
}




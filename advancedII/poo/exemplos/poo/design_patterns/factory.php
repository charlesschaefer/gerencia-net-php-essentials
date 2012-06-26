<?php
class Factory {
   static public function getDB($db){
      if ($db == 'oracle') {
         return new OracleDB();
      } elseif ($db == 'mysql') {
         return new MySQLDB();
      }
    }
   static public function getExemplo() {
        // ...
   }
}

$database = 'mysql';
//$db = new MySQLDB();
$db = Factory::getDB($database);



<?php
class Arquivo {
   protected static $file;
   public static function read() {
      return file_get_contents(self::$file);
   }
}

class Log extends Arquivo {
   public static $log_file = '/tmp/teste.log';
   public static function write($msg) {
      // self pode ser usado para acessar métodos/propriedades da classe
      file_put_contents(self::$log_file, $msg, FILE_APPEND);
   }
   public static function read() {
      parent::$file = self::$log_file;
      return parent::read();// parent pode ser usado para acessar membros das classes pai
   }
}


echo "Arquivo de log: " . Log::$log_file; // acesso a propriedades estáticas
echo PHP_EOL;
// escreve no log
Log::write('Nova entrada no log' . PHP_EOL); // acesso a métodos estáticos

echo Log::read();
echo PHP_EOL;
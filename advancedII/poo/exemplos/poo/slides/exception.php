<?php
//class InvalidArgumentException extends Exception {}

class Teste {
   public function imprime($string) {
      if (!is_string($string)) {
         throw new InvalidArgumentException('Esperava uma string!');
      }
      if (empty($string)) {
         throw new Exception('String está vazia!');
      }
      echo $string;
   }
}
$teste = new Teste();
// usando inteiro
try {
   $teste->imprime(127);
} catch (InvalidArgumentException $iae) {
   echo $iae->getMessage();
}
// usando string vazia
try {
   $teste->imprime('');
} catch (Exception $e) {
   echo $e->getMessage();
}



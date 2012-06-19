<?php
// funcoes.php
mysql_connect('localhost', 'root', 'phprime');
mysql_select_db('al0xxx');


function listaNoticias() {
   $sql = "SELECT * FROM noticia";
   if ($rs = mysql_query($sql)) {
      $linhas = array();
      while ($linha = mysql_fetch_assoc($rs)) {
         foreach($linha as &$campo) {
            $campo = utf8_encode($campo);
         }
         $linhas[] = $linha;
      }
      return $linhas;
   }
}




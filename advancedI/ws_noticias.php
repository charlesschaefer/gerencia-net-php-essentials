<?php
mysql_connect('localhost', 'root', 'phprime');
mysql_select_db('gerencianet');

class WsNoticia {
    /**
     * @var int
     */
    public $id;
    /**
     * @var string
     */
    public $titulo;
    /**
     * @var string
     */
    public $resumo;
    /**
     * @var string
     */
    public $noticia;
    /**
     * @var string
     */
    public $data_criacao;

    /**
     * @param int $id
     * @return WsNoticia
     */
   public function getNoticia($id) {
      $sql = 'SELECT * FROM noticia WHERE id = ' . (int)$id;
      $rs = mysql_query($sql);
      $not = mysql_fetch_assoc($rs);
      return $not;
   }

    /**
     * @return WsNoticia[]
     */
   public function listaNoticias() {
      $sql = 'SELECT * FROM noticia';
      $rs = mysql_query($sql);
      $noticias = array();
      while ($not = mysql_fetch_assoc($rs)) {
         $noticias[] = $not;
      }
      return $noticias;
   }
}

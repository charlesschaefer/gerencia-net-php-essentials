<?php
require_once dirname(__DIR__) . '/ActiveRecord/ActiveRecord.php';
/**
 * Classe responsável pela manutenção da tabela de usuários
 */
class Categoria extends ActiveRecord {
    protected $table = 'categoria';
}

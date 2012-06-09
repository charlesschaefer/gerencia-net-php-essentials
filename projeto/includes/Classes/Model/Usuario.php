<?php
require_once dirname(__DIR__) . '/ActiveRecord/ActiveRecord.php';

/**
 * Classe responsável pela manipulação da tabela de usuários
 */
class Usuario extends ActiveRecord {
    protected $table = 'usuario';
}


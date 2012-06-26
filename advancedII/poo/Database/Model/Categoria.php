<?php
namespace Database\Model;


/**
 * Classe responsável pela manutenção da tabela de usuários
 */
class Categoria extends \Database\ActiveRecord\ActiveRecord {
    protected $table = 'categoria';
    
    public function __toString() {
        return 'ActiveRecord::Categoria(table categoria)';
    }
}


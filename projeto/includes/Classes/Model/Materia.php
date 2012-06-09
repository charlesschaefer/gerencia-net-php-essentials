<?php // includes/Classes/Model/Materia.php

require_once dirname(__DIR__) . '/ActiveRecord/ActiveRecord.php';

class Materia extends ActiveRecord {
    protected $table = 'materia';
    
    /**
     * Cadastrar os dados da matéria
     * @param array $dados Dados da matéria
     */
    public function cadastra($dados) {
        $dados = $this->_trataDados($dados);
        return $this->insert($dados);
    }

    /**
     * Trata os dados
     * @param array $dados Dados da matéria
     */
    protected function _trataDados($dados) {
        $dados = array(
            'idcategoria'  => (int)$dados['idcategoria'],
            'titulo'       => escape($dados['titulo']),
            'texto'        => escape($dados['texto']),
            'data_criacao' => escape($dados['data_criacao']),
            'publicado'    => (int)$dados['publicado'],
            'imagem'       => escape($dados['imagem']),
            'idusuario'    => (int)$dados['idusuario'];
        );
        return $dados;
    }
}

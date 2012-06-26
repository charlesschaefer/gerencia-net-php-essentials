<?php

namespace Database\ActiveRecord;

/**
 * Classe responsável pelos métodos CRUD do Banco 
 */
 
class ActiveRecord {
    
    const DB_SYSTEM = 'MySQL';
    
    /**
     * @var DbConnection $db Conexão com o sistema de BD
     */
    protected $db;
    
    /**
     * @var string $table Nome da tabela
     */
    protected $table;
    
    /**
     * métodos construtor e destrutor
     */
    public function __construct() {
        $cls = self::DB_SYSTEM . 'DbConnection';
        //require_once __DIR__ . '/' . $cls . '.php';

        $cls = 'Database\\ActiveRecord\\' . $cls;
        $this->db = new $cls();
    }
    public function __destruct() {
        $this->db = null;
    }
    
    /**
     * Método que faz a busca dos dados
     * @param mixed $fields Array com os campos ou string
     * @param mixed $conds Condições para o where (Array ou String)
     */
    public function select($fields, $conds='1') {
        if (is_array($fields)) {
            $fields = implode('', $fields);
        }

        $conds = $this->_conds($conds);
        
        $query = "SELECT {$fields} FROM {$this->table} WHERE {$conds}";
        $rs = $this->db->query($query); //Result set
        if($rs) {
            $linhas = array();
            while($linha = $this->db->fetch($rs)){
                $linhas[] = $linha;
            }
            return $linhas;
        }
        return false;
    }
    
    
    /**
     * Método que faz a inserção dos dados
     * @param array fields Campos a serem inseridos, no formato array('campo' => 'valor')
     */
    public function insert($fields){
        $sql = "INSERT INTO {$this->table} SET ";
        //$sql .= "(". implode(', ', array_keys($fields)) . " ) ";
        //$sql .= "VALUES ('". implode("', '", $fields) . "')";
        $sql .= $this->_flds($fields);
        
        $rs = $this->db->query($sql);
        if($rs) {
            return $this->db->lastId();
        }
        return false;
    }
    
    /**
     * Remove o registro
     * @param array $conds Array de condições no formato array('campo' => 'valor')
     */
    public function delete($conds){
        $_conds = $this->_conds($conds);
        $sql = "DELETE FROM {$this->table} WHERE {$_conds}";
        
        $rs = $this->db->query($sql);
        if($rs) {
            return $this->db->affected();
        } else {
            return false;
        }
    }
    
    /**
     * Atualiza o registro
     * @param array $data Dados para serem atualizados
     * @param array $conds Condições para o update
     */
    public function update($data, $conds) {
       $_conds = $this->_conds($conds);
       $_flds = $this->_flds($data);
       
       $sql = "UPDATE {$this->table} SET {$_flds} WHERE {$_conds}";
       if($this->db->query($sql)) {
           return $this->db->affected();
       }
       return false;
    }
    
    /**
     * Transforma um array de condições em string
     * @param array $conds Array de condições
     */
    protected function _conds($conds) {
        if(!is_array($conds)) {
            return $conds;
        }
        
        $_conds = array();
        foreach($conds as $field=> $cond) {
            if(is_array($cond)) {
                $cond = implode(',', $cond);
                $_conds[] = "{$field} IN({$cond})";
            } else {
                $_conds[] = "{$field} = '{$cond}'";
            }
        }
        $_conds = implode(' AND ', $_conds);
        return $_conds;
    }
    

    /**
     * Transforma um array de "campos" em string
     * @param array $fields Array de campos
     */
    protected function _flds($fields) {
        $flds = array();
        foreach($fields as $campo => $value) {
            $flds[] = "{$campo} = '{$value}'";
        }
        return implode(', ', $flds);
    }
    /**
     * Método Mágico __call(), chamado quando chama uma função
     * que não existe.
     * Permite chamadas como findAllByNome('um nome');
     */
    public function __call($func, $args = array()) {
        $field = str_replace('findAllBy', '', $func);
        $field = strtolower($field);
        return $this->select('*', array($field => $args[0]));
    }
}



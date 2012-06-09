<?php

/*
 * Função "wrapper" do mysql_real_escape_string
 */ 
function escape($param) {
    //protege contra ataques XSS + SQL Injection
    return htmlentities(mysql_real_escape_string($param));
}

// "salt" para melhorar a segurança dos hashes da senha
define('SALT', 'FHAIH1NEWUUFEW98FRK4M23432FDSG45UYT_965');

// gera hash da sha1() da senha + salt
function geraHash($senha) {
    return sha1($senha . SALT);
}


//Conecta e seleciona o BD
function conecta(){
    mysql_connect('localhost','root', 'mpmn') or die('Não foi possível conectar ao banco de dados.');
    mysql_select_db('gerencianet') or die('Não encontrou o banco.');
}


//Tratamento de array
function escapeArray($array){
    //foreach($array as &$item){
    //  $item = mysql_real_escape_string($item);
    //}
    foreach($array as $chave => $item){
        $array[$chave] = mysql_real_escape_string($item);
    }
    return $array;
    //ex.:$_POST = escapeArray($_POST);
}

//retorna true se o usuário estiver logado e false se não estiver
function logado(){
    if (isset($_SESSION['usuario'])){
        if($_SESSION['token'] == $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']){
            return true;
        } else{
            header('Location: logout.php');
        }
    }
    return false;
}

/*
 * Força o usuário a só poder entrar se estiver logado
 */
function protectPage() {
    if(!logado()) {
        addMsg("Você precisa estar logado para acessar esta página");
        header('Location: login.php');
    }
}


/**
 * Efetua o login do usuário
 * @param array $dados Dados do usuário, retorno do mysql_fetch_assoc
 */
function login($dados){
    //evita problemas de session fixation
    session_regenerate_id();
    /*
     * session hijacking
     * De alguma forma o rapaz descobre o id de sessão do um usuário logado
     * Existem várias formas, e uma delas é o XSS.
     */ 
     $_SESSION['token'] = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];
    $_SESSION['usuario'] = $dados;
}
//phpdoc, phpdocumentor, doxygen, etc


/**
 * Renderiza um template
 * @param string $template Arquivos de template para renderizar
 * @param array $variaveis Variáveis que deverão ser disponibilizadas para o template
 */
function render($template, array $variaveis = array()) { //estou falando que o $variáveis pode receber uma variável, se ele não receber, o padrão dele é o array(). Posso inclusive utilizar o type_hinting, passando o array na frente do $variáveis. Desse jeito, estou forçando a variável $variáveis a ser array. O type hinting é algo mais novo no PHP.
    //foreach ($variaveis as $chave => $valor) {
        /*
         * Colocando dois $, a variável criada será do mesmo nome do índice no array.
         */
    //    $$chave = $valor; 
    //}
    //Porém, existe a função extract, que faz isso pra mim
    extract($variaveis);
    /*
     * Existe também a função compact, que se passando os nomes das variáveis, ele cria um array com as variáveis correspondentes
     * $arr = compact('nome', 'idade', 'cidade');
     * se for passado o nome de uma variável que não existe, então o índice não é criado no array
     */
    /** 
     * ob = output buffer
     * Ao invés de mandar o conteúdo para o apache, é armazenado em buffer, e quando a página for exibida, irá exibir tudo e uma vez
     */
    ob_start(); //inicia o output buffering -- guarda na memória do servidor
    include dirname(__FILE__). '/../'.$template;
    
    $conteudo = ob_get_clean(); //pega o que está no buffer e retorna como se fosse uma string
    include dirname(__FILE__). '/../templates/layout.tpl';
    
}


/**
 * Guarda uma mensagem na sessão
 * @param string $msg Mensagem
*/
function addMsg($msg) {
    //armazena a msg como um array, para poder armazenar mais de uma mensagem por vez.
    $_SESSION['msg'][] = $msg;
}


/**
 * Puxa as mensagens da sessão
 * @return String com todas as mensagens, separadas por <br />
 */
function showMsg() {
    if (isset($_SESSION['msg'])){
        $msg = $_SESSION['msg'];
        //apaga as mensagens da sessão
        unset($_SESSION['msg']);
        //junta as mensagens usando um <br />
        return implode('<br />', $msg);
    } else {
        return '';
    }
}

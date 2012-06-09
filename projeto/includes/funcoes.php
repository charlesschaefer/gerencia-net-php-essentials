<?php // projeto/includes/funcoes.php

/**
 * Função "wrapper" do mysql_real_escape_string
 */
function escape($sql) {
    // protege contra ataques XSS + SQL Injection
    return htmlentities(mysql_real_escape_string($sql));
}

// "salt" para melhorar a segurança dos hashes da senha
define('SALT', '1ad4s6fgsad4321ad3df');

/**
 * Gera hash sha1() da senha + salt
 */
function geraHash($senha) {
    return sha1($senha . SALT);
}

/**
 * conecta e seleciona o banco
 */
function conecta() {
    mysql_connect('localhost', 'root') or die('não conectou');
    mysql_select_db('gerencianet') or die('não encontrou o banco');
}

/**
 * Retorna true se o usuário estiver logado, false se não estiver
 * @return boolean
 */
function logado() {
    if (isset($_SESSION['usuario'])) {
        if ($_SESSION['token'] == $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']) {
            return true;
        } else {
            header('Location: logout.php');
        }
    }
    return false;
}

/**
 * Força o usuário a só poder entrar se estiver logado
 */
function protectPage() {
    if (!logado()) {
        addMsg('Você precisa estar logado para acessar esta página');
        header('Location: login.php');
    }
}

/**
 * Efetua o login do usuário
 * @param array $dados Dados do usuário, retorno do mysql_fetch_assoc
 */
function login($dados) {
    // evita problemas de session fixation
    session_regenerate_id();

    // session hijacking
    $_SESSION['token'] = $_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'];

    $_SESSION['usuario'] = $dados;
}

/**
 * Renderiza um template
 * @param string $template Arquivo de template para renderizar
 * @param array $variaveis Variaveis que deverão ser disponibilizadas para o template
 */
function render($template, array $variaveis = array()) {
    // cria variáveis cujos nomes são as chaves do array
    //foreach ($variaveis as $chave => $valor) {
    //    $$chave = $valor;
    //}
    // faz o mesmo que o acima, só com uma chamada
    extract($variaves);
    ob_start(); // inicia o output buffering
    
    include dirname(__FILE__) . '/../' . $template;
    
    $conteudo = ob_get_clean(); // pega o conteúdo que estava no output buffering e fecha o ob
    
    include dirname(__FILE__). '/../templates/layout.tpl';
}

/**
 * Guarda uma mensagem na sessão
 * @param string $msg Mensagem
 */
function addMsg($msg) {
    // armazena a mensagem como um array para poder armazenar mais de uma mensagem por vez
    $_SESSION['msg'][] = $msg;
}

/**
 * Puxa as mensagens da Sessão
 * @return String com todas as mensagens, separadas por <br />
 */
function showMsg() {
    if (isset($_SESSION['msg'])) {
        $msg = $_SESSION['msg'];
        // apaga as mensagens da sessão
        unset($_SESSION['msg']);
        // junta as mensagens usando um <br />
        return implode('<br />', $msg);
    } else {
        return '';
    }
}



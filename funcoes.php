<?php // funcoes.php

/**
 * Função "wrapper" do mysql_real_escape_string
 */
function escape($sql) {
    return mysql_real_escape_string($sql);
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




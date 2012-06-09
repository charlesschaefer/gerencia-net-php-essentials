<?php // projeto/login.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Usuario.php';

if (isset($_POST['enviar'])) {
    $usuario = new Usuario();

    $senha = geraHash($_POST['senha']);
    $email = escape($_POST['email']);

    if ($dados = $usuario->select('*', "email = '{$email}' AND senha = '{$senha}'")) {
        login($dados[0]);

        //echo 'Usuário autenticado com sucesso!';
        header('Location: index.php');
    } else {
        addMsg('Usuário e/ou senha inválidos!');
    }

}

render('templates/login.tpl');



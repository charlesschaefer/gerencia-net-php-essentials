<?php // projeto/cadastro_usuario.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Usuario.php';

if (isset($_POST['enviar'])) {
    $usuario = new Usuario();
    
    $nome  = escape($_POST['nome']);
    $email = escape($_POST['email']);
    $senha = geraHash($_POST['senha']);

    $dados = compact('nome', 'email', 'senha'); // array('nome' => ..., 'senha' => '....')

    if ($idusuario = $usuario->insert($dados)) {
        addMsg("Usuário {$idusuario} adicionado com sucesso!");
        $dados['idusuario'] = $idusuario;
        login($dados);
    } else {
        addMsg('Não foi possível adicionar o usuário!');
    }
}

render('templates/cadastro_usuario.tpl');
?>

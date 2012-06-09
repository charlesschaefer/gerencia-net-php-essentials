<?php // projeto/edita_categoria.php
session_start();

require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Categoria.php';

// acesso restrito
protectPage();

if (isset($_GET['id']) && $_GET['id'] > 0) {
    // anti-sql injection
    $id = (int)$_GET['id'];
    
    $categoria = new Categoria();

    // 2. atualizar os dados da categoria se foi clicado no "Cadastrar"
    if (isset($_POST['enviar'])) {
        $nome = escape($_POST['nome']);

        if ($categoria->update(compact('nome'), array('idcategoria' => $id))) {
            addMsg('Categoria atualizada com sucesso!');
        } else {
            addMsg('Não foi possível atualizar a categoria!');
        }
    }

    // 1. buscar os dados da categoria
    if ($dados = $categoria->select('*', array('idcategoria' => $id))) {
        $nome_categoria = $dados[0]['nome'];
    } else {
        addMsg('Categoria inválida!');
        header('Location: categorias.php');
    }
    
} else {
    addMsg('Categoria inválida!');
    header('Location: categorias.php');
}

$variaveis = array(
    'nome' => $nome_categoria // criar
);

render('templates/cadastro_categoria.tpl', $variaveis);



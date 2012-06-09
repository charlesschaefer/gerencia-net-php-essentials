<?php // projeto/cadastro_categoria.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Categoria.php';

// 1. só para usuários logados
protectPage();

// 2. tratar o insert contra sql injection
if (isset($_POST['enviar'])) {
    $categoria = new Categoria();
    $nome = escape($_POST['nome']);
    
    if (empty($nome)) {
        addMsg('Preencha o nome da categoria!');
    } elseif ($idcategoria = $categoria->insert(compact('nome'))) {
        addMsg('Categoria inserida com sucesso!');
    } else {
        addMsg('Não foi possível cadastrar a Categoria!');
    }
}

// 4. implementar separação de lógica x apresentação

// "renderiza" o template 'cadastro_categoria.tpl', passando o array com as variáveis
render('templates/cadastro_categoria.tpl');


?>

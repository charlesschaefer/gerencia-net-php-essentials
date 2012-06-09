<?php // projeto/delete_categoria.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Categoria.php';

// acesso indevido
protectPage();

// sql injection
$id = (int) (isset($_GET['id']) ? $_GET['id'] : 0);

if ($id) {
    $categoria = new Categoria();
 
    if ($categoria->delete(array('idcategoria' => $id))) {
        addMsg('Categoria removida com sucesso!');
    } else {
        addMsg('Não foi possível remover a categoria!');
        error_log(mysql_error());
    }
} else {
    addMsg('Categoria Inválida!');
}
header('Location: categorias.php');



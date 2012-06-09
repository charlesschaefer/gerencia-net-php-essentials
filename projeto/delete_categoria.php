<?php //projeto/delete_categoria.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Categoria.php';

//acesso indevido
protectPage();

//sql injection
$idcategoria = (int) (isset($_GET['id']) ? $_GET['id'] : 0);
if($idcategoria){
    $categoria = new Categoria();
    //conecta();
    //$sql = "DELETE FROM categoria WHERE idcategoria={$id}";
    if ($nrows = $categoria->delete(compact('idcategoria'))) {
        addMsg("{$nrows} categoria(s) deletada(s) com sucesso");
    } else {
        addMsg("Não foi possível deletar a categoria");
    }
} else{
    addMsg('Categoria inválida');
}

header('Location: categorias.php');

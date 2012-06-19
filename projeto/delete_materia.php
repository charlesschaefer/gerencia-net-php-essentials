<?php //projeto/delete_categoria.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Materia.php';

//acesso indevido
protectPage();


$idmateria = (int)(isset($_GET['id']) ? $_GET['id'] : 0);
if($idmateria) {
    $materia = new Materia();
    if($nrows = $materia->delete(compact('idmateria'))) {
        addMsg("{$nrows} materia(s) deletada(s) com sucesso.");
    } else {
        addMsg("Não foi possível deletar a categoria.");
    }
} else {
    addMsg("Categoria inválida!");
}

header('Location: materias.php');

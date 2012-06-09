<?php // projeto/cadastro_materia.php
session_start();

require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Materia.php';
require_once 'includes/Classes/Model/Categoria.php';

protectPage();

if (isset($_POST['enviar'])) {
    $materia = new Materia();
    $_POST['idusuario'] = $_SESSION['usuario']['idusuario'];

    if ($idmateria = $materia->cadastra($_POST)) {
        addMsg("Matéria {$idmateria} adicionada com sucesso!");
    } else {
        addMsg('Não foi possível adicionar a Matéria!');
    }
}

$categoria = new Categoria();
$categorias = $categoria->select('*');

render('templates/cadastro_materia.tpl', array('categorias' => $categorias));

?>



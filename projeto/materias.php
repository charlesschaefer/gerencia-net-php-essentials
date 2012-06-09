<?php // projeto/materias.php
session_start();

require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Materia.php';
require_once 'includes/Classes/Model/Categoria.php';

$materia = new Materia();
$materias = $materia->select('titulo, idmateria', array('idusuario' => $_SESSION['usuario']['idusuario']));

render('templates/materias.tpl', array('materias' => $materias));


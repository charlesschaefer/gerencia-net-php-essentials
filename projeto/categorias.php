<?php // projeto/categorias.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Categoria.php';

// 1. somente logados
protectPage();

$categoria = new Categoria();
$categorias = $categoria->select('*');

$variaveis = array(
    'categorias' => $categorias
);
render('templates/categorias.tpl', $variaveis);

// @TODO: continuar de delete/update


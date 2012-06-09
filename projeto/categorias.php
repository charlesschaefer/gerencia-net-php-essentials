<?php //projeto/categorias.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Categoria.php';

// 1 - Somente logados
protectPage();
// 2 - Fazer a listagem das categorias com uma lista
//conecta();
//$sql = "SELECT * FROM categoria";
//$rs = mysql_query($sql);
$categoria = new Categoria();
$categorias = $categoria->select('*');

//categorias?

/*
if($rs){
    while($linha = mysql_fetch_assoc($rs)){
        $categorias[] = $linha;
    }
} else {
    addMsg('Erro ao buscar no banco de dados');
}
*/

$variaveis = array (
    'categorias' => $categorias
);

render('templates/categorias.tpl', $variaveis);

//@TODO: continuar de delete/update

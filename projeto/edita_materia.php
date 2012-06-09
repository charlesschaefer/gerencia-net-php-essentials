<?php // projeto/edita_categoria.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Materia.php';
require_once 'includes/Classes/Model/Categoria.php';
protectPage();


if(isset($_GET['id']) && $_GET['id'] > 0) {
    //anti-sql injection
    
    $id = (int)$_GET['id'];
    $materia = new Materia();
    $dados = $materia->select('*', array("idmateria" => $id)); // pode passar o segundo parâmetro como array ou string
    $_POST['idusuario'] = $dados[0]['idusuario'];
    $conds = array(
        'idmateria' => (int)$_GET['id']
    );
    
    
    
    
    


    
    

    //2- Atualizar os dados da categoria
    if(isset($_POST['enviar'])){
        //$nome = escape($_POST['nome']);
        //$sql = "UPDATE categoria SET nome='{$nome}' WHERE idcategoria={$id}";
        
        
        
        if ($nrows = $materia->edita($_POST, $conds)) {
            addMsg("Materia {$nrows} editada com sucesso!");
        } else {
            addMsg("Erro ao atualizar materia!".mysql_error());
        }
        
    }
    
    
    
    $categoriaObj = new Categoria();
    $categorias = $categoriaObj->select('*');
    
    $dados = $materia->select('*', array("idmateria" => $id)); // pode passar o segundo parâmetro como array ou string

    $variaveis = array (
        'idusuario' => $dados[0]['idusuario'],
        'idcategoria' => $dados[0]['idcategoria'],
        'titulo' => $dados[0]['titulo'],
        'texto' => $dados[0]['texto'],
        'data_criacao' => $dados[0]['data_criacao'],
        'imagem' => $dados[0]['imagem'],
        'publicado' => $dados[0]['publicado'],
        'categorias' => $categorias
    );


} else {
    addMsg('Matéria inválida');
//    header('Location: categorias.php');
}



render('templates/cadastro_materia.tpl', $variaveis);

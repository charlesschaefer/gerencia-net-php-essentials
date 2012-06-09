<?php // projeto/edita_categoria.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Categoria.php';
protectPage();


if(isset($_GET['id']) && $_GET['id'] > 0) {
    //anti-sql injection
    $id = (int)$_GET['id'];
    $categoria = new Categoria();

    //2- Atualizar os dados da categoria
    if(isset($_POST['enviar'])){
        $nome = escape($_POST['nome']);
        //$sql = "UPDATE categoria SET nome='{$nome}' WHERE idcategoria={$id}";
        
        if ($nrows = $categoria->update(compact('nome'), array('idcategoria'=>$id))) {
            addMsg("Categoria {$nrows} editada com sucesso!");
        } else {
            addMsg("Erro ao atualizar categoria!");
        }
        
    }

    //1- buscar os dados da categoria
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        
        $dados = $categoria->select('nome', array("idcategoria" => $id)); // pode passar o segundo parâmetro como array ou string
        //$sql = "SELECT nome FROM categoria WHERE idcategoria={$id}";
        if($dados) {
            $nome_categoria = $dados[0]['nome'];
        } else{
            addMsg('Categoria Inválida!');
    //        header('Location: categorias.php');
        }
    } else {
        addMsg('Categoria Inválida!');
  //      header('Location: categorias.php');
    }
} else {
    addMsg('Categoria inválida');
//    header('Location: categorias.php');
}

$variaveis = array (
    'nome' => $nome_categoria // criar
);

render('templates/cadastro_categoria.tpl', $variaveis);

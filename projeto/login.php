<?php //projeto/login.php
session_start();
require_once 'includes/funcoes.php';
require_once 'includes/Classes/Model/Usuario.php';


if(isset($_POST['enviar'])){
    //conecta(); // arrancado quando passamos a utilizar POO
    $usuario = new Usuario();
    $senha = geraHash($_POST['senha']);
    $email = escape($_POST['email']);
    
    
    
    if($dados = $usuario->select('*',"email='{$email}' AND senha = '{$senha}'")) {
        login($dados[0]);
        
        //echo "Usuário autenticado com sucesso";
        header("Location: index.php");
    } else {
        render('Usuário e/ou senha inválidos!');
    }
    
    $sql = "SELECT * FROM usuario WHERE email = '{$email}' AND senha='{$senha}'";
    
    
    //injection:
    //lala' or 1=1; -- a
    
    /*
     * Errado:
     * session.use_only_cookies = 0
     * session.use_trans_sid = 1
     * 
     * Certo:
     * session.use_only_cookies = 1
     * session.use_trans_sid = 0
     * 
     * Um exemplo:
     * Olá! Veja aqui meu ensaio sensual no motel: <a href="dubem.com.br?PHPSESSID=1234">Clique aqui!</a>
     * A partir daí, você setou o sectionid, e se vc logar, o usuário que te enviou essa sacanagem tentará fazer login com o id X.
     * O servidor irá verificar que existe uma sessão com o id, e irá validar.
     * Se eu não fizer o login, então nada acontece.
     * 
     */
    
    /*
    if( ($rs=mysql_query($sql)) && mysql_num_rows($rs)>0){
        $usuario = mysql_fetch_assoc($rs);
        //evita problemas de session fixation
        login($usuario);
        
        //echo 'Usuário autenticado com sucesso!';
        header('Location: index.php');
    } else{
        addMsg('Usuário ou senha inválidos!');
    }
    * 
    */
}

render('templates/login.tpl');










<?php // ex_insert.php
require 'funcoes.php';

// ex para casa
//$_POST = escapeArray($_POST);

if (isset($_POST['enviar'])) {
    conecta();
    
    // "criptografa" a senha
    $senha = geraHash($_POST['senha']);

    // ANTI-SQL INJECTION
    $nome = escape($_POST['nome']);
    $email = escape($_POST['email']);

    // gera a query
    $sql = "INSERT INTO usuario VALUES (DEFAULT, '{$nome}', '{$email}', '{$senha}')";

    // roda a query no banco
    if ($rs = mysql_query($sql)) {
        echo 'Registro inserido com sucesso!';
    } else {
        echo 'Ops, não foi possível inserir! Reveja seus dados!';
        // guarda o erro no log (php.ini:error_log)
        ini_set('error_log', '/tmp/errorlog.log');
        error_log(mysql_error());
    }
}

?>

<form method="post" action="">
    Nome: <input type="text" name="nome" /><br />
    Email: <input type="text" name="email" /><br />
    Senha: <input type="password" name="senha" /><br />
    <input type="submit" name="enviar" value="Cadastrar" />
</form>



<!--templates/layout.php -->
<!DOCTYPE html>
<html>
<head>
    <title>
        <?php echo isset($titulo)? $titulo : 'Projeto PHPrime';?>
    </title>
</head>
<body>
    <!-- menu -->
    <?php
        if(logado()):
    ?>
    <a href="categorias.php">Categorias</a> |
    <a href="cadastro_categoria.php">Cadastro de Categoria</a> |
    <a href="materias.php">Materias</a> |
    <a href="cadastro_materia.php">Cadastro de Matérias</a> |
    <a href="logout.php">Sair</a>
    <?php else: ?>
    <a href="login.php">Login</a> |
    <a href="cadastro_usuario.php">Cadastro de Usuários</a>
    <?php endif; ?>
    
    <?php echo showMsg();?>
    <?php echo isset($conteudo) ? $conteudo : ''; ?>
</body>
</html>

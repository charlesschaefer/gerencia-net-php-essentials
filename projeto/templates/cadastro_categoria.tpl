<!--templates/cadastro_categoria.php -->

<form action="" method="post">
    Nome:<input type="text" name="nome" value="<?= isset($nome) ? $nome : '';?>" /><br />
    <input type="submit" name="enviar" value="Cadastrar Categoria" />
</form>

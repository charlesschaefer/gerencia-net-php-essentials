<!-- templates/categorias.tpl -->

<ul>
    <?php foreach ($categorias as $linha) : ?>
        <li>
            <?php echo $linha['nome'];?>
            - <a href="edita_categoria.php?id=<?= $linha['idcategoria'];?>">
                Editar
            </a>
            - <a href="delete_categoria.php?id=<?= $linha['idcategoria'];?>">
                Remover
            </a>
        </li>
        <? endforeach; ?>
</ul>

<!-- templates/categorias.tpl -->
<ul>
    <? foreach ($categorias as $linha) : ?>
    <li>
        <?= $linha['nome'];?>
        - <a href="delete_categoria.php?id=<?= $linha['idcategoria'];?>">
           Remover
        </a>
        - <a href="edita_categoria.php?id=<?= $linha['idcategoria'];?>">
           Editar
        </a>
    </li>
    <? endforeach; ?>
</ul>

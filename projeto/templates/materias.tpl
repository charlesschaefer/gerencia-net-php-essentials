<!-- templates/categorias.tpl -->

<ul>
    <?php foreach ($materias as $linha) : ?>
        <li>
            <?php echo $linha['titulo'];?>
            - <a href="edita_materia.php?id=<?= $linha['idmateria'];?>">
                Editar
            </a>
            - <a href="delete_materia.php?id=<?= $linha['idmateria'];?>">
                Remover
            </a>
        </li>
        <? endforeach; ?>
</ul>

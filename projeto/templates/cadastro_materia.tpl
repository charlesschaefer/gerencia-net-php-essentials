<!-- projeto/templates/cadastro_materia.tpl -->
<form method="post">
    Categoria: <select name="idcategoria">
    <? foreach ($categorias as $categoria) : ?>
        <option value="<?= $categoria['idcategoria'];?>"
            <? 
                if (isset($idcategoria) && $categoria['idcategoria'] == $idcategoria) :
                    echo 'selected="selected"';
                endif;
            ?>
        ><?= $categoria['nome'];?></option>
    <? endforeach;?>
    </select><br />
    Título: <input type="text" name="titulo" /><br />
    Texto: <br /><textarea name="texto"></textarea><br />
    Data de Criação: <input type="text" name="data_criacao" value="<?php echo date('Y-m-d h:i:s');?>" /><br />
    Publicado: <input type="radio" name="publicado" value="1" checked="checked" /> Sim
               <input type="radio" name="publicado" value="0" /> Não<br />
    Tem Foto: <input type="checkbox" name="tem_foto" value="1" />
              <input type="text" name="imagem" /><br />
    <input type="submit" name="enviar" value="Cadastrar Matéria" />
</form>


<!-- templates/index.tpl -->
<?php if (logado()) : ?>
<h1>Olá <?= $_SESSION['usuario']['nome'];?>! </h1>
<?php endif; ?>


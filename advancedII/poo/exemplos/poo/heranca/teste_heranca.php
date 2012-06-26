<?php
require_once 'heranca.php';

$template = new TemplatePHP();
$template->assign('nome', 'charles');
$template->render('nome.php');

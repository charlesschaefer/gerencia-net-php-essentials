<?php // advancedII/poo/teste.php

use Database\Model\Categoria as CModel;
use Widget\Categoria as CWidget;

$Categoria = new CModel();

// função de autoload
function __autoload($cls) {
    $cls = str_replace('\\', '/', $cls);
    $file = __DIR__ . '/' . $cls . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}


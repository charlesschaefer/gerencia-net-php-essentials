<?php // ex_rest-test.php

$url = 'http://localhost/advancedI/ex_rest.php';

$resultado = file_get_contents($url);

$resultado = json_decode($resultado);

foreach ($resultado as $res) {
    echo $res->titulo . '<br />';
}



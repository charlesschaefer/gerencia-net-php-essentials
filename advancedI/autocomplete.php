<?php // autocomplete.php

$nomes = array(
    'João', 'André', 'Mariana', 'Juliana', 'Marieta', 'Julieta', 'Aline', 'Yasmine', 'Jaqueline', 'Débora', 'Laura', 'Maura', 'Andressa', 'Vanessa', 'Julia', 'Amanda', 'Fernanda'
);

$resultado = $nomes;
if (isset($_GET['term'])) {
    $resultado = array();
    foreach ($nomes as $nome) {
        if (stripos($nome, $_GET['term'])!== false) {
            $resultado[] = $nome;
        }
    }
}
echo json_encode($resultado);


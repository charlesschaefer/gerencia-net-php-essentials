<?php // ex_rest.php

require_once 'ws_noticias.php';

$WsNoticia = new WsNoticia();

if (isset($_GET['id'])) {
    $result = $WsNoticia->getNoticia($_GET['id']);
} else {
    $result = $WsNoticia->listaNoticias();
}

echo json_encode($result);
//render('.....', array('result' => $result));


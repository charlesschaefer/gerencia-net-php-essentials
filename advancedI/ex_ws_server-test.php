<?php // ex_ws_server-test.php

try {
    $client = new SoapClient(null, array('uri' => 'http://gerencianet.com.br/', 'location' => 'http://location/lalalal/ex_ws_server.php'));

    $noticias = $client->listaNoticias();
    print_r($noticias);

} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}






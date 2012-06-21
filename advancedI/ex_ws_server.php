<?php // ex_ws_server.php

require_once 'ws_noticias.php';

$server = new SoapServer(null, array('uri' => 'http://gerencianet.com.br/'));

// faz com que os métodos da classe sejam expostos como WebServices
$server->setClass('WsNoticia');

// manipula as requisições que chegam ao servidor
$server->handle();




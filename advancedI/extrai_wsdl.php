<?php // extrai_wsdl.php
error_reporting(E_ALL&~E_NOTICE);

require_once "php2wsdl-2009-05-15/WSDLCreator.php";
// Cria um WSDL para a classe WSNoticia. O segundo argumento aponta
// para ESTE arquivo mesmo
$test = new WSDLCreator("WSNoticia", "http://localhost/advancedI/extrai_wsdl.php");

// adiciona o arquivo da Classe WSNoticia
$test->addFile("ws_noticias.php");

// firula... adiciona a URI, que o cokinha adora!
$test->setClassesGeneralURL("http://phprime.com.br");

// Define qual a URL do arquivo de servidor para este WebService
$test->addURLToClass("WSNoticia", "http://localhost/advancedI/ex_ws_server.php");

// gera o arquivo
$test->createWSDL();

// mostra o arquivo na tela. O 1° argumento indica que é para adicionar
// o header informando que é XML
$test->printWSDL(true);


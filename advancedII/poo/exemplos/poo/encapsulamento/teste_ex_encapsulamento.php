<?php

require_once 'exemplo_encapsulamento.php';
$cliente = new Cliente();

try {
	$cliente->setCPF($_POST['cpf']);
	$cliente->setEmail($_POST['email']);
	$cliente->setNome($_POST['nome']);
} catch (Exception $e) {
	echo $e->getMessage();
}


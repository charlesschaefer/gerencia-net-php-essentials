<?php
require_once 'exemplo_interface.php';

function getDBObject($dbType = 'mysql') {
	switch ($dbType) {
		case 'postgres':
			return new PostgresDB();
		case 'oracle':
			return new OracleDB();
		default:
			return new MySQLDB();
	}
}

$db = getDBObject();
// Tenho certeza que o objeto retornado implementa a interface iDB
// Isso garante que o objeto terá os métodos setConnData(), connect() e 
// readDataFromTable() exatamente da forma como descrito na interface
if ($db instanceof iDB) {
	/* Independente do banco utilizado, o trecho abaixo sempre vai funcionar */
	$db->setConnData('localhost', 'admin', 'p4pm6');
	$db->connect();
	$usuarios = $db->readDataFromTable('usuario');
}

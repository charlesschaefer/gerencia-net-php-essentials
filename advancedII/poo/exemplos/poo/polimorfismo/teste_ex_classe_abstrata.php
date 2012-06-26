<?php
require_once 'exemplo_classe_abstrata.php';

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
// Tenho certeza que o objeto retornado extende a classe abstrata DB
// Isso garante que o objeto terá os métodos setConnData() (herdade), 
// e os métodos connect() e readDataFromTable() exatamente da forma 
// como descrito na classe base (DB)
if ($db instanceof DB) {
	/* Independente do banco utilizado, o trecho abaixo sempre vai funcionar */
	$db->setConnData('localhost', 'admin', 'p4pm6'); // método herdado da classe DB
	$db->connect();
	$usuarios = $db->readDataFromTable('usuario');
}

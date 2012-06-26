<?php
	
	class DataBase {
		public function __construct($host, $user, $pass) {
			$this->connect($host, $user, $pass);
		}
		public function __destruct() {
			$this->disconnect();
		}
		public function connect($host, $user, $pass) {
			echo 'Método connect() chamado pelo construtor. Argumentos:<br />';
			echo "Host: $host<br />User: $user<br />Pass: $pass<br />";
			
		}
		public function disconnect() {
			echo 'Método disconnect() chamado pelo destrutor.<br />';
		}
	}
	
	// instancia a classe passando argumentos para o construtor
	$db = new DataBase('localhost', 'root', 'p4pm6');
	// "destrói" o objeto, fazendo com que o PHP chame o método destrutor
	unset($db);
	
	
	
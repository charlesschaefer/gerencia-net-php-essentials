<?php
/* 
 * Interfaces têm apenas as assinaturas dos métodos.
 * Note o ; após a assinatura do método
 **/
interface iDB {
	public function setConnData($host, $user, $pass = null);
	public function connect();
	public function readDataFromTable($table);
}

class MySQLDB {
	public function setConnData($host, $user, $pass = null) {
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
	}
	public function connect() {
		mysql_connect($this->host, $this->user, $this->pass);
	}
	public function readDataFromTable($table) {
		if ($rs = mysql_query("SELECT * FROM $table")) {
			$data = array();
			while ($row = mysql_fetch_row($rs)) {
				$data[] = $row;
			}
			return $data;
		}
		return array();
	}
}

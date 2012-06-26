<?php

abstract class DB {
	protected $hots;
	protected $user;
	protected $pass;
	public function setConnData($host, $user, $pass = null) {
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
	}

	/** MÉTODOS ABSTRATOS */
	abstract public function connect();
	abstract public function readDataFromTable($table);
}

class MySQLDB extends DB {
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


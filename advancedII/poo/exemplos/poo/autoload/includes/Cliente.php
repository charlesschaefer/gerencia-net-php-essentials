<?php

class Cliente {
	protected $cpf;
	protected $email;
	protected $nome;
	
	public function setCPF($cpf) {
		$cpf = str_replace(array('/', '-', '.'), '', $cpf);
		if ($this->validateCPF($cpf)) {
			$this->cpf = $cpf;
		} else {
			throw new Exception('CPF Inválido!');
		}
	}
	public function setEmail($email) {
		if (preg_match('@[A-Za-z0-9_.-]+@([A-Za-z0-9_]+\.)+[A-Za-z]{2,4}@mi', $email) > 0) {
			$this->email = $email;
		} else {
			throw new Exception('E-mail Inválido!');
		}
	}
	public function setNome($nome) {
		if (!empty($nome)) {
			$this->nome = $nome;
		} else {
			throw new Exception('Nome Inválido!');
		}
	}
	public function getCPF() {
		return $this->formataCPF($this->cpf);
	}
	public function getEmail() {
		return $this->email;
	}
	public function getNome() {
		return $this->nome;
	}

	protected function validateCPF($cpf) {
		return true;
	}
	protected function formataCPF($cpf) {
		$cpf = wordwrap($cpf, 3, '.', true);
		$cpf[strrpos($cpf, '.')] = '-';
		return $cpf;
	}
}


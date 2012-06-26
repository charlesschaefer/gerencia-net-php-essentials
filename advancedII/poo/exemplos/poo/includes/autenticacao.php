<?php

	// classe Autenticacao
	class Autenticacao {
		// declaração de atributos
		protected $usuario;
		protected $senha;
		protected $id = 10;
		protected $last_access = false;
		protected $idade;

		// declaração de método
		public function login($usuario, $senha) {
			echo 'Chamando o método Autenticacao::login().<br />Dados:<br />';
			echo "Usuário: $usuario<br />Senha: $senha";
			// preenche o atributo com a data atual
			$this->last_access = date('Y-m-d H:i:s');
		}
		// método getter
		// acesso a atributos com encapsulamento
		public function getLastAccess() {
			return $this->last_access;
		}
		
		// método setter
		// atribui valores a atributos com encapsulamento
		public function setIdade($idade) {
			if ($idade < 18 or $idade > 110) {
				throw new Exception('Idade inválida!');
			}
			$this->idade = $idade;
		}

	}


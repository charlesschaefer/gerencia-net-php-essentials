<?php

		// classe Autenticacao
		class Autenticacao {
			// declaração de atributos
			protected $usuario;
			protected $senha;

			// declaração de método
			public function login($usuario, $senha) {
				// atribuindo valor a atributos da classe
				$this->usuario = $usuario;
				$this->senha = $senha;
				// chamando um método da classe
				$this->verificar($usuario, $senha);
			}

			// ....

		}


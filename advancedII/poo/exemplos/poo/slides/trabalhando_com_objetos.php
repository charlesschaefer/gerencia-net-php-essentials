<?php

		require_once '../includes/autenticacao.php';
		
		// instanciando um objeto Autenticacao
		$auth = new Autenticacao();
		
		// Chama o método login()
		$auth -> login($_POST['usuario'], $_POST['senha']);
		// "Lê" um atributo do objeto
		$id = $auth->id;
		// "Lê" um atributo do objeto utilizando um método get*()
		$ultimo_acesso = $auth->getLastAccess();
		// atribui valor a um atributo utilizando um método set*()
		$auth->setIdade((int)$_POST['idade']);
		
		
		
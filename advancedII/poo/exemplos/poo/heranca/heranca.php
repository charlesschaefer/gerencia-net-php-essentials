<?php
	class Template {
      private $version = '0.1';
		protected $vars = array();
		public function assign($nome, $valor) {
			$this->vars[$nome] = $valor;
		}
      public function getVersion() {
         return $this->version;
      }
	}
	
	// Usa templates em arquivos PHP puros
	class TemplatePHP extends Template{
		public function render($file) {
			extract($this->vars);
			include $file;
		}
	}
	
	// Usa templates em arquivos XML
	class TemplateXML extends Template{
		public function render($file) {
			// lê o XML e adiciona as variáveis nos respectivos nós/elementos 
		}
	}
	
	
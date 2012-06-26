	<?php
	require_once 'fpdf16/fpdf.php';
	
	class MyPDF extends FPDF {
		/**
		 * Função responsável por imprimir o cabeçalho da página
		 */
		public function Header() {
			$this->SetFont('Arial', 'B', 11);
			$this->Line(2, 2, 19, 2);
	
			$this->SetY(1);
			$this->Cell(0, 0.5, 'Relatório Anual de Atividades do Curso PHP Advanced II - PHPrime', 0, 1, 'C');
			$this->Ln(1);
		}
	
		/**
		 * Função responsável por imprimir o rodapé das páginas
		 */
		public function Footer() {
			$this->SetFont('Arial', 'I', 10); // fonte pequena
	
			$this->Line(2, 27.5, 19, 27.5);
			$this->SetY(-2);
			$this->Cell(0, 0.5, "Empresa Bruta LTDA | CNPJ: 19.663.892/0001-39", 0, 1, 'C');
			$this->Cell(0, 0.5, "Rua das Laranjeiras, 15 - sala 201 - Buritis - Belo Horizonte / MG", 0, 1, 'C');
			$this->Cell(0, 0.5, "Tel: (31) 3344-5544 | (31) 9988-7766", 0, 1, 'C');
	
			// adiciona o número da página
			$this->SetXY(20, -1);
			$this->Cell(0, 0.5, $this->PageNo());
		}
	
		public function Cell($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '') {
			return parent::Cell($w, $h, utf8_decode($txt), $border, $ln, $align, $fill, $link);
		}
	}

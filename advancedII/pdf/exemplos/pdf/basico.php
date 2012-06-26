
	<?php
	require_once 'fpdf16/fpdf.php';

	// $orientação (P|L), $unidade (cm, mm, etc), $folha (A4, Letter, etc)
	$pdf = new FPDF('P', 'cm', 'A4');

	// título do documento
	$pdf->SetTitle('Arquivo teste - PHP Advanced II');
	// autor do documento
	$pdf->SetAuthor('Charles Schaefer - PHPrime');

	// Adiciona a primeira página, tipo retrato
	$pdf->AddPage('P');
	// Indica a fonte que vai ser utilizada
	$pdf->SetFont('Arial', 'B', 14);
	// indica a cor do texto (r, g, b)
	$pdf->SetTextColor(250, 0, 0);

	// Posição do texto
	$pdf->SetXY(5, 5);

	// Escreve o texto
	// $altura_linha, $texto
	$pdf->Write(0.5, 'Gerando arquivos PDF com FPDF');

	// Quebra de linha no arquivo ($altura)
	$pdf->Ln(1);
	$pdf->write(1, 'Texto simples, de introdução');

	// $x, $y, $texto
	$pdf->Text(1, 8, 'Dessa vez utilizando o método Text()');


	$pdf->Output('/tmp/teste.pdf');

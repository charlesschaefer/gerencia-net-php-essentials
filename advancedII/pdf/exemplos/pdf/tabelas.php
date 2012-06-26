	<?php
	require_once 'fpdf16/fpdf.php';
	
	// Dados para a tabela
	$cabecalho = array('No.', 'Nome do Funcionário', 'Horas Trabalhadas', 'Horas Extras');
	$dados = array(
		array(1, 'João Da Silva', 42, 2),
		array(2, 'Sebastião Alvarenga Rêgo', 40, 0),
		array(3, 'Joana D\'Arc Santana', 44, 4)
	);
	
	$pdf = new FPDF('P', 'cm', 'A4');
	$pdf->AddPage();
	
	$larguras = array();
	
	$pdf->SetFont('Arial', 'BI', 12);
	$pdf->SetFillColor(200, 200, 200);
	// Cria o cabeçalho da tabela
	foreach ($cabecalho as $i => $cab) {
		// armazena as larguras das células do cabeçalho
		$larguras[$i] = $pdf->GetStringWidth($cab) + 2;
		// imprime as células do cabeçalho
		$pdf->Cell($larguras[$i], 1, utf8_decode($cab), 1, 0, 'C', true);
	}
	$pdf->Ln();
	
	$pdf->SetFont('Arial', '', 12);
	// Cria as células da tabela
	foreach ($dados as $e => $linha) {
		if ($e % 2 == 0) {
			$pdf->SetFillColor(230, 230, 230);
		} else {
			$pdf->SetFillColor(240, 240, 240);
		}
		foreach ($linha as $i => $celula) {
			// pega a largura do cabeçalho
			$pdf->Cell($larguras[$i], 1, utf8_decode($celula), 1, 0, 'C', true);
		}
		// quebra e manda para a próxima linha
		$pdf->Ln();
	}
	
	$pdf->Output('teste.pdf', 'I');

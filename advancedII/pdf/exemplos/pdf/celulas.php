	<?php

	require_once 'fpdf16/fpdf.php';
	$pdf = new FPDF('P', 'cm', 'A4');

	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 14);
	$texto = 'Cada vez mais as aplicações WEB têm sido opção das empresas ' .
				 'para atender a novas demandas por sistemas ou para portar sistemas legados, ' .
				 'construídos em outras plataformas.';

	// Inserindo um texo em uma célula
	$pdf->Cell(0, 2, utf8_decode($texto), 1, 1, 'C');

	$pdf->Ln(1);

	$pdf->SetFillColor(200, 200, 200);
	// Inserido em várias células
	$pdf->MultiCell(0, 1, utf8_decode($texto), 1, 'C', true);

	$pdf->Output('/tmp/teste.pdf');

	?>

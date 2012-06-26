	<?php
	require_once 'my_pdf.php';

	$pdf = new MyPDF('P', 'cm', 'A4');

	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 12);

	$pdf->Cell(0, 1, 'Texto bacana para ir no corpo do documento');

	$pdf->AddPage();
	$pdf->Cell(0, 1, 'Texto mais bruto ainda');

	$pdf->Output('/tmp/teste.pdf');

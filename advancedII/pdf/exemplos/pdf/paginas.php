	<?php
	require_once 'fpdf16/fpdf.php';
	$pdf = new FPDF('P', 'cm', 'A4');
	$pdf->SetFont('Arial', '', 12);

	$pdf->AliasNbPages('{nb}');

	$pdf->AddPage();
	$pdf->Write(1, 'Texto de teste');
	$pdf->Ln(1);
	$pdf->Write(1, utf8_decode('Página Atual: ' . $pdf->PageNo()));
	$pdf->Ln(1);
	$pdf->Write(1, utf8_decode(' Total de páginas: {nb}'));

	$pdf->AddPage();
	$pdf->Write(1, 'Texto de teste');

	$pdf->Output('/tmp/teste.pdf');
	?>

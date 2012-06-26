	<?php
	require_once 'fpdf16/fpdf.php';
	$pdf = new FPDF('L', 'cm', 'A4');
	
	$pdf->AddPage();
	$pdf->Image('ferrari1.jpg', 1, 3, 28);
	
	$pdf->Output('/tmp/teste.pdf');
	?>

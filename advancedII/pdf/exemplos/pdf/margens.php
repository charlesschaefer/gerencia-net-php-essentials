<?php
require_once 'fpdf16/fpdf.php';
$pdf = new FPDF('P', 'cm', 'A4');
$pdf->SetFont('Times', '', 12);

// $esq, $topo, $dir
$pdf->SetMargins(2, 2, 3);
$pdf->AddPage();
$pdf->Write(1, 'Texto de Teste. Esquerda: 2, Topo: 2, Direita: 3');

$pdf->SetMargins(5, 5, 3);
$pdf->AddPage();
$pdf->Write(1, 'Outro texto de Teste. Esquerda: 5, Topo: 5, Direita: 3');

$pdf->Output('/tmp/teste.pdf');

?>

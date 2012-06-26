<?php // advancedII/pdf/teste.php

require_once 'exemplos/pdf/fpdf17/fpdf.php';

$pdf = new FPDF('P', 'cm', 'A4');

$pdf->SetAuthor('GerenciaNet');
$pdf->SetTitle('Meu Primeiro Documento PDF');

$pdf->SetMargins(2, 2, 1);

$pdf->AddPage(); // tentar adicionar um footer, adicionar a página, e tentar adicionar um header na nova página
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetTextColor(255, 0, 0); //coloca um texto vermelho,rgb(255,0,0)
$pdf->Text(1, 1, 'Um texto qualquer');

// cria um texto no meio do documento
$pdf->SetXY(10, 14);
$pdf->Write(1, utf8_decode('Texto brutão do curso brutão'));
$pdf->Ln(1);
$pdf->Write(1, 'Com link', 'http://phprime.com.br');

// Bug estranho
$pdf->SetXY(9.8, 10);
$pdf->Write(1, 'Um texto');
$pdf->Text(10, 11, 'Um texto');

// colocar Imagem (src, x, y, w, h)
$pdf->Image('./exemplos/pdf/ferrari1.jpg', 4, 4, 8, 4);

$pdf->AddPage('L');
// w, h, txt[, border, newline, align, fill, link]
$pdf->Cell(4, 2, 'Tem um texto bacana', 1, 0, 'C');
$pdf->Cell(4, 2, "Tem outro texto\n bacana", 1, 0, 'C');

$pdf->Ln(2);
$pdf->MultiCell(4, 1, 'Tem um texto bacana', 1, 'C');
$pdf->SetXY(6, 4);
$pdf->MultiCell(4, 1, 'Tem outro texto bacana', 1, 'C');

$pdf->Ln(2);

$pdf->AliasNbPages('{nb}');
$pdf->Write(1, 'Estamos na Página ' . $pdf->PageNo() . ' de {nb}');

$pdf->AddPage('P');




$pdf->Output('first.pdf', 'I');


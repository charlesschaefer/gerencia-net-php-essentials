<?php // advancedII/pdf/teste.php

require_once 'meupdf.php';

$pdf = new FPDF('P', 'cm', 'A4');

$pdf->SetAuthor('GerenciaNet');
$pdf->SetTitle('Meu Primeiro Documento PDF');

$pdf->SetMargins(2, 2, 1);

$pdf->AliasNbPage('{nb}');

$pdf->AddPage(); // tentar adicionar um footer, adicionar a página, e tentar adicionar um header na nova página

$produtos = array(
    array(
        'nome'  => 'Lixa de unha reutilizável',
        'marca' => 'Treco',
        'preco' => 10.5
    ),
    array(
        'nome'  => 'Escova de Dentes Multiuso',
        'marca' => 'OralBJ',
        'preco' => 12
    ),
    array(
        'nome'  => 'Refrigerante de Cachaça',
        'marca' => 'Companhia das Índias Antigas',
        'preco' => 4.5
    )
);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(8, 1, 'Nome do Produto', 1, 0, 'C');
$pdf->Cell(5, 1, 'Marca', 1, 0, 'C');
$pdf->Cell(5, 1, 'Preço', 1, 0, 'C');

$pdf->Ln(1);
$pdf->SetFont('Arial', '', 11);
foreach ($produtos as $produto) {
    $pdf->Cell(8, 1, $produto['nome'], 1, 0, 'C');
    $pdf->Cell(5, 1, $produto['marca'], 1, 0, 'C');
    $pdf->Cell(5, 1, $produto['preco'], 1, 0, 'C');
    $pdf->Ln(1);
}


$pdf->Output('first.pdf', 'I');


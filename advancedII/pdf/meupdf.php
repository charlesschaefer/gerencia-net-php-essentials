<?php // advancedII/pdf/meupdf.php

require_once 'exemplos/pdf/fpdf17/fpdf.php';

class MeuPdf extends FPDF {
    public function Header() {
        $this->SetXY(1,1);
        $this->Cell(19, 1, 'Página ' . $this->PageNo() . ' de {nb}', 0, 0, 'R');
        $this->SetXY(1, 3);
        $this->Line(1, 3, 19, 3);
        $this->Ln(2);
    }

    public function Footer() {
        $this->SetXY(1, -3);
        $this->Line(1, 28, 19, 28);
        $this->Ln(1);
        $this->Cell(19, 1, 'Gustavo lima e você', 0, 0, 'C');
    }

    public function Write($h, $txt, $link='') {
        return parent::Write($h, utf8_decode($txt), $link);
    }
}

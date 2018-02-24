<?php
require '../fpdf/fpdf.php';

class PDF extends FPDF
{
    public function Header()
    {
        $this->Image('../appsummer.resourse/img/logoitz.png', 5, 5, 30);
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(30);
        $this->Cell(160, 10, 'Instituto Tecnologico de Zacatepec', 0, 0, 'R');
        $this->Ln(30);
    }

    public function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

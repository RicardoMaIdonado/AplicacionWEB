<?php
date_default_timezone_set('America/Guayaquil');
require 'fpdf/fpdf.php';
class PDF extends FPDF
{
    function Header()
    {
        $this->Image('C:/xampp/htdocs/vaince/Iconos/vain.png', 5, 5, 15,);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(30);
        $this->Cell(120, 10, utf8_decode('Catálogo de Objetos - Vainglory Community Edition'), 0, 0, 'C');

        $this->Ln(20);
    }
    function Footer()
    {
        $fecha = date("d-m-Y");
        $hora = date("H:i:s");
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'VAINCE - Pagina ' . $this->PageNo() . '/{nb}' . '. Generado el ' . $fecha . ' a la hora ' . $hora, 0, 0, 'C');
    }
}

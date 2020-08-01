<?php
include 'plantillaC.php';
#include '../vaince/includes/productos.php';

#$productos= new Producto();
#$lista = array()
#$lista = $productos->ListarProductos();

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(60, 6, 'Nombre objeto', 1, 1, 'C', 1);
$pdf->Cell(30, 30, 'imagen', 1, 0, 'C');
$pdf->Cell(30, 6, '', 0, 1, 'C');
$pdf->Cell(30, 0, '', 0, 0, 'C');
$pdf->Cell(30, 6, 'Tipo', 0, 1, 'C');
$pdf->Cell(30, 0, '', 0, 0, 'C');
$pdf->Cell(30, 6, 'Precio', 0, 1, 'C');
$pdf->Ln(25);
#foreach ($lista as $reg) {
#    $pdf->Cell(60, 6, $reg['Nombre objeto'], 1, 1, 'C', 1);
#    $pdf->Cell(30, 30, $pdf->Image('images/prueba.jpg', $pdf->GetX(), $pdf->GetY(),30), 1, 0, 'C');
#    $pdf->Cell(30, 6, '', 0, 1, 'C');
#    $pdf->Cell(30, 0, '', 0, 0, 'C');
#    $pdf->Cell(30, 6, $reg['tipo'], 0, 1, 'C');
#    $pdf->Cell(30, 0, '', 0, 0, 'C');
#    $pdf->Cell(30, 6, $reg['Precio'], 0, 1, 'C');
#    $pdf->Ln(25);
#}
$pdf->Output();

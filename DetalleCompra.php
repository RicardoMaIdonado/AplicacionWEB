<?php
include 'plantillaD.php';
#include '../vaince/includes/productos.php';

$pdf = new PDF();
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFillColor(1, 232, 232);
$pdf->SetFont('Arial', 'B', 12);

$pdf->Cell(70, 6, 'Nombre objeto', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'Precio', 1, 1, 'C', 1);

#foreach ($lista as $reg) {
#    $pdf->Cell(70, 6, $reg['Nombre objeto'], 1, 0, 'C');
#    $pdf->Cell(30, 6, $reg['Cantidad'], 1, 0, 'C');
#    $pdf->Cell(30, 6, $reg['Precio'], 1, 1, 'C');
#}

$pdf->Cell(100, 6, 'Total a pagar', 1, 0, 'R', 1);
$pdf->Cell(30, 6, '\$', 1, 1, 'C');

$pdf->Output();

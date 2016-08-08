<?php
require_once('../Reportes/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('../../img/logoa.png',10,10,25);
    $this->SetFont('Arial','B',15);  // Arial bold 15
    $this->Cell(60);   // Movernos a la derecha
    $this->Cell(40,10,utf8_decode('CONTRATO INDIVIDUAL DE TRABAJO')); //Título
    $this->Ln(20);  // Salto de línea

    $this->SetFont('Arial','B',9);
    $this->Cell(0,10,utf8_decode('CONTRATO INDIVIDUAL DE TRABAJO QUE CELEBRAN POR PARTE DE SIGERH S.A DE C.V, REPRESENTADO EN '),0,'L');
    $this->Ln(5);
    $this->Cell(0,10,utf8_decode('ESTE ACTO POR EL ING. ALEXIS RAMIREZ GUZMAN Y POR LO OTRO  EL C. CARLOS MALDONADO  QUIEN EN '),0,'L');
    $this->Ln(5);
    $this->Cell(0,10,utf8_decode('LO SUCESIVO SE LE DENOMINARA  EL TRABAJADOR  AL TENOR DE LAS SIGUIENTES:'),0,'L');
    $this->Ln(8);
    $nombre="alex";
    $this->Cell(0,10,utf8_decode('A) DECLARA EL TRABAJADOR:'),0,'L');
    
     $this->Ln(5);
      $this->SetFont('Arial','B',10);
     $this->Cell(0,10,utf8_decode('1.- Haber nacido el día: 08-08-2016 tener 38 años de edad, de nacionalidad  mexicana con domicilio ubicado en  '),0,'L');
     $this->SetFont('Arial','U',10);
      $this->Ln(5);
       $this->Cell(0,10,utf8_decode('RG 228 MZ 24 LT 14'),0,'L');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->AliasNbPages();

$pdf->Output();
?>
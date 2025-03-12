<?php
// include class

// require("login_autentica.php");
// include("cabezote3.php"); 
$nombre=$_GET["variable1"];
$cedula=$_GET["variable2"];
$fechacon=$_GET["variable3"];
$cargo=$_GET["variable4"];
$fechacerti=$_GET["variable5"];
$formato=$_GET["variable6"];
$fechini=$_GET["fechini"];
$fechfin=$_GET["fechfin"];
$soporte=$_GET["soporte"];
$gerente=$_GET["gerente"];
$gefeinme=$_GET["gefeinme"];
$remunerado=$_GET["remunerado"];

$asc="ASC";


$fechadelregi = strtotime($fechacon);
$fechacertificado = strtotime($fechacerti);

            

            $fechadelregidia = date("d",$fechadelregi);

// error_reporting(0);
require('fpdf/fpdf.php');

    // Declaramos nuestras fechas inicial y final
    $fechaInicial = date($fechini);
    $fechaFinal = date($fechfin);
    
    // Las convertimos a segundos
    $fechaInicialSegundos = strtotime($fechaInicial);
    $fechaFinalSegundos = strtotime($fechaFinal);
    
    // Hacemos las operaciones para calcular los dias entre las dos fechas y mostramos el resultado
    $dias = ($fechaFinalSegundos - $fechaInicialSegundos) / 86400;
    // echo "La diferencia entre la fecha : " . $fechaInicial . " y " . $fechaFinal . " es de: " . round($dias, 0, PHP_ROUND_HALF_UP)  . " dias." ;


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('assets/cabecerapagina.jpg',10,8,0);
    // Times bold 15
    $this->SetFont('Times','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    // $this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
    $this->Ln(20);

   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Times italic 8
    $this->SetFont('Times','I',8);
    $this->Image('assets/piedepaginaberm.jpg',0,260,0);
    // Número de página
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);


$pdf->SetFont('Times', '', 12);
$pdf->SetLeftMargin(25);
$pdf->SetRightMargin(25);
$pdf->Ln(30);
// $pdf->Cell(0, 10, 'BERMUDAS S.A.S.', 0, 1,'C');
// $pdf->Cell(0, 10, 'Nit 901.169.262-8', 0, 1,'C');


$pdf->Ln(20);
// $pdf->MultiCell(0, 7, utf8_decode('CERTIFICA'), 0,'C');


$pdf->Ln(7);

$formatofin=$formato;



$pdf->Cell(20, 6, ' '.date("d",$fechacertificado).' ', 1, 0);
$pdf->Cell(20, 6, ''.date("m",$fechacertificado).'', 1, 0);
$pdf->Cell(20, 6, ''.date("Y",$fechacertificado).'', 1, 2);
$pdf->Ln(2);
$pdf->Cell(0, 6, 'INFORMACION DEL FUNCIONARIO', 1, 1,'C');
$pdf->Ln(2);
$pdf->Cell(80.3, 6, 'Nombre ', 1, 0);
$pdf->Cell(80, 6, ''.$nombre.'', 1, 2);
$pdf->Ln(2);
$pdf->Cell(80.3, 6, 'Cargo ', 1, 0);
$pdf->Cell(80, 6, ''.$cargo.'', 1, 2);
$pdf->Ln(2);
$pdf->Cell(80.3, 6, 'C.C ', 1, 0);
$pdf->Cell(80, 6, ''.$cedula.'', 1, 2);
// $pdf->Ln(2);
// $pdf->Cell(80, 6, 'Sede', 1, 0);
// $pdf->Cell(80, 6, '', 1, 2);

$pdf->Ln(2);
$pdf->Cell(80, 6, 'Tipo de permiso', 1, 0);
$pdf->Cell(80, 6, ''.$formato.'', 1, 2);

$pdf->Ln(2);

$pdf->Cell(80, 6, 'Presenta soporte', 1, 0);
$pdf->Cell(80, 6, ''.$soporte.'', 1, 2);
$pdf->Ln(2);
$pdf->Cell(80, 6, 'Dias solicitados', 1, 0);
$pdf->Cell(80, 6, ''.round($dias, 0, PHP_ROUND_HALF_UP).'', 1, 2);
$pdf->Ln(2);
$pdf->Cell(40, 6, 'Desde', 1, 0);
$pdf->Cell(40, 6, ''.$fechini.'', 1, 0);


$pdf->Cell(40, 6, 'Hasta', 1, 0);
$pdf->Cell(40, 6, ''.$fechfin.'', 1, 2);


$pdf->Ln(2);

$pdf->Cell(80, 6, 'Aprobado gerencia', 1, 0);
$pdf->Cell(80, 6, 'Aprobado jefe inmediato', 1, 2);

$pdf->Ln(2);

$pdf->Cell(80, 6, ''.$gerente.'', 1, 0);
$pdf->Cell(80, 6, ''.$gefeinme.'', 1, 2);

$pdf->Ln(2);

$pdf->Cell(80, 6, 'Remunerado', 1, 0);
$pdf->Cell(80, 6, 'No remunerado', 1, 2);

$pdf->Ln(2);

if ($remunerado=="SI") {
  $pdf->Cell(80, 6, 'X', 1, 0);
  $pdf->Cell(80, 6, '', 1, 2);
}else{
  $pdf->Cell(80, 6, '', 1, 0);
  $pdf->Cell(80, 6, 'X', 1, 2);

}


// $pdf->SetFont('Times', 'I', 12);
// $pdf->Cell(40, 6, 'Marina Castiblanco', 'B', 1);

// // $pdf->Cell(0, 6, '______________________________ ', 0, 1);
// $pdf->Cell(0, 6, 'MARINA CASTIBLANCO', 0, 1);

// $pdf->Cell(0, 6, 'Gerente administrativa', 0, 1);


$pdf->Ln(10);
// $pdf->MultiCell(0, 6, 'Puede certificarla veracidad de este certificado en los correos: castiblanco@bermudas.com.co y/o recursosh@bermudas.com.co 
// ', 0,'C');

$pdf->Output();
?>
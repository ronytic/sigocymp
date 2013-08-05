<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Material";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/material.php");
$material=new material;
$mat=array_shift($material->mostrar($id));

$pdf->CuadroCuerpoPersonalizado(40,"Material:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$mat['nombre']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Precio Unitario:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$mat['preciounitario']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Unidad Medida:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$mat['unidadmedida']);
$pdf->Ln();$pdf->Ln();

$pdf->Output();
?>
<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Proveedor de Repuesto";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/proveedorrepuesto.php");
$proveedorrepuesto=new proveedorrepuesto;
$provr=array_shift($proveedorrepuesto->mostrar($id));

$pdf->CuadroCuerpoPersonalizado(40,"Nombre:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$provr['nombre']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Dirección:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$provr['direccion']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Teléfono:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$provr['telefono']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Mail:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$provr['mail']);
$pdf->Ln();$pdf->Ln();
/*
$foto="../foto/".$maq['foto'];
if(!empty($maq['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/

$pdf->Output();
?>
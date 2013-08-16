<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Repuesto";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/repuesto.php");
$repuesto=new repuesto;
include_once("../../class/proveedorrepuesto.php");
$proveedorrepuesto=new proveedorrepuesto;
$rep=array_shift($repuesto->mostrar($id));
$provr=array_shift($proveedorrepuesto->mostrar($rep['codproveedorrepuesto']));

$pdf->CuadroCuerpoPersonalizado(40,"Descripción:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$rep['descripcion']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Precio:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$rep['precio']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Tipo:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$rep['tipo']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Tiempo de Vida:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$rep['tiempovida']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Código de Fabricación:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$rep['codigodefabricacion']);
$pdf->Ln();$pdf->Ln();

$pdf->CuadroCuerpoPersonalizado(45,"Proveedor de Repuesto:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$provr['nombre']." - ".$provr['direccion']);
$pdf->Ln();$pdf->Ln();
/*
$foto="../foto/".$maq['foto'];
if(!empty($maq['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/

$pdf->Output();
?>
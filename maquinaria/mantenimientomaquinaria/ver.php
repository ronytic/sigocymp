<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Mantenimiento de Maquinaria";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/mantenimientomaquinaria.php");
$mantenimientomaquinaria=new mantenimientomaquinaria;
include_once("../../class/repuesto.php");
$repuesto=new repuesto;
include_once("../../class/maquinaria.php");
$maquinaria=new maquinaria;
$manmaq=array_shift($mantenimientomaquinaria->mostrar($id));
$rep=array_shift($repuesto->mostrar($manmaq['codrepuesto']));
$maq=array_shift($maquinaria->mostrar($manmaq['codmaquinaria']));

$pdf->CuadroCuerpoPersonalizado(40,"Fecha Mantenimiento:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$manmaq['fechamantenimiento']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Cantidad:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$manmaq['cantidad']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Título:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$manmaq['titulo']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Detalle:",0,"",0,"B");
$pdf->CuadroCuerpoMulti(50,$manmaq['detalle']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Observación:",0,"",0,"B");
$pdf->CuadroCuerpoMulti(50,$manmaq['obs']);
$pdf->Ln();$pdf->Ln();

$pdf->CuadroCuerpoPersonalizado(40,"Maquinaria:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['descrip']);
$pdf->Ln();$pdf->Ln();

$pdf->CuadroCuerpoPersonalizado(40,"Repuesto:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$rep['descripcion']);
$pdf->Ln();$pdf->Ln();
/*
$foto="../foto/".$maq['foto'];
if(!empty($maq['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/

$pdf->Output();
?>
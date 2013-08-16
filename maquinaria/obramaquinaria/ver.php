<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Maquinarias a Obra";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/obramaquinaria.php");
$obramaquinaria=new obramaquinaria;
include_once("../../class/obra.php");
$obra=new obra;
include_once("../../class/maquinaria.php");
$maquinaria=new maquinaria;
include_once("../../class/empleado.php");
$maquinaria=new maquinaria;
$empleado=new empleado;
$omaq=array_shift($obramaquinaria->mostrar($id));
$o=array_shift($obra->mostrar($omaq['codobra']));
$maq=array_shift($maquinaria->mostrar($omaq['codmaquinaria']));
$e=array_shift($empleado->mostrar($omaq['codempleadooperador']));

$pdf->CuadroCuerpoPersonalizado(40,"OBRA:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$o['nombre']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Lugar:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$o['lugar']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Maquinaria:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['descrip']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Empleado:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$e['appaterno']." ".$e['apmaterno']." ".$e['nombre']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"C.I. Empleado:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$e['ci']);
$pdf->Ln();$pdf->Ln();


/*
$foto="../foto/".$maq['foto'];
if(!empty($maq['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}
*/

$pdf->Output();
?>
<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Datos de Empleado";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/empleado.php");
$empleado=new empleado;
$emp=array_shift($empleado->mostrar($id));

$pdf->CuadroCuerpoPersonalizado(40,"C.I.:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['ci']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Nombre:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['nombre']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Paterno:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['appaterno']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Materno:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['apmaterno']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Dirección:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['direccion']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Fecha de Nacimiento:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['fechanac']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Teléfono:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['fono']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Cargo:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['cargo']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Fecha de Ingreso:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$emp['fechain']);
$pdf->Ln();
$foto="../foto/".$emp['foto'];
if(!empty($emp['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}

$pdf->Output();
?>
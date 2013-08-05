<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Licitación";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/licitacion.php");
$licitacion=new licitacion;
$lic=array_shift($licitacion->mostrar($id));

$pdf->CuadroCuerpoPersonalizado(40,"Título",0,"",0,"B");
$pdf->CuadroCuerpo(50,$lic['titulo']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Descripción:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$lic['descripcion']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Documento Digital:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$lic['documentodigital']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Entidad:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$lic['entidad']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Fecha de Publicación:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$lic['fechapublicacion']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Observaciones:",0,"",0,"B");
$pdf->CuadroCuerpoMulti(50,$lic['obs']);
$pdf->Ln();$pdf->Ln();

$pdf->Output();
?>
<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Maquinaria";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/maquinaria.php");
$maquinaria=new maquinaria;
$maq=array_shift($maquinaria->mostrar($id));

$pdf->CuadroCuerpoPersonalizado(40,"Descripción:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['descrip']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Altura:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['altura']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Ancho:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['ancho']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Peso:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['peso']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Precio:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['precio']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Tipo:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['tipo']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Cantidad:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['cantidad']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Estado:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$maq['estado']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Observación:",0,"",0,"B");
$pdf->CuadroCuerpoMulti(50,$maq['obsmaq']);
$pdf->Ln();
$foto="../foto/".$maq['foto'];
if(!empty($maq['foto']) && file_exists($foto)){
	$pdf->Image($foto,140,50,40,40);	
}

$pdf->Output();
?>
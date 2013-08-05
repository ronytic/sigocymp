<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte de Adjudicación";
$id=$_GET['id'];
class PDF extends PPDF{
	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/adjudicacion.php");
include_once("../../class/licitacion.php");
$licitacion=new licitacion;
$adjudicacion=new adjudicacion;
$adj=array_shift($adjudicacion->mostrar($id));
$lic=array_shift($licitacion->mostrar($adj['codlicitacion']));

$pdf->CuadroCuerpoPersonalizado(40,"Código de Entidad",0,"",0,"B");
$pdf->CuadroCuerpo(50,$adj['codigoentidad']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Entidad:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$adj['entidad']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Objeto de Contratación:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$adj['objetocontratacion']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Fecha Periodo:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$adj['fechaperiodo']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Licitación:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$lic['titulo']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Modalidad:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$adj['modalidad']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Tipo de Contratación:",0,"",0,"B");
$pdf->CuadroCuerpo(50,$adj['tipocontratacion']);
$pdf->Ln();$pdf->Ln();
$pdf->CuadroCuerpoPersonalizado(40,"Observaciones:",0,"",0,"B");
$pdf->CuadroCuerpoMulti(50,$adj['obs']);
$pdf->Ln();$pdf->Ln();

$pdf->Output();
?>
<?php
	include_once("../../login/check.php");
	$id=$_GET['id'];
	include_once("../../funciones/funciones.php");
	include_once("../../impresion/fpdf/fpdf.php");
	include_once("../../class/fichakardex.php");
	include_once("../../class/obra.php");
	include_once("../../class/empleado.php");
	include_once("../../class/maquinaria.php");
	
	$fichakardex=new fichakardex;
	$obra=new obra;
	$maquinaria=new maquinaria;
	$empleado=new empleado;
	$fk=array_shift($fichakardex->mostrar($id));
	$o=array_shift($obra->mostrar($fk['codobra']));
	$m=array_shift($maquinaria->mostrar($fk['codmaquinaria']));
	$e=array_shift($empleado->mostrar($fk['codempleadooperador']));
	$pdf=new FPDF("P","mm",array(160,200));
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(true,0);
	$pdf->AddPage();
	$pdf->SetFont("arial","B",14);
	$pdf->SetXY(40,6);
	$pdf->Cell(80,6,"PARTE DIARIO DE TRABAJO",0,0,"C");
	$pdf->SetFont("arial","B",8);
	
	$pdf->SetXY(5,29);
	$pdf->Cell(63,6,utf8_decode($o['nombre']),1,0,"C");
	$pdf->SetXY(72,29);
	$pdf->Cell(33,6,utf8_decode($m['tipo']),1,0,"C");
	//$pdf->SetXY(115,27);
	//$pdf->Cell(33,6,"PR-34C",1,0,"C");
	
	$pdf->SetXY(5,44);
	$pdf->Cell(35,6,utf8_decode($fk['horometroinicial']),1,0,"C");
	$pdf->SetXY(42,44);
	$pdf->Cell(31,6,utf8_decode($fk['horometrofin']),1,0,"C");
	$pdf->SetXY(75,44);
	$pdf->Cell(25,6,utf8_decode($fk['horometrofin']-$fk['horometroinicial']),1,0,"C");
	$pdf->SetXY(105,44);
	$pdf->Cell(45,6,utf8_decode($e['nombre']." ".$e['appaterno']." ".$e['apmaterno']),1,0,"C");
	
	$pdf->SetXY(17,62);
	$pdf->Cell(11,6,utf8_decode($fk['combustible']),1,0,"C");
	$pdf->SetXY(52,62);
	$pdf->Cell(11,6,utf8_decode($fk['motor']),1,0,"C");
	$pdf->SetXY(88,62);
	$pdf->Cell(11,6,utf8_decode($fk['mandosfinales']),1,0,"C");
	
	$pdf->SetXY(17,72);
	$pdf->Cell(11,6,utf8_decode($fk['grasa']),1,0,"C");
	$pdf->SetXY(52,72);
	$pdf->Cell(11,6,utf8_decode($fk['sistemahidraulico']),1,0,"C");
	$pdf->SetXY(88,72);
	$pdf->Cell(11,6,utf8_decode($fk['transmision']),1,0,"C");
	
	$pdf->SetXY(125,62);
	$pdf->Cell(20,6,utf8_decode(date("H:i",strtotime($fk['horaingreso']))."-".date("H:i",strtotime($fk['horasalida']))),1,0,"C");
	
	$pdf->SetXY(15,92);
	$pdf->MultiCell(130,5,utf8_decode($fk['detalleservicio']),1);
	
	$pdf->Output();
?>
<?php
	include_once("../../login/check.php");
	include_once("../../funciones/funciones.php");
	include_once("../../fpdf/fpdf.php");
	$pdf=new FPDF("P","mm",array(154,192));
	$pdf->SetMargins(0,0,0);
	$pdf->SetAutoPageBreak(true,0);
	$pdf->AddPage();
	$pdf->SetFont("arial","B",14);
	$pdf->SetXY(40,6);
	$pdf->Cell(80,6,"PARTE DIARIO DE TRABAJO",0,0,"C");
	$pdf->SetFont("arial","B",12);
	
	$pdf->SetXY(6,27);
	$pdf->Cell(63,6,"PARTE DIARIO DE TRABAJO",1,0,"C");
	$pdf->SetXY(71,27);
	$pdf->Cell(33,6,"PR-34C",1,0,"C");
	$pdf->SetXY(115,27);
	$pdf->Cell(33,6,"PR-34C",1,0,"C");
	
	$pdf->SetXY(6,42);
	$pdf->Cell(33,6,"PR-34C",1,0,"C");
	$pdf->SetXY(42,42);
	$pdf->Cell(32,6,"PR-34C",1,0,"C");
	$pdf->SetXY(76,42);
	$pdf->Cell(24,6,"PR-34C",1,0,"C");
	$pdf->SetXY(105,42);
	$pdf->Cell(43,6,"PR-34C",1,0,"C");
	$pdf->Output();
?>
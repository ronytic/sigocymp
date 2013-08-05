<?php
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Materiales";
$id=$_GET['id'];
class PDF extends PPDF{
	function Cabecera(){
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(60,"Material");
		$this->TituloCabecera(50,"Precio Unitario");
		$this->TituloCabecera(50,"Unidad Medida");
	}	
}

$pdf=new PDF;
$pdf->AddPage();
include_once("../../class/material.php");
$material=new material;
//$mat=array_shift($material->mostrar($id));
foreach($material->mostrarTodo() as $mat){$i++;
$pdf->CuadroCuerpo(10,$i,0,"R");
$pdf->CuadroCuerpo(60,$mat['nombre']);
$pdf->CuadroCuerpo(50,$mat['preciounitario'],0,"C");
$pdf->CuadroCuerpo(50,$mat['unidadmedida']);
$pdf->Ln();
}
$pdf->Output();
?>
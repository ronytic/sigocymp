<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Maquinarias";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(70,"Descripción");
		$this->TituloCabecera(20,"Altura");
		$this->TituloCabecera(20,"Ancho");
		$this->TituloCabecera(20,"Peso");
		$this->TituloCabecera(20,"Precio");
		$this->TituloCabecera(30,"Tipo");
		$this->TituloCabecera(20,"Cantidad");
		$this->TituloCabecera(40,"Estado");
	}	
}


include_once("../../class/maquinaria.php");
include_once("../../class/licitacion.php");
$maquinaria=new maquinaria;
$licitacion=new licitacion;

$where="descrip LIKE '%$descripcion%' and tipo LIKE '%$tipo%' and estado LIKE '%$estado%'";


//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($maquinaria->mostrarTodos($where) as $ad){$i++;
	//$o=array_shift($obra->mostrar($c['codobra']));
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(70,$ad['descrip']);
	$pdf->CuadroCuerpo(20,$ad['altura'],0);
	$pdf->CuadroCuerpo(20,$ad['ancho'],0);
	$pdf->CuadroCuerpo(20,$ad['peso'],0);
	$pdf->CuadroCuerpo(20,$ad['precio'],0);
	$pdf->CuadroCuerpo(30,$ad['tipo'],0);
	$pdf->CuadroCuerpo(20,$ad['cantidad'],0);
	$pdf->CuadroCuerpo(40,$ad['estado'],0);
	$pdf->Ln();
}
$pdf->Output();
?>
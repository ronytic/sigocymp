<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Repuestos";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->Ln();
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(70,"Descripción");
		$this->TituloCabecera(20,"Precio");
		$this->TituloCabecera(30,"Tipo");
		$this->TituloCabecera(30,"Tiempo de Vida");
		$this->TituloCabecera(40,"Cod Fabricación");
		$this->TituloCabecera(50,"Proveedor");
	}	
}


include_once("../../class/repuesto.php");
include_once("../../class/proveedorrepuesto.php");
$repuesto=new repuesto;
$proveedorrepuesto=new proveedorrepuesto;

$where="fecha <= '$fecha'";


//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($repuesto->mostrarTodos($where) as $ad){$i++;
	$pr=array_shift($proveedorrepuesto->mostrar($ad['codproveedorrepuesto']));
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(70,$ad['descripcion']);
	$pdf->CuadroCuerpo(20,$ad['precio'],0);
	$pdf->CuadroCuerpo(30,$ad['tipo'],0);
	$pdf->CuadroCuerpo(30,$ad['tiempovida'],0);
	$pdf->CuadroCuerpo(40,$ad['codigodefabricacion'],0);
	$pdf->CuadroCuerpo(50,$pr['nombre'],0);
	$pdf->Ln();
}
$pdf->Output();
?>
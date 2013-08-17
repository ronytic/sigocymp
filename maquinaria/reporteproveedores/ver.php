<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Proveedor de Repuestos";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		/*$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->Ln();*/
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(60,"Nombre");
		$this->TituloCabecera(90,"Dirección");
		$this->TituloCabecera(50,"Teléfono");
		$this->TituloCabecera(40,"Mail");

	}	
}


include_once("../../class/repuesto.php");
include_once("../../class/proveedorrepuesto.php");
$repuesto=new repuesto;
$proveedorrepuesto=new proveedorrepuesto;

$where="nombre LIKE '%$nombre%' and telefono LIKE '%$telefono%' and direccion LIKE '%$direccion%' and mail LIKE '%$mail%'";


//echo $where;
$pdf=new PDF("L","mm","letter");
$pdf->AddPage();
foreach($proveedorrepuesto->mostrarTodos($where) as $ad){$i++;
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(60,$ad['nombre']);
	$pdf->CuadroCuerpo(90,$ad['direccion'],0);
	$pdf->CuadroCuerpo(50,$ad['telefono'],0);
	$pdf->CuadroCuerpo(40,$ad['mail'],0);
	$pdf->Ln();
}
$pdf->Output();
?>
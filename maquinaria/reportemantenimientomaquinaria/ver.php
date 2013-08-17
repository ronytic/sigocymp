<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Mantenimiento de Maquinarias";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		/*$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->Ln();*/
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(70,"Repuesto");
		$this->TituloCabecera(90,"Maquinaria");
		$this->TituloCabecera(60,"Detalle");
		$this->TituloCabecera(20,"Fecha");


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
foreach($proveedorrepuesto->mostrarTodoUnion("repuesto r,maquinaria m,mantenimientomaquinaria mm","mm.codmantenimientomaquinaria,r.descripcion as rdescripcion,m.descrip,mm.fechamantenimiento,mm.titulo","mm.codmantenimientomaquinaria","mm.codmaquinaria=m.codmaquinaria and mm.codmaquinaria LIKE '%$codmaquinaria%' and mm.codrepuesto=r.codrepuesto and mm.codrepuesto LIKE '%$codrepuesto%' and mm.fechamantenimiento LIKE '%$fechamantenimiento%'","mm.") as $ad){$i++;
	//$e=array_shift($empleado->mostrar($c['codempleado']));
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(70,$ad['rdescripcion']);
	$pdf->CuadroCuerpo(90,$ad['descrip'],0);
	$pdf->CuadroCuerpo(60,$ad['titulo'],0);
	$pdf->CuadroCuerpo(20,$ad['fechamantenimiento'],0);
	$pdf->Ln();
}
$pdf->Output();
?>
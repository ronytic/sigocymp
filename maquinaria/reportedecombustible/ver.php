<?php
include_once("../../login/check.php");
include_once("../../impresion/pdf.php");
$titulo="Reporte General de Reporte de Combustible";
extract($_GET);
class PDF extends PPDF{
	function Cabecera(){
		global $fecha,$anio,$mes,$dias;
		/*$this->CuadroCabecera(50,"Fecha de Referencia:",20,$fecha);
		$this->Ln();*/
		$this->TituloCabecera(10,"N");
		$this->TituloCabecera(20,"Fecha");
		$this->TituloCabecera(40,"Maquinaria");
		$this->TituloCabecera(40,"Obra");
		$this->TituloCabecera(40,"Empleado");
		$this->TituloCabecera(15,"Horo Ini");
		$this->TituloCabecera(15,"Horo Fin");
		$this->TituloCabecera(15,"Hora Ini");
		$this->TituloCabecera(15,"Hora Fin");
		$this->TituloCabecera(15,"Combus");
		$this->TituloCabecera(15,"Motor");
		$this->TituloCabecera(15,"MandoF");
		$this->TituloCabecera(15,"Grasa");
		$this->TituloCabecera(15,"SisHidra");
		$this->TituloCabecera(15,"Transmi");
	}	
}

$fechakardex=$fechakardex==""?'%':$fechakardex;
$codmaquinaria=$codmaquinaria==""?'%':$codmaquinaria;
$codobra=$codobra==""?'%':$codobra;
$codempleadooperador=$codempleadooperador==""?'%':$codempleadooperador;

include_once("../../class/fichakardex.php");
include_once("../../class/maquinaria.php");
include_once("../../class/obra.php");
include_once("../../class/empleado.php");
$fichakardex=new fichakardex;
$maquinaria=new maquinaria;
$obra=new obra;
$empleado=new empleado;

$where="fechakardex LIKE '$fechakardex' and codmaquinaria LIKE '$codmaquinaria' and codobra LIKE '$codobra' and codempleadooperador LIKE '$codempleadooperador'";


//echo $where;
$pdf=new PDF("L","mm","legal");
$pdf->AddPage();
$combustible=0;
$motor=0;
$mandosfinales=0;
$grasa=0;
$sistemahidraulico=0;
$transmision=0;
foreach($fichakardex->mostrarTodo($where) as $ad){$i++;
	$o=array_shift($obra->mostrar($ad['codobra']));
	$m=array_shift($maquinaria->mostrar($ad['codmaquinaria']));
	$e=array_shift($empleado->mostrar($ad['codempleadooperador']));
	$combustible+=$ad['combustible'];
	$motor+=$ad['motor'];
	$mandosfinales+=$ad['mandosfinales'];
	$grasa+=$ad['grasa'];
	$sistemahidraulico+=$ad['sistemahidraulico'];
	$transmision+=$ad['transmision'];
	$pdf->CuadroCuerpo(10,$i,0,"R");
	$pdf->CuadroCuerpo(20,$ad['fechakardex']);
	$pdf->CuadroCuerpo(40,$m['descrip'],0,"",0);
	$pdf->CuadroCuerpo(40,$o['nombre'],0,"",0);
	$pdf->CuadroCuerpo(40,$e['appaterno']." ".$e['nombre'],0,"",0);
	$pdf->CuadroCuerpo(15,$ad['horometroinicial'],0,"R",0);
	$pdf->CuadroCuerpo(15,$ad['horometrofin'],0,"R",0);
	$pdf->CuadroCuerpo(15,$ad['horaingreso'],0,"R",0);
	$pdf->CuadroCuerpo(15,$ad['horasalida'],0,"R",0);
	
	$pdf->CuadroCuerpo(15,$ad['combustible'],0,"R",1);
	$pdf->CuadroCuerpo(15,$ad['motor'],0,"R",1);
	$pdf->CuadroCuerpo(15,$ad['mandosfinales'],0,"R",1);
	$pdf->CuadroCuerpo(15,$ad['grasa'],0,"R",1);
	$pdf->CuadroCuerpo(15,$ad['sistemahidraulico'],0,"R",1);
	$pdf->CuadroCuerpo(15,$ad['transmision'],0,"R",1);
	$pdf->Ln();
}
$pdf->CuadroCuerpo(210,"Total:",1,"R",1);
$pdf->CuadroCuerpo(15,$combustible,1,"R",1);
$pdf->CuadroCuerpo(15,$motor,1,"R",1);
$pdf->CuadroCuerpo(15,$mandosfinales,1,"R",1);
$pdf->CuadroCuerpo(15,$grasa,1,"R",1);
$pdf->CuadroCuerpo(15,$sistemahidraulico,1,"R",1);
$pdf->CuadroCuerpo(15,$transmision,1,"R",1);
$pdf->Output();
?>
<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Ficha kardex";
include_once '../../funciones/funciones.php';

$n1archivo="maquinaria";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$maq=todolista(${$n1archivo}->mostrarTodo(),"codmaquinaria","descrip","");
$n2archivo="obra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$obra=todolista(${$n2archivo}->mostrarTodo(),"codobra","nombre,lugar","");
$n3archivo="empleado";
include_once '../../class/'.$n3archivo.'.php';
${$n3archivo}=new $n3archivo;
$emp=todolista(${$n3archivo}->mostrarTodo(),"codempleado","nombre,appaterno,apmaterno"," ");

include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo;?></div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
                	<tr>
                    	<td colspan="2"><?php campos("Maquinaria","codmaquinaria","select",$maq,0);?></td>
                        <td colspan="2"><?php campos("Empleado","codempleadooperador","select",$emp,0);?></td>
                        
					</tr>
                    <tr>
                    	<td colspan="4"><?php campos("Obra","codobra","select",$obra,0);?></td>
                    </tr>
					<tr>
						<td colspan="2"><?php campos("Fecha de Kardex","fechakardex","date",date("Y-m-d"),1,array("size"=>30));?></td>
                        
                    </tr>
                    <tr>
	                    <td colspan="2"><?php campos("Horometro Inicial","horometroinicial","text","",1,array("size"=>30));?></td>
                    	<td colspan="2"><?php campos("Horometro Fin","horometrofin","text","",1,array("size"=>30));?></td>
                    </tr>
                    <tr>
	                    <td colspan="2"><?php campos("Hora Ingreso","horaingreso","text","",1,array("size"=>30));?></td>
                    	<td colspan="2"><?php campos("Hora Salida","horasalida","text","",1,array("size"=>30));?></td>
                    </tr>
                    <tr>
                    	<td colspan="1"><?php campos("Combustible","combustible","text","",1,array("size"=>10));?> Lts.</td>
                        <td colspan="1"><?php campos("Motor","motor","text","",1,array("size"=>10));?> Lts.</td>
                        <td colspan="1"><?php campos("Mandos Finales","mandosfinales","text","",1,array("size"=>10));?> Lts.</td>
                    </tr>
                    <tr>
                    	<td colspan="1"><?php campos("Grasa","grasa","text","",1,array("size"=>10));?> Kg.</td>
                        <td colspan="1"><?php campos("Sistema Hidraulico","sistemahidraulico","text","",1,array("size"=>10));?> Lts.</td>
                        <td colspan="1"><?php campos("Transmisión","transmision","text","",1,array("size"=>10));?> Lts.</td>
                    </tr>
                    <tr>
                    	<td colspan="4"><?php campos("Detalle Servicio","detalleservicio","textarea","",1,array("size"=>30,"cols"=>50,"rows"=>10));?></td>
                    </tr>
                    <tr>
						<td colspan="4"><?php campos("Observación","obs","textarea","",1,array("size"=>30,"cols"=>50,"rows"=>10));?></td>
                    </tr>
					<tr><td></td><td><?php campos("Guardar","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
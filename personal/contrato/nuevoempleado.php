<?php
include_once '../../login/check.php';
$folder="../../";
$id=$_GET['id'];
$titulo="Registro de Nuevo Contrato";
include_once '../../funciones/funciones.php';
include_once '../../class/empleado.php';
include_once '../../class/plantilla.php';
$empleado=new empleado;
$plantilla=new plantilla;
$emp=array_shift($empleado->mostrar($id));

foreach($empleado->mostrarTodo() as $k=> $v)
	$valores[$v['codempleado']]=$v['nombre']." ".$v['appaterno']." ".$v['apmaterno'];

foreach($plantilla->mostrarTodo() as $k=> $v)
	$val[$v['codplantilla']]=$v['nomplantilla'];
$nombres=$emp['nombre']." ".$emp['appaterno']." ".$emp['apmaterno'];



$n2archivo="obra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$obra=todolista(${$n2archivo}->mostrarTodo(),"codobra","nombre","");
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_1 grid_10 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="nuevocontratoempleado.php" method="post">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text",$nombres,0,array("required"=>"required","readonly"=>"readonly","size"=>35));?></td>
                        <td><?php campos("Obra","codobra","select",$obra,0);?></td>
                        <td><?php campos("Cargo","cargo","text")?></td>
                    </tr>
                    <tr>
                        <td><?php campos("FechaContrato","fechacontrato","date",date("Y-m-d"))?></td>
					    <td><?php campos("Tipo de Contrato","tipocontrato","text","",0,array("required"=>"required","size"=>30));?></td>
                        <td><?php campos("Duración de Contrato","duracioncontrato","text","",0,array("required"=>"required","size"=>30));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Salario Contrato","salariocontrato","text","",0,array("required"=>"required","size"=>30));?></td>
                        <td colspan="2"><?php campos("Nombre del Contratante","codcontratante","select",$valores,0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Plantilla","plantilla","select",$val,1,array("size"=>count($val)));?>
                        </td>
                    </tr>
				</table>
                <?php campos("Seleecionar Plantilla","guardar","submit");?>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
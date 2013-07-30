<?php
include_once '../../login/check.php';
$folder="../../";
$id=$_GET['id'];
$titulo="Registro de Nuevo Contrato";
include_once '../../funciones/funciones.php';
include_once '../../class/empleado.php';
include_once '../../class/contratacion.php';
$empleado=new empleado;
$contratacion=new contratacion;
$con=array_shift($contratacion->mostrar($id));

$emp=array_shift($empleado->mostrar($con['codempcontratado']));
$nombrecontratado=$emp['nombre']." ".$emp['appaterno']." ".$emp['apmaterno'];

foreach($empleado->mostrarTodo() as $k=> $v)
	$val[$v['codempleado']]=$v['nombre']." ".$v['appaterno']." ".$v['apmaterno'];


$nombres=$emp['nombre']." ".$emp['appaterno']." ".$emp['apmaterno'];
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_1 grid_10 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","codcontratacion","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre del Contratado","nombre","text",$nombrecontratado,0,array("required"=>"required","readonly"=>"readonly"));?></td>
                        <td><?php campos("Nombre del Contratante","codcontratante","select",$val,0,array("required"=>"required"),$con['codempcontratante']);?></td>
                        <td><?php campos("Fecha de Contrato","fechacontrato","date",$con['fechacont'],0,array("required"=>"required"));?></td>
					</tr>
                    <tr>
                    	<td><?php campos("Tipo de Contrato","tipocontrato","text",$con['tipocont'],0,array("required"=>"required","size"=>30));?></td>
                        <td><?php campos("Duración de Contrato","duracioncontrato","text",$con['duracioncont'],0,array("required"=>"required","size"=>30));?></td>
                        <td><?php campos("Salario Contrato","salariocontrato","text",$con['salariocont'],0,array("required"=>"required","size"=>30));?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Archivo del Contrato","foto","file");?></td>
                    </tr>
					<tr>
                    	<td><?php campos("Seleccionar Plantilla","guardar","submit");?></td>
                    </tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
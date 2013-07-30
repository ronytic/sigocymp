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
foreach($plantilla->mostrarTodo() as $k=> $v)
	$val[$v['codplantilla']]=$v['nomplantilla'];
$nombres=$emp['nombre']." ".$emp['appaterno']." ".$emp['apmaterno'];
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
						<td><?php campos("Nombre","nombre","text",$nombres,0,array("required"=>"required","readonly"=>"readonly"));?></td>
					</tr>
                    <tr>
                    	<td><?php campos("Plantilla","plantilla","select",$val,1,array("size"=>count($val)));?>
                        </td>
					</tr>
					<tr>
                    	<td><?php campos("Seleecionar Plantilla","guardar","submit");?></td>
                    </tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
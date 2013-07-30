<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Contrato de Empleado";
include_once '../../funciones/funciones.php';
include_once '../../class/empleado.php';
include_once '../../class/plantilla.php';
$empleado=new empleado;
$plantilla=new plantilla;
$id=$_POST['id'];
$idplantilla=$_POST['plantilla'];
$emp=array_shift($empleado->mostrar($id));
$plan=array_shift($plantilla->mostrar($idplantilla));
$nombres=$emp['nombre']." ".$emp['appaterno']." ".$emp['apmaterno'];
include_once '../../cabecerahtml.php';
?>
<script language="javascript" type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_1 grid_10 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardarcontratoempleado.php" method="post">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text",$nombres,0,array("required"=>"required","readonly"=>"readonly"));?></td>
					</tr>
                    <tr>
                    <td><?php campos("Nombre del contrato","nombrecontrato","text","",1,array("required"=>"required"));?></td>
                    </tr>
                    <tr>
						<td>
							Puede editar la plantilla cambiando los datos Esenciales para cada empleado. Todo el contrato se registrará.
						<?php campos("Plantilla","plantilla","textarea",$plan['detalleplantilla'],"",array("class"=>"ckeditor","rows"=>50,"cols"=>90));?></td>
                    </tr>
					<tr>
                    	<td><?php campos("Guardar Contrato Empleado","guardar","submit");?></td>
                    </tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Personal";
$id=$_GET['id'];
include_once '../../class/empleado.php';
$empleado=new empleado;
$emp=array_shift($empleado->mostrar($id));
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombres","nombres","text",$emp['nombre'],1,array("required"=>"required"));?></td>
						<td><?php campos("Apellido Paterno","paterno","text",$emp['appaterno']);?></td>
                        <td><?php campos("Apellido Materno","materno","text",$emp['apmaterno']);?></td>
					</tr>
					<tr>
						<td><?php campos("C.I.","ci","text",$emp['ci']);?></td>
                        <td><?php campos("Dirección","direccion","text",$emp['direccion']);?></td>
                        <td><?php campos("Fecha Nacimiento","fechanac","date",$emp['fechanac']);?></td>
					</tr>
					<tr>
	                    <td><?php campos("Teléfono","telefono","text",$emp['fono']);?></td>
                        <td><?php campos("Cargo","cargo","select",array("profesional"=>"Profesional","maestrodeobra"=>"Maestro de Obra","operador"=>"Operador"),"","",$emp['cargo']);?></td>
                        <td><?php campos("Fecha de Ingreso","fechain","date",$emp['fechain']);?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Fotografía","foto","file");?></td>
                    </tr>
					<tr>
						
                        <td colspan="2"><?php campos("Curriculum Vitae","curriculum","file");?></td>
					</tr>
					<tr><td></td><td><?php campos("Modificar Empleado","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
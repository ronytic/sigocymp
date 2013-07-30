<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Personal";
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_3 grid_4 alpha">
			<fieldset>
				<div class="titulo">Registro de Empleado</div>
                <form action="guardar.php" method="post" enctype="multipart/form-data">
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombres","nombres","text","",1,array("required"=>"required"));?></td>
						<td><?php campos("Apellido Paterno","paterno","text");?></td>
                        <td><?php campos("Apellido Materno","materno","text");?></td>
					</tr>
					<tr>
						<td><?php campos("C.I.","ci","text","","",array("required"=>"required"));?></td>
                        <td><?php campos("Dirección","direccion","text");?></td>
                        <td><?php campos("Fecha Nacimiento","fechanac","date");?></td>
					</tr>
					<tr>
	                    <td><?php campos("Teléfono","telefono","text","","",array("required"=>"required"));?></td>
                        <td><?php campos("Cargo","cargo","select",array("profesional"=>"Profesional","maestrodeobra"=>"Maestro de Obra","operador"=>"Operador"));?></td>
                        <td><?php campos("Fecha de Ingreso","fechain","date");?></td>
					</tr>
                    <tr>
                    	<td colspan="2"><?php campos("Fotografía","foto","file");?></td>
                    </tr>
					<tr>
						
                        <td colspan="2"><?php campos("Curriculum Vitae","curriculum","file");?></td>
					</tr>
					<tr><td></td><td><?php campos("Guardar Empleado","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
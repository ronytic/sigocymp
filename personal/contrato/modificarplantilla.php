<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Plantilla de Contrato";
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
include_once '../../class/plantilla.php';
$plantilla=new plantilla;
$id=$_GET['id'];
$p=array_shift($plantilla->mostrar($id));
?>
<script language="javascript" type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_1 grid_10 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="actualizarplantilla.php" method="post"><?php campos("","cod","hidden",$p['codplantilla'],1,array("required"=>"required"));?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text",$p['nomplantilla'],1,array("required"=>"required"));?></td>
					</tr>
                    <tr>
                    	<td><?php campos("Descripción de la Plantilla","descripcion","text",$p['desplantilla'],"",array("size"=>60));?></td>
					</tr>
                    <tr>
						<td><?php campos("Plantilla","plantilla","textarea",$p['detalleplantilla'],"",array("class"=>"ckeditor","rows"=>50,"cols"=>90));?>
                        <br>
                        <ul>
                        <li><strong>DIRECCIONDOMICILIO</strong> = Imprime el Domicilio Registrado del Empleado</li>
                        <li><strong>CARGOCONTRATO</strong> = Imprime el Cargo del Empleado</li>
                        <li><strong>SALARIOCONTRATO</strong> = Imprime el Salario Registrado del Empleado</li>
                        <li><strong>FECHACONTRATO</strong> = Imprime la Fecha de Registro del Contrato</li>
                        <li><strong>TIPOCONTRATO</strong> = Imprime el Tipo de Contrato</li>
                        <li><strong>DURACIONCONTRATO</strong> = Imprime la Duración del Contrato</li>
                        <li><strong>OBRACONTRATO</strong> = Imprime el Nombre de la Obra Asignado al Empleado</li>
                        <li><strong>NOMBRECONTRATADO</strong> = Imprime el Nombre del Empleado Contratado</li>
                        <li><strong>CICONTRATADO</strong> = Imprime la C.I. del Empleado Contratado</li>
                        <li><strong>NOMBRECOTRATANTE</strong> = Imprime el Nombre del Contratante</li>
                        <li><strong>CICONTRANTANTE</strong> = Imprime la C.I. del Contratante</li>
                        </ul>
                        </td>
                    </tr>
					<tr>
                    	<td><?php campos("Guardar Plantilla","guardar","submit");?></td>
                    </tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
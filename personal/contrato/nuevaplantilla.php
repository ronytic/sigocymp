<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nueva Plantilla de Contrato";
include_once '../../funciones/funciones.php';
include_once '../../cabecerahtml.php';
?>
<script language="javascript" type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_1 grid_10 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardarplantilla.php" method="post">
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text","",1,array("required"=>"required"));?></td>
					</tr>
                    <tr>
                    	<td><?php campos("Descripción de la Plantilla","descripcion","text");?></td>
					</tr>
                    <tr>
						<td><?php campos("Plantilla","plantilla","textarea","","",array("class"=>"ckeditor","rows"=>50,"cols"=>90));?></td>
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
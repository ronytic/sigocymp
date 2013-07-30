<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Maquinaria";
include_once '../../funciones/funciones.php';
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
						<td><?php campos("Descripción","descripcion","text","",1,array("required"=>"required"));?></td>
						<td><?php campos("Altura","altura","text");?></td>
                        <td><?php campos("Ancho","ancho","text");?></td>
					</tr>
					<tr>
						<td><?php campos("Peso","peso","text","","",array("required"=>"required"));?></td>
                        <td><?php campos("Precio","precio","text");?></td>
                        <td><?php campos("Tipo","tipo","text");?></td>
					</tr>
					<tr>
	                    <td><?php campos("Cantidad","cantidad","text","","",array("required"=>"required"));?></td>
                        <td><?php campos("Estado","estado","select",array("reparacion"=>"Reparación","ocupado"=>"Ocupado","libre"=>"Libre"));?></td>
                        <td><?php campos("Horometro Compra","horometro","text");?></td>
					</tr>
                    <tr>
                    	<td colspan="3"><?php campos("Empleado","empleado","select",$val);?></td>
                        
                    </tr>
                    <tr>
                    	<td colspan="3"><?php campos("Observación de la Maquina","observacion","textarea","",0,array("cols"=>30,"rows"=>4));?></td>
                    </tr>
					<tr><td></td><td><?php campos("Guardar Maquinaria","guardar","submit");?></td><td></td></tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
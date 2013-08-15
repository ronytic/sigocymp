<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Nuevo Repuesto";
include_once '../../funciones/funciones.php';

$n1archivo="proveedorrepuesto";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$pror=todolista(${$n1archivo}->mostrarTodo(),"codproveedorrepuesto","nombre","");
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
						<td><?php campos("Precio","precio","text");?></td>
                    </tr>
					<tr>
                    	<td colspan="2"><?php campos("Tipo","tipo","text","",0,array("size"=>"50"));?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Código de fabricación","codigodefabricacion","text","",0,array("size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Tiempo de Vida en meses","tiempovida","text","",0,array("size"=>"50","max-size"=>10));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Proveedor de repuesto","codproveedorrepuesto","select",$pror);?></td>
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
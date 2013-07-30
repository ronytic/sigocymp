<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Material a Obra";
include_once '../../funciones/funciones.php';

$n1archivo="proveedormaterial";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$provm=todolista(${$n1archivo}->mostrarTodo(),"codproveedormaterial","nombre"," ");

$n2archivo="obra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$obra=todolista(${$n2archivo}->mostrarTodo(),"codobra","nombre","");

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
						<td colspan="2"><?php campos("Descripción","descripcion","text","",1,array("size"=>30));?></td>
                        <td colspan="2"><?php campos("Cantidad Inicial","cantidadinicial","text","",1,array("size"=>30));?></td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Unidad Medida","unidadmedida","text","",1,array("size"=>30));?></td>
                        <td colspan="2"><?php campos("Stock","stock","text","",1,array("size"=>30));?></td>
                    </tr>
                    <tr>
						<td colspan="2"><?php campos("Precio Unitario","preciounitario","text","",1,array("size"=>30));?></td>
                        <td colspan="2"><?php campos("Precio Total","preciototal","text","",1,array("size"=>30));?></td>
                    </tr>
					<tr>
                    	<td colspan="2"><?php campos("Obra","codobra","select",$obra,0);?></td>
                        <td colspan="2"><?php campos("Proveedor Material","codproveedormaterial","select",$provm,0);?></td>
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
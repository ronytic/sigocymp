<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Repuesto";

extract($_GET);
$narchivo="repuesto";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));



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
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Descripción","descripcion","text",$datos['descripcion'],1,array("required"=>"required"));?></td>
						<td><?php campos("Precio","precio","text",$datos['precio']);?></td>
                    </tr>
					<tr>
                    	<td colspan="2"><?php campos("Tipo","tipo","text",$datos['tipo'],0,array("size"=>"50"));?></td>
					</tr>
					<tr>
						<td colspan="2"><?php campos("Código de fabricación","codigodefabricacion","text",$datos['codigodefabricacion'],0,array("size"=>"50"));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Tiempo de Vida en meses","tiempovida","text",$datos['tiempovida'],0,array("size"=>"50","max-size"=>10));?></td>
					</tr>
                    <tr>
						<td colspan="2"><?php campos("Proveedor de repuesto","codproveedorrepuesto","select",$pror,0,"",$datos['codproveedorrepuesto']);?></td>
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
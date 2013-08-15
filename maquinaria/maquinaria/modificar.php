<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Maquinaria";

include_once("../../class/maquinaria.php");
include_once '../../funciones/funciones.php';
$id=$_GET['id'];
$maquinaria=new maquinaria;
$maq=array_shift($maquinaria->mostrar($id));
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
						<td><?php campos("Descripción","descripcion","text",$maq['descrip'],1,array("required"=>"required"));?></td>
						<td><?php campos("Altura","altura","text",$maq['altura']);?></td>
                        <td><?php campos("Ancho","ancho","text",$maq['ancho']);?></td>
					</tr>
					<tr>
						<td><?php campos("Peso","peso","text",$maq['peso'],"",array("required"=>"required"));?></td>
                        <td><?php campos("Precio","precio","text",$maq['precio']);?></td>
                        <td><?php campos("Tipo","tipo","text",$maq['tipo']);?></td>
					</tr>
					<tr>
	                    <td><?php campos("Cantidad","cantidad","text",$maq['cantidad'],"",array("required"=>"required"));?></td>
                        <td><?php campos("Estado","estado","select",array("reparacion"=>"Reparación","ocupado"=>"Ocupado","libre"=>"Libre"),0,"",$maq['estado']);?></td>
                        <td><?php campos("Horometro Compra","horometro","text",$maq['horometrocompra']);?></td>
					</tr>
                    <tr>
                    	<td colspan="3"><?php campos("Foto","foto","file","");?></td>
                    </tr>
                    <tr>
                    <td colspan="3"><?php 
						$ar="../foto/".$maq['foto'];
						if($maq['foto']!="" && file_exists($ar)){?>
                        <a href="<?php echo $ar?>" target="_blank">
                        Abrir Imagen<br>
                        <img src="<?php echo $ar?>" width="250">
                        </a>
                        <?php }else{
							echo "No se Guardo Ninguna Imagen";	
						}?></td>
                    </tr>
                    <tr>
                    	<td colspan="3"><?php campos("Observación de la Maquina","observacion","textarea",$maq['obsmaq'],0,array("cols"=>30,"rows"=>4));?></td>
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
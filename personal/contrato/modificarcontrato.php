<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Contrato de Empleado";
include_once '../../funciones/funciones.php';
include_once '../../class/empleado.php';
include_once '../../class/contrato.php';
$empleado=new empleado;
$contrato=new contrato;
$id=$_GET['id'];
$idplantilla=$_POST['plantilla'];
$con=array_shift($contrato->mostrar($id));
$emp=array_shift($empleado->mostrar($con['codempleado']));

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
                <form action="actualizarcontratoempleado.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text",$nombres,0,array("required"=>"required","readonly"=>"readonly"));?></td>
					</tr>
                    <tr>
                    <td><?php campos("Nombre del contrato","nombrecontrato","text",$con['nombrecontrato'],1,array("required"=>"required"));?></td>
                    </tr>
                    <tr>
						<td>
							Por Cuestión de seguridad no se permite la modificación del Contrato del persona, si cometío algun error en el registro elimine este contrato y vuelva a registrarlo.
						<?php campos("Plantilla","plantilla","textarea",$con['contrato'],"",array("class"=>"ckeditor","rows"=>50,"cols"=>90,"disabled"=>"disabled"));?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Archivo del Contrato","foto","file");?>
                        <?php if($con['imgcontrato']!="" && file_exists("../fotocontratos/".$con['imgcontrato'])){?>
                        <a href="../fotocontratos/<?php echo $con['imgcontrato']?>" target="_blank">
                        Abrir Imagen<br>
                        <img src="../fotocontratos/<?php echo $con['imgcontrato']?>" width="250">
                        </a>
                        <?php }else{
							echo "No se Guardo Ninguna Imagen";	
						}?>
                        </td>
                    </tr>
					<tr>
                    	<td><?php campos("Actualizar Contrato Empleado","guardar","submit");?></td>
                    </tr>
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
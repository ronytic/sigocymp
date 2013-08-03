<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Registro de Contrato de Empleado";
include_once '../../funciones/funciones.php';
include_once '../../class/empleado.php';
include_once '../../class/plantilla.php';
include_once '../../class/obra.php';
$empleado=new empleado;
$plantilla=new plantilla;
$obra=new obra;
$id=$_POST['id'];
$codcontratante=$_POST['codcontratante'];
$idplantilla=$_POST['plantilla'];
$codobra=$_POST['codobra'];
$cargocontrato=$_POST['cargo'];
$salariocontrato=$_POST['salariocontrato'];
$fechacontrato=$_POST['fechacontrato'];
$tipocontrato=$_POST['tipocontrato'];
$duracioncontrato=$_POST['duracioncontrato'];
$salariocontrato=$_POST['salariocontrato'];

$emp=array_shift($empleado->mostrar($id));
$emp2=array_shift($empleado->mostrar($codcontratante));

$plan=array_shift($plantilla->mostrar($idplantilla));
$detalleplantilla=$plan['detalleplantilla'];
$o=array_shift($obra->mostrar($codobra));

$nombres=$emp['nombre']." ".$emp['appaterno']." ".$emp['apmaterno'];
$nombres2=$emp2['nombre']." ".$emp2['appaterno']." ".$emp2['apmaterno'];



$detalleplantilla=str_replace("DIRECCIONDOMICILIO",$emp['direccion'],$detalleplantilla);
$detalleplantilla=str_replace("CARGOCONTRATO",$cargocontrato,$detalleplantilla);
$detalleplantilla=str_replace("SALARIOCONTRATO",$salariocontrato,$detalleplantilla);
$detalleplantilla=str_replace("FECHACONTRATO",$fechacontrato,$detalleplantilla);
$detalleplantilla=str_replace("TIPOCONTRATO",$tipocontrato,$detalleplantilla);
$detalleplantilla=str_replace("DURACIONCONTRATO",$duracioncontrato,$detalleplantilla);
$detalleplantilla=str_replace("SALARIOCONTRATO",$salariocontrato,$detalleplantilla);
$detalleplantilla=str_replace("OBRACONTRATO",$o['nombre'],$detalleplantilla);
$detalleplantilla=str_replace("NOMBRECONTRATADO",$nombres,$detalleplantilla);
$detalleplantilla=str_replace("CICONTRATADO",$emp['ci'],$detalleplantilla);
$detalleplantilla=str_replace("NOMBRECOTRATANTE",$nombres2,$detalleplantilla);
$detalleplantilla=str_replace("CICONTRANTANTE",$emp2['ci'],$detalleplantilla);



include_once '../../cabecerahtml.php';
?>
<script language="javascript" type="text/javascript" src="ckeditor/ckeditor.js"></script>
<?php include_once '../../cabecera.php';?>
<div class="grid_12">
	<div class="contenido">
    	<div class="prefix_1 grid_10 alpha">
			<fieldset>
				<div class="titulo"><?php echo $titulo?></div>
                <form action="guardarcontratoempleado.php" method="post">
                <?php campos("","id","hidden",$id);?>
                <?php campos("","codcontratante","hidden",$codcontratante);?>
                <?php campos("","idplantilla","hidden",$idplantilla);?>
                <?php campos("","codobra","hidden",$codobra);?>
                <?php campos("","cargocontrato","hidden",$cargocontrato);?>
                <?php campos("","salariocontrato","hidden",$salariocontrato);?>
                <?php campos("","fechacontrato","hidden",$fechacontrato);?>
                <?php campos("","tipocontrato","hidden",$tipocontrato);?>
                <?php campos("","duracioncontrato","hidden",$duracioncontrato);?>
                <?php campos("","salariocontrato","hidden",$salariocontrato);?>
				<table class="tablareg">
					<tr>
						<td><?php campos("Nombre","nombre","text",$nombres,0,array("required"=>"required","readonly"=>"readonly"));?></td>
					</tr>
                    <tr>
                    <td><?php campos("Nombre del contrato","nombrecontrato","text","",1,array("required"=>"required"));?></td>
                    </tr>
                    <tr>
						<td>
							Puede editar la plantilla cambiando los datos Esenciales para cada empleado. Todo el contrato se registrará.<?php //print_r($_POST);?>
						<?php campos("Plantilla","plantilla","textarea",$detalleplantilla,"",array("class"=>"ckeditor","rows"=>50,"cols"=>90));?></td>
                    </tr>
                    <tr>
                    	<td colspan="2"><?php campos("Archivo del Contrato","foto","file");?></td>
                    </tr>
					<tr>
                    	<td><?php campos("Guardar Contrato Empleado","guardar","submit");?></td>
                    </tr>
                    
				</table>
                </form>
			</fieldset>
		</div>
    	<div class="clear"></div>
    </div>
</div>
<?php include_once '../../piepagina.php';?>
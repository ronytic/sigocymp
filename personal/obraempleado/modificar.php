<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Modificar Obra";

extract($_GET);
$narchivo="obraempleado";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;
$datos=array_shift(${$narchivo}->mostrar($id));



$n1archivo="empleado";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$emp=todolista(${$n1archivo}->mostrarTodo(),"codempleado","nombre,appaterno"," ");
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
                <form action="actualizar.php" method="post" enctype="multipart/form-data">
                <?php campos("","id","hidden",$id);?>
				<table class="tablareg">
					<tr>
						<td colspan="2"><?php campos("Empleado","codempleado","select",$emp,0,"",$datos['codempleado']);?></td>
                        
                    </tr>
					<tr>
                    	<td colspan="2"><?php campos("Obra","codobra","select",$obra,0,"",$datos['codobra']);?></td>
                        
					</tr>
					<tr>
						<td colspan="2"><?php campos("Cargo","cargo","text",$datos['cargo'],0,array("size"=>50));?></td>
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
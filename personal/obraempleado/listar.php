<?php
include_once("../../login/check.php");
$titulo="Listado de Empleado en Obras";
$folder="../../";
include_once("../../funciones/funciones.php");

$n1archivo="empleado";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$emp=todolista(${$n1archivo}->mostrarTodo(),"codempleado","nombre,appaterno"," ");
$n2archivo="obra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$obra=todolista(${$n2archivo}->mostrarTodo(),"codobra","nombre","");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo"><?php echo $titulo;?></div>
            <form id="busqueda" action="busqueda.php" method="post">
                <table class="tablabus">
                    <tr>
                       	<td><?php campos("Empleado","codempleado","select",$emp,0);?></td>
                        <td><?php campos("Obra","codobra","select",$obra,0);?></td>
                        <td><?php campos("Cargo","cargo","text","",0,array("size"=>15));?></td>
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Asignar Empleado a Obra</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>

<?php
include_once("../../login/check.php");
$titulo="Listado de Ficha Kardex";
$folder="../../";
include_once("../../funciones/funciones.php");

$n1archivo="maquinaria";
include_once '../../class/'.$n1archivo.'.php';
${$n1archivo}=new $n1archivo;
$maq=todolista(${$n1archivo}->mostrarTodo(),"codmaquinaria","descrip","-");
$n2archivo="obra";
include_once '../../class/'.$n2archivo.'.php';
${$n2archivo}=new $n2archivo;
$obra=todolista(${$n2archivo}->mostrarTodo(),"codobra","nombre,lugar","");
$n3archivo="empleado";
include_once '../../class/'.$n3archivo.'.php';
${$n3archivo}=new $n3archivo;
$emp=todolista(${$n3archivo}->mostrarTodo(),"codempleado","nombre,appaterno,apmaterno"," ");

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
                       	<td><?php campos("Maquinaria","codmaquinaria","select",$maq,0);?></td>
                        <td><?php campos("Obra","codobra","select",$obra,0);?></td>
                        <td><?php campos("Empleado","codempleadooperador","select",$emp,0);?></td>
                         <td><?php campos("Fecha Kardex","fechakardex","date","",0);?></td>
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Registrar de Ficha Kardex</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>

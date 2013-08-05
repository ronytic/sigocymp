<?php
include_once("../../login/check.php");
$titulo="Listado de Archivos de Adjudicaciones";
$folder="../../";
include_once("../../funciones/funciones.php");
$narchivo="adjudicacion";
include_once '../../class/'.$narchivo.'.php';
${$narchivo}=new $narchivo;

$datos=todolista(${$narchivo}->mostrarTodo(),"codadjudicacion","codigoentidad,objetocontratacion","-");
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
                        <td><?php campos("Titulo","titulo","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Descripción","descripcion","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Adjudicación ","codadjudicacion","select",$datos,0);?></td>
                        
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Registrar Nuevo Archivo Adjudicación</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>

<?php
include_once("../../login/check.php");
$titulo="Listado de Personal";
$folder="../../";
include_once("../../funciones/funciones.php");
include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo">Criterio de Busqueda</div>
            <form id="busqueda" action="busqueda.php" method="post" >
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Nombre","nombre","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Paterno","paterno","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Materno","materno","text","",0,array("size"=>15));?></td>
                        <td><?php campos("C.I.","ci","text","",0,array("size"=>15));?></td>
                    </tr>
                    <tr>
                        <td><?php campos("Cargo","cargo","select",array("profesional"=>"Profesional","maestrodeobra"=>"Maestro de Obra","operador"=>"Operador"));?></td>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Nuevo Empleado</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>

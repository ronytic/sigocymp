<?php
include_once("../../login/check.php");
$titulo="Listado de maquinaria";
$folder="../../";
include_once("../../funciones/funciones.php");

include_once "../../cabecerahtml.php";
?>
<?php include_once "../../cabecera.php";?>
<div class="grid_12">
	<div class="contenido">
    	<div class="grid_8 prefix_2 alpha">
        	<fieldset>
        	<div class="titulo">Criterio de Busqueda de MAQUINARIAS</div>
            <form id="busqueda" action="busqueda.php" method="post">
                <table class="tablabus">
                    <tr>
                        <td><?php campos("Descripción","descripcion","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Tipo","tipo","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Estado","estado","select",array("reparacion"=>"Reparación","ocupado"=>"Ocupado","libre"=>"Libre"));?></td>
                        					</tr>
                    <tr>

                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevamaquina.php" class="botoninfo">Registro Nueva Maquinaria</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>

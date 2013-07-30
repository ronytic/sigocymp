<?php
include_once("../../login/check.php");
$titulo="Listado de Proveedor de Repuestos";
$folder="../../";
include_once("../../funciones/funciones.php");
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
                        <td><?php campos("Nombre","nombre","text","",1,array("size"=>15));?></td>
                        <td><?php campos("Direccion","direccion","text","",0,array("size"=>15));?></td>
                        <td><?php campos("Teléfono","telefono","text","",0,array("size"=>15));?></td>
                        <td><?php campos("E-Mail","mail","text","",0,array("size"=>15));?></td>
					</tr>
                    <tr>
                        <td><?php campos("Buscar","enviar","submit","",0,array("size"=>15));?></td>
                    </tr>
                </table>
            </form>
            <a href="nuevo.php" class="botoninfo">Registro Nuevo Proveedor</a>
            </fieldset>
        </div>
        <div class="clear"></div>
        <div id="respuesta"></div>
    </div>
</div>
<?php include_once "../../piepagina.php";?>

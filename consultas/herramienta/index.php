<?php
include_once '../../login/check.php';
$folder="../../";
$titulo="Herramienta de Presupuesto";
include_once("../../class/material.php");
$material=new material;
$datosmaterial=todolista($material->mostrarTodo(),'codmaterial',"nombre,unidadmedida","-");
include_once("../../cabecerahtml.php");
?>
<script language="javascript" type="text/javascript" src="../../js/herramienta/herramienta.js"></script>
<script language="javascript">
var linea=1;
</script>
<?php include_once("../../cabecera.php");?>
<div class="grid_12">
	<div class="contenido">
    	<fieldset><legend>Herramienta</legend>
        <form action="generar.php" method="post">
        <table class="tabla">
        	<tr class="titulo"><td>Material</td><td>Precio Unitario</td><td>Cantidad</td><td>Total</td></tr>
            <tr class="contenido">
            	<td><select name="m[1][codmaterial]" rel-linea="1" class="material"><option value="">Seleccionar</option>
                	<?php foreach($material->mostrarTodo() as $dm){?>
                    <option value="<?php echo $dm['codmaterial']?>"  rel-precio="<?php echo $dm['preciounitario']?>"><?php echo $dm['nombre']." - ".$dm['unidadmedida']?></option>
                    <?php }?>
                </select></td>
            	<td><input type="text" name="m[1][precio]" readonly class="precio" rel-linea="1"></td>
                <td><input type="number" name="m[1][cantidad]" value="0" class="der cantidad" rel-linea="1" min="0" step="1"></td>
                <td><input type="text" name="m[1][total]" value="0" class="der total" readonly rel-linea="1"></td>
            </tr>
            <tr class="contenido"><td><a href="#" class="aumentar"><img src="../../imagenes/ico/nuevo1.png" height="15"> Aumentar</a></td><td></td><td class="det">Total</td><td><input type="text" class="der supertotal" value="0" readonly></td></tr>
            <tr>
            	<td></td>
            </tr>
        </table>
        <input type="submit" value="Generar"> 
        </form>
        </fieldset>
    </div>
</div>
<?php include_once("../../piepagina.php");?>
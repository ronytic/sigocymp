<?php
include_once("../../class/material.php");
$material=new material;
$l=$_POST['l']+1;
?>
<tr class="contenido">
<td><select name="m[<?php echo $l?>][codmaterial]" rel-linea="<?php echo $l?>" class="material"><option value="">Seleccionar</option><option value="linea">Linea Separador</option>
    <?php foreach($material->mostrarTodo() as $dm){?>
    <option value="<?php echo $dm['codmaterial']?>"  rel-precio="<?php echo $dm['preciounitario']?>"><?php echo $dm['nombre']." - ".$dm['unidadmedida']?></option>
    <?php }?>
</select></td>
<td><input type="text" name="m[<?php echo $l?>][precio]" readonly class="precio" rel-linea="<?php echo $l?>"></td>
<td><input type="number" name="m[<?php echo $l?>][cantidad]" value="0" class="der cantidad" rel-linea="<?php echo $l?>" min="0" step="1"></td>
<td><input type="text" name="m[<?php echo $l?>][total]" value="0" class="der total" readonly rel-linea="<?php echo $l?>"></td>
</tr>
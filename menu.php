<?php 
include_once 'class/menu.php';
include_once 'class/submenu.php';
$menu=new menu;
$submenu=new submenu;
?>
<div  class="grid_12" >
<br>
<ul id="css3menu1">
    <li><a href="<?php echo $folder; ?>index.php" class="selected"><img src="<?php echo $folder; ?>imagenes/ico/home2.png" width="40" height="40" align="middle" />INICIO</a></li>
<?php 
    $i=1;
    foreach ($menu->mostrarMenu($codusuario) as $m) {$i++;?>
        <li><a href="#" rel="tab<?php echo $i;?>"><img src="<?php echo $folder; ?>imagenes/ico/<?php echo $m['imagen'] ?>" width="40" height="40" align="middle" /><?php echo $m['nombre'] ?></a>
        <?php if($m['submenu']){?>
            <ul>
              <?php foreach ($submenu->mostrarSubMenu($nivel,$m['idmenu']) as $sb): ?>
                <li><a href="<?php echo $folder?><?php echo $m['url'] ?><?php echo $sb['url'] ?>" class="botonsubmenu"><img src="<?php echo $folder; ?>imagenes/ico/<?php echo $sb['imagen']==""?'tick.png':$sb['imagen']; ?>" height="20" align="middle" /> <?php echo $sb['nombre'] ?></a></li>	
              <?php endforeach ?>
            </ul>
        <?php }?>
        </li>
    <?php }?>
</ul>
</div>
<div class="clear"></div>
<div class="grid_12">
	<div class="usuariocuerpo">
		<span class="pequenol">Nombre:</span> <?php echo $us['nombre'];?> | 
		<span class="pequenol">Usuario:</span> <?php echo $us['usuario'];?> |
		<span class="pequenol">Hora Acceso:</span> <?php echo $_SESSION['horasesion'];?> |
		<a href="<?php echo $folder?>usuarios/cambiarp.php?id=<?php echo $_SESSION['idusuario']?>" class="enlace">Cambiar Contraseña</a>
		<a href="<?php echo $folder ?>login/logout.php" class="botonerror">Salir</a>
	</div>
</div>
<div class="clear"></div>
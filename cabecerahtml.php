<?php
include_once 'class/usuarios.php';
$codusuario=$_SESSION['idusuario'];
$nivel=$_SESSION['nivel'];
$usuarios=new usuarios;
$us=array_shift($usuarios->mostrar($_SESSION['idusuario']));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $titulo;?> | SIGOCYMP</title>
<link href="<?php echo $folder;?>css/960/960.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $folder;?>css/tabcontent.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo $folder;?>css/core.css" type="text/css" rel="stylesheet" media="screen">
<link href="<?php echo $folder;?>css/menu/style.css" type="text/css" rel="stylesheet" media="screen">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $folder; ?>imagenes/logo.ico" />
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/tabcontent.js"></script> 
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/jquery.form.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo $folder;?>js/busquedas/busquedas.js"></script>
<link href="<?php echo $folder;?>css/ui/jquery.ui.all.css" type="text/css" rel="stylesheet" media="screen">
<script src="<?php echo $folder;?>js/ui/jquery.ui.core.js" language="javascript"></script>
<script src="<?php echo $folder;?>js/ui/jquery.ui.datepicker.js" language="javascript"></script>
<script language="javascript">
$(document).ready(function(e) {
    $('input[type=date]').click(function(e){e.preventDefault();}).datepicker({maxDate:'0 D'});
});
</script>
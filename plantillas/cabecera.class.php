<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="img/udes.ico" type="image/x-icon" rel="shortcut icon" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
        if(!isset($titulo)|| empty($titulo)){
      
        echo "<title>Social University</title>";
        }
        else{
            echo "<title>$titulo</title>";
        }
        ?>
        <link rel="stylesheet" href="<?php echo RUTA_CSS ?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo RUTA_CSS ?>style.css">
    </head>
    <body>
<?php
include_once 'app/config.class.php'; 
include_once 'app/Conexion.class.php';
include_once 'app/comprobarLogin.class.php';
include_once 'app/controlSesion.class.php';
 Conexion::abrirConexion();
?>

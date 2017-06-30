<?php
include_once 'app/Conexion.class.php';
include_once 'app/RepositorioUsuarios.class.php';
include_once 'app/Redireccion.class.php';
$titulo = 'Registro Satisfactorio';
include_once 'plantillas/cabecera.class.php';
include_once 'plantillas/piePagina.class.php';
include_once 'plantillas/barraNavegacion.class.php';
       
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <p><br> <br><h3>! Bienvenido <b><?php echo $nombre;?></b> !</h3><br> 
                    <?php
                    echo "<div class='alert alert-success text-center' role='alert'><span class='glyphicon glyphicon-ok' aria-hidden='true'></span>         Cuenta creada con exito</div>";
                    echo "<div class='alert alert-warning text-center' role='alert'><span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span>         Ahora debes validar tu correo para poder usar nuestra web</div>";
                    ?>
                    </p>
                </div>                   
            </div>
        </div>
    </div>

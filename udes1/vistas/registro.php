<?php
$titulo = 'Registro';
include_once 'plantillas/cabecera.class.php';
include_once 'plantillas/piePagina.class.php';
include_once 'plantillas/barraNavegacion.class.php';
include_once 'app/Conexion.class.php';
include_once 'app/registroValidacion.php';
include_once 'app/usuario.class.php';
include_once 'app/RepositorioUsuarios.class.php';
include_once 'app/Redireccion.class.php';
include_once 'app/controlSesion.class.php';
if(controlSesion::sesionIniciada()){
  Redireccion::redirigir(SERVIDOR);   
}   
if(isset($_POST['enviar'])){
    Conexion::abrirConexion();
    $validar = new validarRegistro($_POST['nombre'],$_POST['email'],$_POST['clave1'],$_POST['clave2'],$_POST['fechan'],Conexion :: getConexion());
 if($validar -> registroValido()){
     $nombre= $validar -> getNombre();
     $usuario = new Usuario('', $nombre,$validar -> getEmail(),password_hash($validar -> getClave(),PASSWORD_DEFAULT),'','');
     $usuarioInsertado = RepositorioUsuario::insertarUsuario(Conexion :: getConexion(), $usuario); 
 
 if ($usuarioInsertado) {
    Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/'.$usuario->getNombre());
        
     } 
      conexion::cerrarConexion();
 }
 }
?>
<meta charset="utf-8">
<div class="container">
    <div class="jumbotron">
        <h1><b>Crea una cuenta</b></h1>
        <h3> Es gratis, unete a nuestra comunidad</h3>
    </div>    
</div>
<div class="container">
    <div class="row">
        <div class="col-md-7 text-center">
            <img src="img/escudo.png" width="340" height="495"/>
        </div>
        <div class="col-md-5 text-center">

                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_REGISTRO?>">
                      <?php
                      if(isset($_POST['enviar'])){
                          include_once 'plantillas/formularioValidado.php';
                      }else{
                          include_once 'plantillas/formulariovacio.php';
                      }
                      ?>                    
                    </form>
                </div>
            </div>
            
        </div>
        
    </div>
<?php

?>

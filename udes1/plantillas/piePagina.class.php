<?php
include_once 'app/comprobarLogin.class.php';
include_once 'app/controlSesion.class.php';
include_once 'app/RepositorioUsuarios.class.php';
include_once 'app/Redireccion.class.php';

if(isset($_POST['login2'])){
    Conexion::abrirConexion();
    $validar= new validarLogin($_POST['email'],$_POST['password'],Conexion::getConexion());
    if($validar->getError()===''&&!is_null($validar->getUsuario())){
        controlSesion :: iniciarSesion(
                $validar -> getUsuario()-> getId(),
                $validar -> getUsuario()-> getNombre()
                );
        Redireccion::redirigir(SERVIDOR);
    }else{
    Conexion::cerrarConexion();
    }
}
?>
<div class="modal fade" tabindex="-1" role="dialog" id="ventana1">
<div class="modal-dialog" role="document">
    <div class="modal-content">

        <div class="modal-header">
            <button tyle="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3 class="modal-title"> Inicio de Sesion</h3>

       </div>
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="modal-body">
             
            <div class="input-group">
            <span class="input-group-addon" id="sizing-addon2">@</span>
            <input type="text" name="email" id="user" class="form-control" placeholder="Nombre de usuario" aria-describedby="sizing-addon2" 
                   <?php
                   if(isset($_POST['login2'])&& isset($_POST['email'])&&!empty($_POST['emial'])){
                       echo 'value="'.$_POST['email'].'"';
                   }
                   ?>
                   required autofocus>
            
            <label for="user" class="sr-only">nombre de usuario</label>
            </div>   
            <br>
            <div class="input-group">
                <span class="input-group-addon glyphicon glyphicon-eye-close" id="sizing-addon2"></span>
             <label for="password" class="sr-only">contraseña del usuario</label>   
             <input type="password" name="password" id="password" class="form-control" placeholder="password" aria-describedby="sizing-addon2" required="">
            
            </div> 
        </div>
        <div class="modal-footer">
            <a  href="#" id="sesion"> ¿Olvidaste tu contraseña? </a> 
            <button type="button"id="sesion" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit"id="sesion" name="login2" class="btn btn-primary" > Iniciar Sesion </button>
             <?php
             if(isset($_POST['login2'])){
                 $validar -> mostrarError();
             }
             ?>
         </div>     
        </form>
      
    </div>
</div>
</div>
<?php
Conexion::cerrarConexion();
?>
        <script src="js/jquery.min.js"></script>
    	<script src="js/bootstrap.min.js"></script>
    	
    </body>
</html>

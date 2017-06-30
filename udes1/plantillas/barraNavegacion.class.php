<?php
include_once 'app/controlSesion.class.php';
?>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Despliegue</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a  class="navbar-brand" href="<?php echo SERVIDOR ?>">
           <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Social University</a>
    </div> 
    <div id="navbar" class="navbar-collapse collapse">
        <ul  class="nav navbar-nav">
      
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if(controlSesion::sesionIniciada()){
             ?>
               <li>
                   <a  href="#">              
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>   <?php echo '  '. $_SESSION['nombre_usuario']; ?></a></li>             
                    <li class="dropdown" id="desplegable">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-triangle-bottom" aria-hidden="true"></span>
                    </a>
            <ul class="dropdown-menu" id="desplegable">
            <li>
                <a href="#"> Configuracion </a>
            </li>
            <li>
                <a href="#"> Salir </a>
            </li>
            </ul>
        </li> 
           <?php
            }else{?>
              <li><a  href="#ventana1" data-toggle="modal">              
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>     Iniciar Sesion</a></li>             
              <li><a  href="<?php echo RUTA_REGISTRO ?>">
               <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>     Registro</a></li>  
            <?php
            }
            ?>
        </ul>

    </div>   			
    </div>    		
</nav>


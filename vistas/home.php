<?php
$titulo = "Social University";
include_once 'plantillas/cabecera.class.php';
include_once 'plantillas/piePagina.class.php';
include_once 'plantillas/barraNavegacion.class.php';
include_once 'app/EscritorEntradas.class.php';
?>
<div class="container">
    <?php
    if(controlSesion::sesionIniciada()){
    ?>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
            </div>
            <div class="row">
            <div class="col-md-12">
               
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>   Paginas
                        </div>
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-12">
                              <div class="thumbnail">
                                <img src="..." alt="...">
                                <div class="caption">
                                  <h3>Nombre de la pagina</h3>
                                  <p>
                                  </p>
                                  <p><a href="#" class="btn btn-primary" role="button">Me gusta</a></p>
                                </div>
                              </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>   
                
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>   Eventos
                        </div>
                        <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                              <div class="thumbnail">
                                <img src="..." alt="...">
                                <div class="caption">
                                  <h3>Nombre del evento</h3>
                                  <p>lugar del evento,
                                      fehca del evento,
                                      hora del evento.
                                  </p>
                                  <p><a href="#" class="btn btn-primary" role="button">Participar</a> <a href="#" class="btn btn-primary" role="button">Descartar</a></p>
                                </div>
                              </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>                        
            </div>
        </div>
        <div class="col-md-8">
               <?php
                Conexion::abrirConexion();
                EscritorEntradas::escribir_entradas();
                ?>
        </div>
    </div>
    <?php
    }else{
    ?> 
    <div class="col-md-12">
        <?php
        Conexion::abrirConexion();
        EscritorEntradas::escribir_entradas();
        ?>
    </div>
    <?php
    }
    ?>
</div>








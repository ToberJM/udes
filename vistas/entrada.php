<?php
include_once 'app/config.class.php';
include_once 'app/Conexion.class.php';

include_once 'app/usuario.class.php';
include_once 'app/Entradas.class.php';
include_once 'app/Comentarios.class.php';

include_once 'app/RepositorioUsuarios.class.php';
include_once 'app/RepositorioEntrada.class.php';
include_once 'app/RepositorioComentario.class.php';

include_once 'plantillas/cabecera.class.php';
include_once 'plantillas/piePagina.class.php';
include_once 'plantillas/barraNavegacion.class.php';

$titulo = $entrada -> getTitulo();

?>

<div class="container contenido-articulo">
    <div class="row">
        <div class="col-md-12">
            <h1>
                <?php echo $entrada -> getTitulo(); ?>
            </h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <p>
                Por
                <a href="#">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $autor -> obtener_nombre(); ?>
                </a>
                el
                <?php echo $entrada -> obtener_fecha(); ?>
            </p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <article class="text-justify">
                <?php echo nl2br($entrada -> obtener_texto()); ?>
            </article>
        </div>
    </div>
    <?php
    	include_once 'plantillas/entradas_al_azar.inc.php';
    ?>
    <br>
    <?php
    	if (count($comentarios) > 0) {
    		include_once 'plantillas/comentarios_entrada.inc.php';
    	} else {
    		echo '<p>¡Todavía no hay comentarios!</p>';
    	}
    ?>
</div>

<?php
include_once 'plantillas/documento-cierre.inc.php';
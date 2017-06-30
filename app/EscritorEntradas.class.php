<?php
include_once 'app/Conexion.class.php';
include_once 'app/RepositorioEntrada.class.php';
include_once 'app/Entradas.class.php';

class EscritorEntradas {

    public static function escribir_entradas() {
        $entradas = RepositorioEntrada::obtener_todas_por_fecha_descendiente(Conexion::getConexion());
        if (count($entradas)) {
            foreach ($entradas as $entrada) {

                self::escribir_entrada($entrada);
            }
        }
        
    }

    public static function escribir_entrada($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a style="color:white !important" href="<?php echo RUTA_ENTRADA . '/' . $entrada -> getUrl() ?>" role="button">
                        <?php
                        echo $entrada -> getTitulo();
                        ?>
                        </a>
                    </div>
                    <div class="panel-body">
                        <p>
                            <strong>
                                <?php
                                echo $entrada->getFecha();
                                ?>
                            </strong>
                            <br>
                            <strong>
                                <?php
                                echo $entrada->getId();
                                ?>
                            </strong>
                        </p>
                        <div class="text-justify">
                        <?php
                        echo nl2br(self::resumir_texto($entrada->getTexto()));
                        ?>
                        </div>
                        <br>
                        <div class="text-rigth">
                            <a class="btn btn-primary" href="#" role="button">
                                <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"> Me gusta </span>
                            </a>
                            <a class="btn btn-primary" href="#" role="button">
                                <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"> Me disgusta</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    
    public static function resumir_texto($texto) {
        $longitud_maxima = 400;
        
        $resultado = '';
        
        if (strlen($texto) >= $longitud_maxima) {
            
            $resultado = substr($texto, 0, $longitud_maxima);
            
            $resultado .= '...';
        } else {
            $resultado = $texto;
        }
        
        return $resultado;
    }

}

<?php
include_once 'app/config.class.php';
include_once 'app/Conexion.class.php';

include_once 'app/usuario.class.php';
include_once 'app/Entradas.class.php';
include_once 'app/Comentarios.class.php';

include_once 'app/RepositorioUsuarios.class.php';
include_once 'app/RepositorioEntrada.class.php';
include_once 'app/RepositorioComentario.class.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'vistas/404.php';

if ($partes_ruta[0] == 'udes1') {
    if (count($partes_ruta) == 1) {
        $ruta_elegida = 'vistas/home.php';
    } else if (count($partes_ruta) == 2) {
        switch($partes_ruta[1]) {
            case 'login':
                $ruta_elegida = 'vistas/login.php';
                break;
            case 'logout':
                $ruta_elegida = 'vistas/logout.php';
                break;
            case 'registro':
                $ruta_elegida = 'vistas/registro.php';
                break;
            case 'gestor':
            	$ruta_elegida = 'vistas/gestor.php';
            	$gestor_actual = '';
            	break;
            case 'relleno-dev':
                $ruta_elegida = 'vistas/script-relleno.php';
                break;
            case 'nueva-entrada':
            	$ruta_elegida = 'vistas/nueva-entrada.php';
            	break;
            case 'borrar-entrada':
            	$ruta_elegida = 'scripts/borrar-entrada.php';
            	break;
            case 'editar-entrada':
                $ruta_elegida = 'vistas/editar-entrada.php';
                break;
            case 'recuperar-clave':
                $ruta_elegida = 'vistas/recuperar-clave.php';
                break;
            case 'generar-url-secreta':
                $ruta_elegida = 'scripts/generar-url-secreta.php';
                break;
            case 'mail':
                $ruta_elegida = 'vistas/prueba-mail.php';
                break;
            case 'buscar':
                $ruta_elegida = 'vistas/buscar.php';
                break;
            case 'perfil':
                $ruta_elegida = 'vistas/perfil.php';
                break;
        }
    } else if (count($partes_ruta) == 3) {
        if ($partes_ruta[1] == 'registro-correcto') {
            $nombre = $partes_ruta[2];
            $ruta_elegida = 'vistas/registro-correcto.php';
        }
        if ($partes_ruta[1] == 'entrada') {
            $url = $partes_ruta[2];
            
            Conexion:: abrirConexion();
            $entrada = RepositorioEntrada :: obtener_entrada_por_url(Conexion::getConexion(), $url);
            if ($entrada != null) {
                $ruta_elegida = 'vistas/entrada.php';
            }
        }
        if ($partes_ruta[1] == 'gestor') {
        	switch($partes_ruta[2]) {
        		case 'entradas':
        			$gestor_actual = 'entradas';
        			$ruta_elegida = 'vistas/gestor.php';
        			break;
        		case 'comentarios':
        			$gestor_actual = 'comentarios';
        			$ruta_elegida = 'vistas/gestor.php';
        			break;
        		case 'favoritos':
        			$gestor_actual = 'favoritos';
        			$ruta_elegida = 'vistas/gestor.php';
        			break;	
        	}
        }
        if($partes_ruta[1] == 'recuperacion-clave') {
            $url_personal = $partes_ruta[2];
            $ruta_elegida = 'vistas/recuperacion-clave.php';
        }
    }
}

include_once $ruta_elegida;
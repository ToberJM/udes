<?php
include_once 'app/config.class.php';
include_once 'app/Conexion.class.php';
include_once 'app/Comentarios.class.php';

class RepositorioComentario{
       public static function insertar_comentario($conexion, $comentario){
        $comentario_insertado=false;
        if(isset($conexion)){
            try {
                include_once 'Comentarios.class.php';
               $sql = "INSERT INTO comentarios(autor_id,entrada_id,titulo,texto,fecha) VALUES(:autor_id,:entrada_id,:titulo,:texto,NOW())"; 
               $sentencia = $conexion -> prepare($sql);
               $autor_id = $comentario -> getAutor_id();
               $entrada_id = $comentario -> getEntrada_id();
               $titulo = $comentario -> getTitulo();
               $texto = $comentario -> getTexto();
               $sentencia -> bindParam(':autor_id', $autor_id, PDO::PARAM_STR);
               $sentencia -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR); 
               $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
               $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);
   
               $comentario_insertado=$sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR'.$ex->getMessage();
                
            }
        }
        return $comentario_insertado;
    }
}
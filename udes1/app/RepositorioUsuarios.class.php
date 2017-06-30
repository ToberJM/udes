<?php
include_once 'usuario.class.php';
class RepositorioUsuario{
    public static function obtenerTodos($conexion){
        $usuarios = array();
        if(isset($conexion)){
            try{
                include_once 'usuario.class.php';
                $sql = "SELECT * FROM usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                if(count($resultado)){
                    foreach ($resultado as $fila){
                        $usuarios[] = new Usuario($fila["id"],$fila["nombre"],$fila["email"],$fila["password"],$fila["fechaRegsitro"],$fila["activo"]);
                    }
                }else{
                    print "No hay resultados";
                }
            } catch (PDOException $ex) {
               print"ERROR". $ex -> getMessage();
            }
        }
        return $usuarios;
        
    }
    public static function contarUsuarios($conexion){
        $totalUsuarios=null;
        if(isset($conexion)){
            try{
                $sql = "SELECT COUNT(*) as total FROM usuarios";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                $totalUsuarios = $resultado ["total"];
            } catch (PDOException $ex) {
               print "ERROR". getMessage()."<br>";
            }
        }
        return $totalUsuarios;
    }
    public static function insertarUsuario($conexion, $usuario){
        $usuarioInsertado=false;
        if(isset($conexion)){
            try {
                include_once 'usuario.class.php';
               $sql = "INSERT INTO usuarios(nombre,email,password,fecha_registro,activo) VALUES(:nombre,:email,:password,NOW(),0)"; 
               $sentencia = $conexion -> prepare($sql);
               $nombre = $usuario -> getNombre();
               $email = $usuario -> getEmail();
               $password = $usuario -> getPassword();
               $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
               $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
               $sentencia -> bindParam(':password', $password, PDO::PARAM_STR);
   
               $usuarioInsertado=$sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR'.$ex->getMessage();
                
            }
        }
        return $usuarioInsertado;
    }
    public static function probarNombre($conexion,$nombre){
       $nombreExiste= true;
        if(isset($conexion)){
        try{
            $sql="SELECT * FROM usuarios WHERE nombre = :nombre ";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':nombre',$nombre,PDO::PARAM_STR);
            $sentencia -> execute();
            $resultado=$sentencia -> fetchall();
            if(count($resultado)){
                $nombreExiste = true;
            } else {
                $nombreExiste = false;
            }
        } catch (PDOException $ex) {
           print 'ERROR'.$ex -> getMessage();
        }
    }
    return $nombreExiste;
    }
     public static function probarEmail($conexion,$email){
       $emailExiste= true;
        if(isset($conexion)){
        try{
            $sql="SELECT * FROM usuarios WHERE email = :email ";
            $sentencia = $conexion -> prepare($sql);
            $sentencia -> bindParam(':email',$email,PDO::PARAM_STR);
             $sentencia -> execute();
            $resultado=$sentencia -> fetchall();
            if(count($resultado)){
                $emailExiste = true;
            } else {
                $emailExiste = false;
            }
        } catch (PDOException $ex) {
           print 'ERROR'.$ex -> getMessage();
        }
    }
    return $emailExiste;
    }
    public static function obtenerUsuario($conexion,$email){
        $usuario=null;
        if(isset($conexion)){
            try {
                include_once 'usuario.class.php';
                $sql="SELECT * FROM usuarios WHERE email = :email";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':email',$email,PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetch();
                if(!empty($resultado)){
                    $usuario = new Usuario($resultado['id'],$resultado['nombre'],$resultado['email']
                            ,$resultado['password'],$resultado['fecha_registro'],$resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR'.$ex -> getMessage();
            }
        }
        return $usuario;
        
    }
    public static function obtener_usuario_por_id($conexion, $id) {
        $usuario = null;
        
        if (isset($conexion)) {
            try {
                include_once 'Usuario.class.php';
                
                $sql = "SELECT * FROM usuarios WHERE id = :id";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetch();
                
                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id'],
                            $resultado['nombre'],
                            $resultado['email'],
                            $resultado['password'],
                            $resultado['fecha_registro'],
                            $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        
        return $usuario;
    }

    
}

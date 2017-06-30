<?php
include_once 'RepositorioUsuarios.class.php';
class validarLogin{
    private  $usuario;
    private  $error;
    function __construct($email,$password,$conexion) {
        $this -> error="";
        if(!$this -> variableIniciada($email)||!$this -> variableIniciada($password)){
            $this ->usuario=null;
            $this -> error="Debes introducir tu email y contraseña";
        }else{
            $this->usuario= RepositorioUsuario :: obtenerUsuario($conexion,$email);
            if(is_null($this->usuario)|| !password_verify($password, $this->usuario-> getPassword())){
                $this->error= "Datos incorrectos";
            }
        }
        
    }
    private function variableIniciada($variable){
        if(isset($variable)&& !empty($variable)){
            return true;
        }else{
            return false;
        }
    }
    function getUsuario() {
        return $this->usuario;
    }

    function getError() {
        return $this->error;
    }
    public function mostrarError(){
        if($this->error!==''){
            echo "<br><br><div class='alert alert-danger text-center role='alert'>";
            echo $this->error;
            echo '</div>';
        }
    }


}


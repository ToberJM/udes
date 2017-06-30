<?php
include_once 'RepositorioUsuarios.class.php';
class validarRegistro{
    private $avisoInicio;
    private $avisoCierre;
    private $nombre;
    private $email;
    private $fechan;
    private $clave;
    private $errorNombre;
    private $errorEmail;
    private $errorFechan;
    private $errorClave1;
    private $errorClave2;
    public function __construct($nombre, $email, $clave1, $clave2, $fechan,$conexion) {
        $this->nombre = "";
        $this->email = "";
        $this->fechan = "";
        $this->clave= "";
        $this->errorNombre= $this->validarNombre($conexion,$nombre);
        $this->errorEmail= $this->validarEmail($conexion,$email);
        $this->errorClave1= $this->validarClave1($clave1);
        $this->errorClave2= $this->validarClave2($clave1,$clave2);
        $this->avisoInicio = "<div class='alert alert-danger' role='alert'>";
        $this->avisoCierre="</div>";
        if($this->errorClave1  === "" && $this->errorClave2 === "" ){
            $this -> clave = $clave1;
        }
    }
    private function variableIniciada($variable){
        if(isset($variable)&& !empty($variable)){
            return true;
        }else{
            return false;
        }
    }
    private function  validarNombre($conexion,$nombre){
        if(!$this -> variableIniciada($nombre)){
            return "Debes escribir un nombre de usuario";
        }else{
            $this -> nombre=$nombre;
        }
        if(strlen($nombre)<6){
            return "El nombre debe ser mas largo";
        }
        if(strlen($nombre)>24){
            return "El nombre es muy largo";
        }
        if(RepositorioUsuario :: probarNombre($conexion,$nombre)){
            return "Este nombre de usuario ya existe";
        }
        return"";
      
    }
    private function  validarEmail($conexion,$email){
        if(!$this -> variableIniciada($email)){
            return "Debes escribir un email";
        }else{
            $this -> email=$email;
        }
        if(RepositorioUsuario :: probarEmail($conexion,$email)){
            return "Este email  ya esta registrado  <a href='#'>Recupera tu contraseña</a>";
        }
        return"";
    } 
    private function validarClave1($clave1) {
        if(!$this -> variableIniciada($clave1)){
            return "Debes escribir una clave";
        }
        return"";
    }
        private function validarClave2($clave1,$clave2) {
        if(!$this -> variableIniciada($clave2)){
            return "Debes confirmar la clave";
        }
        if($clave1 !== $clave2){
            return "Las contraseñas deben coincidir";
        }
        return"";
    }
    function getNombre() {
        return $this->nombre;
    }

    function getEmail() {
        return $this->email;
    }

    function getFechan() {
        return $this->fechan;
    }
    function getclave() {
        return $this->clave;
    }

    public function getErrorNombre() {
        return $this->errorNombre;
    }

    function getErrorEmail() {
        return $this->errorEmail;
    }

    function getErrorFechan() {
        return $this->errorFechan;
    }

    function getErrorClave1() {
        return $this->errorClave1;
    }

    function getErrorClave2() {
        return $this->errorClave2;
    }
    public function mostrarNombre() {
        if($this -> nombre !==""){
            echo 'value="'. $this->nombre .'"';
        }
        
    }
    public function mostrarErrorNom() {
        if($this -> errorNombre !==""){
            echo $this->avisoInicio . $this->errorNombre . $this->avisoCierre;
        }        
    }
    public function mostrarEmail() {
         if($this -> email !==""){
             echo 'value="'. $this->email .'"';
         }

     }
     public function mostrarErrorEmail() {
         if($this -> errorEmail !==""){
             echo $this->avisoInicio . $this->errorEmail . $this->avisoCierre;
         }        
     }
     public function mostrarErrorclave1() {
         if($this -> errorClave1 !==""){
             echo $this->avisoInicio . $this->errorClave1 . $this->avisoCierre;
         }        
     } 
    public function mostrarErrorclave2() {
         if($this -> errorClave2 !==""){
             echo $this->avisoInicio . $this->errorClave2 . $this->avisoCierre;
         }        
     }  
    public function mostrarFechan() {
        if($this -> fechan !==""){
            echo 'value="'. $this->fechan .'"';
        }
        
    }
    public function registroValido(){
       if($this ->errorNombre===""&&
        $this ->errorEmail===""&&
        $this ->errorClave1===""&&
        $this ->errorClave2===""){
    return true;
       }else{
           return false;
       }
        
    }

}

<?php
 
class Usuario{
	private $id;
	private $nombre;
	private $email;
	private $password;
	private $fechaRegistro;
	private $activo;

	function __construct($id, $nombre, $email, $password, $fechaRegistro, $activo) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->email = $email;
            $this->password = $password;
            $this->fechaRegistro = $fechaRegistro;
            $this->activo = $activo;
        }
  
        function getId() {
            return $this->id;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getPassword() {
            return $this->password;
        }

        function getFechaRegistro() {
            return $this->fechaRegistro;
        }

        function getActivo() {
            return $this->activo;
        }

        function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        function setEmail($email) {
            $this->email = $email;
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setActivo($activo) {
            $this->activo = $activo;
        }


}
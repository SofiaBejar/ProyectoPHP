<?php

    /**
     * Proyecto 1º Trimestrte DWS
     * curso 2024|25
     * 
     * @author Sofía Béjar
     */


    /**
     * Clase usuario
     */
    class Usuario {

        private int $idUsu;
        private  string $email ;
        private  string $nombre ; 
        private  string $apellido ; 
        private ?string $foto = null ;
        private bool $administrador = false;
        

       
        public function __construct() { 
        }                
      
        /**
         * Crea usuario sin foto
         *
         * @param string $email
         * @param string $nombre
         * @param string $apellido
         * @return Usuario
         */
        public static function creaUsuario(int $idUsu, string $email, string $nombre, string $apellido,  int $administrador): Usuario {
            $usuario = new Usuario() ;
            $usuario->setIdUsu($idUsu);
            $usuario->setEmail($email);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido) ;
            if($administrador == 1) $usuario->setAdmin(true); 
            return $usuario ;
        }

        /**
         * Crea usuario con foto
         *
         * @param string $email
         * @param string $nombre
         * @param string $apellido
         * @param string $foto
         * @return Usuario
         */
        public static function creaUsuarioConFoto(int $idUsu, string $email, string $nombre, string $apellido, string $foto, int $administrador): Usuario {
            $usuario = new Usuario() ;
            $usuario->setIdUsu($idUsu);
            $usuario->setEmail($email);
            $usuario->setNombre($nombre);
            $usuario->setApellido($apellido) ;
            $usuario->setFoto($foto);
            if($administrador == 1) $usuario->setAdmin(true);        
            return $usuario ;
        }

        /**
         * Setter de ID de Usuario
         *
         * @param integer $idUsu
         * @return void
         */
        public function setIdUsu(int $idUsu) {
            $this->idUsu = $idUsu ;
            return $this ;
        }
        /**
         * Setter de email
         *
         * @param string $email
         * @return void
         */
        public function setEmail(string $email) {
            $this->email = $email ;
            return $this ;
        }

        /**
         * Setter de nombre
         *
         * @param string $nombre
         * @return void
         */
        public function setNombre(string $nombre){
            $this->nombre = $nombre ;
            return $this ;
        }

        /**
         * Setter de apelllido
         *
         * @param string $apellido
         * @return void
         */
        public function setApellido(string $apellido) {
            $this->apellido = $apellido ;
            return $this ;
        }

         /**
         * Setter de foto
         *
         * @param string $foto
         * @return void
         */
        public function setFoto(string $foto) {
            $this->foto = $foto;
            return $this ;
        }
        /**
         * Setter para convertirlo en administrador
         *
         * @param boolean $admin
         * @return void
         */
        public function setAdmin(bool $admin) {
            $this->administrador = $admin;
            return $this ;
        }

        /**
         * Getter de ID de Usuario
         *
         * @return integer
         */
        public function getIdUsu(): int {
            return $this->idUsu ;
        }

        /**
         * Getter de email
         *
         * @return string
         */
        public function getEmail(): string {
            return $this->email ;
        }

        /**
         * Getter de nombre
         *
         * @return string
         */
        public function getNombre(): string {
            return $this->nombre ;
        }

        /**
         * Getter de apellido
         *
         * @return string
         */
        public function getApellid(): string {
            return $this->apellido ;
        }

        /**
         * Getter de foto
         *
         * @return string
         */
        public function getFoto(): string {
            return !empty($this->foto) ? $this->foto : "https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png";
        }

        /**
         * Getter de admin
         *
         * @return boolean
         */
        public function getAdmin(): bool {
            return $this->administrador ;
        }

        /**
         * Tostring para mostrar nombre y apellido del usuario
         *
         * @return string
         */
        public function __toString(): string {
            return "{$this->nombre} {$this->apellido}" ;
        }
    }
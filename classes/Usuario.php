<?php

 class Usuario {
        protected $id;
        protected $email;
        protected $nombre_usuario;
        protected $nombre_completo;
        protected $password;
        protected $rol;

        /* Encuentra un usuario por su USERNAME */

        public function usuario_x_username(string $username) : ?Usuario {
           
            $conexion = (new Conexion())-> getConexion();

            $query = "SELECT * FROM  usuarios WHERE nombre_usuario = ?";

            $PDOStatament = $conexion->prepare($query);
            $PDOStatament->setFetchMode(PDO::FETCH_CLASS, self::class);
            $PDOStatament->execute(
                [$username]
            );

            $result= $PDOStatament->fetch();

            if(!$result){
                return null;
            }

            return $result;
        }



        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return $this->email;
        }

        /**
         * Get the value of nombre_usuario
         */ 
        public function getNombre_usuario()
        {
                return $this->nombre_usuario;
        }

        /**
         * Get the value of nombre_completo
         */ 
        public function getNombre_completo()
        {
                return $this->nombre_completo;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword()
        {
                return $this->password;
        }

        /**
         * Get the value of rol
         */ 
        public function getRol()
        {
                return $this->rol;
        }
 }


?>
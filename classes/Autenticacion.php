<?php

class Autenticacion {

    /* Verifica las credenciales del usuario, y de ser correctas guarda los datos en una sesion */

    public function log_in(string $usuario, string $password){

        //Instanciar la clase Usuario
        $datosUsuario = (new Usuario())->usuario_x_username($usuario);
        
        if( $datosUsuario){
            if(password_verify($password, $datosUsuario->getPassword())){

                $datosLogin['username']= $datosUsuario->getNombre_usuario();
                $datosLogin['id'] =$datosUsuario->getId();
                $datosLogin['rol'] =$datosUsuario->getRol();
                $_SESSION['loggedIn'] =  $datosLogin;
                return TRUE;

            }else {
                (new Alerta())->add_alerta("danger" , "El password ingresado no es correcto");
                return FALSE;
            }
        }else {
            (new Alerta())->add_alerta("warning" , "El usuario ingresado no es correcto");
            return FALSE;
        }
        


    }


    /* Metodo para LOG OUT */
    public function log_out() {
        if(isset($_SESSION['loggedIn'])){
            unset($_SESSION['loggedIn']);
        }
    }


    /* verificar si esta logeado */

    public function verify() : bool {
        if(isset($_SESSION['loggedIn'])){
           return TRUE;
        }else {
            header('location: index.php?sec=login');
        }
    }



}



?>
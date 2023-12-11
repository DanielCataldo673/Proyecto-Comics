<?php

class Conexion {
    //atributos-> modificadores de acceso

public const DB_SERVER = "localhost";

public const DB_USER = "root";

public const DB_PASS = "";

public const DB_NAME = "tienda_comic";


//DSN : indicar de donde van a venir los datos y  que tencologia lo vamos a aplicar

const DB_DSN = "mysql:host=" . self::DB_SERVER . ";dbname=" . self::DB_NAME .";charset=utf8mb4";


/* Atributo con tipo PDO */

protected PDO $db;

//Metodo constructor

public function __construct()
{
    try {
        $this->db = new PDO(self::DB_DSN, self::DB_USER, self::DB_PASS, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (Exception $e) {
        
    echo $e;//para que capture el error
        die("Error al conectar con MYSQL"); 
        //cuando la aplicacion esta en produccion
    }  
}

//Metodo para llamar a la conexion en cada archivo

public function getConexion() :PDO{
    return $this->db;
}

}



?>
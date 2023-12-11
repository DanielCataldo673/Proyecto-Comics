<?php
class Artista{
    protected $id;
    protected $nombre_completo;
    protected $biografia;
    protected $foto_perfil;

    /* Devuele el listado completo de artistas */

public function lista_completa() : array {
    $resultado = [];

    //llamamos a la conexion
    $conexion = (new Conexion())->getConexion();

    $query = "SELECT * FROM artistas";

    $PDOStatement = $conexion->prepare($query);

    $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);

    $PDOStatement->execute();

    $resultado = $PDOStatement->fetchAll();

    return $resultado;
}


/* devuelve los datos de un artista en particular */

public function get_x_id(int $id) : ?Artista {

     //llamamos a la conexion
     $conexion = (new Conexion())->getConexion();

     $query = "SELECT * FROM artistas WHERE id = $id";
 
     $PDOStatement = $conexion->prepare($query);
 
     $PDOStatement->setFetchMode(PDO::FETCH_CLASS, self::class);
 
     $PDOStatement->execute();
    
     $result = $PDOStatement->fetch();
 
     if (!$result) {
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
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre_completo
     */ 
    public function getNombre_completo()
    {
        return $this->nombre_completo;
    }

    /**
     * Set the value of nombre_completo
     *
     * @return  self
     */ 
    public function setNombre_completo($nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;

        return $this;
    }

    /**
     * Get the value of biografia
     */ 
    public function getBiografia()
    {
        return $this->biografia;
    }

    /**
     * Set the value of biografia
     *
     * @return  self
     */ 
    public function setBiografia($biografia)
    {
        $this->biografia = $biografia;

        return $this;
    }

    /**
     * Get the value of foto_perfil
     */ 
    public function getFoto_perfil()
    {
        return $this->foto_perfil;
    }

    /**
     * Set the value of foto_perfil
     *
     * @return  self
     */ 
    public function setFoto_perfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;

        return $this;
    }
}

?>